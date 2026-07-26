@extends('layouts.admin')

@section('title', 'Implementation Phases')
@section('page-title', 'Phases')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-ink/55 max-w-lg">The implementation roadmap shown on the Impact &amp; Plan page.</p>
    <a href="{{ route('admin.phases.create') }}" class="btn-solid-dark">
        @include('partials.icon', ['name' => 'plus', 'class' => 'w-4 h-4'])
        Add Phase
    </a>
</div>

<div class="space-y-4">
    @forelse ($phases as $phase)
        <div class="admin-card p-6">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <span class="font-mono text-sm text-oasis-600">{{ $phase->timeline }}</span>
                    <h3 class="section-heading text-lg text-dusk dark:text-white mt-1">{{ $phase->phase }} — {{ $phase->focus }}</h3>
                    <ul class="mt-3 space-y-1.5">
                        @foreach ($phase->items as $item)
                            <li class="text-sm text-ink/60 flex gap-2"><span class="text-marigold-500">&bull;</span>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex items-center gap-1.5 shrink-0">
                    <a href="{{ route('admin.phases.edit', $phase) }}" class="icon-btn" title="Edit">
                        @include('partials.icon', ['name' => 'pencil', 'class' => 'w-4 h-4'])
                    </a>
                    <form action="{{ route('admin.phases.destroy', $phase) }}" method="POST" onsubmit="return confirm('Delete this phase?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="icon-btn icon-btn-danger" title="Delete">
                            @include('partials.icon', ['name' => 'trash', 'class' => 'w-4 h-4'])
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="admin-card p-10 text-center text-ink/40">No phases yet.</div>
    @endforelse
</div>

@endsection
