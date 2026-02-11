@props([
    'title' => 'Connecting Talent with the Right Opportunities',
    'subtitle' => 'Explore verified jobs, track applications, and grow your career with confidence.',
])

<section class="relative bg-[#f0f9ff] pt-20 pb-24 lg:pt-32 lg:pb-40 overflow-hidden font-sans">
    
    {{-- Aesthetic Soft Mesh Background --}}
    <div class="absolute inset-0 overflow-hidden -z-10">
        {{-- Soft Baby Blue Glow --}}
        <div class="absolute top-[-20%] left-[-10%] w-[70%] h-[80%] bg-blue-200/40 rounded-full blur-[120px] animate-pulse"></div>
        {{-- White Cloud Accent --}}
        <div class="absolute bottom-[-10%] right-[5%] w-[50%] h-[50%] bg-white/60 rounded-full blur-[100px]"></div>
        {{-- Very Subtle Pink/Lavender Pop for the 'Aesthetic' feel --}}
        <div class="absolute top-[10%] right-[-5%] w-[40%] h-[40%] bg-pink-100/30 rounded-full blur-[80px]"></div>
    </div>

    {{-- Dotted Pattern (Lighter and cuter than a grid) --}}
    <div class="absolute inset-0 bg-[radial-gradient(#bae6fd_1px,transparent_1px)] [background-size:24px_24px] opacity-40 -z-10"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center">
            
            {{-- Floating Badge: Rounded-full and soft --}}
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/80 backdrop-blur-sm border border-blue-100 text-blue-500 text-xs font-bold uppercase tracking-widest mb-10 shadow-sm">
                <span class="flex h-2 w-2 rounded-full bg-blue-400 animate-ping"></span>
                The Future of Job Hunting
            </div>

            {{-- Title: Soft Rounded Font Style --}}
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold tracking-tight leading-[1.1] mb-8">
                <span class="text-slate-800">Find your </span>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-sky-400 to-indigo-300">
                    Dream Job
                </span>
            </h1>

            {{-- Subtitle: Softer gray-blue --}}
            <p class="text-lg md:text-xl text-slate-500/80 max-w-2xl mx-auto leading-relaxed font-medium">
                {{ $subtitle }}
            </p>

            {{-- Search Bar: Premium Pill Style --}}
            <div class="mt-12 max-w-4xl mx-auto group">
                <div class="p-2 bg-white rounded-[3rem] shadow-[0_20px_50px_rgba(186,230,253,0.3)] border border-white transition-all duration-500 group-hover:shadow-[0_20px_60px_rgba(186,230,253,0.5)]">
                    {{-- Assuming x-search is styled with rounded-full internal inputs --}}
                    <x-search />
                </div>
                
                {{-- Quick Stats: Pill shapes and soft icons --}}
                <div class="mt-10 flex flex-wrap justify-center items-center gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 bg-white/50 border border-blue-100/50 rounded-full text-slate-500 text-sm shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                        <span class="font-bold text-blue-600">1,240</span> New jobs today
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 bg-white/50 border border-blue-100/50 rounded-full text-slate-500 text-sm shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-indigo-300"></span>
                        <span class="font-bold text-indigo-500">450+</span> Top Companies
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>