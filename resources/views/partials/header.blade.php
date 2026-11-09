<header>
    <nav class="navbar navbar-expand-lg glass-bar fixed-top">
        <div class="container-fluid px-3">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="navbar-logo" src="{{ Vite::asset('resources/images/logo/N-logo.png') }}" alt="N-logo">
            </a>

            <!-- Hamburger Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Link di navigazione a sinistra (Visibili solo se autenticati) -->
                @auth
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('technologies.index') }}" class="nav-link {{ request()->routeIs('technologies.*') ? 'active' : '' }}">Technologies</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('types.index') }}" class="nav-link {{ request()->routeIs('types.*') ? 'active' : '' }}">Types</a>
                        </li>
                    </ul>
                @endauth
    
                <!-- Menu a destra (Login/Register o Profilo Utente) -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (Route::has('profile.edit'))
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                                @endif
                                
                                <hr class="dropdown-divider">
                                
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

{{-- Keep content below the fixed navbar --}}
<div class="navbar-spacer" aria-hidden="true"></div>