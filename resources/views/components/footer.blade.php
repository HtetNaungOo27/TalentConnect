<footer class="bg-blue-50/50 border-t border-blue-100/60">
    <div class="max-w-7xl mx-auto px-8 pt-20 pb-10">

        {{-- Top Section: Brand & Navigation --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-16 mb-20">

            {{-- Brand Column --}}
            <div class="lg:col-span-4">
                <a href="/" class="group flex items-center gap-3 text-2xl font-black tracking-tight">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-300 rounded-2xl flex items-center justify-center shadow-md shadow-blue-200 group-hover:rotate-6 transition-all">
                        <span class="text-white text-xl">T</span>
                    </div>
                    <span class="text-blue-950">Talent<span class="text-blue-400">Connect</span></span>
                </a>
                
                <p class="mt-8 text-sm leading-relaxed text-blue-900/70 max-w-sm font-medium">
                    Connecting Myanmar's brightest talent with industry-leading employers through a secure, transparent, and data-driven recruitment ecosystem.
                </p>

                {{-- Social Icons: Soft Pill Style --}}
                <div class="mt-8 flex gap-3">
                    <div class="w-10 h-10 rounded-full bg-white border border-blue-100 flex items-center justify-center text-blue-400 hover:bg-blue-400 hover:text-white hover:-translate-y-1 transition-all duration-300 cursor-pointer shadow-sm">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-white border border-blue-100 flex items-center justify-center text-blue-400 hover:bg-blue-400 hover:text-white hover:-translate-y-1 transition-all duration-300 cursor-pointer shadow-sm">
                        <i class="fab fa-linkedin-in text-sm"></i>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-white border border-blue-100 flex items-center justify-center text-blue-400 hover:bg-blue-400 hover:text-white hover:-translate-y-1 transition-all duration-300 cursor-pointer shadow-sm">
                        <i class="fab fa-instagram text-sm"></i>
                    </div>
                </div>
            </div>

            {{-- Nav Columns --}}
            <div class="lg:col-span-8 grid grid-cols-2 md:grid-cols-4 gap-10">
                <div>
                    <h4 class="text-[11px] font-black text-blue-900/40 uppercase tracking-[0.2em] mb-6">Platform</h4>
                    <ul class="space-y-4 text-sm font-bold">
                        <li><a href="/jobs" class="text-blue-950 hover:text-blue-500 transition-colors">Browse Jobs</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">How it Works</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Verified Companies</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Skill Tests</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-[11px] font-black text-blue-900/40 uppercase tracking-[0.2em] mb-6">Employers</h4>
                    <ul class="space-y-4 text-sm font-bold">
                        <li><a href="/jobs/create" class="text-blue-950 hover:text-blue-500 transition-colors">Post a Job</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Talent Search</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Hiring Solutions</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Pricing</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-[11px] font-black text-blue-900/40 uppercase tracking-[0.2em] mb-6">Support</h4>
                    <ul class="space-y-4 text-sm font-bold">
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="text-blue-950 hover:text-blue-500 transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-[11px] font-black text-blue-900/40 uppercase tracking-[0.2em] mb-6">Contributors</h4>
                    <ul class="space-y-3">
                        <li class="text-[10px] text-blue-300 font-black uppercase tracking-widest mb-2">Project Team</li>
                        <li class="text-xs font-bold text-blue-950 hover:text-blue-400 transition-colors cursor-default">Mg Htet Naung Oo</li>
                        <li class="text-xs font-bold text-blue-950 hover:text-blue-400 transition-colors cursor-default">Ma Su Sandy Tun</li>
                        <li class="text-xs font-bold text-blue-950 hover:text-blue-400 transition-colors cursor-default">Ma Thae Han Tar Win</li>
                        <li class="text-xs font-bold text-blue-950 hover:text-blue-400 transition-colors cursor-default">Ma Thet Htar San</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Bottom Section --}}
        <div class="pt-10 border-t border-blue-100 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-xs font-bold text-blue-900/40">
                © {{ date('Y') }} <span class="text-blue-500">TalentConnect</span>. Developed for a smarter workforce.
            </p>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-full border border-blue-50 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-blue-900/50">System Status: Online</span>
                </div>
            </div>
        </div>
    </div>
</footer>