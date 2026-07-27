@extends('layouts.minimal')

@section('title', 'Staff Login — YoVoH Marsabit')

@section('content')
<div class="hero-shell min-h-[100svh] flex items-center justify-center px-6 py-16">
    <div class="hero-stars absolute inset-0 pointer-events-none"></div>
    <div class="hero-sun absolute opacity-60" style="width:220px;height:220px;top:8%;left:50%;transform:translateX(-50%);"></div>

    <div class="relative w-full max-w-md">
        <div class="text-center mb-8">
            <span class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-white/5 ring-1 ring-white/10">
                <svg viewBox="0 0 100 100" class="h-8 w-8">
                    <circle cx="64" cy="26" r="11" fill="#F2B84B"/>
                    <path d="M14 74 L34 40 L50 62 L64 34 L86 74 Z" fill="#E8823C"/>
                    <path d="M14 74 L34 46 L50 66 L64 42 L86 74 Z" fill="#2F7D4F" opacity="0.85"/>
                </svg>
            </span>
            <h1 class="section-heading text-2xl text-white mt-5">Staff &amp; Admin Login</h1>
            <p class="text-sand-100/60 text-sm mt-2">Young Voices of Hope — Marsabit</p>
        </div>

        <div class="bg-white rounded-4xl shadow-lift p-8 sm:p-9">

            @if ($errors->any())
                <div class="mb-6 rounded-2xl bg-clay/10 border border-clay/30 p-4 text-clay text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="form-field" placeholder="you@yovohmarsabit.org">
                </div>

                <div>
                    <label for="password" class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Password</label>
                    <input type="password" id="password" name="password" required class="form-field" placeholder="••••••••">
                </div>

                <label class="flex items-center gap-2 text-sm text-ink/60">
                    <input type="checkbox" name="remember" class="rounded border-dusk/20 text-oasis-600 focus:ring-oasis-500">
                    Remember me
                </label>

                <button type="submit" class="btn-solid-dark w-full justify-center py-3.5">
                    Sign in
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </form>
        </div>

        <p class="text-center text-sand-100/45 text-xs mt-6">
            <a href="{{ route('home') }}" class="hover:text-sand-100/80 transition-colors">&larr; Back to the public site</a>
        </p>
    </div>
</div>
@endsection
