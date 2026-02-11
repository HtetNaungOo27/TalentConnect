@props([
    'url' => '/',
    'icon' => null,
    'variant' => 'primary', 
    'mobile' => false,
    'type' => 'link' 
])

@php
    $variants = [
        // Premium Baby Blue: High contrast white text on sky blue
        'primary' => 'bg-blue-500 text-white hover:bg-blue-600 shadow-[0_12px_24px_-8px_rgba(59,130,246,0.5)]',
        
        // Cloud White: Clean, premium borderless look
        'secondary' => 'bg-white text-blue-900 border border-blue-100 hover:bg-blue-50 shadow-sm',
        
        // Soft Pink Accent: The "Cute" pop for CTAs
        'accent' => 'bg-pink-300 text-white hover:bg-pink-400 shadow-[0_12px_24px_-8px_rgba(249,168,212,0.5)]',
        
        // Frosted Outline: High visibility on light backgrounds
        'outline' => 'bg-transparent border-2 border-blue-400 text-blue-500 hover:bg-blue-50',
        
        // Minimalist Ghost
        'ghost' => 'bg-transparent text-blue-900/40 hover:text-blue-600 hover:bg-blue-50/50',
    ];

    $variantClasses = $variants[$variant] ?? $variants['primary'];
    
    // Aesthetic Changes: 
    // 1. rounded-full for that "Pill" look
    // 2. font-black for high-end chunky typography
    // 3. active:scale-90 for a "clicky" tactile feel
    $baseClasses = "inline-flex items-center justify-center gap-2.5 font-black uppercase tracking-widest text-[11px] rounded-full px-8 py-4 transition-all duration-300 transform active:scale-90 select-none";
    
    $widthClass = $mobile ? 'w-full' : '';
    
    $fullClasses = "{$baseClasses} {$variantClasses} {$widthClass}";
@endphp

@if($type === 'link')
    <a href="{{ $url }}" {{ $attributes->merge(['class' => $fullClasses]) }}>
        @if($icon)
            <i class="fa-solid fa-{{ $icon }} text-xs opacity-90 transition-transform group-hover:scale-110"></i>
        @endif
        
        <span class="leading-none">{{ $slot }}</span>
    </a>
@else
    <button {{ $attributes->merge(['class' => $fullClasses]) }}>
        @if($icon)
            <i class="fa-solid fa-{{ $icon }} text-xs opacity-90 transition-transform group-hover:scale-110"></i>
        @endif
        
        <span class="leading-none">{{ $slot }}</span>
    </button>
@endif