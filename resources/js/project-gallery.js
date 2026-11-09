import { Carousel } from 'bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const carouselElement = document.getElementById('projectGalleryCarousel');

    if (!carouselElement) {
        return;
    }

    const carousel = Carousel.getOrCreateInstance(carouselElement, {
        interval: false,
        ride: false,
        touch: true,
    });

    // each thumbnail opens the modal and jumps to its image
    document.querySelectorAll('[data-gallery-thumb]').forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            const index = parseInt(thumb.dataset.galleryThumb, 10);

            if (!Number.isNaN(index)) {
                carousel.to(index);
            }
        });
    });
});
