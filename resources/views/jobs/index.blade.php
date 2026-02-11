<x-layout>
  {{-- Hero / Search: Baby Blue Update --}}
<section class="relative bg-[#e0f2fe] px-6 py-12 mb-10 rounded-3xl overflow-hidden border border-blue-100 shadow-lg shadow-blue-100/50">
    {{-- Subtle Decorative Orbs (Light blue on light blue) --}}
    <div class="absolute inset-0 overflow-hidden -z-10">
        <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[100%] bg-blue-200/30 rounded-full blur-[80px]"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[40%] h-[80%] bg-white/60 rounded-full blur-[60px]"></div>
    </div>

    <div class="max-w-4xl mx-auto relative z-10">
        <div class="text-center mb-8">
            {{-- Deep Navy Text for contrast --}}
            <h2 class="text-blue-900 text-2xl font-black tracking-tight uppercase tracking-widest text-[11px]">Search Opportunities</h2>
        </div>
        
        {{-- Clean Container for search --}}
        <div class="p-2 bg-white/40 backdrop-blur-md border border-white rounded-2xl shadow-sm">
            <x-search />
        </div>
    </div>
</section>

  {{-- Back button: Updated to match --}}
  @if(request()->has('keywords') || request()->has('location'))
    <div class="max-w-5xl mx-auto mb-6">
      <a href="{{ route('jobs.index') }}"
        class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2.5 rounded-full font-bold text-xs uppercase tracking-widest shadow-md transition duration-300">
        <i class="fa fa-arrow-left"></i> Back to all jobs
      </a>
    </div>
  @endif

  {{-- Job Grid --}}
  <section class="max-w-10xl mx-auto mb-6 px-2">
    @if($jobs->count())
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($jobs as $job)
          <x-job-card :job="$job" />
        @endforeach
      </div>
    @else
      <div class="p-12 bg-blue-50/50 border-2 border-dashed border-blue-100 rounded-3xl text-center">
        <p class="text-blue-400 font-bold">No jobs available at the moment. Try adjusting your search.</p>
      </div>
    @endif
  </section>

  {{-- Pagination --}}
  @if($jobs->hasPages())
    <div class="max-w-6xl mx-auto flex justify-center mt-10">
      {{ $jobs->links() }}
    </div>
  @endif
</x-layout>