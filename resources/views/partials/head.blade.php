<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Young Voices of Hope — Marsabit')</title>
<meta name="description" content="@yield('description', 'YoVoH – Marsabit is a community-based organisation strengthening educational resilience for 15,000+ learners across 50 schools in Marsabit County, Kenya.')">
<meta name="theme-color" content="#16231C">

<!-- Theme (dark/light/system) — must run before first paint to avoid a flash of the wrong theme -->
<script>
    (function () {
        var stored = localStorage.getItem('yovoh-theme') || 'system';
        var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        var isDark = stored === 'dark' || (stored === 'system' && prefersDark);
        document.documentElement.classList.toggle('dark', isDark);
    })();
</script>

<!-- Favicon (inline SVG mark) -->
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' rx='24' fill='%2316231C'/%3E%3Cpath d='M20 68 L38 38 L52 58 L64 32 L82 68 Z' fill='%23E8823C'/%3E%3Ccircle cx='64' cy='26' r='10' fill='%23F2B84B'/%3E%3C/svg%3E">

<!-- Fonts: Fraunces (display), Inter (body), Space Grotesk (labels/nav), JetBrains Mono (data/stats) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

<!-- Tailwind (Play CDN — zero build step) -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                colors: {
                    dusk: {
                        DEFAULT: '#16231C',
                        50: '#EEF3EF',
                        100: '#1B2A21',
                        200: '#203228',
                        700: '#0F1913',
                        900: '#0A120D',
                    },
                    sand: {
                        DEFAULT: '#F6EEDF',
                        50: '#FCF9F2',
                        100: '#F6EEDF',
                        200: '#EFE2C9',
                    },
                    oasis: {
                        DEFAULT: '#2F7D4F',
                        50: '#E9F3EC',
                        300: '#5AA476',
                        400: '#3F9163',
                        500: '#2F7D4F',
                        600: '#256640',
                        700: '#1B4C30',
                    },
                    marigold: {
                        DEFAULT: '#E8823C',
                        300: '#F2B84B',
                        400: '#EE9E3F',
                        500: '#E8823C',
                        600: '#CB6726',
                    },
                    clay: {
                        DEFAULT: '#C9603F',
                        500: '#C9603F',
                    },
                    bloom: {
                        DEFAULT: '#D6588B',
                        500: '#D6588B',
                    },
                    ink: '#161B17',
                },
                fontFamily: {
                    display: ['"Fraunces"', 'serif'],
                    body: ['"Inter"', 'sans-serif'],
                    label: ['"Space Grotesk"', 'sans-serif'],
                    mono: ['"JetBrains Mono"', 'monospace'],
                },
                boxShadow: {
                    lift: '0 30px 60px -25px rgba(22, 35, 28, 0.45)',
                    card: '0 18px 40px -22px rgba(22, 35, 28, 0.35)',
                },
                borderRadius: {
                    '4xl': '2rem',
                },
            },
        },
    }
</script>

<!-- AOS: scroll reveal animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
@stack('styles')
