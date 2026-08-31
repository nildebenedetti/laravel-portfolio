@extends("layouts.projects")

@section("title", "All Projects")

@section("content")

    <div class="container py-5">
        <!-- New Project BTN -->
        <div class="d-flex justify-content-end py-4 gap-2">
            <a class="btn btn-outline-primary" href="{{ route('projects.create') }}">Add New + </a>
        </div>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4">
        @foreach($projects as $project)
            <div class="col">
                <x-project-card :project="$project" />
            </div>
        @endforeach
        </div>
    </div>


@endsection