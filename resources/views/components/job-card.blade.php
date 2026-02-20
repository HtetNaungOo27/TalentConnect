@props(['job', 'expired' => false])

<div class="group relative flex flex-col rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1 {{ $expired ? 'opacity-75 grayscale-[0.5]' : '' }}">

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

            <span class="text-xs text-indigo-600 font-bold ml-2">
                {{ $job->openingsLeft() }} {{ Str::plural('opening', $job->openingsLeft()) }} left
            </span>
        </div>
        <span class="text-[11px] uppercase tracking-wider font-bold text-gray-400">
            Ends: {{ $job->created_at->addMonths(3)->format('M d') }}
        </span>
    </div>

    {{-- Header Section --}}
    <div class="flex gap-4">
        @if($job->company_logo)
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company_name }}" class="w-12 h-12 object-contain rounded-xl border border-gray-50 p-1 shadow-sm" />
        </div>
        @else
        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400">
            <i class="fa fa-building"></i>
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

    <p class="mt-4 text-sm text-gray-600 line-clamp-2 leading-relaxed">
        {{ $job->description }}
    </p>

    {{-- Metadata Grid --}}
    <div class="mt-5 grid grid-cols-2 gap-y-3 border-t border-gray-50 pt-5">
        <div class="flex items-center text-sm text-gray-600">
            <i class="fa fa-money-bill-wave mr-2 text-gray-400"></i>
            <span class="font-semibold">{{ number_format($job->salary) }}</span> <span class="ml-1 text-xs text-gray-400">MMK</span>
        </div>

        <div class="flex items-center text-sm text-gray-600">
            <i class="fa fa-map-marker-alt mr-2 text-gray-400"></i>
            {{ $job->city }}
        </div>

        <div class="flex items-center text-sm col-span-2">
            @if($job->remote)
            <span class="flex items-center text-emerald-600 font-medium">
                <i class="fa fa-laptop-house mr-2"></i> Remote Available
            </span>
            @else
            <span class="flex items-center text-blue-600 font-medium">
                <i class="fa fa-building mr-2"></i> On-site Role
            </span>
            @endif
        </div>
    </div>

    {{-- Action --}}
    <div class="mt-auto pt-6">
        <a href="{{ route('jobs.show', $job->id) }}"
            class="inline-flex items-center justify-center w-full rounded-xl px-4 py-3 text-sm font-bold transition-all {{ $expired ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-indigo-600 text-white hover:bg-indigo-700 shadow-sm hover:shadow-indigo-200' }}">
            {{ $expired ? 'Position Closed' : 'View Opportunity' }}
            @if(!$expired) <i class="fa fa-arrow-right ml-2 text-xs"></i> @endif
        </a>
    </div>
</div>