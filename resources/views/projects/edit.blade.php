@extends('layouts.projects')

@section("title", "Edit Project")

@section("content")
<form action="{{ route('projects.update', $project) }}" method="POST" class="py-4">
    @csrf {{-- security token for Cross-Site Request Forgery --}}
    @method('PUT') {{-- SPECIFY PUT METHOD --}}
    <div class="row d-flex justify-content-center">
        <!-- title -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="title" class="py-2">Title</label>
            <input type="text" id="title" name="title" value="{{ $project->title }}">
        </div>
        <!-- tech stack -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="tech_stack" class="py-2">Tech Stack</label>
            <input type="text" id="tech_stack" name="tech_stack" value="{{ $project->tech_stack }}">
        </div>
        <!-- github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="github_link" class="py-2">Github Link</label>
            <input type="text" id="github_link" name="github_link" value="{{ $project->github_link }}">
        </div>
        <!-- client -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="client" class="py-2">Client</label>
            <input type="text" id="client" name="client" value="{{ $project->client }}">
        </div>
        <!-- description -->
        <div class="col col-sm-12 col-md-12 col-lg-12 d-flex flex-column">
            <label for="description" class="py-2">Description</label>
            <textarea id="description" name="description" rows="10">{{ $project->description }}</textarea>
        </div>
    </div>
    <div class="btn-wrapper d-flex justify-content-end pt-4">
        <button type="submit" action class="btn btn-outline-primary px-3">Save</button>
    </div>        
        
</form>
@endsection