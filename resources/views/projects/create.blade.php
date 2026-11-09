@extends('layouts.projects')

@section("title", "Add New Project")

@section("content")
<form action="{{ route('projects.store') }}" method="POST" class="py-4" enctype="multipart/form-data">
    @csrf {{-- security token for Cross-Site Request Forgery --}}
    <div class="row d-flex justify-content-center">
        <!-- title -->
        <div class="col col-sm-12 d-flex flex-column">
            <label for="title" class="py-2">Title</label>
            <input required type="text" id="title" name="title">
        </div>
        <!-- type selection -->
        <div class="col col-sm-12 d-flex flex-column">
            <label for="type_id" class="py-2">Category</label>
            <select name="type_id" id="type_id" class="py-1" required>
                <option disabled value="">select a suitable category</option>
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
        <!-- Date -->
        <div class="col col-sm-12 d-flex flex-column">
            <label for="date" class="pt-2">Date</label>
            <input required type="date" id="date" name="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Youtube Video ID -->
        <div class="col col-sm-12 d-flex flex-column mb-3 mt-2">
            <label class="pb-3" for="video_ID">Youtube video ID</label>
            <input type="text" name="video_ID" id="video_ID">
        </div>    

        <!-- image input -->
        <div class="col col-sm-12 mb-3 d-flex flex-wrap mx-4 mt-4 gap-3 align-items-baseline">
            <label for="image">Add an image for your project.</label>
            <input type="file" name="image" id="image">
        </div>

        <!-- alt text image input -->
        <div class="col col-sm-12 d-flex flex-column mb-3">
            <label class="pb-3" for="alt_text">Add a description for your image.</label>
            <input type="text" name="alt_text" id="alt_text">
        </div> 

        <!-- client -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="client" class="py-2">Client (if any)</label>
            <input type="text" id="client" name="client">
        </div>
        
        <!-- live link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column" id="group_live_link">
            <label for="live_link" class="py-2">Website Link (if any)</label>
            <input type="text" id="live_link" name="live_link">
        </div>

        <!-- stack_type selection -->
        <div class="col col-sm-12 d-flex flex-column">
            <label for="stack_type" class="py-2">Stack Type</label>
            <select name="stack_type" id="stack_type" class="py-1" required>
                @foreach(App\Models\Project::getStackTypes() as $key => $label )
                <option value="{{ $key }}" {{ old('stack_type', $project->stack_type ?? '') === $key ? 'selected' : '' }}>
                    {{ $label }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column d-none" id="group_github_link">
            <label for="github_link" class="py-2">Github Link</label>
            <input type="text" id="github_link" name="github_link">
        </div>

        <!-- frontend github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column d-none" id="group_front_end_github_link">
            <label for="front_end_github_link" class="py-2">Frontend Github Link</label>
            <input type="text" id="front_end_github_link" name="front_end_github_link">
        </div>

        <!-- backend github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column d-none" id="group_back_end_github_link">
            <label for="back_end_github_link" class="py-2">Backend Github Link</label>
            <input type="text" id="back_end_github_link" name="back_end_github_link">
        </div>

        <!-- description -->
        <div class="col col-sm-12 col-md-12 col-lg-12 d-flex flex-column">
            <label for="description" class="py-2">Description</label>
            <textarea required id="description" name="description" rows="10" ></textarea>
        </div>
    </div>
    <div class="btn-wrapper d-flex justify-content-end pt-4">
        <button type="submit" action class="btn btn-outline-primary px-3">Save</button>
    </div>        
        
</form>
@endsection