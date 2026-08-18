<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @include('partials.head')
    <title>@yield('title', 'Admin') — YoVoH Marsabit</title>
</head>
<body class="admin-shell text-ink font-body antialiased transition-colors duration-300" x-data="{ sidebarOpen: false }">

    <div class="lg:flex">

        {{-- ============ Sidebar (desktop) ============ --}}
        <aside class="hidden lg:flex lg:flex-col lg:w-64 lg:shrink-0 admin-sidebar lg:min-h-screen lg:sticky lg:top-0">
            @include('partials.admin-sidebar-content')
        </aside>

        {{-- ============ Sidebar (mobile drawer) ============ --}}
        <div x-show="sidebarOpen" x-cloak class="lg:hidden fixed inset-0 z-40 bg-dusk/60" @click="sidebarOpen=false"></div>
        <aside
            x-show="sidebarOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="lg:hidden fixed inset-y-0 left-0 z-50 w-72 admin-sidebar flex flex-col"
        >
            @include('partials.admin-sidebar-content')
        </aside>

        {{-- ============ Main column ============ --}}
        <div class="flex-1 min-w-0">

            {{-- Topbar --}}
            <header class="sticky top-0 z-30 bg-sand/90 dark:bg-dusk-900/90 backdrop-blur border-b border-dusk/7 dark:border-white/10">
                <div class="flex items-center justify-between gap-4 px-5 sm:px-8 h-[4.5rem] py-3.5">
                    <div class="flex items-center gap-3">
                        <button @click="sidebarOpen = true" class="lg:hidden icon-btn" aria-label="Open menu">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
                        </button>
                        <div>
                            <p class="text-xs font-label uppercase tracking-widest text-ink/40">Admin</p>
                            <h1 class="section-heading text-lg sm:text-xl text-dusk">@yield('page-title', 'Dashboard')</h1>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        @include('partials.theme-toggle', ['class' => 'theme-toggle-light'])

                        <div class="hidden sm:block text-right">
                            <p class="text-sm font-label font-semibold text-dusk leading-tight">{{ auth()->user()->name }}</p>
                            <span class="badge {{ auth()->user()->isSuperAdmin() ? 'badge-marigold' : 'badge-oasis' }}">{{ auth()->user()->roleLabel() }}</span>
                        </div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="icon-btn icon-btn-danger" aria-label="Log out" title="Log out">
                                @include('partials.icon', ['name' => 'log-out', 'class' => 'w-5 h-5'])
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="px-5 sm:px-8 py-8">
                @if (session('status'))
                    <div class="mb-6 flex items-start gap-3 rounded-2xl bg-oasis-50 border border-oasis-300/40 p-4 text-oasis-700 text-sm dark:bg-oasis-700/20 dark:text-oasis-300 dark:border-oasis-500/30">
                        <svg class="w-5 h-5 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="m5 13 4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-clay/10 border border-clay/30 p-4 text-clay text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js" defer></script>
   <script src="{{ asset('assets/js/app.js') }}?v={{ @filemtime(public_path('assets/js/app.js')) }}"></script>
    @stack('scripts')
</body>
</html>
