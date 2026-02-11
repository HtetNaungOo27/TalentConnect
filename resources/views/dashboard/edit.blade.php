<x-layout>
    <section class="max-w-4xl mx-auto px-4 py-12">

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            {{-- Header with Gradient Background --}}
            <div class="bg-gradient-to-r from-indigo-700 to-blue-600 px-8 py-10 text-center">
                <h3 class="text-3xl font-extrabold text-white tracking-tight">Edit Your Profile</h3>
                <p class="text-indigo-100 mt-2">Keep your professional information up to date</p>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-8 space-y-8">
                @csrf
                @method('PUT')

                {{-- Avatar Section --}}
                <div class="flex flex-col items-center pb-8 border-b border-gray-100">
                    <div class="relative group">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                                class="w-32 h-32 object-cover rounded-full ring-4 ring-indigo-50 shadow-lg">
                        @else
                            <div class="w-32 h-32 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-400 shadow-inner">
                                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="mt-4 w-full max-w-xs">
                        <x-inputs.file id="avatar" name="avatar" label="Change Profile Photo" />
                    </div>
                </div>

                {{-- Basic Information --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-inputs.text id="name" name="name" label="Full Name" value="{{ old('name', $user->name) }}" />
                    <x-inputs.text id="email" name="email" label="Email Address" type="email" value="{{ old('email', $user->email) }}" />
                </div>

                <x-inputs.text id="skills" name="skills" label="Skills (Comma separated)" 
                    value="{{ old('skills', $user->skills->pluck('name')->implode(', ')) }}" 
                    placeholder="e.g. PHP, JavaScript, Laravel" />

                {{-- Dynamic Experiences Section --}}
                <div x-data="experienceManager({{ $user->experiences->count() ? $user->experiences->toJson() : '[]' }})" class="space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                        <h4 class="text-xl font-bold text-gray-800">Work Experience</h4>
                        <button type="button" @click="add" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Add Experience
                        </button>
                    </div>

                    <div class="grid gap-4">
                        <template x-for="(exp, index) in experiences" :key="index">
                            <div class="relative bg-gray-50 border border-gray-200 p-5 rounded-xl transition-all hover:border-indigo-300 group">
                                <button type="button" @click="remove(index)" 
                                    class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition-colors">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </button>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <input type="hidden" :name="`experiences[${index}][id]`" x-model="exp.id">
                                    
                                    <div class="space-y-1">
                                        <label class="text-xs font-bold uppercase text-gray-500 tracking-wider">Title</label>
                                        <input type="text" :name="`experiences[${index}][title]`" x-model="exp.title" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500" required>
                                    </div>

                                    <div class="space-y-1">
                                        <label class="text-xs font-bold uppercase text-gray-500 tracking-wider">Company</label>
                                        <input type="text" :name="`experiences[${index}][company]`" x-model="exp.company" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500" required>
                                    </div>

                                    <div class="space-y-1">
                                        <label class="text-xs font-bold uppercase text-gray-500 tracking-wider">Start Date</label>
                                        <input type="month" :name="`experiences[${index}][start_date]`" x-model="exp.start_date" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500" required>
                                    </div>

                                    <div class="space-y-1">
                                        <label class="text-xs font-bold uppercase text-gray-500 tracking-wider">End Date (Leave blank if current)</label>
                                        <input type="month" :name="`experiences[${index}][end_date]`" x-model="exp.end_date" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100">
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-200 transition-all active:scale-[0.98]">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Alpine Script --}}
    <script>
        function experienceManager(initialData) {
            return {
                experiences: initialData,
                add() {
                    this.experiences.push({ id: null, title: '', company: '', start_date: '', end_date: '' });
                },
                remove(index) {
                    this.experiences.splice(index, 1);
                }
            }
        }
    </script>
</x-layout>