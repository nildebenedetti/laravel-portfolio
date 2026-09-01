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
                        <a href="#" class="action-btn btn btn-outline-warning"><i class="bi bi-pencil-fill"></i></a>
                        <a href="{{ route('types.show', $type)}}" class="action-btn btn btn-outline-danger"><i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



