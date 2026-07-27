@extends('layouts.app')

@section('title', 'Impact & Implementation Plan — YoVoH Marsabit')
@section('description', 'YoVoH – Marsabit\'s three-phase, 36-month implementation roadmap, monitoring & learning framework, and transparent three-year budget overview.')

@section('content')

{{-- ============================= PAGE HEADER ============================= --}}
<section class="hero-shell pt-40 pb-24">
    <div class="hero-stars absolute inset-0 pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-6 sm:px-8 text-center relative z-10">
        <p class="eyebrow text-marigold-300 mb-5" data-aos="fade-up">Impact &amp; Plan</p>
        <h1 class="section-heading text-white text-4xl sm:text-5xl lg:text-6xl leading-tight" data-aos="fade-up" data-aos-delay="80">
            A 36-month path,<br class="hidden sm:block"> built in the open.
        </h1>
        <p class="text-sand-100/75 mt-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="160">
            From foundation to full county-wide scale — here's exactly how, and where every shilling goes.
        </p>
    </div>
</section>

{{-- ============================= TIMELINE ============================= --}}
<section class="bg-sand py-24 sm:py-28">
    <div class="max-w-5xl mx-auto px-6 sm:px-8">
        <p class="eyebrow text-clay mb-4 text-center" data-aos="fade-up">Implementation roadmap</p>
        <h2 class="section-heading text-3xl sm:text-4xl text-dusk text-center mb-16" data-aos="fade-up" data-aos-delay="80">Three phases, one 36-month horizon</h2>

        <div class="relative">
            {{-- connecting line (desktop) --}}
            <svg class="hidden lg:block absolute left-1/2 -translate-x-1/2 top-0 h-full w-2" viewBox="0 0 2 100" preserveAspectRatio="none" aria-hidden="true">
                <line x1="1" y1="0" x2="1" y2="100" stroke="#2F7D4F" stroke-width="2" class="timeline-line" vector-effect="non-scaling-stroke"/>
            </svg>

            <div class="space-y-10 lg:space-y-16">
                @foreach ($phases as $i => $phase)
                    <div class="relative grid lg:grid-cols-2 gap-6 lg:gap-14 items-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">

                        <div class="hidden lg:flex absolute left-1/2 -translate-x-1/2 h-5 w-5 rounded-full bg-marigold-500 ring-8 ring-sand z-10"></div>

                        <div class="{{ $i % 2 === 0 ? 'lg:order-1 lg:text-right' : 'lg:order-2' }}">
                            <span class="font-mono text-sm text-oasis-600">{{ $phase['timeline'] }}</span>
                            <h3 class="section-heading text-2xl text-dusk mt-2">{{ $phase['phase'] }} — {{ $phase['focus'] }}</h3>
                        </div>

                        <div class="{{ $i % 2 === 0 ? 'lg:order-2' : 'lg:order-1' }}">
                            <ul class="bg-white rounded-3xl border border-dusk/5 shadow-card p-6 space-y-3">
                                @foreach ($phase['items'] as $item)
                                    <li class="flex gap-3 text-sm text-ink/70">
                                        <span class="mt-1 h-1.5 w-1.5 rounded-full bg-marigold-500 shrink-0"></span>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================= MEL ============================= --}}
<section class="bg-dusk-700 py-24 sm:py-28 relative overflow-hidden">
    <div class="absolute inset-x-0 -top-1 h-16 sm:h-24 overflow-hidden leading-[0] rotate-180" aria-hidden="true">
        <svg class="w-full h-full" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,64 L60,58 L140,70 L220,40 L300,66 L380,30 L460,60 L540,20 L620,55 L700,15 L780,50 L860,68 L940,35 L1020,58 L1100,44 L1200,64 L1300,50 L1440,60 L1440,120 L0,120 Z" fill="#F6EEDF"/>
        </svg>
    </div>
    <div class="max-w-6xl mx-auto px-6 sm:px-8 relative">
        <div class="max-w-2xl mb-14">
            <p class="eyebrow text-marigold-300 mb-4" data-aos="fade-up">Monitoring, Evaluation &amp; Learning</p>
            <h2 class="section-heading text-3xl sm:text-4xl text-white" data-aos="fade-up" data-aos-delay="80">We measure what matters — and adapt.</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ([
                ['t' => 'Track', 'd' => 'Progress against planned outputs & outcomes for every pillar.'],
                ['t' => 'Measure', 'd' => 'Effectiveness on learner well-being, education outcomes, and resilience.'],
                ['t' => 'Report', 'd' => 'Monthly internal reports, quarterly donor updates, annual evaluations.'],
                ['t' => 'Learn', 'd' => 'Insights feed back into program design in real time.'],
            ] as $i => $m)
                <div class="stat-card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <span class="font-mono text-marigold-300 text-sm">{{ sprintf('%02d', $i + 1) }}</span>
                    <p class="font-label font-semibold text-white mt-3">{{ $m['t'] }}</p>
                    <p class="text-sm text-sand-100/65 mt-2 leading-relaxed">{{ $m['d'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= BUDGET ============================= --}}
<section class="bg-sand py-24 sm:py-28">
    <div class="max-w-5xl mx-auto px-6 sm:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-14">
            <div>
                <p class="eyebrow text-oasis-600 mb-4" data-aos="fade-up">Transparent budgeting</p>
                <h2 class="section-heading text-3xl sm:text-4xl text-dusk" data-aos="fade-up" data-aos-delay="80">Three-year budget overview</h2>
            </div>
            <div class="text-left sm:text-right" data-aos="fade-up" data-aos-delay="120">
                <p class="text-xs font-label uppercase tracking-widest text-ink/45">Total planning figure</p>
                <p class="stat-number text-3xl font-semibold text-dusk">KES <span data-counter="{{ $totalBudget }}">0</span></p>
            </div>
        </div>

        <div class="space-y-5">
            @foreach ($budget as $i => $b)
                <div data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                    <div class="flex items-baseline justify-between mb-2">
                        <p class="font-label font-semibold text-dusk text-sm sm:text-base">{{ $b['area'] }}</p>
                        <p class="font-mono text-sm text-ink/60">KES {{ number_format($b['amount']) }}</p>
                    </div>
                    <div class="budget-bar-track">
                        <div class="budget-bar-fill" style="--target-width: {{ round(($b['amount'] / $maxBudgetItem) * 100) }}%"></div>
                    </div>
                    <p class="text-xs text-ink/45 mt-1.5">{{ $b['components'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="grid sm:grid-cols-3 gap-5 mt-16">
            @foreach ($annualBudget as $i => $y)
                <div class="challenge-card text-center" data-aos="fade-up" data-aos-delay="{{ $i * 90 }}">
                    <p class="font-label font-semibold text-dusk">{{ $y['year'] }}</p>
                    <p class="stat-number text-2xl font-semibold text-oasis-600 mt-3">KES {{ number_format($y['amount']) }}</p>
                </div>
            @endforeach
        </div>

        <p class="text-xs text-ink/40 mt-8 text-center max-w-lg mx-auto">
            Figures are indicative three-year planning estimates, subject to adjustment based on donor
            contributions, partnerships, and community inputs. Reviewed collectively by the founding board with annual audits.
        </p>
    </div>
</section>

@endsection
