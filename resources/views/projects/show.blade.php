@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary btn-sm">
            &larr; Back to all projects
        </a>
    </div>

    <!-- edit & delete buttons -->
    <div class="d-flex py-4 gap-2">
        <a class="btn btn-outline-warning" href="{{ route('projects.edit', $project) }}">Edit</a>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Delete
        </button>

    </div>

    <div class="row g-4 justify-content-center">
        
        <!-- Main Column: Description and GitHub Call to Action -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4">
                
                <!-- Project Header -->
                <div class="border-bottom pb-4 mb-4">
                    
                    <!-- Project Title --> 
                    <h1 class="display-5 fw-bold text-dark text-capitalize mt-3">
                        {{ $project->title }}
                    </h1>
                    <h5 class="text-secondary"> 
                        {{ $project->type->name }}
                    </h5>
                    <div class="d-flex flex-column align-items-start justify-content-start gap-2 mb-2">
                        <span class="text-secondary">
                            Client: {{ $project->client }}
                        </span>
                        <!-- tech stack -->
                        <span class="badge bg-violet rounded-pill tech-secondary-font px-3 py-2 mt-2">
                            {{ $project->tech_stack }}
                        </span>
                    </div>
                    
                </div>

                <!-- GitHub Repository Box -->
                <div class="bg-light p-4 rounded-3 border mb-4 text-center text-md-start d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                    <div>
                        <h5 class="mb-1 fw-bold text-dark">Project Repository</h5>
                        <p class="text-muted small mb-0">Inspect the full source code on GitHub.</p>
                    </div>
                    <a href="{{ $project->github_link }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="btn btn-dark btn-lg px-4 shadow-sm flex-shrink-0">
                        View on GitHub
                    </a>
                </div>

                <!-- Full Description -->
                <div>
                    <h4 class="fw-bold mb-3 text-dark">Project Description</h4>
                    
                    <div class="fs-5 text-secondary lh-lg project-description">
                        {!! nl2br(e($project->description)) !!} 
                    </div>
                </div>

            </div>
        </div>

        <!-- Sidebar: Quick Info and Details -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4">
                <h5 class="fw-bold mb-3 text-dark">Quick Details</h5>
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent px-0 py-3">
                        <small class="text-muted d-block">Project Title</small>
                        <span class="fw-semibold text-dark">{{ $project->title }}</span>
                    </li>
                    <li class="list-group-item bg-transparent px-0 py-3">
                        <small class="text-muted d-block">Client</small>
                        <span class="fw-semibold text-dark">{{ $project->client }}</span>
                    </li>
                    <li class="list-group-item bg-transparent px-0 py-3">
                        <small class="text-muted d-block">Tech Stack</small>
                        <span class="fw-semibold text-primary">{{ $project->tech_stack }}</span>
                    </li>
                    <li class="list-group-item bg-transparent px-0 py-3 border-bottom-0">
                        <small class="text-muted d-block mb-1">Direct Link</small>
                        <a href="{{ $project->github_link }}" target="_blank" class="text-break small">
                            {{ $project->{'github link'} }}
                        </a>
                    </li>
                </ul>
            </div>
    </div>
</div>


<!-- Modal for delete-->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $project->id }}">Delete Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Do you wish to proceed with deletion of Project <strong>"{{ $project->title }}"</strong>?
            </div>

            <div class="modal-footer">
                {{-- Bottone per annullare --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                {{-- Form effettivo di eliminazione --}}
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete permanently</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection