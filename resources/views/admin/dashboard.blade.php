<x-layout>
    <div class="min-h-screen bg-slate-50/50 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Breadcrumbs & Stats --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <nav class="flex items-center space-x-2 text-sm" aria-label="Breadcrumb">
                <a href="/" class="text-gray-400 hover:text-indigo-600 transition">Admin</a>
                <span class="text-gray-300">/</span>
                <span class="text-slate-900 font-bold tracking-tight">Dashboard</span>
            </nav>

            <div class="flex items-center gap-4">
                <div class="px-6 py-3 bg-white border border-slate-200 rounded-2xl shadow-sm text-center min-w-[100px]">
                    <p class="text-[10px] font-black text-indigo-500 uppercase tracking-widest">Users</p>
                    <p class="text-2xl font-black text-slate-900">{{ $users->count() ?? 0 }}</p>
                </div>
                <div class="px-6 py-3 bg-white border border-slate-200 rounded-2xl shadow-sm text-center min-w-[100px]">
                    <p class="text-[10px] font-black text-emerald-500 uppercase tracking-widest">Jobs</p>
                    <p class="text-2xl font-black text-emerald-600">{{ $totalJobs }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- {{-- Main Content (Users) --}}
            <main class="lg:col-span-8 space-y-6">
                <section class="bg-white rounded-[2rem] border border-slate-200/60 p-6 md:p-8 shadow-sm">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                            <span class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
                                <i class="fa-solid fa-users text-sm"></i>
                            </span>
                            User Directory
                        </h3>
                        <span class="text-xs font-bold text-slate-400">Manage your community</span>
                    </div>

                    <div class="grid gap-4">
                        @foreach($users as $user)
                        <div class="group flex flex-wrap md:flex-nowrap items-center justify-between p-5 bg-slate-50/50 border border-slate-100 rounded-2xl hover:bg-white hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-300">
                            <div class="flex items-center gap-5">
                                <div class="w-12 h-12 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-indigo-600 text-lg font-black group-hover:scale-110 transition-transform">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <a href="{{ route('employers.show', $user->id) }}" class="block font-black text-slate-900 text-lg leading-none hover:text-indigo-600 transition-colors">
                                        {{ $user->name }}
                                    </a>
                                    <p class="text-slate-400 text-sm font-medium mt-1">{{ $user->email }}</p>
                                    <div class="mt-2 flex items-center gap-3">
                                        <span class="px-2.5 py-1 rounded-lg bg-indigo-100/50 text-indigo-600 text-[9px] font-black uppercase tracking-wider">
                                            {{ $user->role }}
                                        </span>
                                        <span class="text-[9px] font-bold text-slate-300 uppercase">ID: #{{ $user->id }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 mt-4 md:mt-0">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition shadow-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Delete user?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-3 text-slate-300 hover:text-rose-500 transition-colors">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </main> -->

            <!-- {{-- Sidebar (Jobs Overview) --}}
            <aside class="lg:col-span-4 space-y-6">
                <div class="bg-indigo-900 rounded-[2rem] p-8 shadow-xl shadow-indigo-900/20 text-white mb-6">
                    <h3 class="text-lg font-black tracking-tight mb-2">Platform Pulse</h3>
                    <p class="text-indigo-300 text-xs font-medium leading-relaxed">You have {{ $jobs->count() }} active listings currently being promoted.</p>
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-200/60 p-6 shadow-sm">
                    <h3 class="text-lg font-black text-slate-900 mb-6 tracking-tight">Active Listings</h3>
                    <div class="space-y-3">
                        @foreach($jobs as $job)
                        <div class="group p-5 rounded-3xl border border-slate-100 bg-slate-50/30 hover:bg-white hover:border-rose-100 transition-all duration-300">
                            {{-- Job Info --}}
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h4 class="font-black text-slate-900 text-sm leading-tight group-hover:text-rose-600 transition-colors">
                                        <a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                                    </h4>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $job->company_name }}</p>
                                </div>
                                <span class="text-[9px] font-black text-emerald-600 bg-emerald-50 px-2 py-1 rounded-md ml-2 shrink-0">
                                    {{ $job->job_type }}
                                </span>
                            </div>

                            {{-- Rejection Form --}}
                            <div class="mt-4 pt-4 border-t border-slate-100">
                                <form action="{{ route('admin.jobs.reject', $job->id) }}" method="POST" class="relative" onsubmit="return confirm('Reject this job?')">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex items-center gap-2">
                                        <input
                                            type="text"
                                            name="reason"
                                            placeholder="Reason for rejection..."
                                            required
                                            class="w-full pl-3 pr-10 py-2 bg-white border border-slate-200 rounded-xl text-[11px] focus:ring-2 focus:ring-rose-500/20 focus:border-rose-400 outline-none transition-all placeholder:text-slate-300">
                                        <button
                                            type="submit"
                                            title="Confirm Rejection"
                                            class="absolute right-1 top-1 bottom-1 px-3 bg-slate-900 hover:bg-rose-600 text-white rounded-lg transition-colors group/btn">
                                            <i class="fa-solid fa-xmark text-[10px]"></i>
                                        </button>
                                    </div>
                                </form>

                                {{-- Show rejection reason if exists --}}
                                @if($job->status === 'rejected' && $job->rejection_reason)
                                    <p class="text-red-600 text-[11px] italic mt-2">Rejected: {{ $job->rejection_reason }}</p>
                                @endif

                                <div class="flex justify-between items-center mt-3">
                                    <span class="text-[9px] font-bold text-slate-300 uppercase italic">Posted by {{ $job->user->name }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside> -->

            {{-- Main Content (Users) --}}
            <main class="lg:col-span-8 space-y-6">
                <section class="bg-white rounded-[2rem] border border-slate-200/60 p-6 md:p-8 shadow-sm">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                            <span class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
                                <i class="fa-solid fa-users text-sm"></i>
                            </span>
                            User Directory
                        </h3>
                        <span class="text-xs font-bold text-slate-400">Manage your community</span>
                    </div>

                    {{-- Scrollable container, fixed height --}}
                    <div class="grid gap-4 max-h-[500px] overflow-y-auto">
                        @foreach($users as $user)
                        <div class="group flex flex-wrap md:flex-nowrap items-center justify-between p-5 bg-slate-50/50 border border-slate-100 rounded-2xl hover:bg-white hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-300">
                            <div class="flex items-center gap-5">
                                <div class="w-12 h-12 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-indigo-600 text-lg font-black group-hover:scale-110 transition-transform">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <a href="{{ route('employers.show', $user->id) }}" class="block font-black text-slate-900 text-lg leading-none hover:text-indigo-600 transition-colors">
                                        {{ $user->name }}
                                    </a>
                                    <p class="text-slate-400 text-sm font-medium mt-1">{{ $user->email }}</p>
                                    <div class="mt-2 flex items-center gap-3">
                                        <span class="px-2.5 py-1 rounded-lg bg-indigo-100/50 text-indigo-600 text-[9px] font-black uppercase tracking-wider">
                                            {{ $user->role }}
                                        </span>
                                        <span class="text-[9px] font-bold text-slate-300 uppercase">ID: #{{ $user->id }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 mt-4 md:mt-0">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition shadow-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Delete user?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-3 text-slate-300 hover:text-rose-500 transition-colors">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </main>

            {{-- Sidebar (Jobs Overview) --}}
            <aside class="lg:col-span-4 space-y-6">


                <div class="bg-white rounded-[2rem] border border-slate-200/60 p-6 shadow-sm max-h-[600px] overflow-y-auto">
                    <h3 class="text-lg font-black text-slate-900 mb-6 tracking-tight">All Job Listings</h3>

                    <div class="space-y-3">
                        @foreach($jobs as $job)
                        <div class="group p-5 rounded-3xl border border-slate-100 bg-slate-50/30 hover:bg-white hover:border-rose-100 transition-all duration-300">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h4 class="font-black text-slate-900 text-sm leading-tight group-hover:text-rose-600 transition-colors">
                                        <a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                                    </h4>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $job->company_name }}</p>
                                </div>
                                <span class="text-[9px] font-black text-emerald-600 bg-emerald-50 px-2 py-1 rounded-md ml-2 shrink-0">
                                    {{ $job->job_type }}
                                </span>
                            </div>

                            @if($job->status === 'rejected' && $job->rejection_reason)
                            <p class="text-red-600 text-[11px] italic mt-2">Rejected: {{ $job->rejection_reason }}</p>
                            @endif

                            <div class="flex justify-between items-center mt-3">
                                <span class="text-[9px] font-bold text-slate-300 uppercase italic">Posted by {{ $job->user->name }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </aside>

        </div>
    </div>
</x-layout>