<section class="max-w-7xl mx-auto my-16 px-6 lg:px-8">
    @if(auth()->check() && auth()->user()->role === 'employer')
        {{-- Employer View: Soft Cloud Style --}}
        <div class="group relative bg-white rounded-[3rem] p-10 md:p-16 shadow-[0_30px_70px_-15px_rgba(191,219,254,0.4)] border border-blue-50 overflow-hidden">
            {{-- Floating Decorative Blurs: Baby Blue & Mint --}}
            <div class="absolute -top-24 -right-24 w-80 h-80 bg-blue-200/30 rounded-full blur-[80px] group-hover:bg-blue-300/40 transition-all duration-1000 animate-pulse"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-emerald-100/40 rounded-full blur-[60px]"></div>

            <div class="relative flex flex-col lg:flex-row items-center justify-between gap-10">
                <div class="flex-1 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-500 text-[11px] font-black uppercase tracking-[0.15em] mb-8 shadow-sm">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        Employer Hub
                    </div>
                    
                    <h2 class="text-4xl md:text-6xl font-black text-blue-950 tracking-tight leading-[1.1]">
                        Scale your team with <br class="hidden md:block"> 
                        <span class="text-blue-400">total precision.</span>
                    </h2>
                    
                    <p class="text-blue-900/60 mt-8 text-lg md:text-xl max-w-xl leading-relaxed font-medium">
                        Post listings and manage talent with our real-time tracking system. Simple, fast, and remarkably effective.
                    </p>
                </div>

                <div class="flex-shrink-0">
                    <a href="{{ url('jobs/create') }}"
                       class="group/btn inline-flex items-center gap-4 bg-blue-500 text-white font-black px-10 py-5 rounded-[2rem] shadow-[0_20px_40px_-10px_rgba(59,130,246,0.4)] hover:bg-blue-600 transition-all duration-300 hover:-translate-y-1.5 active:scale-95">
                        <svg class="w-6 h-6 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                        Create Listing
                    </a>
                </div>
            </div>
        </div>

    @elseif(auth()->check() && auth()->user()->role === 'user')
        {{-- Job Seeker View: Dreamy Pastel Gradient --}}
        <div class="group relative bg-gradient-to-br from-blue-400 to-blue-300 rounded-[3rem] p-10 md:p-16 shadow-[0_30px_70px_-15px_rgba(147,197,253,0.5)] overflow-hidden">
            {{-- Sparkle / Pattern Overlay --}}
            <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
            
            <div class="relative flex flex-col lg:flex-row items-center justify-between gap-10">
                <div class="flex-1 text-center lg:text-left text-white">
                    <span class="inline-block px-4 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white text-[11px] font-black uppercase tracking-widest mb-8">
                        Welcome Back, Talent
                    </span>

                    <h2 class="text-4xl md:text-6xl font-black tracking-tight leading-[1.1]">
                        Your dream career <br class="hidden md:block">
                        is <span class="text-blue-900/30">waiting.</span>
                    </h2>
                    
                    <p class="text-blue-50 mt-8 text-lg md:text-xl max-w-xl leading-relaxed font-bold">
                        Access verified listings tailored to your skills. Track every application from sent to hired in one unified space.
                    </p>
                </div>

                <div class="flex-shrink-0">
                    <a href="{{ url('jobs') }}"
                       class="inline-flex items-center gap-4 bg-white text-blue-500 font-black px-10 py-5 rounded-[2rem] shadow-2xl hover:bg-blue-50 transition-all duration-300 hover:-translate-y-1.5 active:scale-95">
                        Browse Jobs
                        <svg class="w-6 h-6 stroke-[3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    @endif
</section>