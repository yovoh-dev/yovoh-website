@extends('layouts.app')

@section('title', 'Young Voices of Hope — Marsabit | Integrated Education Support & Resilience Initiative')
@section('description', 'YoVoH – Marsabit strengthens educational resilience for 15,000+ learners across 50 schools through six integrated pillars: mental well-being, menstrual health, drug-abuse prevention, WASH, climate action and digital literacy.')

@section('content')

{{-- ============================= HERO ============================= --}}
<section class="hero-shell min-h-[100svh] flex flex-col justify-end pt-32">

    <div class="hero-rays absolute inset-0 pointer-events-none"></div>
    <div class="hero-stars absolute inset-0 pointer-events-none"></div>

    {{-- Sun --}}
    <div class="hero-sun absolute" style="width:220px;height:220px;top:14%;left:50%;transform:translateX(-50%);" data-parallax="8"></div>

    <div class="relative max-w-6xl mx-auto px-6 sm:px-8 text-center z-10 pb-10">
        <p class="eyebrow text-marigold-300 mb-6" data-aos="fade-up">Marsabit County, Kenya &middot; Community-Based Organisation</p>

        <h1 class="section-heading text-white text-[2.6rem] leading-[1.08] sm:text-6xl lg:text-[4.3rem] lg:leading-[1.05]" data-aos="fade-up" data-aos-delay="80">
            An oasis of learning<br class="hidden sm:block">
            rising from <span class="italic text-marigold-300">arid ground.</span>
        </h1>

        <p class="mt-7 text-sand-100/80 text-lg max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="160">
            Young Voices of Hope (YoVoH) — Marsabit strengthens educational resilience for learners across
            Kenya's largest and driest county, through six integrated pillars of support — because a child
            can't focus on school when they're thirsty, unwell, unsafe, or unseen.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4" data-aos="fade-up" data-aos-delay="240">
            <a href="{{ route('programs') }}" class="btn-solid text-base px-7 py-3.5">
                Explore Our Programs
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="{{ route('partners') }}" class="btn-ghost text-base">Become a Partner</a>
        </div>
    </div>

    {{-- Mountain silhouette (Marsabit's forested volcanic highland) --}}
    <div class="relative w-full">
        <svg class="w-full h-[220px] sm:h-[300px] lg:h-[380px]" viewBox="0 0 1440 420" preserveAspectRatio="none">
            <path data-parallax="-6" d="M0 420 L0 260 L180 190 L340 250 L520 150 L700 240 L900 130 L1100 230 L1260 170 L1440 260 L1440 420 Z" fill="#1B2A21"/>
            <path data-parallax="-14" d="M0 420 L0 320 L220 260 L420 330 L620 220 L820 320 L1040 210 L1240 310 L1440 250 L1440 420 Z" fill="#203228"/>
            <path data-parallax="-22" d="M0 420 L0 380 L260 330 L520 390 L780 310 L1040 385 L1440 330 L1440 420 Z" fill="#F6EEDF"/>
        </svg>

        {{-- seedlings marking the six pillars along the ridge --}}
        <div class="hidden md:flex absolute inset-x-0 bottom-6 justify-center gap-[9.5vw] lg:gap-[7.2vw]">
            @foreach (range(1,6) as $i)
                <span class="floating-seed h-2.5 w-2.5 rounded-full bg-marigold-300 shadow-[0_0_14px_4px_rgba(242,184,75,.5)]" style="animation-delay:{{ $i * 0.4 }}s"></span>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= STATS STRIP ============================= --}}
<section class="bg-dusk pb-20 -mt-1">
    <div class="max-w-6xl mx-auto px-6 sm:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($stats as $i => $stat)
                <div class="stat-card text-center" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <p class="stat-number text-3xl sm:text-4xl font-semibold text-marigold-300">
                        <span data-counter="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0</span>
                    </p>
                    <p class="mt-2 text-xs sm:text-sm font-label text-sand-100/70">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= MISSION STATEMENT ============================= --}}
<section class="bg-sand py-24 sm:py-28">
    <div class="max-w-4xl mx-auto px-6 sm:px-8 text-center">
        <p class="eyebrow text-oasis-600 mb-5" data-aos="fade-up">Our Mission</p>
        <p class="section-heading text-2xl sm:text-3xl lg:text-[2.35rem] leading-snug text-dusk" data-aos="fade-up" data-aos-delay="80">
            "To strengthen educational resilience and promote holistic development among children and youth
            in Marsabit County through integrated interventions in <span class="text-oasis-600">mental well-being</span>,
            <span class="text-bloom">menstrual health</span>, <span class="text-clay">substance-abuse prevention</span>,
            <span class="text-sky-600">water &amp; sanitation</span>, <span class="text-oasis-600">climate action</span>,
            and <span class="text-marigold-600">digital literacy</span>."
        </p>
    </div>
</section>

