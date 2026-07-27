@php
    $navItems = [
        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'gauge'],
        ['route' => 'admin.pillars.index', 'label' => 'Pillars', 'icon' => 'layers'],
        ['route' => 'admin.budget-items.index', 'label' => 'Budget', 'icon' => 'wallet'],
        ['route' => 'admin.stakeholders.index', 'label' => 'Stakeholders', 'icon' => 'handshake'],
        ['route' => 'admin.phases.index', 'label' => 'Phases', 'icon' => 'map'],
        ['route' => 'admin.messages.index', 'label' => 'Messages', 'icon' => 'mail'],
        ['route' => 'admin.settings.edit', 'label' => 'Settings', 'icon' => 'settings'],
    ];
@endphp

<div class="flex items-center gap-3 px-6 h-20 shrink-0 border-b border-dusk/7 dark:border-white/10">
    <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-dusk">
        <svg viewBox="0 0 100 100" class="h-6 w-6">
            <circle cx="64" cy="26" r="11" fill="#F2B84B"/>
            <path d="M14 74 L34 40 L50 62 L64 34 L86 74 Z" fill="#E8823C"/>
            <path d="M14 74 L34 46 L50 66 L64 42 L86 74 Z" fill="#2F7D4F" opacity="0.85"/>
        </svg>
    </span>
    <span class="font-label font-semibold text-dusk dark:text-white text-sm leading-tight">YoVoH Admin</span>
</div>

<nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1.5">
    @foreach ($navItems as $item)
        <a href="{{ route($item['route']) }}" class="admin-nav-link {{ request()->routeIs($item['route']) || request()->routeIs(str_replace('.index', '.*', $item['route'])) ? 'admin-nav-link-active' : '' }}">
            @include('partials.icon', ['name' => $item['icon'], 'class' => 'w-4 h-4'])
            {{ $item['label'] }}
            @if ($item['route'] === 'admin.messages.index' && ($unread = \App\Models\ContactMessage::unread()->count()) > 0)
                <span class="ml-auto badge badge-marigold">{{ $unread }}</span>
            @endif
        </a>
    @endforeach

    @auth
        @if (auth()->user()->isSuperAdmin())
            <p class="px-3 pt-5 pb-2 text-[0.68rem] font-label uppercase tracking-widest text-ink/35 dark:text-white/35">Super Admin</p>
            <a href="{{ route('admin.users.index') }}" class="admin-nav-link {{ request()->routeIs('admin.users.*') ? 'admin-nav-link-active' : '' }}">
                @include('partials.icon', ['name' => 'users', 'class' => 'w-4 h-4'])
                Manage Users
            </a>
        @endif
    @endauth
</nav>

<div class="px-4 pb-6">
    <a href="{{ route('home') }}" class="admin-nav-link" target="_blank" rel="noopener">
        @include('partials.icon', ['name' => 'arrow-left', 'class' => 'w-4 h-4'])
        View Site
    </a>
</div>
