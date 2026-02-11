<x-layout>
    {{-- Page Heading --}}
    <h2 class="text-center text-3xl font-bold mb-6 border border-gray-300 rounded p-4">
        Welcome to TalentConnect
    </h2>

    {{-- Job Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        @forelse ($jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p class="text-center text-gray-500 col-span-full">No Jobs Available.</p>
        @endforelse
    </div>

    {{-- Show All Jobs Link --}}
    <div class="text-center mb-6">
        <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:underline text-lg font-semibold">
            Show All Jobs
            <i class="fa fa-arrow-alt-circle-right"></i>
        </a>
    </div>

    {{-- Bottom Banner --}}
    <x-bottom-banner />
</x-layout>