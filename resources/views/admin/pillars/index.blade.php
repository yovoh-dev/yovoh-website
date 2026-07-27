@extends('layouts.admin')

@section('title', 'Pillars')
@section('page-title', 'Pillars')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-ink/55 max-w-lg">The six strategic pillars shown on the homepage and Programs page.</p>
    <a href="{{ route('admin.pillars.create') }}" class="btn-solid-dark">
        @include('partials.icon', ['name' => 'plus', 'class' => 'w-4 h-4'])
        Add Pillar
    </a>
</div>

<div class="admin-card overflow-x-auto">
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Icon</th>
                <th>Short description</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pillars as $pillar)
                <tr>
                    <td class="font-mono text-ink/40">{{ $pillar->sort_order }}</td>
                    <td class="font-label font-semibold text-dusk dark:text-white">{{ $pillar->title }}</td>
                    <td><span class="badge badge-oasis">{{ $pillar->icon }}</span></td>
                    <td class="text-ink/60 max-w-sm truncate">{{ $pillar->short }}</td>
                    <td>
                        <div class="flex items-center justify-end gap-1.5">
                            <a href="{{ route('admin.pillars.edit', $pillar) }}" class="icon-btn" title="Edit">
                                @include('partials.icon', ['name' => 'pencil', 'class' => 'w-4 h-4'])
                            </a>
                            <form action="{{ route('admin.pillars.destroy', $pillar) }}" method="POST" onsubmit="return confirm('Delete this pillar? This cannot be undone.');">
                                @csrf @method('DELETE')
                                <button type="submit" class="icon-btn icon-btn-danger" title="Delete">
                                    @include('partials.icon', ['name' => 'trash', 'class' => 'w-4 h-4'])
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-ink/40 py-10">No pillars yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
