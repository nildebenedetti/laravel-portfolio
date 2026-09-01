@extends("layouts.types")

@section("content")
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('types.index') }}" class="btn btn-outline-secondary btn-sm">
            &larr; Back to all Categories
        </a>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-baseline">
            <h2 class="mb-4">Category Details:</h2>
            <!-- edit & delete buttons -->
            <div class="d-flex py-4 gap-2">
                <a class="btn btn-outline-warning" href="{{ route('types.edit', $type) }}">Edit</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Delete
                </button>
            </div>
        </div>

        <!-- Type Name --> 
            <h5 class="fw-bold mb-3 text-dark mt-3">
                Category Name: 
            </h5>
            <span class="fs-5 text-secondary lh-lg m">
                    {{ $type->name }}
            </span>
        <!-- Description -->
        <div>
            <h5 class="fw-bold mb-3 text-dark mt-4">Description:</h5>
            
            <div class="fs-5 text-secondary lh-lg">
                {!! nl2br(e($type->description)) !!} 
            </div>
        </div>
    </div>

    <!-- Modal for delete-->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $type->id }}">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Do you wish to proceed with deletion of Category <strong>"{{ $type->name }}"</strong>?
            </div>

            <div class="modal-footer">
                {{-- cancel btn --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                {{-- Form for effective deletion --}}
                <form action="{{ route('types.destroy', $type) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete permanently</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection