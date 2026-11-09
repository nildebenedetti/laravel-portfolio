@props([
    'name',
    'label',
    'altName',
    'altLabel' => 'Alt text',
    'existing' => null,
    'altValue' => null,
])

<div class="col col-sm-12 col-lg-6 d-flex flex-column image-upload" data-image-upload>
    <label for="{{ $name }}" class="py-2">{{ $label }}</label>
    <input type="file" name="{{ $name }}" id="{{ $name }}" accept="image/*" data-image-input>

    <label for="{{ $altName }}" class="py-2">{{ $altLabel }}</label>
    <input
        type="text"
        name="{{ $altName }}"
        id="{{ $altName }}"
        value="{{ old($altName, $altValue) }}"
        placeholder="Describe image..."
        data-image-alt
    >

    @if($existing)
        <input type="hidden" name="remove_{{ $name }}" value="0" data-image-remove-flag>
    @endif

    <div class="image-preview w-25 mt-3 {{ $existing ? '' : 'd-none' }}" data-image-preview>
        <img
            src="{{ $existing ? asset('storage/' . $existing) : '' }}"
            alt="{{ $altValue }}"
            class="img-fluid"
            data-image-preview-img
        >
        <button type="button" class="image-remove-btn" data-image-remove aria-label="Rimuovi immagine">
            &times;
        </button>
    </div>

    <div class="image-upload-error text-danger small mt-2 d-none" data-image-error role="alert"></div>
</div>
