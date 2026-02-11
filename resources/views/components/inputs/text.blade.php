@props([
    'id',
    'name',
    'label' => null,
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'icon' => null
])

<div class="space-y-2">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-bold text-gray-700 tracking-tight">
            {{ $label }} 
            @if($required)<span class="text-indigo-500" title="Required">*</span>@endif
        </label>
    @endif

    <div class="relative group">
        <input 
            id="{{ $id }}" 
            type="{{ $type }}" 
            name="{{ $name }}" 
            placeholder="{{ $placeholder }}" 
            value="{{ old($name, $value) }}"
            {{ $required ? 'required' : '' }}
            class="w-full px-5 py-3.5 bg-white border border-gray-100 rounded-2xl shadow-sm 
                   transition-all duration-300 font-medium text-gray-700
                   placeholder:text-gray-300
                   group-hover:border-indigo-200
                   focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500
                   @error($name) border-red-500 focus:ring-red-500/10 @enderror"
        />

        @if($icon)
            <div class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 group-hover:text-indigo-400 transition-colors pointer-events-none">
                <i class="fa-solid fa-{{ $icon }}"></i>
            </div>
        @endif
    </div>

    @error($name)
        <p class="text-red-600 text-xs font-semibold mt-1.5 flex items-center gap-1">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ $message }}
        </p>
    @enderror
</div>