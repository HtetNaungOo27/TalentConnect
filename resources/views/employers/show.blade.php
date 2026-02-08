<x-layout>
  <section class="max-w-5xl mx-auto bg-white p-8 rounded shadow">

    {{-- Employer Info --}}
    <div class="flex items-center space-x-4 mb-6">
      @if($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}"
             class="w-20 h-20 rounded-full object-cover">
      @endif

      <div>
        <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
        <p class="text-gray-600">Employer</p>
      </div>
    </div>

    {{-- Job Listings --}}
    <h2 class="text-2xl font-semibold mb-4">Jobs by {{ $user->name }}</h2>

    @forelse($jobs as $job)
      <div class="border-b py-4">
        <a href="{{ route('jobs.show', $job->id) }}">
          <h3 class="text-xl font-semibold text-blue-600">
            {{ $job->title }}
          </h3>
        </a>
        <p class="text-gray-700">{{ $job->job_type }}</p>
        <p class="text-gray-500 text-sm">{{ $job->location }}</p>
      </div>
    @empty
      <p class="text-gray-600">No job postings yet.</p>
    @endforelse

  </section>
</x-layout>