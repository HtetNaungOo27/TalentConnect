<x-layout>
    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6">Edit User</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <x-inputs.text id="name" name="name" label="Full Name" value="{{ $user->name }}" />
            <x-inputs.text id="email" name="email" label="Email" type="email" value="{{ $user->email }}" />

            <x-inputs.select
                id="role"
                name="role"
                label="Role"
                :options="['user' => 'User', 'employer' => 'Employer', 'admin' => 'Admin']"
                :selected="old('role', $user->role ?? 'user')" />

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded font-bold hover:bg-blue-700 transition">
                Update User
            </button>
        </form>
    </div>
</x-layout>