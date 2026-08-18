<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @include('partials.head')
</head>
<body class="bg-sand text-ink font-body antialiased selection:bg-marigold-300 selection:text-dusk transition-colors duration-300">

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js" defer></script>
    <script src="{{ asset('assets/js/app.js') }}?v={{ @filemtime(public_path('assets/js/app.js')) }}"></script>
    @stack('scripts')
</body>
</html>
