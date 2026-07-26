<header
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    id="site-nav"
    class="fixed top-0 inset-x-0 z-50 nav-shell transition-all duration-500"
>
    <div class="max-w-7xl mx-auto px-5 sm:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Mark -->
           <a href="{{ route('home') }}" class="flex items-center gap-3 group shrink-0">
    <span class="relative flex h-11 w-11 items-center justify-center rounded-2xl bg-dusk-100 ring-1 ring-white/10 overflow-hidden">
        <img
            src="{{ asset('public/img/logo.png') }}"
            alt="Young Voices of Hope Logo"
            class="h-full w-full object-cover"
        >
    </span>

    <span class="leading-tight">
        <span class="block font-label font-semibold tracking-wide text-[0.95rem] nav-text-strong">
            Young Voices of Hope
        </span>
        <span class="block font-mono text-[0.65rem] tracking-[0.25em] uppercase nav-text-soft">
            Marsabit · Kenya
        </span>
    </span>
</a>

            <!-- Desktop nav -->
            <nav class="hidden lg:flex items-center gap-9 font-label text-[0.92rem] font-medium">
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'nav-link-active' : '' }}">About</a>
                <a href="{{ route('programs') }}" class="nav-link {{ request()->routeIs('programs') ? 'nav-link-active' : '' }}">Programs</a>
                <a href="{{ route('impact') }}" class="nav-link {{ request()->routeIs('impact') ? 'nav-link-active' : '' }}">Impact &amp; Plan</a>
                <a href="{{ route('partners') }}" class="nav-link {{ request()->routeIs('partners') ? 'nav-link-active' : '' }}">Partners</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'nav-link-active' : '' }}">Contact</a>
            </nav>

            <div class="hidden lg:flex items-center gap-3">
                @include('partials.theme-toggle')
                <a href="{{ route('contact') }}#form" class="btn-ghost">Volunteer</a>
                <a href="{{ route('partners') }}" class="btn-solid">
                    Partner With Us
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>

            <!-- Mobile toggle -->
            <button @click="open = !open" class="lg:hidden relative h-10 w-10 flex items-center justify-center rounded-xl nav-burger" aria-label="Toggle menu">
                <span class="sr-only">Menu</span>
                <svg x-show="!open" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
                <svg x-show="open" x-cloak class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 6l12 12M18 6L6 18" stroke-linecap="round"/></svg>
            </button>
        </div>
    </div>

    <!-- Mobile drawer -->
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-3"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-3"
        class="lg:hidden bg-dusk-700/98 backdrop-blur-xl border-t border-white/10"
        @click.outside="open = false"
    >
        <div class="px-6 py-6 flex flex-col gap-1 font-label text-lg">
            <a @click="open=false" href="{{ route('about') }}" class="mobile-link">About</a>
            <a @click="open=false" href="{{ route('programs') }}" class="mobile-link">Programs</a>
            <a @click="open=false" href="{{ route('impact') }}" class="mobile-link">Impact &amp; Plan</a>
            <a @click="open=false" href="{{ route('partners') }}" class="mobile-link">Partners</a>
            <a @click="open=false" href="{{ route('contact') }}" class="mobile-link">Contact</a>
            <div class="flex items-center justify-between mt-4">
                <span class="text-sm text-white/50 font-label">Theme</span>
                @include('partials.theme-toggle')
            </div>
            <a @click="open=false" href="{{ route('partners') }}" class="btn-solid justify-center mt-3">Partner With Us</a>
        </div>
    </div>
</header>
