<x-layout>
    <section class="max-w-5xl mx-auto px-4 py-10">

        {{-- Company Header Card --}}
        <div class="relative bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-8">
            {{-- Subtle Decorative Background --}}
            <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-r from-indigo-600 to-blue-500"></div>

            <div class="relative px-8 pb-8 pt-16 flex flex-col md:flex-row items-end gap-6">
                {{-- Avatar with Border --}}
                <div class="relative">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" 
                             class="w-32 h-32 rounded-2xl object-cover border-4 border-white shadow-lg bg-white">
                    @else
                        <div class="w-32 h-32 rounded-2xl bg-gray-100 border-4 border-white shadow-lg flex items-center justify-center text-gray-400">
                            <i class="fa fa-building text-4xl"></i>
                        </div>
                    @endif
                </div>

                <div class="flex-1 mb-2">
                    <div class="flex items-center gap-3">
                        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $user->name }}</h1>
                        <span class="bg-blue-50 text-blue-600 text-xs font-bold px-2 py-1 rounded uppercase tracking-wider">Verified Employer</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-y-2 gap-x-6 mt-2 text-gray-600">
                        <span class="flex items-center gap-2">
                            <i class="fa fa-briefcase text-gray-400"></i> {{ $jobs->count() }} Active Roles
                        </span>
                        <span class="flex items-center gap-2">
                            <i class="fa fa-envelope text-gray-400"></i> {{ $user->email }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Job Listings Section --}}
        <div class="space-y-6">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                <h2 class="text-xl font-bold text-gray-800">Available Opportunities</h2>
                <div class="text-sm text-gray-500">Showing all current openings</div>
            </div>

            <div class="grid gap-4">
                @forelse($jobs as $job)
                    <a href="{{ route('jobs.show', $job->id) }}" 
                       class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-indigo-200 transition-all duration-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        
                        <div class="space-y-1">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                {{ $job->title }}
                            </h3>
                            <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                                <span class="flex items-center gap-1.5">
                                    <i class="fa fa-map-marker-alt opacity-70"></i> {{ $job->location }}
                                </span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span class="flex items-center gap-1.5">
                                    <i class="fa fa-clock opacity-70"></i> {{ $job->job_type }}
                                </span>
                                @if($job->salary)
                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                    <span class="text-green-600 font-medium">{{ $job->salary }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-4 self-start md:self-auto">
                            <div class="text-right hidden md:block">
                                <p class="text-xs text-gray-400 uppercase font-bold tracking-widest">Posted</p>
                                <p class="text-sm text-gray-700 font-medium">{{ $job->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="h-10 w-10 flex items-center justify-center rounded-full bg-indigo-50 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-16 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                        <i class="fa fa-search text-gray-300 text-4xl mb-4"></i>
                        <p class="text-gray-500 font-medium">This employer hasn't posted any jobs yet.</p>
                        <a href="{{ route('jobs.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Browse other companies</a>
                    </div>
                @endforelse
            </div>
        </div>

    </section>
</x-layout>