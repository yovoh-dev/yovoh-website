@extends('layouts.admin')

@section('title', 'Stakeholders')
@section('page-title', 'Stakeholders')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-ink/55 max-w-lg">Partners shown on the Partners page.</p>
    <a href="{{ route('admin.stakeholders.create') }}" class="btn-solid-dark">
        @include('partials.icon', ['name' => 'plus', 'class' => 'w-4 h-4'])
        Add Stakeholder
    </a>
</div>

<div class="admin-card overflow-x-auto">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Name</th>
                <th>Role</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stakeholders as $s)
                <tr>
                    <td><span class="icon-btn bg-oasis-50 text-oasis-600 dark:bg-white/5 dark:text-marigold-300">@include('partials.icon', ['name' => $s->icon, 'class' => 'w-4 h-4'])</span></td>
                    <td class="font-label font-semibold text-dusk dark:text-white">{{ $s->name }}</td>
                    <td class="text-ink/60 max-w-sm">{{ $s->role }}</td>
                    <td>
                        <div class="flex items-center justify-end gap-1.5">
                            <a href="{{ route('admin.stakeholders.edit', $s) }}" class="icon-btn" title="Edit">
                                @include('partials.icon', ['name' => 'pencil', 'class' => 'w-4 h-4'])
                            </a>
                            <form action="{{ route('admin.stakeholders.destroy', $s) }}" method="POST" onsubmit="return confirm('Delete this stakeholder?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="icon-btn icon-btn-danger" title="Delete">
                                    @include('partials.icon', ['name' => 'trash', 'class' => 'w-4 h-4'])
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-ink/40 py-10">No stakeholders yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
