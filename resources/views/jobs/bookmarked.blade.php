<x-layout>
  <section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

    {{-- Page Header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Saved Opportunities</h1>
        <p class="text-gray-500 mt-2">Manage the positions you've bookmarked for later review.</p>
      </div>
      
      @if($bookmarks->count())
        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-50 text-indigo-700 border border-indigo-100">
          {{ $bookmarks->count() }} {{ Str::plural('Job', $bookmarks->count()) }} Saved
        </span>
      @endif
    </div>

    {{-- Job Grid --}}
    @if($bookmarks->count())
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($bookmarks as $bookmark)
          {{-- Pass the job object directly from the bookmark relationship --}}
          <x-job-card :job="$bookmark" />
        @endforeach
      </div>
    @else
      {{-- Empty State --}}
      <div class="max-w-md mx-auto py-20 text-center">
        <div class="relative inline-block mb-6">
          <div class="absolute inset-0 bg-indigo-100 rounded-full blur-2xl opacity-50"></div>
          <div class="relative flex items-center justify-center w-20 h-20 mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm text-gray-400">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
            </svg>
          </div>
        </div>
        
        <h3 class="text-xl font-bold text-gray-900 mb-2">Your list is empty</h3>
        <p class="text-gray-500 mb-8 leading-relaxed">
          See a job you like? Click the bookmark icon to save it here so you don't lose track of it.
        </p>
        
        <a href="{{ route('jobs.index') }}" 
           class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-bold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 shadow-lg shadow-indigo-100 transition-all active:scale-95">
          Browse Listings
        </a>
      </div>
    @endif

  </section>
</x-layout>