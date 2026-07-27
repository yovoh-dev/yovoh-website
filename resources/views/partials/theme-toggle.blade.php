@php
    $toggleClass = $class ?? '';
@endphp

<div
    x-data="{ theme: localStorage.getItem('yovoh-theme') || 'system' }"
    x-init="$watch('theme', value => window.setYovohTheme(value))"
    class="theme-toggle {{ $toggleClass }}"
    role="radiogroup"
    aria-label="Colour theme"
>
    <button type="button" @click="theme = 'light'" :class="theme === 'light' && 'theme-toggle-active'" class="theme-toggle-btn" role="radio" :aria-checked="theme === 'light'" aria-label="Light mode">
        @include('partials.icon', ['name' => 'sun', 'class' => 'w-4 h-4'])
    </button>
    <button type="button" @click="theme = 'system'" :class="theme === 'system' && 'theme-toggle-active'" class="theme-toggle-btn" role="radio" :aria-checked="theme === 'system'" aria-label="Match system theme">
        @include('partials.icon', ['name' => 'monitor', 'class' => 'w-4 h-4'])
    </button>
    <button type="button" @click="theme = 'dark'" :class="theme === 'dark' && 'theme-toggle-active'" class="theme-toggle-btn" role="radio" :aria-checked="theme === 'dark'" aria-label="Dark mode">
        @include('partials.icon', ['name' => 'moon', 'class' => 'w-4 h-4'])
    </button>
</div>
