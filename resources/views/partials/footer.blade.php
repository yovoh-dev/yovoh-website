<footer class="relative bg-dusk text-sand-100 overflow-hidden">

    <!-- horizon divider -->
    <div class="absolute inset-x-0 -top-1 h-16 sm:h-24 overflow-hidden leading-[0]" aria-hidden="true">
        <svg class="w-full h-full" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,64 L60,58 L140,70 L220,40 L300,66 L380,30 L460,60 L540,20 L620,55 L700,15 L780,50 L860,68 L940,35 L1020,58 L1100,44 L1200,64 L1300,50 L1440,60 L1440,120 L0,120 Z" fill="#F6EEDF"/>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 pt-24 pb-10 relative">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 pb-14 border-b border-white/10">

            <div class="lg:col-span-5">
                <div class="flex items-center gap-3 mb-5">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/5 ring-1 ring-white/10">
                        <svg viewBox="0 0 100 100" class="h-7 w-7">
                            <circle cx="64" cy="26" r="11" fill="#F2B84B"/>
                            <path d="M14 74 L34 40 L50 62 L64 34 L86 74 Z" fill="#E8823C"/>
                            <path d="M14 74 L34 46 L50 66 L64 42 L86 74 Z" fill="#2F7D4F" opacity="0.85"/>
                        </svg>
                    </span>
                    <span class="font-label font-semibold text-lg text-white">Young Voices of Hope</span>
                </div>
                <p class="text-sand-100/70 max-w-sm leading-relaxed">
                    An empowered, resilient and digitally literate generation of learners in Marsabit County who thrive academically, socially and environmentally.
                </p>
                <div class="flex items-center gap-3 mt-6">
                    @foreach (['x','facebook','instagram','linkedin'] as $s)
                        <a href="#" aria-label="{{ ucfirst($s) }}" class="social-dot">
                            @include('partials.icon', ['name' => $s, 'class' => 'w-4 h-4'])
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-2">
                <p class="footer-heading">Explore</p>
                <ul class="space-y-3 mt-4 text-sm">
                    <li><a href="{{ route('about') }}" class="footer-link">About Us</a></li>
                    <li><a href="{{ route('programs') }}" class="footer-link">Our Programs</a></li>
                    <li><a href="{{ route('impact') }}" class="footer-link">Impact &amp; Plan</a></li>
                    <li><a href="{{ route('partners') }}" class="footer-link">Partners</a></li>
                </ul>
            </div>

            <div class="lg:col-span-2">
                <p class="footer-heading">Pillars</p>
                <ul class="space-y-3 mt-4 text-sm">
                    <li><a href="{{ route('programs') }}#mental-well-being" class="footer-link">Mental Well-being</a></li>
                    <li><a href="{{ route('programs') }}#wash-advocacy" class="footer-link">WASH Advocacy</a></li>
                    <li><a href="{{ route('programs') }}#climate-action" class="footer-link">Climate Action</a></li>
                    <li><a href="{{ route('programs') }}#digital-literacy" class="footer-link">Digital Literacy</a></li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <p class="footer-heading">Reach us</p>
                <ul class="space-y-3 mt-4 text-sm text-sand-100/80">
                    <li class="flex gap-2"><span>📍</span> {{ \App\Models\Setting::get('address', 'Marsabit County, Kenya') }}</li>
                    <li class="flex gap-2"><span>✉️</span> {{ \App\Models\Setting::get('contact_email', 'info@yovohmarsabit.org') }}</li>
                    <li class="flex gap-2"><span>📞</span> {{ \App\Models\Setting::get('contact_phone', '+254 700 000 000') }}</li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-8 text-xs text-sand-100/50">
            <p>&copy; {{ date('Y') }} Young Voices of Hope — Marsabit. All rights reserved.</p>
            <p class="font-mono">Empowering Youth &middot; Transforming Communities &middot; Building Futures.</p>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="footer-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="footer-link">Staff Login</a>
            @endauth
        </div>
    </div>
</footer>
