<x-layout>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Breadcrumbs & Admin Actions --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
      <nav class="flex items-center space-x-2 text-sm" aria-label="Breadcrumb">
        <a href="{{ route('jobs.index') }}" class="text-gray-500 hover:text-indigo-600 transition">Jobs</a>
        <span class="text-gray-300">/</span>
        <span class="text-gray-900 font-medium truncate max-w-[200px]">{{ $job->title }}</span>
      </nav>

      @can('update', $job)
      <div class="flex items-center gap-3 bg-white p-1.5 rounded-2xl shadow-sm border border-gray-100">
        <a href="{{ route('jobs.edit', $job->id) }}"
          class="px-5 py-2.5 text-gray-700 rounded-xl font-bold text-sm hover:bg-gray-50 transition"
          title="Edit Job">
          Edit
        </a>
        <form method="POST" action="{{ route('jobs.destroy', $job->id) }}" onsubmit="return confirm('Are you sure?')" title="Delete Job">
          @csrf @method('DELETE')
          <button type="submit" class="px-5 py-2.5 bg-red-500 text-white rounded-xl font-bold text-sm hover:bg-red-600 transition shadow-md shadow-red-100">
            Delete
          </button>
        </form>
      </div>
      @endcan
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

      {{-- Main Content (Left) --}}
      <main class="lg:col-span-8 space-y-10">

        {{-- Job Header Card --}}
        <section class="bg-white rounded-3xl border border-gray-100 p-8 md:p-12 shadow-sm relative overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-bl-full opacity-50 -mr-10 -mt-10 hidden sm:block"></div>

          <div class="relative">
            <div class="flex flex-wrap items-center gap-2 mb-6">
              <span class="px-4 py-1.5 rounded-full bg-indigo-600 text-white text-[10px] font-black uppercase tracking-widest">
                {{ $job->job_type }}
              </span>
              @if($job->remote)
              <span class="px-4 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase tracking-widest flex items-center gap-1">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> Remote
              </span>
              @endif
            </div>

            <h1 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight mb-6">
              {{ $job->title }}
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-8 border-y border-gray-100 mb-10">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </div>
                <div>
                  <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Salary (Monthly)</p>
                  <p class="text-xl font-bold text-gray-900">{{ number_format($job->salary) ?? 'Negotiable' }} <span class="text-sm font-medium text-gray-500">MMK</span></p>
                </div>
              </div>
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  </svg>
                </div>
                <div>
                  <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Location</p>
                  <p class="text-xl font-bold text-gray-900">{{ $job->city }}, {{ $job->state }}</p>
                </div>
              </div>
            </div>

            <article class="prose prose-slate max-w-none prose-h3:text-xl prose-h3:font-bold prose-p:text-gray-600 prose-p:leading-relaxed">
              <h3>Job Description</h3>
              <p>{{ $job->description }}</p>

              @if($job->requirements)
              <h3 x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-2 font-bold text-gray-900 hover:text-indigo-600 transition mt-3">
                  Requirements
                  <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-600 whitespace-pre-line">{{ $job->requirements }}</div>
              </h3>
              @endif

              @if($job->benefits)
              <h3 x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-2 font-bold text-gray-900 hover:text-indigo-600 transition mt-3">
                  What's in it for you?
                  <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-600 whitespace-pre-line">{{ $job->benefits }}</div>
              </h3>
              @endif
            </article>

            @if($job->tags)
            <div class="mt-12 pt-8 border-t border-gray-50 flex flex-wrap gap-2">
              @foreach(explode(',', $job->tags) as $tag)
              <a href="{{ route('jobs.index', ['tag' => trim($tag)]) }}" class="px-4 py-2 bg-gray-100 text-gray-700 text-xs font-bold rounded-xl hover:bg-gray-200 transition cursor-pointer">
                #{{ trim($tag) }}
              </a>
              @endforeach
            </div>
            @endif
          </div>
        </section>

        {{-- Application Section --}}
        <section class="bg-blue-600 rounded-[3.5rem] p-10 md:p-14 text-white shadow-[0_30px_60px_-15px_rgba(37,99,235,0.4)] relative overflow-hidden">
          <div class="relative z-10">
            @auth
            @php $hasApplied = $job->applicants->contains('user_id', auth()->id()); @endphp

            <div class="max-w-xl">
              <h3 class="text-4xl font-black mb-4 tracking-tight">{{ $hasApplied ? "You're all set! ✨" : "Ready to join the team?" }}</h3>
              <p class="text-blue-100 text-lg font-medium mb-10 leading-relaxed">
                {{ $hasApplied ? "Your application is in the cloud! The hiring team at " . $job->company_name . " will review your profile shortly." : "We’re looking for someone with your exact skills. Submit your details and let's get started." }}
              </p>

              @if(!$hasApplied)
              <div x-data="{ open: false }">
                {{-- Primary Action Button --}}
                <button @click="open = true" class="group flex items-center gap-4 px-10 py-5 bg-white text-blue-600 rounded-full font-black uppercase tracking-widest text-xs hover:bg-blue-50 transition-all shadow-xl active:scale-95">
                  Apply for this role
                  <i class="fa-solid fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                </button>

                {{-- Application Modal --}}
                <div x-cloak x-show="open" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center p-6">
                  <div class="fixed inset-0 bg-blue-950/40 backdrop-blur-xl" @click="open = false"></div>

                  <div x-show="open" x-transition.scale.95 class="relative bg-white rounded-[3rem] shadow-2xl w-full max-w-xl p-10 md:p-14 overflow-hidden border border-blue-50 text-left">
                    <div class="absolute top-0 left-0 w-full h-3 bg-blue-500"></div>

                    <h2 class="text-3xl font-black text-blue-950 mb-2 tracking-tight">Application Form</h2>
                    <p class="text-blue-300 font-bold uppercase text-[10px] tracking-widest mb-10">Applying to {{ $job->company_name }}</p>

                    <form method="POST" action="{{ route('applicant.store', $job->id) }}" enctype="multipart/form-data" class="space-y-6">
                      @csrf

                      {{-- Using our custom baby-blue components --}}
                      <x-inputs.text id="full_name" name="full_name" label="Full Name" required icon="user" />

                      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-inputs.text id="contact_email" name="contact_email" label="Email Address" type="email" required icon="envelope" />
                        <x-inputs.text id="contact_phone" name="contact_phone" label="Phone Number" icon="phone" />
                      </div>

                      <x-inputs.text-area id="message" name="message" label="Why you?" rows="3" placeholder="A brief intro about yourself..." />

                      <x-inputs.file id="resume" name="resume" label="Upload CV (PDF)" required />

                      <div class="flex flex-col gap-4 pt-6">
                        <button type="submit" class="w-full bg-blue-500 text-white py-5 rounded-full font-black uppercase tracking-widest text-xs hover:bg-blue-600 transition shadow-xl shadow-blue-100">
                          Submit Application
                        </button>
                        <button type="button" @click="open = false" class="text-blue-300 font-black uppercase text-[10px] tracking-widest hover:text-blue-500 transition text-center">
                          Maybe later
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @else
              {{-- Success Badge --}}
              <div class="inline-flex items-center px-8 py-4 bg-white/20 backdrop-blur-md rounded-full text-white border border-white/30 font-black uppercase tracking-widest text-[11px]">
                <i class="fa-solid fa-circle-check mr-3 text-emerald-300 text-lg"></i>
                Application successfully tracked
              </div>
              @endif
              @else
              {{-- Guest View --}}
              <h3 class="text-3xl font-black mb-4 tracking-tight">Join TalentConnect</h3>
              <p class="text-blue-100 mb-10 font-medium text-lg leading-relaxed">Sign in to apply for this position and manage all your job applications in one place.</p>
              <a href="/login" class="inline-block px-12 py-5 bg-white text-blue-600 rounded-full font-black uppercase tracking-widest text-xs hover:bg-blue-50 transition shadow-xl active:scale-95">
                Login to Apply
              </a>
              @endauth
            </div>

            {{-- Background Decorative Elements --}}
            <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute top-0 right-0 w-40 h-40 bg-blue-400/30 rounded-full blur-2xl"></div>
        </section>
      </main>

      {{-- Sidebar (Right) --}}
      <aside class="lg:col-span-4 space-y-8">
        <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-sm top-8">
          <div class="flex flex-col items-center text-center mb-8">
            <div class="relative mb-6">
              <div class="absolute inset-0 bg-indigo-100 rounded-3xl rotate-6"></div>
              @if($job->company_logo)
              <img src="{{ asset('storage/' . $job->company_logo) }}" class="relative w-24 h-24 rounded-3xl border border-white bg-white shadow-sm object-contain p-3" alt="{{ $job->company_name }} Logo">
              @else
              <div class="relative w-24 h-24 rounded-3xl border border-white bg-indigo-600 flex items-center justify-center text-white text-3xl font-black">
                {{ substr($job->company_name, 0, 1) }}
              </div>
              @endif
            </div>
            <h2 class="text-2xl font-black text-gray-900 leading-tight">{{ $job->company_name }}</h2>
            <div class="flex items-center gap-1 mt-2">
              <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></span>
              <p class="text-sm text-gray-400 font-bold uppercase tracking-tighter">Verified Recruiter</p>
            </div>
          </div>

          <div class="space-y-4">
            @if($job->company_description)
            <div class="bg-gray-50 p-5 rounded-2xl">
              <p class="text-sm text-gray-600 leading-relaxed italic">"{{ $job->company_description }}"</p>
            </div>
            @endif

            @if($job->company_website)
            <a href="{{ $job->company_website }}" target="_blank" class="flex items-center justify-center gap-3 w-full py-4 bg-gray-900 text-white rounded-2xl text-sm font-bold hover:bg-gray-800 transition shadow-lg shadow-gray-200" title="Visit Company Website">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
              </svg>
              Company Website
            </a>
            @endif
          </div>

          <div class="mt-8 pt-8 border-t border-gray-100">
            @auth
            <form method="POST" action="{{ auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists() ? route('bookmarks.destroy', $job->id) : route('bookmarks.store', $job->id) }}">
              @csrf
              @php $isBookmarked = auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists(); @endphp
              @if($isBookmarked) @method('DELETE') @endif

              <button type="submit"
                class="w-full py-4 rounded-2xl font-bold flex items-center justify-center gap-2 transition {{ $isBookmarked ? 'bg-red-50 text-red-600' : 'text-gray-500 hover:bg-gray-50 border border-gray-100' }}"
                :title="{{ $isBookmarked ? 'Remove bookmark' : 'Save job for later' }}">
                <svg class="w-5 h-5" fill="{{ $isBookmarked ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                </svg>
                {{ $isBookmarked ? 'Saved' : 'Save for later' }}
              </button>
            </form>
            @else
            <div class="text-center py-4 bg-gray-50 rounded-2xl text-[10px] text-gray-400 font-black uppercase tracking-widest">
              Login to Save Job
            </div>
            @endauth
          </div>
        </div>

        {{-- Safety Tip --}}
        <div class="p-6 bg-orange-50 rounded-3xl border border-orange-100">
          <h4 class="text-orange-800 font-bold text-sm mb-2 flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            Safety Tip
          </h4>
          <p class="text-xs text-orange-700/80 leading-relaxed">Don't ever provide your bank account or credit card details when applying for jobs.</p>
        </div>
      </aside>

    </div>
  </div>
</x-layout>