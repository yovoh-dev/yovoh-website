<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @include('partials.head')
</head>
<body class="bg-sand text-ink font-body antialiased selection:bg-marigold-300 selection:text-dusk transition-colors duration-300">

    <a href="#main-content" class="skip-link">Skip to content</a>

    @include('partials.navbar')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Alpine.js: lightweight interactivity (menus, tabs, accordions) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js" defer></script>
    <!-- AOS: scroll-triggered reveals -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script src="{{ asset('assets/js/app.js') }}?v={{ @filemtime(public_path('assets/js/app.js')) }}"></script>
    @stack('scripts')
</body>
</html>
