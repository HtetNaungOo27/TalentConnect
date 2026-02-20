<x-layout>
    <x-slot name="title">Post a New Job</x-slot>

    <section class="max-w-4xl mx-auto mt-10 mb-20 px-4">
        {{-- Card Container --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            
            {{-- Form Header --}}
            <div class="bg-gradient-to-r from-green-600 to-teal-500 p-8 text-center">
                <h1 class="text-3xl font-extrabold text-white">Create Job Listing</h1>
                <p class="text-green-50 mt-2">Fill in the details below to reach your next great hire.</p>
            </div>

            <form method="POST" action="{{ route('jobs.store') }}" enctype="multipart/form-data" class="p-8 space-y-10">
                @csrf

                {{-- Section 1: Job Core Details --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-2 pb-2 border-b border-gray-100">
                        <div class="p-2 bg-green-100 text-green-600 rounded-lg">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Job Essentials</h2>
                    </div>

                    <x-inputs.text id="title" name="title" label="Job Title" placeholder="e.g. Senior Laravel Developer" value="{{ old('title') }}" />

                    <x-inputs.text-area id="description" name="description" label="Job Description" value="{{ old('description') }}" rows="5" />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-inputs.text id="salary" name="salary" label="Annual Salary (USD)" type="number" placeholder="90000" value="{{ old('salary') }}" />
                        <x-inputs.select id="job_type" name="job_type" label="Employment Type"
                            :options="['Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time', 'Contract' => 'Contract', 'Internship' => 'Internship', 'Remote' => 'Remote']" 
                            value="{{ old('job_type') }}" />
                        <x-inputs.text id="openings" name="openings" label="Number of openings" type="number" value="{{ old('openings', 1) }}" min="1" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-inputs.select id="remote" name="remote" label="Can this be done remotely?" :options="[0 => 'No, On-site', 1 => 'Yes, Remote']" value="{{ old('remote') }}" />
                        <x-inputs.text id="tags" name="tags" label="Tags" placeholder="PHP, Laravel, Vue" value="{{ old('tags') }}" />
                    </div>
                </div>

                {{-- Section 2: Requirements & Benefits --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-inputs.text-area id="requirements" name="requirements" label="Key Requirements" value="{{ old('requirements') }}" />
                    <x-inputs.text-area id="benefits" name="benefits" label="Perks & Benefits" value="{{ old('benefits') }}" />
                </div>

                {{-- Section 3: Location --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-map-marker-alt text-red-500"></i> Location Details
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 bg-gray-50 p-4 rounded-xl">
                        <div class="lg:col-span-2">
                            <x-inputs.text id="address" name="address" label="Address" value="{{ old('address') }}" />
                        </div>
                        <x-inputs.text id="city" name="city" label="City" value="{{ old('city') }}" />
                        <x-inputs.text id="state" name="state" label="State/Province" value="{{ old('state') }}" />
                    </div>
                </div>

                {{-- Section 4: Company Profile --}}
                <div class="space-y-6 pt-6 border-t border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <i class="fa fa-building text-blue-500"></i> Company Profile
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-inputs.text id="company_name" name="company_name" label="Company Name" value="{{ old('company_name') }}" />
                        <x-inputs.text id="company_website" name="company_website" label="Website URL" placeholder="https://..." value="{{ old('company_website') }}" />
                    </div>

                    <x-inputs.text-area id="company_description" name="company_description" label="About the Company" value="{{ old('company_description') }}" />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                        <x-inputs.file id="company_logo" name="company_logo" label="Company Logo (PNG, JPG)" />
                        <div class="space-y-4">
                            <x-inputs.text id="contact_email" name="contact_email" label="Application Email" value="{{ old('contact_email') }}" />
                        </div>
                    </div>
                </div>

                {{-- Submission --}}
                <div class="pt-8">
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-3 bg-green-600 hover:bg-green-700 text-white font-bold px-8 py-4 rounded-xl shadow-lg shadow-green-200 transition-all active:scale-[0.98]">
                        <i class="fa fa-paper-plane"></i> 
                        Publish Job Listing
                    </button>
                    <p class="text-center text-xs text-gray-400 mt-4">By clicking publish, you agree to our terms of service and employer guidelines.</p>
                </div>

            </form>
        </div>
    </section>
</x-layout>