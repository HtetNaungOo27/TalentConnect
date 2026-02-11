@props(['id', 'name', 'label' => null, 'value' => '', 'placeholder' => '', 'rows' => '6', 'maxlength' => '1000'])

<div class="space-y-2" x-data="{ count: {{ strlen(old($name, $value)) }} }">
    <div class="flex justify-between items-end">
        @if($label)
            <label for="{{ $id }}" class="block text-sm font-bold text-gray-700 tracking-tight">
                {{ $label }}
            </label>
        @endif
        
        {{-- Character Counter --}}
        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">
            <span x-text="count" :class="count > {{ $maxlength * 0.9 }} ? 'text-amber-500' : ''"></span> / {{ $maxlength }}
        </span>
    </div>

    <div class="relative group">
        <textarea 
            id="{{ $id }}" 
            name="{{ $name }}"
            rows="{{ $rows }}"
            maxlength="{{ $maxlength }}"
            placeholder="{{ $placeholder }}"
            x-on:input="count = $el.value.length"
            class="w-full px-5 py-4 bg-white border border-gray-100 rounded-2xl shadow-sm 
                   transition-all duration-200 leading-relaxed text-gray-700
                   placeholder:text-gray-300
                   focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500
                   group-hover:border-indigo-200
                   @error($name) border-red-500 @enderror"
        >{{ old($name, $value) }}</textarea>

        {{-- Subtle resize handle styling --}}
        <div class="absolute bottom-3 right-3 pointer-events-none opacity-20">
            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
        </div>
    </div>

    @error($name)
        <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p>
    @enderror
</div>