<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 p-4 flex justify-between items-center">
                    <h1 class="text-lg font-semibold">Edit User</h1>
                    <a href="{{ route('users.index') }}" class="back-btn">← Back</a>
                </div>
                <div class="p-4">
                    <form action="{{ route('users.update', $user->id) }}" method="post" class="space-y-4">
                        @csrf
                        @method("PUT")
    
                        <div>
                            <label for="name" class="block font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" 
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div>
                            <label for="email" class="block font-medium text-gray-700">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" 
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm @error('email') border-red-500 @enderror">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div>
                            <label for="password" class="block font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" 
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm @error('password') border-red-500 @enderror">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div>
                            <label for="password_confirmation" class="block font-medium text-gray-700">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        </div>
    
                        <div>
                            <label for="roles" class="block font-medium text-gray-700">Roles</label>
                            <select id="roles" name="roles[]" multiple 
                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                @foreach ($roles as $role)
                                    @if ($role != 'Super Admin' || Auth::user()->hasRole('Super Admin'))
                                        <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="flex justify-center">
                            <button type="submit" class="edit-btn">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
    