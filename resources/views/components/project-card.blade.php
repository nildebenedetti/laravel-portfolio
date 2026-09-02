@props(['project'])

<div class="card h-100 shadow-sm project-card">
    <div class="card-body d-flex flex-column">
        {{-- Title --}}
        <h4 class="card-title fw-bold text-capitalize mb-2">
            {{ $project->title }}
        </h4>
        
        {{-- Client --}}
        <h6 class="card-subtitle text-muted fw-lighter mb-3">
            Powered By: {{ $project->client }}
        </h6>

        {{-- Tech Stack Badges --}}
        <div class="d-flex gap-2 mb-2">
            <!-- tech stack -->
            @if(count($project->technologies) > 0)
            @foreach($project->technologies as $technology)
                <span class="badge rounded-pill tech-secondary-font" style="background-color:{{ $technology->color }}">{{ $technology->name }}</span>
            @endforeach
            @endif
        </div>

        {{-- Description --}}
        <p class="card-text description-clamp flex-grow-1 text-secondary">
            {{ $project->description }}
        </p>
    </div>

    {{-- Footer with show --}}
    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
        <a href="{{ route('projects.show', $project) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark btn-sm w-100">
            Show more
        </a>
    </div>
</div>