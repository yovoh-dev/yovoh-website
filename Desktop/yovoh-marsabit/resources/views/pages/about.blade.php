@extends('layouts.app')

@section('title', 'About Us — Young Voices of Hope, Marsabit')
@section('description', 'Learn about YoVoH – Marsabit\'s vision, mission, core values, the county context that shapes our work, and our shared-leadership governance model.')

@section('content')

{{-- ============================= PAGE HEADER ============================= --}}
<section class="hero-shell pt-40 pb-28">
    <div class="hero-stars absolute inset-0 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-6 sm:px-8 text-center relative z-10">
        <p class="eyebrow text-marigold-300 mb-5" data-aos="fade-up">About YoVoH — Marsabit</p>
        <h1 class="section-heading text-white text-4xl sm:text-5xl lg:text-6xl leading-tight" data-aos="fade-up" data-aos-delay="80">
            Built by Marsabit,<br class="hidden sm:block"> for Marsabit's learners.
        </h1>
    </div>
</section>

{{-- ============================= VISION / MISSION ============================= --}}
<section class="bg-sand py-24 sm:py-28 -mt-1">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 grid lg:grid-cols-2 gap-6">
        <div class="rounded-4xl bg-dusk text-white p-10 sm:p-12" data-aos="fade-up">
            <span class="eyebrow text-marigold-300">Our Vision</span>
            <p class="section-heading text-2xl sm:text-3xl mt-5 leading-snug">
                An empowered, resilient, and digitally literate generation of learners in Marsabit County
                who thrive academically, socially, and environmentally — and contribute to sustainable
                community development.
            </p>
        </div>
        <div class="rounded-4xl bg-white border border-dusk/5 shadow-card p-10 sm:p-12" data-aos="fade-up" data-aos-delay="100">
            <span class="eyebrow text-oasis-600">Our Mission</span>
            <p class="section-heading text-2xl sm:text-3xl mt-5 leading-snug text-dusk">
                To strengthen educational resilience and promote holistic development through integrated
                interventions in mental well-being, menstrual health, WASH, climate action, drug-abuse
                prevention, and digital literacy.
            </p>
        </div>
    </div>
</section>

{{-- ============================= CORE VALUES ============================= --}}
<section class="bg-sand pb-24 sm:pb-28">
    <div class="max-w-6xl mx-auto px-6 sm:px-8">
        <p class="eyebrow text-clay mb-4 text-center" data-aos="fade-up">What guides us</p>
        <h2 class="section-heading text-3xl sm:text-4xl text-dusk text-center mb-12" data-aos="fade-up" data-aos-delay="80">Our Core Values</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($values as $i => $value)
                <div class="challenge-card text-center" data-aos="fade-up" data-aos-delay="{{ $i * 90 }}">
                    <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-oasis-50 text-oasis-600 font-mono font-semibold">{{ sprintf('%02d', $i + 1) }}</span>
                    <p class="font-label font-semibold text-dusk mt-4">{{ $value }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= CONTEXTUAL ANALYSIS ============================= --}}
<section class="bg-dusk-700 py-24 sm:py-28 relative overflow-hidden">
    <div class="absolute inset-x-0 -top-1 h-16 sm:h-24 overflow-hidden leading-[0] rotate-180" aria-hidden="true">
        <svg class="w-full h-full" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,64 L60,58 L140,70 L220,40 L300,66 L380,30 L460,60 L540,20 L620,55 L700,15 L780,50 L860,68 L940,35 L1020,58 L1100,44 L1200,64 L1300,50 L1440,60 L1440,120 L0,120 Z" fill="#F6EEDF"/>
        </svg>
    </div>

    <div class="max-w-6xl mx-auto px-6 sm:px-8 relative">
        <div class="max-w-2xl mb-14">
            <p class="eyebrow text-marigold-300 mb-4" data-aos="fade-up">The county we serve</p>
            <h2 class="section-heading text-3xl sm:text-4xl text-white" data-aos="fade-up" data-aos-delay="80">
                Marsabit, in numbers.
            </h2>
            <p class="text-sand-100/65 mt-4" data-aos="fade-up" data-aos-delay="140">
                Kenya's largest county is also its most arid — a landscape of pastoralist resilience,
                recurring drought, and a rising generation determined to learn despite it all.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($contextStats as $i => $s)
                <div class="stat-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 90 }}">
                    <p class="stat-number text-3xl font-semibold text-marigold-300">
                        {{ $s['prefix'] ?? '' }}<span data-counter="{{ $s['value'] }}" data-suffix="{{ $s['suffix'] }}">0</span>
                    </p>
                    <p class="mt-2 text-sm text-sand-100/70 leading-relaxed">{{ $s['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= GOVERNANCE ============================= --}}
<section class="bg-sand py-24 sm:py-28">
    <div class="max-w-5xl mx-auto px-6 sm:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <p class="eyebrow text-oasis-600 mb-4" data-aos="fade-up">Shared leadership</p>
            <h2 class="section-heading text-3xl sm:text-4xl text-dusk" data-aos="fade-up" data-aos-delay="80">How we're governed</h2>
            <p class="text-ink/60 mt-4" data-aos="fade-up" data-aos-delay="140">
                YoVoH is led by five founding members with equal voting rights and a rotating chairmanship —
                each stewarding one portfolio of the work, together accountable for all of it.
            </p>
        </div>

        <div class="space-y-4">
            @foreach ($governance as $i => $g)
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-8 bg-white rounded-3xl border border-dusk/5 shadow-card p-7" data-aos="fade-up" data-aos-delay="{{ $i * 70 }}">
                    <span class="font-mono text-oasis-600 font-semibold shrink-0 sm:w-10">{{ sprintf('%02d', $i + 1) }}</span>
                    <div>
                        <p class="font-label font-semibold text-dusk">{{ $g['role'] }}</p>
                        <p class="text-sm text-ink/60 mt-1.5 leading-relaxed">{{ $g['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= COMMITMENT ============================= --}}
<section class="bg-dusk py-24 sm:py-28">
    <div class="max-w-3xl mx-auto px-6 sm:px-8 text-center">
        <p class="eyebrow text-marigold-300 mb-6" data-aos="fade-up">Our Commitment</p>
        <p class="section-heading text-2xl sm:text-3xl text-white leading-snug" data-aos="fade-up" data-aos-delay="80">
            "We aim to make Marsabit County's schools safer, healthier, and more conducive to learning —
            for every child, every day."
        </p>
        <a href="{{ route('impact') }}" class="btn-solid mt-9 inline-flex" data-aos="fade-up" data-aos-delay="160">See our implementation plan</a>
    </div>
</section>

@endsection
