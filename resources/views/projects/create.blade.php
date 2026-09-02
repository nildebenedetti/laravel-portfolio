@extends('layouts.projects')

@section("title", "Add New Project")

@section("content")
<form action="{{ route('projects.store') }}" method="POST" class="py-4">
    @csrf {{-- security token for Cross-Site Request Forgery --}}
    <div class="row d-flex justify-content-center">
        <!-- title -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="title" class="py-2">Title</label>
            <input type="text" id="title" name="title">
        </div>
        <!-- type selection -->
        <div class="col col-sm-12 d-flex flex-column">
            <label for="type_id" class="py-2">Category</label>
            <select name="type_id" id="type_id" class="py-1">
                <option value="">select a suitable category</option>
                @foreach ($types as $type) 
                <option value="{{ $type->id }}">
                    {{ $type->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- technologies -->
        <div class="col-sm-12 mb-3 d-flex flex-wrap gap-2 px-4 mt-4">
            @foreach($technologies as $technology)
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="$tech-{{ $technology->id }}">
                <label for="tech-{{ $technology->id }}">{{ $technology->name }}</label>
            @endforeach

        </div>
        <!-- github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="github_link" class="py-2">Github Link</label>
            <input type="text" id="github_link" name="github_link">
        </div>
        <!-- client -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="client" class="py-2">Client</label>
            <input type="text" id="client" name="client">
        </div>
        <!-- description -->
        <div class="col col-sm-12 col-md-12 col-lg-12 d-flex flex-column">
            <label for="description" class="py-2">Description</label>
            <textarea id="description" name="description" rows="10" ></textarea>
        </div>

                <!-- tech stack -->
        <div class="col col-sm-12 d-flex flex-column">
            <label for="tech_stack" class="py-2">Tech Stack</label>
            <input type="text" id="tech_stack" name="tech_stack">
        </div>

    </div>
    <div class="btn-wrapper d-flex justify-content-end pt-4">
        <button type="submit" action class="btn btn-outline-primary px-3">Save</button>
    </div>        
    
        
</form>
@endsection