@extends('layouts.admin')

@section('title', 'Budget')
@section('page-title', 'Budget')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-ink/55 max-w-lg">Line items shown on the Impact &amp; Plan page's budget breakdown.</p>
    <a href="{{ route('admin.budget-items.create') }}" class="btn-solid-dark">
        @include('partials.icon', ['name' => 'plus', 'class' => 'w-4 h-4'])
        Add Line
    </a>
</div>

<div class="admin-card overflow-x-auto mb-6">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Area</th>
                <th>Amount (KES)</th>
                <th>Components</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td class="font-label font-semibold text-dusk dark:text-white">{{ $item->area }}</td>
                    <td class="font-mono">{{ number_format($item->amount) }}</td>
                    <td class="text-ink/60">{{ $item->components }}</td>
                    <td>
                        <div class="flex items-center justify-end gap-1.5">
                            <a href="{{ route('admin.budget-items.edit', $item) }}" class="icon-btn" title="Edit">
                                @include('partials.icon', ['name' => 'pencil', 'class' => 'w-4 h-4'])
                            </a>
                            <form action="{{ route('admin.budget-items.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this budget line?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="icon-btn icon-btn-danger" title="Delete">
                                    @include('partials.icon', ['name' => 'trash', 'class' => 'w-4 h-4'])
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-ink/40 py-10">No budget lines yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="admin-card p-6 flex items-center justify-between">
    <p class="font-label font-semibold text-dusk dark:text-white">Total (3-year planning figure)</p>
    <p class="stat-number text-xl font-semibold text-oasis-600">KES {{ number_format($total) }}</p>
</div>

@endsection
