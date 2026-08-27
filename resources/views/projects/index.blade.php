@extends("layouts.projects")

@section("title", "All Projects")

@section("content")

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($projects as $project)
            <div class="col">
                <x-project-card :project="$project" />
            </div>
        @endforeach
        </div>
    </div>


@endsection