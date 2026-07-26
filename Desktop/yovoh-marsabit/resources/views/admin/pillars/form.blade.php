@extends('layouts.admin')

@section('title', $pillar ? 'Edit Pillar' : 'Add Pillar')
@section('page-title', $pillar ? 'Edit Pillar' : 'Add Pillar')

@section('content')

<a href="{{ route('admin.pillars.index') }}" class="inline-flex items-center gap-1.5 text-sm font-label font-semibold text-ink/50 hover:text-dusk dark:hover:text-white mb-6">
    @include('partials.icon', ['name' => 'arrow-left', 'class' => 'w-4 h-4'])
    Back to Pillars
</a>

<form action="{{ $pillar ? route('admin.pillars.update', $pillar) : route('admin.pillars.store') }}" method="POST" class="admin-card p-6 sm:p-8 space-y-6 max-w-3xl">
    @csrf
    @if ($pillar) @method('PUT') @endif

    <div class="grid sm:grid-cols-2 gap-5">
        <div>
            <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Title</label>
            <input type="text" name="title" value="{{ old('title', $pillar->title ?? '') }}" required class="form-field" placeholder="Mental Well-being">
        </div>
        <div>
            <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">
                Icon name
                <span class="normal-case text-ink/35">(brain, droplet, shield, droplets, leaf, cpu...)</span>
            </label>
            <input type="text" name="icon" value="{{ old('icon', $pillar->icon ?? '') }}" required class="form-field" placeholder="brain">
        </div>
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">
            Gradient classes <span class="normal-case text-ink/35">(Tailwind, e.g. "from-rose-500 to-orange-400")</span>
        </label>
        <input type="text" name="color" value="{{ old('color', $pillar->color ?? 'from-oasis-500 to-oasis-400') }}" required class="form-field" placeholder="from-rose-500 to-orange-400">
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Short description <span class="normal-case text-ink/35">(homepage card)</span></label>
        <input type="text" name="short" value="{{ old('short', $pillar->short ?? '') }}" required class="form-field" placeholder="One sentence summary shown on the homepage grid">
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Goal <span class="normal-case text-ink/35">(Programs page)</span></label>
        <textarea name="goal" rows="3" required class="form-field resize-none">{{ old('goal', $pillar->goal ?? '') }}</textarea>
    </div>

    <div class="grid sm:grid-cols-2 gap-5">
        <div>
            <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Key activities <span class="normal-case text-ink/35">(one per line)</span></label>
            <textarea name="activities" rows="6" required class="form-field resize-none">{{ old('activities', $pillar ? implode("\n", $pillar->activities) : '') }}</textarea>
        </div>
        <div>
            <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Expected outputs <span class="normal-case text-ink/35">(one per line)</span></label>
            <textarea name="outputs" rows="6" required class="form-field resize-none">{{ old('outputs', $pillar ? implode("\n", $pillar->outputs) : '') }}</textarea>
        </div>
    </div>

    <div class="max-w-[10rem]">
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Sort order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $pillar->sort_order ?? 0) }}" class="form-field">
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-solid-dark">{{ $pillar ? 'Save changes' : 'Create pillar' }}</button>
        <a href="{{ route('admin.pillars.index') }}" class="btn-outline">Cancel</a>
    </div>
</form>

@endsection
