@extends('layouts.admin')

@section('title', $stakeholder ? 'Edit Stakeholder' : 'Add Stakeholder')
@section('page-title', $stakeholder ? 'Edit Stakeholder' : 'Add Stakeholder')

@section('content')

<a href="{{ route('admin.stakeholders.index') }}" class="inline-flex items-center gap-1.5 text-sm font-label font-semibold text-ink/50 hover:text-dusk dark:hover:text-white mb-6">
    @include('partials.icon', ['name' => 'arrow-left', 'class' => 'w-4 h-4'])
    Back to Stakeholders
</a>

<form action="{{ $stakeholder ? route('admin.stakeholders.update', $stakeholder) : route('admin.stakeholders.store') }}" method="POST" class="admin-card p-6 sm:p-8 space-y-6 max-w-2xl">
    @csrf
    @if ($stakeholder) @method('PUT') @endif

    <div class="grid sm:grid-cols-2 gap-5">
        <div>
            <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Name</label>
            <input type="text" name="name" value="{{ old('name', $stakeholder->name ?? '') }}" required class="form-field" placeholder="County Government of Marsabit">
        </div>
        <div>
            <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">
                Icon name
                <span class="normal-case text-ink/35">(landmark, school, users, handshake...)</span>
            </label>
            <input type="text" name="icon" value="{{ old('icon', $stakeholder->icon ?? '') }}" required class="form-field" placeholder="landmark">
        </div>
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Role</label>
        <input type="text" name="role" value="{{ old('role', $stakeholder->role ?? '') }}" required class="form-field" placeholder="Policy guidance, school access, co-funding and endorsement">
    </div>

    <div class="max-w-[10rem]">
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Sort order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $stakeholder->sort_order ?? 0) }}" class="form-field">
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-solid-dark">{{ $stakeholder ? 'Save changes' : 'Add stakeholder' }}</button>
        <a href="{{ route('admin.stakeholders.index') }}" class="btn-outline">Cancel</a>
    </div>
</form>

@endsection
