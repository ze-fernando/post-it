<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post-IT | @yield('title')</title>

    <!-- Fonts e Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS Separados -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">

    @if(request()->routeIs('posts.index'))
        <link rel="stylesheet" href="{{ asset('css/feed.css') }}?v={{ time() }}">
    @endif

    @if(request()->routeIs('posts.profile'))
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ time() }}">
    @endif

    @stack('styles')
</head>
<body>
    <div class="dashboard">
        @include('posts.partials.sidebar')

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    @include('posts.partials.new_post')

    <script src="{{ asset('js/posts.js') }}?v={{ time() }}"></script>
    @stack('scripts')
</body>
</html>
