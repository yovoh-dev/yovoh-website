@extends('layouts.admin')

@section('title', 'Message')
@section('page-title', 'Message')

@section('content')

<a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-1.5 text-sm font-label font-semibold text-ink/50 hover:text-dusk dark:hover:text-white mb-6">
    @include('partials.icon', ['name' => 'arrow-left', 'class' => 'w-4 h-4'])
    Back to Messages
</a>

<div class="admin-card p-6 sm:p-8 max-w-2xl">
    <div class="flex items-start justify-between gap-4 border-b border-dusk/7 dark:border-white/10 pb-6 mb-6">
        <div>
            <h2 class="section-heading text-xl text-dusk dark:text-white">{{ $message->subject }}</h2>
            <p class="text-sm text-ink/50 mt-2">
                From <span class="font-semibold text-ink/70 dark:text-white/80">{{ $message->name }}</span>
                &middot; <a href="mailto:{{ $message->email }}" class="text-oasis-600 hover:underline">{{ $message->email }}</a>
            </p>
            <p class="text-xs text-ink/40 mt-1">{{ $message->created_at->format('d M Y, H:i') }}</p>
        </div>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?');">
            @csrf @method('DELETE')
            <button type="submit" class="icon-btn icon-btn-danger" title="Delete">
                @include('partials.icon', ['name' => 'trash', 'class' => 'w-4 h-4'])
            </button>
        </form>
    </div>

    <p class="text-ink/75 leading-relaxed whitespace-pre-line">{{ $message->message }}</p>

    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn-solid-dark mt-8 inline-flex">
        Reply by email
    </a>
</div>

@endsection
