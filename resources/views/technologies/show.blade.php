@extends("layouts.technologies")

@section("content")
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('technologies.index') }}" class="btn btn-outline-secondary btn-sm">
            &larr; Back to all Categories
        </a>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-baseline">
            <h2 class="mb-4">Tech Stack Label Details:</h2>
            <!-- edit & delete buttons -->
            <div class="d-flex py-4 gap-2">
                <a class="btn btn-outline-warning" href="#">Edit</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Delete
                </button>
            </div>
        </div>

        <!-- Technology Name --> 
            <h5 class="fw-bold mb-3 text-dark mt-3">
                Technology Name: 
            </h5>
            <span class="fs-5 text-secondary lh-lg m">
                    {{ $technology->name }}
            </span>
        <!-- Description -->
        <div>
            <h6 class="fw-bold mb-3 text-dark mt-4">Color:</h6>
            <span class="badge p-2 rounded-pill" style="background-color:{{ $technology->color }}">{{ $technology->color }}</span>
        </div>
    </div>

    <!-- Modal for delete-->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $technology->id }}">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Do you wish to proceed with deletion of Category <strong>"{{ $technology->name }}"</strong>?
            </div>

            <div class="modal-footer">
                {{-- cancel btn --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                {{-- Form for effective deletion --}}
                <form action="{#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete permanently</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection