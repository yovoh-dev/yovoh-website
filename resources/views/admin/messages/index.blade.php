@extends('layouts.admin')

@section('title', 'Messages')
@section('page-title', 'Messages')

@section('content')

<p class="text-ink/55 max-w-lg mb-6">Submissions from the public contact form.</p>

<div class="admin-card overflow-x-auto">
    <table class="admin-table">
        <thead>
            <tr>
                <th></th>
                <th>From</th>
                <th>Subject</th>
                <th>Received</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $m)
                <tr class="{{ $m->isRead() ? '' : 'font-semibold' }}">
                    <td>
                        @unless ($m->isRead())
                            <span class="h-2 w-2 rounded-full bg-marigold-500 inline-block"></span>
                        @endunless
                    </td>
                    <td>
                        <p class="text-dusk dark:text-white">{{ $m->name }}</p>
                        <p class="text-xs text-ink/45 font-normal">{{ $m->email }}</p>
                    </td>
                    <td class="text-ink/70 max-w-xs truncate">{{ $m->subject }}</td>
                    <td class="text-ink/50 text-sm font-normal">{{ $m->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="flex items-center justify-end gap-1.5">
                            <a href="{{ route('admin.messages.show', $m) }}" class="icon-btn" title="Read">
                                @include('partials.icon', ['name' => 'mail', 'class' => 'w-4 h-4'])
                            </a>
                            <form action="{{ route('admin.messages.destroy', $m) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="icon-btn icon-btn-danger" title="Delete">
                                    @include('partials.icon', ['name' => 'trash', 'class' => 'w-4 h-4'])
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-ink/40 py-10">No messages yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $messages->links() }}
</div>

@endsection
