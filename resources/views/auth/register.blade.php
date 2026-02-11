<x-layout>
    <x-slot name="title">Join TalentConnect</x-slot>

    <div class="flex items-center justify-center min-h-[80vh] px-4 py-12">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 w-full max-w-lg overflow-hidden">
            
            {{-- Header Accent --}}
            <div class="bg-indigo-600 h-2 w-full"></div>
            
            <div class="p-8 md:p-10">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900">Create Account</h2>
                    <p class="text-gray-500 mt-2">Join our community and start your journey</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                    @csrf
                    
                    {{-- Full Name --}}
                    <div>
                        <x-inputs.text 
                            id="name" 
                            name="name" 
                            label="Full Name"
                            placeholder="e.g. Alex Rivera" 
                            value="{{ old('name') }}"
                        />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email Address --}}
                    <div>
                        <x-inputs.text 
                            id="email" 
                            name="email" 
                            type="email" 
                            label="Email Address"
                            placeholder="alex@example.com" 
                            value="{{ old('email') }}"
                        />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Role / Account Type --}}
                    <div>
                        <x-inputs.select 
                            id="role" 
                            name="role" 
                            label="I am a..." 
                            :options="['user' => 'Job Seeker (Looking for work)', 'employer' => 'Employer (Looking to hire)']" 
                            :value="old('role')"
                        />
                        @error('role')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Passwords --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-inputs.text 
                                id="password" 
                                name="password" 
                                type="password" 
                                label="Password"
                                placeholder="••••••••" 
                            />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-inputs.text 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                type="password" 
                                label="Confirm"
                                placeholder="••••••••" 
                            />
                        </div>
                    </div>

                    {{-- Terms Agreement Placeholder --}}
                    <p class="text-xs text-gray-400 text-center px-4">
                        By clicking Register, you agree to our <a href="#" class="underline">Terms of Service</a> and <a href="#" class="underline">Privacy Policy</a>.
                    </p>

                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-4 py-4 rounded-2xl shadow-lg shadow-indigo-100 transition-all active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Create My Account
                    </button>

                    <p class="text-center text-sm text-gray-500 pt-2">
                        Already have an account?
                        <a class="font-bold text-indigo-600 hover:underline" href="{{ route('login') }}">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>