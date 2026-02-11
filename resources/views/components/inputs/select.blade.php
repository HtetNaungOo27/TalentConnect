@props(['id', 'name', 'label' => null, 'value' => '', 'options' => []])

<div class="space-y-2">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-bold text-gray-700 tracking-tight">
            {{ $label }}
        </label>
    @endif

    <div class="relative group">
        <select id="{{ $id }}" name="{{ $name }}"
            class="w-full px-4 py-3 bg-white border border-gray-100 rounded-xl shadow-sm 
                   appearance-none cursor-pointer transition-all duration-200
                   text-gray-700 font-medium
                   focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500
                   group-hover:border-indigo-200
                   @error($name) border-red-500 @enderror">
            
            {{-- Optional: Add a placeholder if value is empty --}}
            @if(empty($value) && !old($name))
                <option value="" disabled selected>Select an option...</option>
            @endif

            @foreach($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
                    {{ $optionLabel }}
                </option>
            @endforeach
        </select>

        {{-- Custom Dropdown Arrow --}}
        <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center">
            <svg class="w-4 h-4 text-indigo-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </div>

    @error($name)
        <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p>
    @enderror
</div>