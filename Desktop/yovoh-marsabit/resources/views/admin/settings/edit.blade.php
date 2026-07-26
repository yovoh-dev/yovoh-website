@extends('layouts.admin')

@section('title', 'Settings')
@section('page-title', 'Settings')

@section('content')

<p class="text-ink/55 max-w-lg mb-6">Site-wide text used across the public pages — contact details, mission/vision copy, and homepage stat figures.</p>

<form action="{{ route('admin.settings.update') }}" method="POST" class="admin-card p-6 sm:p-8 space-y-8 max-w-3xl">
    @csrf
    @method('PUT')

    <div>
        <h3 class="eyebrow text-oasis-600 mb-4">Organisation</h3>
        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Site name</label>
                <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name']) }}" required class="form-field">
            </div>
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Address</label>
                <input type="text" name="address" value="{{ old('address', $settings['address']) }}" required class="form-field">
            </div>
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Contact email</label>
                <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" required class="form-field">
            </div>
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Contact phone</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" required class="form-field">
            </div>
        </div>
    </div>

    <div>
        <h3 class="eyebrow text-oasis-600 mb-4">Mission &amp; Vision</h3>
        <div class="space-y-5">
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Mission statement</label>
                <textarea name="mission_statement" rows="3" required class="form-field resize-none">{{ old('mission_statement', $settings['mission_statement']) }}</textarea>
            </div>
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Vision statement</label>
                <textarea name="vision_statement" rows="3" required class="form-field resize-none">{{ old('vision_statement', $settings['vision_statement']) }}</textarea>
            </div>
        </div>
    </div>

    <div>
        <h3 class="eyebrow text-oasis-600 mb-4">Homepage stat strip</h3>
        <div class="grid sm:grid-cols-3 gap-5">
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Schools targeted</label>
                <input type="number" name="stat_schools" value="{{ old('stat_schools', $settings['stat_schools']) }}" required class="form-field">
            </div>
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Learners reached</label>
                <input type="number" name="stat_learners" value="{{ old('stat_learners', $settings['stat_learners']) }}" required class="form-field">
            </div>
            <div>
                <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Strategic horizon (years)</label>
                <input type="number" name="stat_years" value="{{ old('stat_years', $settings['stat_years']) }}" required class="form-field">
            </div>
        </div>
        <p class="text-xs text-ink/40 mt-3">The "Strategic Pillars" figure is counted automatically from the Pillars section.</p>
    </div>

    <div class="pt-2">
        <button type="submit" class="btn-solid-dark">Save settings</button>
    </div>
</form>

@endsection
