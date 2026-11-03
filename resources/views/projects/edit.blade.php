@extends('layouts.projects')

@section("title", "Edit Project")

@section("content")
<form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="py-4">
    @csrf {{-- security token for Cross-Site Request Forgery --}}
    @method('PUT') {{-- SPECIFY PUT METHOD --}}
    <div class="row d-flex justify-content-center">
        <!-- title -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="title" class="py-2">Title</label>
            <input type="text" id="title" name="title" value="{{ $project->title }}">
        </div>
                <!-- type selection -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="type_id" class="py-2">Category</label>
            <select name="type_id" id="type_id" class="py-1">
                <option value="">select a suitable category</option>
                @foreach ($types as $type) 
                <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }} >
                    {{ $type->name }}
                </option>
                @endforeach
            </select>
        </div>
        <!-- technologies -->
        <div class="col-sm-12 mb-3 d-flex flex-wrap gap-2 px-4 mt-4">
            @foreach($technologies as $technology)
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="tech-{{ $technology->id }}"  {{ $project->technologies->contains($technology->id) ? 'checked' : ''}}>
                <label for="tech-{{ $technology->id }}">{{ $technology->name }}</label>
            @endforeach
        </div>
        <!-- Date -->
        <div class="col col-sm-12 d-flex flex-column">
            <label for="date" class="pt-2">Date</label>
            <input required type="date" id="date" name="date" value="{{ old('date', $project->date) }}" class="form-control @error('date') is-invalid @enderror">
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Youtube Video ID -->
        <div class="col col-sm-12 d-flex flex-column mb-3 mt-2">
            <label class="pb-3" for="video_ID">Add your Youtube video ID.</label>
            <input type="text" name="video_ID" id="video_ID">
        </div>  

        <!-- image input -->
        <div class="col col-sm-12 mb-3 d-flex flex-wrap mx-4 mt-4 gap-3 align-items-baseline">
            <label for="image">Add an image for your project.</label>
            <input type="file" name="image" id="image" value="{{ $project->image ? $project->image : '' }}">
        </div>
        <!-- image preview-->
        @if($project->image)
        <div class="container p-3">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->alt_text }}" class="project-image img-fluid w-25">
        </div>
        @endif

        <!-- alt text image input -->
        <div class="col col-sm-12 d-flex flex-column mb-3">
            <label class="pb-3" for="alt_text">Add a description for your image.</label>
            <input type="text" name="alt_text" id="alt_text"  value="{{ $project->alt_text ? $project->alt_text : '' }}">
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