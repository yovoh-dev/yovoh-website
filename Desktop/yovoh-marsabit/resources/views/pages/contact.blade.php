@extends('layouts.app')

@section('title', 'Contact Us — YoVoH Marsabit')
@section('description', 'Get in touch with Young Voices of Hope – Marsabit. Reach out to volunteer, partner, donate, or simply learn more about our work in Marsabit County.')

@section('content')

{{-- ============================= PAGE HEADER ============================= --}}
<section class="hero-shell pt-40 pb-28">
    <div class="hero-stars absolute inset-0 pointer-events-none"></div>
    <div class="hero-sun absolute opacity-70" style="width:200px;height:200px;top:8%;right:6%;"></div>
    <div class="max-w-4xl mx-auto px-6 sm:px-8 text-center relative z-10">
        <p class="eyebrow text-marigold-300 mb-5" data-aos="fade-up">Get in touch</p>
        <h1 class="section-heading text-white text-4xl sm:text-5xl lg:text-6xl leading-tight" data-aos="fade-up" data-aos-delay="80">
            Let's talk about<br class="hidden sm:block"> what's next.
        </h1>
        <p class="text-sand-100/75 mt-6 max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="160">
            Questions, partnership ideas, or ready to volunteer? We'd love to hear from you.
        </p>
    </div>
</section>

{{-- ============================= FORM + INFO ============================= --}}
<section id="form" class="bg-sand py-24 sm:py-28 -mt-1 scroll-mt-24">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 grid lg:grid-cols-5 gap-10">

        {{-- Info column --}}
        <div class="lg:col-span-2 space-y-6" data-aos="fade-up">
            @php
                $info = [
                    ['icon' => 'landmark', 'label' => 'Location', 'value' => $contactInfo['address']],
                    ['icon' => 'handshake', 'label' => 'Email', 'value' => $contactInfo['email']],
                    ['icon' => 'heart-pulse', 'label' => 'Phone', 'value' => $contactInfo['phone']],
                ];
            @endphp
            @foreach ($info as $item)
                <div class="flex items-center gap-4 bg-white rounded-2xl border border-dusk/5 shadow-card p-5">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-oasis-50 text-oasis-600">
                        @include('partials.icon', ['name' => $item['icon'], 'class' => 'w-5 h-5'])
                    </span>
                    <div>
                        <p class="text-xs font-label uppercase tracking-widest text-ink/40">{{ $item['label'] }}</p>
                        <p class="font-label font-semibold text-dusk">{{ $item['value'] }}</p>
                    </div>
                </div>
            @endforeach

            <div class="rounded-2xl bg-dusk text-white p-6">
                <p class="font-label font-semibold mb-2">Prefer to volunteer directly?</p>
                <p class="text-sm text-sand-100/70 leading-relaxed">Mention it in the subject line below and our Program &amp; Partnerships Lead will follow up within a few days.</p>
            </div>
        </div>

        {{-- Form column --}}
        <div class="lg:col-span-3" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-white rounded-4xl border border-dusk/5 shadow-lift p-8 sm:p-10">

                @if (session('status'))
                    <div class="mb-6 flex items-start gap-3 rounded-2xl bg-oasis-50 border border-oasis-300/40 p-4 text-oasis-700 text-sm" role="status">
                        <svg class="w-5 h-5 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="m5 13 4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="name" class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Full name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-field" placeholder="Jane Doe">
                            @error('name') <p class="text-xs text-clay mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="email" class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Email address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-field" placeholder="jane@example.com">
                            @error('email') <p class="text-xs text-clay mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required class="form-field" placeholder="I'd like to partner on WASH advocacy">
                        @error('subject') <p class="text-xs text-clay mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="message" class="text-xs font-label uppercase tracking-widest text-ink/50 mb-2 block">Message</label>
                        <textarea id="message" name="message" rows="5" required class="form-field resize-none" placeholder="Tell us a little about what you have in mind...">{{ old('message') }}</textarea>
                        @error('message') <p class="text-xs text-clay mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn-solid-dark w-full sm:w-auto justify-center px-8 py-3.5">
                        Send message
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
