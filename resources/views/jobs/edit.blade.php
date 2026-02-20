<x-layout>
    <x-slot name="title">Edit: {{ $job->title }}</x-slot>

    <section class="max-w-4xl mx-auto mt-10 mb-20 px-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">

            {{-- Header: Blue/Indigo to differentiate from the Green "Create" page --}}
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-center text-white">
                <h1 class="text-3xl font-extrabold italic">Updating Listing</h1>
                <p class="text-blue-100 mt-2">Modify the details for <strong>{{ $job->title }}</strong></p>
            </div>

            <form method="POST" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data" class="p-8 space-y-10">
                @csrf
                @method('PUT')

                {{-- Section 1: Job Core Details --}}
                <div class="space-y-6">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-2">
                        <h2 class="text-xl font-bold text-gray-800">Job Essentials</h2>
                        <span class="text-xs font-mono text-gray-400">ID: #{{ $job->id }}</span>
                    </div>

                    <x-inputs.text id="title" name="title" label="Job Title" :value="old('title', $job->title)" />

                    <x-inputs.text-area id="description" name="description" label="Detailed Description" :value="old('description', $job->description)" rows="6" />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-inputs.text id="salary" name="salary" label="Annual Salary" type="number" :value="old('salary', $job->salary)" />
                        <x-inputs.select id="job_type" name="job_type" label="Employment Type"
                            :options="['Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time', 'Contract' => 'Contract', 'Internship' => 'Internship']"
                            :value="old('job_type', $job->job_type)" />
                    </div>
                </div>

                {{-- Section 2: Requirements & Location --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-inputs.text-area id="requirements" name="requirements" label="Key Requirements" :value="old('requirements', $job->requirements)" />
                    <x-inputs.text-area id="benefits" name="benefits" label="Perks & Benefits" :value="old('benefits', $job->benefits)" />
                </div>
                <x-inputs.text id="tags" name="tags" label="Tags (comma separated)" :value="old('tags', $job->tags)" />
                <x-inputs.text id="address" name="address" label="Address" :value="old('address', $job->address)" />
                <x-inputs.text id="zipcode" name="zipcode" label="Zip Code" :value="old('zipcode', $job->zipcode)" />
                <x-inputs.text id="contact_email" name="contact_email" label="Email" :value="old('contact_email', $job->contact_email)" />
                <x-inputs.text id="contact_phone" name="contact_phone" label="Phone" :value="old('contact_phone', $job->contact_phone)" />
                <x-inputs.text-area id="company_description" name="company_description" label="Company Description" :value="old('company_description', $job->company_description)" />
                <x-inputs.text id="company_website" name="company_website" label="Company Website" :value="old('company_website', $job->company_website)" />


                <div class="bg-gray-50 p-6 rounded-2xl space-y-4">
                    <h3 class="font-bold text-gray-700">Location Settings</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <x-inputs.text id="city" name="city" label="City" :value="old('city', $job->city)" />
                        <x-inputs.text id="state" name="state" label="State" :value="old('state', $job->state)" />
                        <x-inputs.select id="remote" name="remote" label="Remote Friendly?" :options="[0 => 'No', 1 => 'Yes']" :value="old('remote', $job->remote)" />
                    </div>
                </div>

                {{-- Section 3: Company Profile & Logo Preview --}}
                <div class="space-y-6 pt-6 border-t border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800">Company Information</h2>

                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        {{-- Current Logo Preview --}}
                        <div class="w-full md:w-1/4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Logo</label>
                            <div class="h-32 w-32 bg-gray-100 rounded-xl flex items-center justify-center overflow-hidden border">
                                @if($job->company_logo)
                                <img src="{{ asset('storage/' . $job->company_logo) }}" class="h-full w-full object-cover">
                                @else
                                <i class="fa fa-building text-gray-300 text-3xl"></i>
                                @endif
                            </div>
                        </div>

                        <div class="flex-1 w-full space-y-4">
                            <x-inputs.text id="company_name" name="company_name" label="Company Name" :value="old('company_name', $job->company_name)" />
                            <x-inputs.file id="company_logo" name="company_logo" label="Upload New Logo (Optional)" />
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col md:flex-row gap-4 pt-8">
                    <button type="submit"
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg transition-transform active:scale-[0.98]">
                        Update Listing
                    </button>
                    <a href="{{ route('jobs.show', $job->id) }}"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-4 rounded-xl text-center transition">
                        Cancel Edits
                    </a>
                </div>
            </form>
        </div>
    </section>
</x-layout>