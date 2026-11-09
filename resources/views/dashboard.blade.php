@extends("layouts.app")

@section("title", "Backoffice")

@section("content")
<div class="backoffice p-4">
    {{-- Introduzione --}}
    <div class="backoffice-intro">
        <p class="backoffice-kicker">RESERVED DASHBOARD </p>
        <p>
            Use this area and resources to handle and organize content. <br/>This will condition what is displayed live on your portfolio: act carefully to preserve your public image...
        </p>
    </div>

    {{-- Risorse del backoffice --}}
    <div class="backoffice-grid">
        {{-- Progetti --}}
        <article class="backoffice-card">
            <div class="backoffice-card-body">
                <h2>Projects</h2>
                <p>
                    Create, edit and delete projects in the portfolio and handle what is displayed live.
                </p>
            </div>
            <div class="backoffice-card-actions">
                <a href="{{ route('projects.index') }}" class="bko-btn">Handle</a>
                <a href="{{ route('projects.create') }}" class="bko-btn bko-btn-outline">New +</a>
            </div>
        </article>

        {{-- Tecnologie --}}
        <article class="backoffice-card">
            <div class="backoffice-card-body">
                <h2>Technologies</h2>
                <p>
                    Handle technologies to be paired with projects (languages,
                    framework, database...), with name and identifying color.
                </p>
            </div>
            <div class="backoffice-card-actions">
                <a href="{{ route('technologies.index') }}" class="bko-btn">Handle</a>
                <a href="{{ route('technologies.create') }}" class="bko-btn bko-btn-outline">New +</a>
            </div>
        </article>

        {{-- Typese --}}
        <article class="backoffice-card">
            <div class="backoffice-card-body">
                <h2>Tipologie</h2>
                <p>
                    Handle project types (eCommerce, Showcase Website, API Service...)
                    to classify and filter projects.
                </p>
            </div>
            <div class="backoffice-card-actions">
                <a href="{{ route('types.index') }}" class="bko-btn">Handle</a>
                <a href="{{ route('types.create') }}" class="bko-btn bko-btn-outline">New +</a>
            </div>
        </article>
    </div>
</div>
@endsection
