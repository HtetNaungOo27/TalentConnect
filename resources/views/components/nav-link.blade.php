@props([
    'url' => '/', 
    'active' => false, 
    'icon' => null, 
    'mobile' => false
])

@php
    $classes = \Illuminate\Support\Arr::toCssClasses([
        // Base Layout: Chunky font and tracking for that premium feel
        'group flex items-center transition-all duration-300 ease-out font-black uppercase tracking-widest text-[11px]',
        
        // Mobile Specifics: Extra rounded "squircle" buttons
        'w-full px-6 py-4 rounded-[1.5rem] mb-2' => $mobile,
        
        // Desktop Specifics: Pill-shaped buttons
        'px-5 py-2.5 rounded-full' => ! $mobile,
        
        // Active State: Bright white "pill" that pops out
        'bg-white text-blue-500 shadow-[0_8px_20px_-6px_rgba(191,219,254,0.6)] scale-105' => $active,
        
        // Inactive State: Subtle blue that brightens on hover
        'text-blue-900/40 hover:text-blue-500 hover:bg-white/50' => ! $active,
    ]);
@endphp

<a href="{{ $url }}" 
   {{ $attributes->merge(['class' => $classes]) }}
   @if($active) aria-current="page" @endif
>
    @if($icon)
        {{-- Icon logic: Bounces slightly on hover --}}
        <span class="mr-2.5 transition-transform duration-300 {{ $active ? 'scale-110 opacity-100' : 'opacity-60 group-hover:opacity-100 group-hover:scale-110' }}">
            @if(Str::startsWith($icon, '<svg'))
                <div class="w-4 h-4">{!! $icon !!}</div>
            @else
                <i class="fa-solid fa-{{ $icon }} text-xs"></i>
            @endif
        </span>
    @endif

    <span class="leading-none">{{ $slot }}</span>
</a>