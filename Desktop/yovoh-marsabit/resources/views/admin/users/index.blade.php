@extends('layouts.admin')

@section('title', 'Users')
@section('page-title', 'Admin Users')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-ink/55 max-w-lg">Manage who can access the admin panel, and their permission level.</p>
    <a href="{{ route('admin.users.create') }}" class="btn-solid-dark">
        @include('partials.icon', ['name' => 'plus', 'class' => 'w-4 h-4'])
        Add User
    </a>
</div>

<div class="admin-card overflow-x-auto">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $u)
                <tr>
                    <td class="font-label font-semibold text-dusk dark:text-white">
                        {{ $u->name }}
                        @if ($u->id === auth()->id())
                            <span class="text-xs text-ink/40 font-normal">(you)</span>
                        @endif
                    </td>
                    <td class="text-ink/60">{{ $u->email }}</td>
                    <td><span class="badge {{ $u->isSuperAdmin() ? 'badge-marigold' : 'badge-oasis' }}">{{ $u->roleLabel() }}</span></td>
                    <td>
                        <div class="flex items-center justify-end gap-1.5">
                            <a href="{{ route('admin.users.edit', $u) }}" class="icon-btn" title="Edit">
                                @include('partials.icon', ['name' => 'pencil', 'class' => 'w-4 h-4'])
                            </a>
                            @if ($u->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('Delete this user account?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="icon-btn icon-btn-danger" title="Delete">
                                        @include('partials.icon', ['name' => 'trash', 'class' => 'w-4 h-4'])
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-ink/40 py-10">No users yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
