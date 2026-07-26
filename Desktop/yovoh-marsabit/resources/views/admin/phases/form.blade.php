@extends('layouts.admin')

@section('title', $phase ? 'Edit Phase' : 'Add Phase')
@section('page-title', $phase ? 'Edit Phase' : 'Add Phase')

@section('content')

<a href="{{ route('admin.phases.index') }}" class="inline-flex items-center gap-1.5 text-sm font-label font-semibold text-ink/50 hover:text-dusk dark:hover:text-white mb-6">
    @include('partials.icon', ['name' => 'arrow-left', 'class' => 'w-4 h-4'])
    Back to Phases
</a>

<form action="{{ $phase ? route('admin.phases.update', $phase) : route('admin.phases.store') }}" method="POST" class="admin-card p-6 sm:p-8 space-y-6 max-w-2xl">
    @csrf
    @if ($phase) @method('PUT') @endif

    <div class="grid sm:grid-cols-2 gap-5">
        <div>
            <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Phase name</label>
            <input type="text" name="phase" value="{{ old('phase', $phase->phase ?? '') }}" required class="form-field" placeholder="Phase 1">
        </div>
        <div>
            <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Timeline</label>
            <input type="text" name="timeline" value="{{ old('timeline', $phase->timeline ?? '') }}" required class="form-field" placeholder="0 – 6 months">
        </div>
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Focus</label>
        <input type="text" name="focus" value="{{ old('focus', $phase->focus ?? '') }}" required class="form-field" placeholder="Foundational Development">
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Key items <span class="normal-case text-ink/35">(one per line)</span></label>
        <textarea name="items" rows="5" required class="form-field resize-none">{{ old('items', $phase ? implode("\n", $phase->items) : '') }}</textarea>
    </div>

    <div class="max-w-[10rem]">
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Sort order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $phase->sort_order ?? 0) }}" class="form-field">
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-solid-dark">{{ $phase ? 'Save changes' : 'Add phase' }}</button>
        <a href="{{ route('admin.phases.index') }}" class="btn-outline">Cancel</a>
    </div>
</form>

@endsection
