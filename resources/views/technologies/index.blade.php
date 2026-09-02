@extends("layouts.technologies")

@section('title', 'Tech Stack Labels')

@section("content")
<div class="container py-5">
    <!-- New Elem BTN -->
    <div class="d-flex justify-content-end py-4 gap-2">
        <a class="btn btn-outline-primary" href="{{ route('technologies.create') }}">Add New + </a>
    </div>
    <!--  Technologies Table -->
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Color Code</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            @foreach ($technologies as $technology) 
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $technology->name }}
                    </td>
                    <td>
                        <span class="badge p-2 rounded-pill" style="background-color:{{ $technology->color }}">{{ $technology->color }}</span>
                    </td>
                    <td>
                        <a href="{{ route('technologies.show', $technology) }}" class="action-btn btn btn-outline-info"><i class="bi bi-arrow-right"></i></a> 
                        <a href="{{ route('technologies.edit', $technology)}}" class="action-btn btn btn-outline-warning"><i class="bi bi-pencil-fill"></i></a>
                        <button type="button" 
                                class="btn btn-outline-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal-{{ $technology->id }}">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </td>
                </tr>
                <!-- Modal for delete-->
                <div class="modal fade" id="deleteModal-{{ $technology->id }}" tabindex="-1" aria-hidden="true">
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
                                <form action="" method="POST">
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