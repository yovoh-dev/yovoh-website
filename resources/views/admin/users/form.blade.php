@extends('layouts.admin')

@section('title', $editUser ? 'Edit User' : 'Add User')
@section('page-title', $editUser ? 'Edit User' : 'Add User')

@section('content')

<a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-1.5 text-sm font-label font-semibold text-ink/50 hover:text-dusk dark:hover:text-white mb-6">
    @include('partials.icon', ['name' => 'arrow-left', 'class' => 'w-4 h-4'])
    Back to Users
</a>

<form action="{{ $editUser ? route('admin.users.update', $editUser) : route('admin.users.store') }}" method="POST" class="admin-card p-6 sm:p-8 space-y-6 max-w-xl">
    @csrf
    @if ($editUser) @method('PUT') @endif

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Full name</label>
        <input type="text" name="name" value="{{ old('name', $editUser->name ?? '') }}" required class="form-field" placeholder="Jane Doe">
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Email address</label>
        <input type="email" name="email" value="{{ old('email', $editUser->email ?? '') }}" required class="form-field" placeholder="jane@yovohmarsabit.org">
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Role</label>
        <select name="role" required class="form-field">
            <option value="admin" {{ old('role', $editUser->role ?? '') === 'admin' ? 'selected' : '' }}>Admin — manages content</option>
            <option value="super_admin" {{ old('role', $editUser->role ?? '') === 'super_admin' ? 'selected' : '' }}>Super Admin — full access + user management</option>
        </select>
    </div>

    <div>
        <label class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">
            {{ $editUser ? 'New password' : 'Password' }}
            @if ($editUser) <span class="normal-case text-ink/35">(leave blank to keep current password)</span> @endif
        </label>
        <input type="password" name="password" class="form-field" placeholder="{{ $editUser ? '••••••••' : 'At least 8 characters' }}" {{ $editUser ? '' : 'required' }}>
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-solid-dark">{{ $editUser ? 'Save changes' : 'Create user' }}</button>
        <a href="{{ route('admin.users.index') }}" class="btn-outline">Cancel</a>
    </div>
</form>

@endsection
