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
            <input type="text" name="video_ID" id="video_ID" value="{{ old('video_ID', $project->video_ID) }}">
        </div>  

        <!-- main image + alt text -->
        <x-image-upload
            name="image"
            label="Add an image for your project."
            alt-name="alt_text"
            alt-label="Add a description for your image."
            :existing="$project->image"
            :alt-value="$project->alt_text"
        />

        <!-- secondary images + alt text -->
        @for($i = 1; $i <= 4; $i++)
            <x-image-upload
                :name="'image_pt_' . $i"
                :label="'Add secondary image ' . $i"
                :alt-name="'alt_text_pt_' . $i"
                :alt-label="'Add a description for secondary image ' . $i"
                :existing="$project->{'image_pt_' . $i}"
                :alt-value="$project->{'alt_text_pt_' . $i}"
            />
        @endfor

        <!-- client -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column">
            <label for="client" class="py-2">Client</label>
            <input type="text" id="client" name="client" value="{{ $project->client }}">
        </div>

        <!-- live link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column" id="group_live_link">
            <label for="live_link" class="py-2">Website Link (if any)</label>
            <input type="text" id="live_link" name="live_link" value="{{ $project->live_link ? $project->live_link : '' }}">
        </div>

        <!-- stack_type selection -->
        <div class="col col-sm-12 d-flex flex-column">
            <label for="stack_type" class="py-2">Stack Type</label>
            <select name="stack_type" id="stack_type" class="py-1" required>
                @foreach(App\Models\Project::getStackTypes() as $key => $label )
                <option value="{{ $key }}" {{ old('stack_type', $project->stack_type ? $project->stack_type : '') === $key ? 'selected' : '' }}>
                    {{ $label }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column d-none" id="group_github_link">
            <label for="github_link" class="py-2">Github Link</label>
            <input type="text" id="github_link" name="github_link" value="{{ old('github_link', $project->github_link ? $project->github_link : '') }}">
        </div>

        <!-- frontend github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column d-none" id="group_front_end_github_link">
            <label for="front_end_github_link" class="py-2">Frontend Github Link</label>
            <input type="text" id="front_end_github_link" name="frontend_github_link" value="{{ old('frontend_github_link', $project->frontend_github_link ? $project->frontend_github_link : '') }}">
        </div>

        <!-- backend github link -->
        <div class="col col-sm-12 col-lg-6 d-flex flex-column d-none" id="group_back_end_github_link">
            <label for="back_end_github_link" class="py-2">Backend Github Link</label>
            <input type="text" id="back_end_github_link" name="backend_github_link" value="{{ old('backend_github_link', $project->backend_github_link ? $project->backend_github_link : '') }}">
        </div>
        
        <!-- description -->
        <div class="col col-sm-12 col-md-12 col-lg-12 d-flex flex-column">
            <label for="description" class="py-2">Description</label>
            <textarea id="description" name="description" rows="10">{{ old('description',  $project->description) }}</textarea>
        </div>
    </div>
    <div class="btn-wrapper d-flex justify-content-end pt-4">
        <button type="submit" action class="btn btn-outline-primary px-3">Save</button>
    </div>        
        
</form>
@endsection