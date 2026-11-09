<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name>
    <!-- fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <title>@yield("title", "Projects")</title>

<!-- includere fogli stile -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.header')
    <div class="container px-2 pt-4">
        <h1 class="px-2">
            @yield("title")
        </h1>

        @if ($errors->any())
            <div class="alert alert-danger mx-2" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield("content")
    </div>
</body>
</html>