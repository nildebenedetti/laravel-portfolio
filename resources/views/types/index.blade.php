@extends("layouts.types")

@section("title", "All Categories")

@section("content")
<div class="container py-5">
    <!-- New Project BTN -->
    <div class="d-flex justify-content-end py-4 gap-2">
        <a class="btn btn-outline-primary" href="{{ route('types.create') }}">Add New + </a>
    </div>
    <!--  Types Table -->
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>    
        </thead>
        <tbody>
            @foreach ($types as $type) 
                <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->description }}</td>
                    <td>
                        <a href="{{ route('types.show', $type) }}" class="action-btn btn btn-outline-info"><i class="bi bi-arrow-right"></i></a> 
                        <a href="{{ route('types.edit', $type) }}" class="action-btn btn btn-outline-warning"><i class="bi bi-pencil-fill"></i></a>
                        <button type="button" 
                                class="btn btn-outline-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal-{{ $type->id }}">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </td>
                </tr>
                <!-- Modal for delete-->
                <div class="modal fade" id="deleteModal-{{ $type->id }}" tabindex="-1" aria-hidden="true">
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
            @endforeach
        </tbody>
    </table>
</div>

@endsection



