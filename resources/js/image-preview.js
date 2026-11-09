// PHP limits used by this project (Laravel Herd Lite defaults):
//   upload_max_filesize = 2M  -> max size of a single image
//   post_max_size       = 8M  -> max size of the whole request
// Keep the total a bit below post_max_size to leave room for the
// multipart boundaries and the other form fields.
const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2 MB per image
const MAX_TOTAL_SIZE = 7 * 1024 * 1024; // ~7 MB across all images

const formatSize = function (bytes) {
    return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
};

const getImageInputs = function () {
    return Array.from(document.querySelectorAll('[data-image-input]'));
};

const getSelectedFile = function (input) {
    return input.files && input.files[0] ? input.files[0] : null;
};

const getTotalSelectedSize = function () {
    return getImageInputs().reduce(function (total, input) {
        const file = getSelectedFile(input);

        return total + (file ? file.size : 0);
    }, 0);
};

const showError = function (input, message) {
    const wrapper = input.closest('[data-image-upload]');
    const error = wrapper ? wrapper.querySelector('[data-image-error]') : null;

    if (!error) {
        return;
    }

    if (message) {
        error.textContent = message;
        error.classList.remove('d-none');
    } else {
        error.textContent = '';
        error.classList.add('d-none');
    }
};

const clearError = function (input) {
    showError(input, '');
};

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-image-upload]').forEach(function (wrapper) {
        const input = wrapper.querySelector('[data-image-input]');
        const preview = wrapper.querySelector('[data-image-preview]');
        const previewImage = wrapper.querySelector('[data-image-preview-img]');
        const removeButton = wrapper.querySelector('[data-image-remove]');
        const removeFlag = wrapper.querySelector('[data-image-remove-flag]');
        const altInput = wrapper.querySelector('[data-image-alt]');

        if (!input || !preview || !previewImage || !removeButton) {
            return;
        }

        let objectUrl = null;

        const releasePreview = function () {
            if (objectUrl) {
                URL.revokeObjectURL(objectUrl);
                objectUrl = null;
            }

            previewImage.removeAttribute('src');
            preview.classList.add('d-none');
        };

        input.addEventListener('change', function () {
            clearError(input);

            const file = getSelectedFile(input);

            if (!file) {
                releasePreview();
                return;
            }

            if (file.size > MAX_FILE_SIZE) {
                input.value = '';
                releasePreview();
                showError(
                    input,
                    'This image is ' + formatSize(file.size) + '. The maximum size per image is ' + formatSize(MAX_FILE_SIZE) + '.'
                );
                return;
            }

            const total = getTotalSelectedSize();

            if (total > MAX_TOTAL_SIZE) {
                input.value = '';
                releasePreview();
                showError(
                    input,
                    'The images you selected are ' + formatSize(total) +
                        ' in total. The maximum total upload is ' + formatSize(MAX_TOTAL_SIZE) + '.'
                );
                return;
            }

            if (objectUrl) {
                URL.revokeObjectURL(objectUrl);
            }

            objectUrl = URL.createObjectURL(file);
            previewImage.src = objectUrl;
            preview.classList.remove('d-none');

            // selecting a new image cancels a previous removal
            if (removeFlag) {
                removeFlag.value = '0';
            }
        });

        removeButton.addEventListener('click', function () {
            input.value = '';
            releasePreview();
            clearError(input);

            // in edit, this tells the controller to remove the stored image
            if (removeFlag) {
                removeFlag.value = '1';
            }

            if (altInput) {
                altInput.value = '';
            }
        });
    });

    // Final check before submitting: PHP rejects the request before Laravel
    // can validate it when post_max_size is exceeded, so prevent it here.
    const forms = new Set(
        getImageInputs().map(function (input) {
            return input.closest('form');
        })
    );

    forms.forEach(function (form) {
        if (!form) {
            return;
        }

        form.addEventListener('submit', function (event) {
            const inputs = getImageInputs().filter(function (input) {
                return form.contains(input);
            });

            let tooLarge = null;

            inputs.forEach(function (input) {
                const file = getSelectedFile(input);

                if (!file) {
                    clearError(input);
                    return;
                }

                if (file.size > MAX_FILE_SIZE) {
                    tooLarge = tooLarge || input;
                    showError(
                        input,
                        'This image is ' + formatSize(file.size) + '. The maximum size per image is ' + formatSize(MAX_FILE_SIZE) + '.'
                    );
                }
            });

            if (tooLarge) {
                event.preventDefault();
                tooLarge.focus();
                return;
            }

            const total = inputs.reduce(function (sum, input) {
                const file = getSelectedFile(input);

                return sum + (file ? file.size : 0);
            }, 0);

            if (total > MAX_TOTAL_SIZE) {
                event.preventDefault();

                const firstInput = inputs.find(function (input) {
                    return getSelectedFile(input);
                });

                if (firstInput) {
                    showError(
                        firstInput,
                        'The images you selected are ' + formatSize(total) +
                            ' in total. The maximum total upload is ' + formatSize(MAX_TOTAL_SIZE) + '.'
                    );
                    firstInput.focus();
                }
            }
        });
    });
});
