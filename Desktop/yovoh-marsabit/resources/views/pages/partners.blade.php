@extends('layouts.app')

@section('title', 'Partners & Stakeholders — YoVoH Marsabit')
@section('description', 'Discover who we work with — county government, schools, NGOs, health institutions, youth networks, and the private sector — and how to partner with YoVoH Marsabit.')

@section('content')

{{-- ============================= PAGE HEADER ============================= --}}
<section class="hero-shell pt-40 pb-24">
    <div class="hero-stars absolute inset-0 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-6 sm:px-8 text-center relative z-10">
        <p class="eyebrow text-marigold-300 mb-5" data-aos="fade-up">Partners &amp; Stakeholders</p>
        <h1 class="section-heading text-white text-4xl sm:text-5xl lg:text-6xl leading-tight" data-aos="fade-up" data-aos-delay="80">
            This work is<br class="hidden sm:block"> too big to do alone.
        </h1>
        <p class="text-sand-100/75 mt-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="160">
            From county government to classroom teachers, from NGOs to private-sector donors —
            every stakeholder plays a defined role in reaching 15,000+ learners.
        </p>
    </div>
</section>

{{-- ============================= STAKEHOLDERS ============================= --}}
<section class="bg-sand py-24 sm:py-28 -mt-1">
    <div class="max-w-6xl mx-auto px-6 sm:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($stakeholders as $i => $s)
                <div class="pillar-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 90 }}">
                    <span class="pillar-icon inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-dusk text-marigold-300">
                        @include('partials.icon', ['name' => $s['icon'], 'class' => 'w-7 h-7'])
                    </span>
                    <h3 class="section-heading text-lg text-dusk mt-5">{{ $s['name'] }}</h3>
                    <p class="text-ink/60 text-sm mt-2.5 leading-relaxed">{{ $s['role'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= PRINCIPLES ============================= --}}
<section class="bg-dusk-700 py-24 sm:py-28 relative overflow-hidden">
    <div class="absolute inset-x-0 -top-1 h-16 sm:h-24 overflow-hidden leading-[0] rotate-180" aria-hidden="true">
        <svg class="w-full h-full" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,64 L60,58 L140,70 L220,40 L300,66 L380,30 L460,60 L540,20 L620,55 L700,15 L780,50 L860,68 L940,35 L1020,58 L1100,44 L1200,64 L1300,50 L1440,60 L1440,120 L0,120 Z" fill="#F6EEDF"/>
        </svg>
    </div>
    <div class="max-w-4xl mx-auto px-6 sm:px-8 relative">
        <p class="eyebrow text-marigold-300 mb-4 text-center" data-aos="fade-up">How we partner</p>
        <h2 class="section-heading text-3xl sm:text-4xl text-white text-center mb-14" data-aos="fade-up" data-aos-delay="80">Our partnership principles</h2>

        <div class="space-y-4">
            @foreach ($principles as $i => $principle)
                @php [$title, $desc] = array_pad(explode(' — ', $principle, 2), 2, '');@endphp
                <div class="flex gap-5 bg-white/5 border border-white/10 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="{{ $i * 70 }}">
                    <span class="font-mono text-marigold-300 shrink-0">{{ sprintf('%02d', $i + 1) }}</span>
                    <p class="text-sand-100/85 text-sm leading-relaxed"><span class="font-label font-semibold text-white">{{ $title }}</span> — {{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= CTA ============================= --}}
<section class="bg-sand py-24 sm:py-28">
    <div class="max-w-3xl mx-auto px-6 sm:px-8 text-center">
        <p class="eyebrow text-clay mb-5" data-aos="fade-up">Ready to collaborate?</p>
        <h2 class="section-heading text-3xl sm:text-4xl text-dusk mb-8" data-aos="fade-up" data-aos-delay="80">
            Let's build resilient schools together.
        </h2>
        <a href="{{ route('contact') }}" class="btn-solid-dark text-base px-7 py-3.5 inline-flex" data-aos="fade-up" data-aos-delay="160">
            Start the conversation
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
    </div>
</section>

@endsection
