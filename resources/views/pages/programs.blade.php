@extends('layouts.app')

@section('title', 'Our Programs — Six Strategic Pillars | YoVoH Marsabit')
@section('description', 'Explore YoVoH – Marsabit\'s six integrated pillars: Mental Well-being, Menstrual Health & Hygiene, Drug Abuse Prevention, WASH Advocacy, Climate Action, and Digital Literacy.')

@section('content')

{{-- ============================= PAGE HEADER ============================= --}}
<section class="hero-shell pt-40 pb-24">
    <div class="hero-stars absolute inset-0 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-6 sm:px-8 text-center relative z-10">
        <p class="eyebrow text-marigold-300 mb-5" data-aos="fade-up">Our Programs</p>
        <h1 class="section-heading text-white text-4xl sm:text-5xl lg:text-6xl leading-tight" data-aos="fade-up" data-aos-delay="80">
            Six pillars.<br class="hidden sm:block"> One integrated response.
        </h1>
        <p class="text-sand-100/75 mt-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="160">
            Every intervention is designed school-by-school, addressing the root causes that keep
            learners from attending, engaging, and thriving.
        </p>
    </div>
</section>

{{-- ============================= QUICK JUMP ============================= --}}
<div class="sticky top-20 z-30 bg-sand/95 backdrop-blur border-b border-dusk/5 py-4 -mt-1">
    <div class="max-w-6xl mx-auto px-6 sm:px-8">
        <div class="flex gap-2.5 overflow-x-auto no-scrollbar pb-1">
            @foreach ($pillars as $p)
                <a href="#{{ \Illuminate\Support\Str::slug($p['title']) }}"
                   class="shrink-0 font-label text-sm font-semibold px-4 py-2 rounded-full border border-dusk/10 text-dusk/70 hover:border-dusk hover:text-dusk transition-colors bg-white">
                    {{ $p['title'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>

{{-- ============================= PILLAR SECTIONS ============================= --}}
@foreach ($pillars as $i => $p)
    <section id="{{ \Illuminate\Support\Str::slug($p['title']) }}" class="scroll-mt-36 py-20 sm:py-24 {{ $i % 2 === 0 ? 'bg-sand' : 'bg-sand-200' }}">
        <div class="max-w-6xl mx-auto px-6 sm:px-8">
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-start">

                {{-- Icon / summary column --}}
                <div class="lg:col-span-4 {{ $i % 2 === 1 ? 'lg:order-2' : 'lg:order-1' }}" data-aos="fade-up">
                    <span class="font-mono text-sm text-clay">Pillar {{ sprintf('%02d', $i + 1) }} / 06</span>
                    <div class="flex items-center gap-4 mt-4">
                        <span class="pillar-icon flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br {{ $p['color'] }} text-white shadow-card">
                            @include('partials.icon', ['name' => $p['icon'], 'class' => 'w-8 h-8'])
                        </span>
                        <h2 class="section-heading text-2xl sm:text-3xl text-dusk leading-snug">{{ $p['title'] }}</h2>
                    </div>
                    <p class="text-ink/65 mt-5 leading-relaxed">{{ $p['goal'] }}</p>
                </div>

                {{-- Details column --}}
                <div class="lg:col-span-8 {{ $i % 2 === 1 ? 'lg:order-1' : 'lg:order-2' }} grid sm:grid-cols-2 gap-6">
                    <div class="bg-white rounded-3xl border border-dusk/5 shadow-card p-7" data-aos="fade-up" data-aos-delay="80">
                        <p class="eyebrow text-oasis-600 mb-4">Key Activities</p>
                        <ul class="space-y-3">
                            @foreach ($p['activities'] as $a)
                                <li class="flex gap-3 text-sm text-ink/75 leading-relaxed">
                                    <span class="mt-1 h-1.5 w-1.5 rounded-full bg-oasis-500 shrink-0"></span>
                                    {{ $a }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="bg-dusk rounded-3xl p-7" data-aos="fade-up" data-aos-delay="160">
                        <p class="eyebrow text-marigold-300 mb-4">Expected Outputs</p>
                        <ul class="space-y-3">
                            @foreach ($p['outputs'] as $o)
                                <li class="flex gap-3 text-sm text-sand-100/85 leading-relaxed">
                                    <svg class="w-4 h-4 shrink-0 mt-0.5 text-marigold-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="m5 13 4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    {{ $o }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach

{{-- ============================= CROSS-CUTTING APPROACH ============================= --}}
<section class="bg-dusk py-24 sm:py-28">
    <div class="max-w-5xl mx-auto px-6 sm:px-8 text-center">
        <p class="eyebrow text-marigold-300 mb-5" data-aos="fade-up">Cross-cutting approach</p>
        <h2 class="section-heading text-3xl sm:text-4xl text-white mb-12" data-aos="fade-up" data-aos-delay="80">
            Every pillar is delivered with the same discipline.
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5 text-left">
            @foreach ([
                ['t' => 'Community Participation', 'd' => 'Parents, leaders and volunteers engaged for real ownership.'],
                ['t' => 'Gender Equity', 'd' => 'Girls and marginalised learners prioritised in every program.'],
                ['t' => 'Sustainability', 'd' => 'Local staff and volunteers trained to maintain what we build.'],
                ['t' => 'Monitoring & Learning', 'd' => 'Regular data collection to assess impact and adapt.'],
                ['t' => 'Partnerships', 'd' => 'Schools, county government, NGOs and donors, working as one.'],
            ] as $i => $c)
                <div class="stat-card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <span class="font-mono text-marigold-300 text-sm">{{ sprintf('%02d', $i + 1) }}</span>
                    <p class="font-label font-semibold text-white mt-3">{{ $c['t'] }}</p>
                    <p class="text-sm text-sand-100/65 mt-2 leading-relaxed">{{ $c['d'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush
