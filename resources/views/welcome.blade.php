@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center py-5">
        <div class="col-lg-8">
            <p class="tech-secondary-font text-uppercase text-secondary mb-3">Portfolio</p>

            <h1 class="display-4 fw-bold mb-4">
                Behind The Scenes of my Portfolio
            </h1>

            <p class="fs-4 text-secondary mb-4 col-lg-10">
                A space for building the data displayed in the React WebApp. 
            </p>

            <div class="d-flex flex-wrap gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-dark btn-lg px-4">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark btn-lg px-4">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
