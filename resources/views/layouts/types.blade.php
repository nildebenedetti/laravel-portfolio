<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name>
    <!-- fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <title>Categories</title>

<!-- includere fogli stile -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container px-2 pt-4">
        <h1 class="px-2">
            @yield("title")
        </h1>

        @yield("content")
    </div>
</body>
</html>