@extends('layouts.admin')

@section('title', $item ? 'Edit Budget Line' : 'Add Budget Line')
@section('page-title', $item ? 'Edit Budget Line' : 'Add Budget Line')

@section('content')

<a href="{{ route('admin.budget-items.index') }}" class="inline-flex items-center gap-1.5 text-sm font-label font-semibold text-ink/50 hover:text-dusk dark:hover:text-white mb-6">
    @include('partials.icon', ['name' => 'arrow-left', 'class' => 'w-4 h-4'])
    Back to Budget
</a>

<form action="{{ $item ? route('admin.budget-items.update', $item) : route('admin.budget-items.store') }}" method="POST" class="admin-card p-6 sm:p-8 space-y-6 max-w-2xl">
    @csrf
    @if ($item) @method('PUT') @endif

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Area</label>
        <input type="text" name="area" value="{{ old('area', $item->area ?? '') }}" required class="form-field" placeholder="WASH Improvements">
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Amount (KES)</label>
        <input type="number" name="amount" min="0" value="{{ old('amount', $item->amount ?? '') }}" required class="form-field" placeholder="1500000">
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Components</label>
        <input type="text" name="components" value="{{ old('components', $item->components ?? '') }}" class="form-field" placeholder="Water tanks, boreholes, hygiene stations">
    </div>

    <div class="max-w-[10rem]">
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Sort order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" class="form-field">
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-solid-dark">{{ $item ? 'Save changes' : 'Add line' }}</button>
        <a href="{{ route('admin.budget-items.index') }}" class="btn-outline">Cancel</a>
    </div>
</form>

@endsection
