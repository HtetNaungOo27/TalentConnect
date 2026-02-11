@props(['type', 'message', 'timeout' => 5000])

<div 
    x-data="{ show: true, progress: 100 }" 
    x-init="
        let interval = setInterval(() => {
            progress -= (100 / ({{ $timeout }} / 10));
            if (progress <= 0) {
                clearInterval(interval);
                show = false;
            }
        }, 10);
    " 
    x-show="show" 
    x-transition:enter="transition transform ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-x-12"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition transform ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    @class([
        'fixed top-6 right-6 z-[100] w-full max-w-sm overflow-hidden rounded-2xl bg-white shadow-2xl border-l-4 p-5 flex items-start gap-4 transition-all duration-300',
        'border-emerald-500 shadow-emerald-500/10' => $type === 'success',
        'border-rose-500 shadow-rose-500/10' => $type === 'error' || $type === 'danger',
    ])
>
    {{-- Icon based on type --}}
    <div @class([
        'flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center',
        'bg-emerald-50 text-emerald-600' => $type === 'success',
        'bg-rose-50 text-rose-600' => $type === 'error' || $type === 'danger',
    ])>
        <i class="fa-solid {{ $type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation' }} text-lg"></i>
    </div>

    <div class="flex-1 pt-0.5">
        <h4 class="text-sm font-black text-gray-900 uppercase tracking-wider mb-1">
            {{ $type === 'success' ? 'Success' : 'Attention' }}
        </h4>
        <p class="text-sm text-gray-600 font-medium leading-relaxed">{{ $message }}</p>
    </div>
    
    <button @click="show = false" class="text-gray-400 hover:text-gray-900 transition-colors pt-1">
        <i class="fa-solid fa-xmark"></i>
    </button>

    {{-- Progress Bar --}}
    <div class="absolute bottom-0 left-0 h-1 bg-gray-100 w-full">
        <div 
            class="h-full transition-all linear" 
            :style="`width: ${progress}%;`"
            :class="{{ $type === 'success' ? "'bg-emerald-500'" : "'bg-rose-500'" }}"
        ></div>
    </div>
</div>