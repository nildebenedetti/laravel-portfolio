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

        {{-- Tech Stack Badge --}}
        <div class="mb-3">
            <span class="tech-secondary-font bg-violet rounded-pill text-light px-3 py-2 fw-medium">
            {{ $project->{'tech stack'} }}
            </span>
        </div>

        {{-- Descrizione --}}
        <p class="card-text description-clamp flex-grow-1 text-secondary">
            {{ $project->description }}
        </p>
    </div>

    {{-- Footer with show --}}
    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
        <a href="{{ route("projects.show", $project) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark btn-sm w-100">
            Show more
        </a>
    </div>
</div>