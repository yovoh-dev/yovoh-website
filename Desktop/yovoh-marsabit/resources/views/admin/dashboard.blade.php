@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="mb-8">
    <h2 class="section-heading text-2xl text-dusk dark:text-white">Welcome back, {{ auth()->user()->name }}.</h2>
    <p class="text-ink/55 mt-1.5">Here's what's happening across the YoVoH — Marsabit site.</p>
</div>

<div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-10">
    @php
        $cards = [
            ['icon' => 'layers', 'label' => 'Pillars', 'value' => $pillarCount, 'href' => route('admin.pillars.index')],
            ['icon' => 'wallet', 'label' => 'Budget (3yr)', 'value' => 'KES '.number_format($budgetTotal), 'href' => route('admin.budget-items.index')],
            ['icon' => 'handshake', 'label' => 'Stakeholders', 'value' => $stakeholderCount, 'href' => route('admin.stakeholders.index')],
            ['icon' => 'mail', 'label' => 'Unread Messages', 'value' => $unreadCount, 'href' => route('admin.messages.index')],
            ['icon' => 'users', 'label' => 'Admin Users', 'value' => $userCount, 'href' => auth()->user()->isSuperAdmin() ? route('admin.users.index') : null],
        ];
    @endphp
    @foreach ($cards as $card)
        @php $tag = $card['href'] ? 'a' : 'div'; @endphp
        <{{ $tag }} @if($card['href']) href="{{ $card['href'] }}" @endif class="admin-card p-6 block hover:shadow-card transition-shadow">
            <span class="icon-btn bg-oasis-50 text-oasis-600 dark:bg-white/5 dark:text-marigold-300">
                @include('partials.icon', ['name' => $card['icon'], 'class' => 'w-5 h-5'])
            </span>
            <p class="stat-number text-2xl font-semibold text-dusk dark:text-white mt-4">{{ $card['value'] }}</p>
            <p class="text-sm text-ink/50 mt-1">{{ $card['label'] }}</p>
        </{{ $tag }}>
    @endforeach
</div>

<div class="admin-card p-6 sm:p-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="section-heading text-lg text-dusk dark:text-white">Recent contact messages</h3>
        <a href="{{ route('admin.messages.index') }}" class="text-sm font-label font-semibold text-oasis-600">View all &rarr;</a>
    </div>

    @if ($recentMessages->isEmpty())
        <p class="text-sm text-ink/50">No messages yet — submissions from the public contact form will appear here.</p>
    @else
        <div class="space-y-3">
            @foreach ($recentMessages as $m)
                <a href="{{ route('admin.messages.show', $m) }}" class="flex items-center justify-between gap-4 p-4 rounded-2xl hover:bg-sand-200/60 dark:hover:bg-white/5 transition-colors">
                    <div class="min-w-0">
                        <p class="font-label font-semibold text-dusk dark:text-white text-sm truncate">
                            {{ $m->subject }}
                            @unless ($m->isRead())
                                <span class="badge badge-marigold ml-2">New</span>
                            @endunless
                        </p>
                        <p class="text-xs text-ink/50 truncate">{{ $m->name }} &middot; {{ $m->email }}</p>
                    </div>
                    <span class="text-xs text-ink/40 shrink-0">{{ $m->created_at->diffForHumans() }}</span>
                </a>
            @endforeach
        </div>
    @endif
</div>

@endsection
