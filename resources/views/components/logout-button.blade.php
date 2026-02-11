<form 
    method="POST" 
    action="{{ route('logout') }}" 
    {{-- Softened the confirmation text to match the vibe --}}
    onsubmit="return confirm('Take a break? You can always come back later! ✨');"
    class="inline-block"
>
    @csrf

    <button
        type="submit"
        {{-- 
            1. Changed to text-blue-900/50 for a premium 'quiet' look
            2. Added a soft rose-tinted hover (bg-rose-50)
            3. Swapped to rounded-full (pill shape) 
        --}}
        class="group flex items-center gap-2.5 px-5 py-2.5 text-xs font-black uppercase tracking-widest
               text-blue-900/40 hover:text-rose-500 hover:bg-rose-50
               rounded-full transition-all duration-300 ease-out
               active:scale-90 focus:outline-none"
        aria-label="Log out"
    >
        {{-- Icon logic: Added a slight tilt on hover --}}
        <svg 
            class="w-4 h-4 opacity-60 group-hover:opacity-100 group-hover:-translate-x-1 transition-all duration-300" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke-width="3" {{-- Thicker stroke for that 'cute' chunky feel --}}
            stroke="currentColor" 
            aria-hidden="true"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
        </svg>

        <span>Logout</span>
    </button>
</form>