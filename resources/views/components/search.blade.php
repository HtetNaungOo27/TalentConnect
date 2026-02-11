<form 
    method="GET" 
    action="{{ route('jobs.search') }}"
    {{-- Swapped rounded-2xl for rounded-[2.5rem] and added a blue-tinted shadow --}}
    class="bg-white/80 rounded-[2.5rem] p-2 md:p-3 shadow-[0_20px_50px_-15px_rgba(191,219,254,0.5)] border border-blue-50/50 flex flex-col md:flex-row items-center gap-2 max-w-4xl mx-auto backdrop-blur-xl">

    {{-- Keywords Input --}}
    <div class="relative w-full md:flex-[1.2]">
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
            {{-- Darker blue icon for better visibility --}}
            <svg class="h-5 w-5 text-blue-400/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input type="text" name="keywords" placeholder="Job title, skills, or company"
               value="{{ request('keywords') }}"
               {{-- Higher contrast text (blue-950) and soft blue focus ring --}}
               class="w-full pl-12 pr-6 py-4 rounded-[2rem] border-transparent bg-blue-50/30 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-transparent transition-all duration-300 outline-none text-blue-950 font-bold placeholder:text-blue-300 placeholder:font-medium" />
    </div>

    {{-- Divider (Desktop only): Soft blue tint --}}
    <div class="hidden md:block h-10 w-px bg-blue-100/50 mx-2"></div>

    {{-- Location Input --}}
    <div class="relative w-full md:flex-1">
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-blue-400/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <input type="text" name="location" placeholder="City or remote"
               value="{{ request('location') }}"
               class="w-full pl-12 pr-6 py-4 rounded-[2rem] border-transparent bg-blue-50/30 focus:bg-white focus:ring-4 focus:ring-blue-100 focus:border-transparent transition-all duration-300 outline-none text-blue-950 font-bold placeholder:text-blue-300 placeholder:font-medium" />
    </div>

    {{-- Search Button: Baby Blue Pill --}}
    <button type="submit"
            class="w-full md:w-auto px-10 py-4 bg-blue-500 hover:bg-blue-600 text-white font-black uppercase tracking-widest text-[11px] rounded-full shadow-[0_15px_30px_-10px_rgba(59,130,246,0.4)] hover:shadow-blue-200 transition-all duration-300 transform active:scale-90 flex items-center justify-center gap-2">
        <i class="fa-solid fa-magnifying-glass text-xs"></i>
        <span>Search Jobs</span>
    </button>
</form>