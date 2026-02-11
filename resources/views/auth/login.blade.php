<x-layout>
    <x-slot name="title">Login to TalentConnect</x-slot>

    <div class="flex items-center justify-center min-h-[70vh] px-4">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 w-full max-w-md overflow-hidden">
            
            {{-- Header with a subtle accent --}}
            <div class="bg-indigo-600 h-2 w-full"></div>
            
            <div class="p-8 md:p-10">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-extrabold text-gray-900">Welcome Back</h2>
                    <p class="text-gray-500 mt-2">Log in to manage your jobs and applications</p>
                </div>

                <form method="POST" action="{{ route('login.authenticate') }}" class="space-y-6">
                    @csrf
                    
                    {{-- Email Field --}}
                    <div>
                        <x-inputs.text 
                            id="email" 
                            name="email" 
                            type="email" 
                            label="Email Address"
                            placeholder="name@company.com" 
                            value="{{ old('email') }}"
                        />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password Field --}}
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <a href="#" class="text-xs font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                        <x-inputs.text 
                            id="password" 
                            name="password" 
                            type="password" 
                            placeholder="••••••••" 
                        />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-600">
                            Remember me on this device
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-4 py-3 rounded-xl shadow-lg shadow-indigo-100 transition-all active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Sign In
                    </button>

                    <p class="text-center text-sm text-gray-500 pt-4">
                        Don't have an account?
                        <a class="font-bold text-indigo-600 hover:underline" href="{{ route('register') }}">Create an account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>