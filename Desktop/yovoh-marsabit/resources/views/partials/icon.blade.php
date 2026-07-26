@php
    $name = $name ?? 'sparkles';
    $class = $class ?? 'w-6 h-6';
@endphp

@switch($name)
    @case('brain')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9.5 3a3 3 0 0 0-3 3v.2A3.5 3.5 0 0 0 4 9.5 3.5 3.5 0 0 0 5.7 15a3 3 0 0 0 2.8 4h1V4a1 1 0 0 0-1-1Z"/>
            <path d="M14.5 3a3 3 0 0 1 3 3v.2A3.5 3.5 0 0 1 20 9.5 3.5 3.5 0 0 1 18.3 15a3 3 0 0 1-2.8 4h-1V4a1 1 0 0 1 1-1Z"/>
        </svg>
        @break

    @case('droplet')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2.5s6.5 7.2 6.5 11.7a6.5 6.5 0 1 1-13 0C5.5 9.7 12 2.5 12 2.5Z"/>
        </svg>
        @break

    @case('droplets')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M7 10.5s3-4 3-6.2A3 3 0 0 0 7 6.6c0 2.2 0 3.9 0 3.9Z"/>
            <path d="M13 4.5s5.5 6.4 5.5 10.4a5.5 5.5 0 1 1-11 0c0-1 .2-2 .6-3"/>
        </svg>
        @break

    @case('shield')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 3 4.5 6v6c0 4.5 3.2 7.7 7.5 9 4.3-1.3 7.5-4.5 7.5-9V6L12 3Z"/>
            <path d="m9 12 2 2 4-4"/>
        </svg>
        @break

    @case('leaf')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 4c-9.5 0-16 5-16 13 0 1.5.3 2.7.8 3.7 8-1 14.2-6.6 15.2-16.5Z"/>
            <path d="M5 21c2-4 6-8 12-10.5"/>
        </svg>
        @break

    @case('cpu')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="6" y="6" width="12" height="12" rx="2"/>
            <rect x="9.5" y="9.5" width="5" height="5" rx="1"/>
            <path d="M9 3v2.5M15 3v2.5M9 18.5V21M15 18.5V21M3 9h2.5M3 15h2.5M18.5 9H21M18.5 15H21"/>
        </svg>
        @break

    @case('landmark')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 21h18M4 21V10M20 21V10M2 10l10-6 10 6M6 10v6M10 10v6M14 10v6M18 10v6"/>
        </svg>
        @break

    @case('school')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="m2 9 10-5 10 5-10 5-10-5Z"/>
            <path d="M6 11.5V17c0 1 2.7 2.5 6 2.5s6-1.5 6-2.5v-5.5M22 9v7"/>
        </svg>
        @break

    @case('users')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/>
        </svg>
        @break

    @case('handshake')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="m11 17 2 2a2.4 2.4 0 0 0 3.4-3.4L15 14"/>
            <path d="m14 14 3.4 3.4a2.4 2.4 0 0 0 3.4-3.4L15.4 8.6a2 2 0 0 0-2.8 0l-.6.7a2 2 0 0 1-2.8 0L7.4 7.5"/>
            <path d="M3 7v6l4 4M21 7v6"/>
        </svg>
        @break

    @case('heart-pulse')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 8.5c0 5-8 11-8 11s-8-6-8-11a4.5 4.5 0 0 1 8-2.8A4.5 4.5 0 0 1 20 8.5Z"/>
            <path d="M6 12h2l1.5-3L11 15l1.5-4H15"/>
        </svg>
        @break

    @case('sparkles')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.5 2.5M15.5 15.5 18 18M18 6l-2.5 2.5M8.5 15.5 6 18"/>
        </svg>
        @break

    @case('building-2')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 21V7l8-4 8 4v14M9 21v-4h6v4M9 9h.01M9 13h.01M15 9h.01M15 13h.01"/>
        </svg>
        @break

    @case('sun')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="4.2"/>
            <path d="M12 2.5v2.2M12 19.3v2.2M4.5 4.5l1.6 1.6M17.9 17.9l1.6 1.6M2.5 12h2.2M19.3 12h2.2M4.5 19.5l1.6-1.6M17.9 6.1l1.6-1.6"/>
        </svg>
        @break

    @case('moon')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 14.5A8.5 8.5 0 1 1 9.5 4a6.8 6.8 0 0 0 10.5 10.5Z"/>
        </svg>
        @break

    @case('monitor')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="13" rx="2"/>
            <path d="M8 21h8M12 17v4"/>
        </svg>
        @break

    @case('gauge')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 15a8 8 0 1 1 16 0"/>
            <path d="M12 15 15.5 9"/>
            <path d="M12 15h.01"/>
        </svg>
        @break

    @case('layers')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="m12 3 9 5-9 5-9-5 9-5Z"/>
            <path d="m3 13 9 5 9-5M3 8l9 5 9-5"/>
        </svg>
        @break

    @case('wallet')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 7a2 2 0 0 1 2-2h13a1 1 0 0 1 1 1v3"/>
            <path d="M3 7v11a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1H5a2 2 0 0 1-2-2Z"/>
            <path d="M17 14h.01"/>
        </svg>
        @break

    @case('map')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="m3 6 6-2 6 2 6-2v14l-6 2-6-2-6 2Z"/>
            <path d="M9 4v14M15 6v14"/>
        </svg>
        @break

    @case('mail')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="m4 7 8 6 8-6"/>
        </svg>
        @break

    @case('settings')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="3"/>
            <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.9.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.9-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.9V9a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1Z"/>
        </svg>
        @break

    @case('log-out')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <path d="M16 17l5-5-5-5M21 12H9"/>
        </svg>
        @break

    @case('pencil')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 3a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>
        </svg>
        @break

    @case('trash')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 6h18M8 6V4a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2m3 0-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
        </svg>
        @break

    @case('plus')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 5v14M5 12h14"/>
        </svg>
        @break

    @case('arrow-left')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H5M11 18l-6-6 6-6"/>
        </svg>
        @break

    @case('x')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="currentColor"><path d="M18.9 2H22l-7.6 8.7L23 22h-6.9l-5.4-6.6L4.4 22H1.2l8.1-9.3L1 2h7l4.9 6L18.9 2Zm-1.2 18h1.9L7.4 4H5.4l12.3 16Z"/></svg>
        @break

    @case('facebook')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-8h2.7l.4-3.2h-3.1V7.7c0-.9.3-1.6 1.7-1.6h1.5V3.2C15.9 3.1 14.8 3 13.6 3c-2.6 0-4.3 1.6-4.3 4.4v2.4H6.6v3.2h2.7v8h3.1Z"/></svg>
        @break

    @case('instagram')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1"/></svg>
        @break

    @case('linkedin')
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="currentColor"><path d="M6.9 8.6H3.3V21h3.6V8.6ZM5.1 3a2.1 2.1 0 1 0 0 4.2 2.1 2.1 0 0 0 0-4.2ZM21 13.9c0-3.6-1.9-5.3-4.5-5.3a3.9 3.9 0 0 0-3.5 1.9V8.6H9.4V21H13v-6.2c0-1.6.3-3.2 2.3-3.2s2 1.9 2 3.3V21H21v-7.1Z"/></svg>
        @break

    @default
        <svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/></svg>
@endswitch
