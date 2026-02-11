<header
    x-data="{ open: false, atTop: true }"
    @scroll.window="atTop = (window.pageYOffset > 10 ? false : true)"
    :class="atTop 
        ? 'bg-transparent py-6' 
        : 'bg-white/70 backdrop-blur-2xl border-b border-sky-100 py-4 shadow-[0_20px_60px_-15px_rgba(56,189,248,0.25)]'"
    class="sticky top-0 z-50 transition-all duration-500 text-slate-700">

    <div class="max-w-7xl mx-auto px-8 flex items-center justify-between">

        {{-- Brand --}}
        <a href="{{ url('/') }}" class="group flex items-center gap-3 text-2xl font-extrabold tracking-tight">
            <div class="w-10 h-10 bg-gradient-to-br from-sky-300 to-blue-400 rounded-2xl flex items-center justify-center shadow-lg shadow-sky-200 group-hover:rotate-6 transition-transform duration-300">
                <span class="text-white text-lg font-black">T</span>
            </div>
            <span class="text-slate-800">
                Talent<span class="text-sky-500">Connect</span>
            </span>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex items-center gap-8">

            {{-- Navigation Pills --}}
            <div class="flex items-center gap-2 bg-white/70 backdrop-blur-xl p-1.5 rounded-full border border-sky-100">

    <x-nav-link 
        url="/" 
        :active="request()->is('/')"
        class="px-5 py-2 rounded-full text-sm font-medium transition-colors duration-200">
        Home
    </x-nav-link>

    <x-nav-link 
        url="/jobs" 
        :active="request()->is('jobs')"
        class="px-5 py-2 rounded-full text-sm font-medium transition-colors duration-200">
        Browse
    </x-nav-link>

    @auth
    <x-nav-link 
        url="/bookmarks" 
        :active="request()->is('bookmarks')"
        class="px-5 py-2 rounded-full text-sm font-medium transition-colors duration-200">
        Saved
    </x-nav-link>
    @endauth

</div>

            @auth
            {{-- Notification --}}
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="relative p-3 text-slate-500 hover:text-sky-600 bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none group">
                    
                    <i class="fa-solid fa-bell text-lg group-hover:scale-110 transition-transform duration-200"></i>

                    @if(auth()->user()->unreadNotifications->count())
                    <span class="absolute top-2.5 right-2.5 flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-300 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-400 border-2 border-white"></span>
                    </span>
                    @endif
                </button>

                {{-- Notification Dropdown --}}
                <div x-show="open"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                    x-transition:leave-end="opacity-0 translate-y-6 scale-95"
                    @click.away="open = false"
                    x-cloak
                    class="absolute right-0 mt-6 w-96 bg-white/95 backdrop-blur-xl border border-sky-100 shadow-[0_30px_60px_-15px_rgba(56,189,248,0.35)] rounded-[2.5rem] overflow-hidden z-[100]">

                    <div class="px-8 py-6 border-b border-sky-100 flex items-center justify-between bg-sky-50/50">
                        <h3 class="text-xs font-semibold text-slate-700 uppercase tracking-widest">
                            Notifications
                        </h3>

                        @if(auth()->user()->unreadNotifications->count())
                        <span class="px-3 py-1 bg-white text-sky-500 text-[10px] font-semibold rounded-full shadow-sm">
                            {{ auth()->user()->unreadNotifications->count() }} NEW
                        </span>
                        @endif
                    </div>

                    <div class="max-h-[380px] overflow-y-auto">
                        @forelse(auth()->user()->notifications->take(5) as $notification)
                        <a href="{{ route('notifications.read', $notification->id) }}"
                           class="flex items-start gap-4 px-8 py-6 transition-colors border-b border-sky-50 hover:bg-sky-50/40">

                            <div @class([
                                'mt-1 w-2.5 h-2.5 rounded-full shadow-sm',
                                'bg-sky-400' => !$notification->read_at,
                                'bg-slate-200' => $notification->read_at
                            ])></div>

                            <div class="flex-1">
                                <p class="text-sm leading-relaxed {{ !$notification->read_at ? 'text-slate-800 font-semibold' : 'text-slate-600' }}">
                                    {{ $notification->data['message'] }}
                                </p>
                                <span class="text-[11px] text-slate-400 mt-2 block">
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </a>
                        @empty
                        <div class="px-8 py-10 text-center text-slate-400 text-sm">
                            No notifications yet
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @endauth

            {{-- Right Section --}}
            <div class="flex items-center gap-4">

                @auth
                    @if(Auth::user()->role === 'employer')
                    <a href="/jobs/create"
                       class="bg-sky-500 text-white px-6 py-2.5 rounded-full text-sm font-semibold shadow-lg shadow-sky-200 hover:bg-sky-600 hover:-translate-y-0.5 transition-all duration-200">
                        Post Job
                    </a>
                    @endif

                    <div class="flex items-center gap-3 bg-white p-1 pr-4 rounded-full shadow-sm border border-sky-100">
                        <a href="{{ route('dashboard') }}" class="relative group">
                            <img
                                src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('storage/avatars/default-avatar.png') }}"
                                class="w-9 h-9 rounded-full border-2 border-sky-100 group-hover:border-sky-400 transition-all object-cover" />
                            <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-emerald-400 border-2 border-white rounded-full"></div>
                        </a>

                        <x-logout-button class="text-[11px] font-semibold text-slate-500 hover:text-sky-600 transition uppercase tracking-wide" />
                    </div>

                @else
                    <a href="/login" class="text-sm font-semibold text-slate-600 hover:text-sky-600 transition-colors">
                        Login
                    </a>

                    <a href="/register"
                       class="bg-sky-500 text-white px-8 py-3 rounded-full text-sm font-semibold shadow-xl shadow-sky-200 hover:bg-sky-600 hover:scale-105 transition-all duration-200">
                        Get Started
                    </a>
                @endauth
            </div>
        </nav>

        {{-- Mobile Toggle --}}
        <button @click="open = !open"
                class="md:hidden p-3 bg-sky-50 text-sky-500 rounded-2xl shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16m-7 6h7"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open"
         x-transition
         x-cloak
         class="absolute top-24 inset-x-6 bg-white/95 backdrop-blur-2xl rounded-[3rem] p-8 shadow-2xl md:hidden border border-sky-100">

        <div class="flex flex-col gap-6 text-center">

            <a href="/" class="text-lg font-semibold text-slate-800 hover:text-sky-600 transition">
                Home
            </a>

            <a href="/jobs" class="text-lg font-semibold text-slate-800 hover:text-sky-600 transition">
                Browse Jobs
            </a>

            <hr class="border-sky-100">

            <a href="/register"
               class="bg-sky-500 text-white py-4 rounded-3xl font-semibold shadow-lg hover:bg-sky-600 transition">
                Join TalentConnect
            </a>
        </div>
    </div>

</header>