{{-- ============================= THE PROBLEM (Marsabit context) ============================= --}}
<section class="bg-sand pb-24 sm:pb-28">
    <div class="max-w-6xl mx-auto px-6 sm:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12">
            <div data-aos="fade-up">
                <p class="eyebrow text-clay mb-4">Why we exist</p>
                <h2 class="section-heading text-3xl sm:text-4xl text-dusk max-w-xl">
                    Marsabit's classrooms face barriers that begin far outside the classroom.
                </h2>
            </div>
            <p class="text-ink/60 max-w-md" data-aos="fade-up" data-aos-delay="100">
                Kenya's largest and driest county carries interlocking challenges — drought, water scarcity,
                poverty, and gaps in health and digital infrastructure — that quietly push learners out of school.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($challenges as $i => $c)
                <div class="challenge-card" data-aos="fade-up" data-aos-delay="{{ $i * 90 }}">
                    <p class="stat-number text-3xl font-semibold text-dusk">{{ $c['stat'] }}<span class="text-lg text-clay">{{ $c['unit'] }}</span></p>
                    <p class="mt-3 text-sm text-ink/60 leading-relaxed">{{ $c['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= SIX PILLARS ============================= --}}
<section class="bg-dusk-700 py-24 sm:py-28 relative overflow-hidden" id="pillars">
    <div class="absolute inset-x-0 -top-1 h-16 sm:h-24 overflow-hidden leading-[0] rotate-180" aria-hidden="true">
        <svg class="w-full h-full" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,64 L60,58 L140,70 L220,40 L300,66 L380,30 L460,60 L540,20 L620,55 L700,15 L780,50 L860,68 L940,35 L1020,58 L1100,44 L1200,64 L1300,50 L1440,60 L1440,120 L0,120 Z" fill="#F6EEDF"/>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 relative">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <p class="eyebrow text-marigold-300 mb-4" data-aos="fade-up">Six Strategic Pillars</p>
            <h2 class="section-heading text-3xl sm:text-4xl text-white" data-aos="fade-up" data-aos-delay="80">
                Root-cause interventions, working together.
            </h2>
            <p class="text-sand-100/65 mt-4" data-aos="fade-up" data-aos-delay="140">
                Each pillar tackles one barrier standing between a learner and their education —
                designed to be delivered as one integrated program, school by school.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($pillars as $i => $p)
                <div class="pillar-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 90 }}">
                    <span class="pillar-icon inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br {{ $p['color'] }} text-white shadow-card">
                        @include('partials.icon', ['name' => $p['icon'], 'class' => 'w-7 h-7'])
                    </span>
                    <h3 class="section-heading text-xl text-dusk mt-5">{{ $p['title'] }}</h3>
                    <p class="text-ink/60 text-sm mt-2.5 leading-relaxed">{{ $p['short'] }}</p>
                    <a href="{{ route('programs') }}#{{ \Illuminate\Support\Str::slug($p['title']) }}" class="inline-flex items-center gap-1.5 text-sm font-label font-semibold text-oasis-600 mt-5 group">
                        Learn more
                        <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= SDG MARQUEE ============================= --}}
<section class="bg-sand py-16 border-b border-dusk/5">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 mb-8 text-center">
        <p class="eyebrow text-oasis-600">Aligned with Kenya Vision 2030 &amp; the UN SDGs</p>
    </div>
    <div class="marquee-shell overflow-hidden">
        <div class="marquee-track gap-6 px-3">
            @for ($r = 0; $r < 2; $r++)
                @foreach ($sdgs as $sdg)
                    <div class="flex items-center gap-3 bg-white rounded-2xl px-5 py-4 shadow-card shrink-0 border border-dusk/5">
                        <span class="font-mono font-semibold text-lg text-marigold-600">SDG {{ $sdg['num'] }}</span>
                        <span class="h-8 w-px bg-dusk/10"></span>
                        <span class="font-label text-sm text-dusk whitespace-nowrap">{{ $sdg['title'] }}</span>
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</section>

{{-- ============================= CTA ============================= --}}
<section class="bg-dusk py-24 sm:py-28 relative overflow-hidden">
    <div class="hero-sun absolute opacity-40" style="width:260px;height:260px;top:-90px;right:-60px;"></div>
    <div class="max-w-4xl mx-auto px-6 sm:px-8 text-center relative">
        <p class="eyebrow text-marigold-300 mb-5" data-aos="fade-up">Join the initiative</p>
        <h2 class="section-heading text-3xl sm:text-4xl lg:text-5xl text-white leading-tight" data-aos="fade-up" data-aos-delay="80">
            50 schools. 15,000 learners.<br class="hidden sm:block"> One resilient generation.
        </h2>
        <p class="text-sand-100/70 mt-6 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="140">
            Whether you're a school, a donor, a county office, or simply someone who believes every learner
            deserves a fair shot — there's a place for you in this work.
        </p>
        <div class="mt-9 flex flex-col sm:flex-row items-center justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('partners') }}" class="btn-solid text-base px-7 py-3.5">Partner With Us</a>
            <a href="{{ route('contact') }}" class="btn-ghost text-base">Get in touch</a>
        </div>
    </div>
</section>

@endsection
