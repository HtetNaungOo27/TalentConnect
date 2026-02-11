<x-layout>
    <section class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 px-4 py-8">
        {{-- Sidebar: Profile Info --}}
        <aside class="lg:w-1/3">
            <div class="sticky top-8 bg-gradient-to-br from-indigo-700 via-indigo-800 to-blue-900 text-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8 pb-24 relative">
                    <div class="flex flex-col items-center">
                        {{-- Avatar --}}
                        <div class="relative mb-6">
                            @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                                class="w-32 h-32 object-cover rounded-full ring-4 ring-white/20 shadow-2xl">
                            @else
                            <div class="w-32 h-32 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-3xl font-bold">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            @endif
                        </div>

                        <h3 class="text-2xl font-bold">{{ $user->name }}</h3>
                        <span class="text-indigo-200 text-sm font-medium uppercase tracking-widest mt-1">{{ $user->role }}</span>
                    </div>

                    <div class="mt-8 space-y-6">
                        {{-- Email & Info --}}
                        <div class="text-sm border-t border-white/10 pt-6">
                            <div class="flex justify-between">
                                <span class="opacity-70">Email</span>
                                <span class="font-medium">{{ $user->email }}</span>
                            </div>
                        </div>

                        {{-- Skills Section: NEWLY ADDED --}}
                        <div class="space-y-3">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-indigo-300">Technical Skills</h4>
                            <div class="flex flex-wrap gap-2">
                                @forelse($user->skills as $skill)
                                <span class="bg-white/10 hover:bg-white/20 border border-white/10 px-3 py-1 rounded-full text-xs font-medium transition cursor-default">
                                    {{ $skill->name }}
                                </span>
                                @empty
                                <p class="text-xs text-indigo-300 italic">No skills listed yet.</p>
                                @endforelse
                            </div>
                        </div>

                        {{-- Experiences Mini-List --}}
                        @if($user->experiences->count())
                        <div class="space-y-3">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-indigo-300">Latest Experience</h4>
                            <div class="bg-white/5 rounded-xl p-3 border border-white/10">
                                <p class="font-bold text-white text-sm">{{ $user->experiences->first()->title }}</p>
                                <p class="text-xs text-indigo-200">{{ $user->experiences->first()->company }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Edit Button --}}
                    <div class="absolute bottom-6 left-0 w-full px-8">
                        <a href="{{ route('profile.edit') }}"
                            class="w-full flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-indigo-900 font-bold py-3 rounded-xl transition shadow-lg">
                            <i class="fa fa-edit"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="lg:w-2/3 space-y-8">

            @if($user->role === 'employer')
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-extrabold text-gray-900">Manage Job Listings</h3>
                <a href="{{ route('jobs.create') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800">+ Post New Job</a>
            </div>

            @forelse($jobs as $job)
            <div x-data="{ open: false }" class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden transition-all hover:shadow-md">
                {{-- Job Header --}}
                <div class="p-6 flex items-center justify-between bg-white">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-indigo-50 text-indigo-600 rounded-lg">
                            <i class="fa fa-briefcase text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-lg hover:text-indigo-600">
                                <a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                            </h4>
                            <div class="flex items-center gap-3 text-sm text-gray-500 mt-1">
                                <span>{{ $job->job_type }}</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span class="{{ $job->applicants->count() > 0 ? 'text-indigo-600 font-bold' : '' }}">
                                    {{ $job->applicants->count() }} Applicants
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button @click="open = !open" class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-gray-100 rounded-lg transition">
                            <span x-text="open ? 'Close Applicants' : 'View Applicants'"></span>
                        </button>
                        <a href="{{ route('jobs.edit', $job->id) }}" class="p-2 text-gray-400 hover:text-blue-600 transition"><i class="fa fa-edit"></i></a>
                    </div>
                </div>

                {{-- Applicant Accordion (Alpine.js) --}}
                <div x-show="open" x-collapse x-cloak class="bg-gray-50 border-t border-gray-100">
                    <div class="p-6 space-y-4">
                        @forelse($job->applicants as $applicant)
                        <div class="bg-white p-4 rounded-xl border border-gray-200 flex flex-wrap md:flex-nowrap justify-between items-center gap-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 bg-indigo-100 text-indigo-700 rounded-full flex items-center justify-center font-bold">
                                    {{ substr($applicant->full_name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">{{ $applicant->full_name }}</p>
                                    <p class="text-xs text-gray-500">{{ $applicant->contact_email }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <form method="POST" action="{{ route('applicant.status.update', $applicant->id) }}" class="flex items-center gap-2">
                                    @csrf @method('PATCH')
                                    <select name="status" @change="$el.form.submit()" class="text-xs font-bold uppercase rounded-lg border-gray-200 focus:ring-indigo-500 py-1">
                                        <option value="pending" {{ $applicant->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="accepted" {{ $applicant->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="rejected" {{ $applicant->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                                <a href="{{ asset('storage/' . $applicant->resume_path) }}" class="text-indigo-600 hover:bg-indigo-50 p-2 rounded-lg transition" title="Download Resume">
                                    <i class="fa fa-file-download"></i>
                                </a>
                            </div>
                        </div>
                        @empty
                        <p class="text-center text-gray-500 py-4 italic text-sm">No applicants yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-20 bg-white rounded-2xl border-2 border-dashed border-gray-200">
                <p class="text-gray-500">You haven't posted any jobs yet.</p>
            </div>
            @endforelse
            @endif

            {{-- User View --}}
            @if($user->role === 'user')
            <h3 class="text-2xl font-extrabold text-gray-900 mb-6">Your Applications</h3>
            <div class="grid gap-4">
                @forelse($user->applications as $application)
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center">
                            <i class="fa fa-paper-plane"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $application->job->title }}</h4>
                            <p class="text-sm text-gray-500">Applied on {{ $application->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <span @class([ 'px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider' , 'bg-yellow-100 text-yellow-700'=> $application->status === 'pending',
                        'bg-green-100 text-green-700' => $application->status === 'accepted',
                        'bg-red-100 text-red-700' => $application->status === 'rejected',
                        ])>
                        {{ $application->status }}
                    </span>
                </div>
                @empty
                <p class="text-gray-500 text-center py-10">You haven't applied for any jobs yet.</p>
                @endforelse
            </div>
            @endif

        </main>
    </section>

    <x-bottom-banner />
</x-layout>