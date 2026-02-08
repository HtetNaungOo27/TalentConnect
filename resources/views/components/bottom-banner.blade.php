<section class="container mx-auto my-6">
    @if(auth()->check() && auth()->user()->role === 'employer')
        {{-- Employer View --}}
        <div class="bg-blue-800 text-white rounded p-4 flex items-center justify-between flex-col md:flex-row gap-4">
            <div>
                <h2 class="text-xl font-semibold">Looking to hire?</h2>
                <p class="text-gray-200 text-lg mt-2">
                    Post your job listing now and find the perfect candidate.
                </p>
            </div>
            <a href="{{ url('jobs/create') }}"
               class="bg-yellow-500 text-black px-4 py-2 rounded hover:shadow-md transition duration-300">
                <i class="fa fa-edit"></i> Create Job
            </a>
        </div>
    @elseif(auth()->check() && auth()->user()->role === 'user')
        {{-- Job Seeker View --}}
        <div class="bg-blue-900 text-white rounded p-4 flex items-center justify-between flex-col md:flex-row gap-4">
            <div>
                <h2 class="text-xl font-semibold">Looking for a job?</h2>
                <p class="text-gray-200 text-lg mt-2">
                    Explore the latest job listings and find your dream career.
                </p>
            </div>
            <a href="{{ url('jobs') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300">
                Browse Jobs
            </a>
        </div>
    @endif
</section>