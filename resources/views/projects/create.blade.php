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
        <!-- tech stack -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="tech stack" class="py-2">Tech Stack</label>
            <input type="text" id="tech stack" name="tech stack">
        </div>
        <!-- github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="github link" class="py-2">Github Link</label>
            <input type="text" id="github link" name="github link">
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
    </div>
    <div class="btn-wrapper d-flex justify-content-end pt-4">
        <button type="submit" action class="btn btn-outline-primary px-3">Save</button>
    </div>        
    
        
</form>
@endsection