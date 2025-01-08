<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Add New User</h2>
                    <a href="{{ route('users.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf

                        <!-- Service Number -->
                        <div class="mb-4">
                            <label for="serviceno" class="block text-gray-700 font-medium mb-1">Service Number</label>
                            <input 
                                id="serviceno" 
                                type="text" 
                                name="serviceno" 
                                value="{{ old('serviceno') }}" 
                                placeholder="Service No" 
                                required 
                                autocomplete="serviceno" 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('serviceno') border-red-500 @enderror">
                            @if ($errors->has('serviceno'))
                                <span class="text-red-500 text-sm">{{ $errors->first('serviceno') }}</span>
                            @endif
                        </div>

                        <!-- Rank -->
                        <div class="mb-4">
                            <label for="rank" class="block text-gray-700 font-medium mb-1">Rank</label>
                            <input 
                                id="rank" 
                                type="text" 
                                name="rank" 
                                value="{{ old('rank') }}" 
                                placeholder="Rank" 
                                required 
                                autocomplete="rank" 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('rank') border-red-500 @enderror">
                            @if ($errors->has('rank'))
                                <span class="text-red-500 text-sm">{{ $errors->first('rank') }}</span>
                            @endif
                        </div>

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}" 
                                placeholder="Name" 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('name') border-red-500 @enderror">
                            @if ($errors->has('name'))
                                <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="Email Address" 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('email') border-red-500 @enderror">
                            @if ($errors->has('email'))
                                <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="Password" 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('password') border-red-500 @enderror">
                            @if ($errors->has('password'))
                                <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Confirm Password</label>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                placeholder="Confirm Password" 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none">
                        </div>

                        <!-- Roles -->
                        <div class="mb-4">
                            <label for="roles" class="block text-gray-700 font-medium mb-1">Roles</label>
                            <select 
                                id="roles" 
                                name="roles[]" 
                                multiple 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('roles') border-red-500 @enderror">
                                @forelse ($roles as $role)
                                    @if ($role != 'Super Admin')
                                        <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @elseif (Auth::user()->hasRole('Super Admin'))
                                        <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endif
                                @empty
                                    <option disabled>No roles available</option>
                                @endforelse
                            </select>
                            @if ($errors->has('roles'))
                                <span class="text-red-500 text-sm">{{ $errors->first('roles') }}</span>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 flex justify-center">
                            <button type="submit" class="add-new-btn">
                                Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
