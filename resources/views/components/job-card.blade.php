@props(['job', 'expired' => false])

<div class="group relative flex flex-col rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
    
    {{-- Status Badge & Date --}}
    <div class="flex justify-between items-start mb-4">
        <div>
            @if($expired)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>
                    Expired
                </span>
            @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                    Active
                </span>
            @endif
        </div>
        <span class="text-[11px] uppercase tracking-wider font-bold text-gray-400">
            Expires: {{ $job->created_at->addMonths(3)->format('M d') }}
        </span>
    </div>

    {{-- Header Section --}}
    <div class="flex gap-4">
        @if($job->company_logo)
            <div class="flex-shrink-0">
                <img
                    src="/storage/{{ $job->company_logo }}"
                    alt="{{ $job->company_name }}"
                    class="w-12 h-12 object-contain rounded-xl border border-gray-50 p-1 shadow-sm"
                />
            </div>
        @endif

        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-bold text-gray-900 truncate group-hover:text-indigo-600 transition-colors">
                {{ $job->title }}
            </h2>
            <p class="text-sm font-medium text-indigo-500">
                {{ $job->company_name }} <span class="text-gray-300 mx-1">•</span> {{ $job->job_type }}
            </p>
        </div>
    </div>

    {{-- Description --}}
    <p class="mt-4 text-sm text-gray-600 line-clamp-2 leading-relaxed">
        {{ $job->description }}
    </p>

    {{-- Metadata Grid --}}
    <div class="mt-5 grid grid-cols-2 gap-y-3 border-t border-gray-50 pt-5">
        <div class="flex items-center text-sm text-gray-600">
            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-semibold">{{ number_format($job->salary) }}</span> <span class="ml-1 text-xs text-gray-400">MMK</span>
        </div>

        <div class="flex items-center text-sm text-gray-600">
            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            {{ $job->city }}
        </div>

        <div class="flex items-center text-sm text-gray-600 col-span-2">
            @if($job->remote)
                <span class="flex items-center text-emerald-600 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    Remote Available
                </span>
            @else
                <span class="flex items-center text-blue-600 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    On-site Role
                </span>
            @endif
        </div>
    </div>

    {{-- Tags --}}
    @if($job->tags)
        <div class="mt-4 flex flex-wrap gap-1.5">
            @foreach(explode(',', $job->tags) as $tag)
                <span class="text-[10px] uppercase font-bold px-2 py-0.5 rounded bg-gray-50 text-gray-500 border border-gray-100">
                    {{ trim($tag) }}
                </span>
            @endforeach
        </div>
    @endif

    {{-- Action --}}
    <div class="mt-auto pt-6">
        <a
            href="{{ route('jobs.show', $job->id) }}"
            class="inline-flex items-center justify-center w-full rounded-xl px-4 py-3 text-sm font-bold transition-all
                   {{ $expired
                        ? 'bg-gray-100 text-gray-400 cursor-not-allowed'
                        : 'bg-indigo-600 text-white hover:bg-indigo-700 shadow-sm hover:shadow-indigo-200'
                   }}"
        >
            {{ $expired ? 'Position Closed' : 'View Opportunity' }}
            @if(!$expired)
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            @endif
        </a>
    </div>
</div>