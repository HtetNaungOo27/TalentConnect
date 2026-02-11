@props(['id', 'name', 'label' => null, 'required' => false, 'icon' => 'upload'])

<div class="space-y-2">
    @if($label)
    <label for="{{ $id }}" class="block text-sm font-bold text-gray-700 tracking-tight">
        {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
    </label>
    @endif

    <div class="relative group">
        {{-- Custom-styled file input using the 'file:' modifier --}}
        <input 
            {{ $required ? 'required' : '' }} 
            id="{{ $id }}" 
            type="file" 
            name="{{ $name }}"
            class="w-full text-sm text-gray-500
                   file:mr-4 file:py-3 file:px-6
                   file:rounded-xl file:border-0
                   file:text-sm file:font-bold
                   file:bg-indigo-50 file:text-indigo-700
                   hover:file:bg-indigo-100
                   cursor-pointer transition-all
                   border border-gray-100 rounded-xl bg-white shadow-sm
                   focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500
                   @error($name) border-red-500 @enderror"
        />

        {{-- Floating Icon --}}
        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-indigo-400 group-hover:scale-110 transition-transform pointer-events-none">
            <i class="fa fa-{{ $icon }}"></i>
        </div>
    </div>

    @error($name)
    <p class="text-red-500 text-xs font-medium mt-1">{{ $message }}</p>
    @enderror
</div>