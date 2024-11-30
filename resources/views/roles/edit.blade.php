<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Edit Role</h2>
                    <a href="{{ route('roles.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium py-1 px-3 rounded">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ $role->name }}" 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('name') border-red-500 @enderror">
                            @if ($errors->has('name'))
                                <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <!-- Permissions Field -->
                        <div class="mb-4">
                            <label for="permissions" class="block text-gray-700 font-medium mb-1">Permissions</label>
                            <select 
                                id="permissions" 
                                name="permissions[]" 
                                multiple 
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('permissions') border-red-500 @enderror"
                                style="height: 210px;">
                                @forelse ($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions ?? []) ? 'selected' : '' }}>
                                        {{ $permission->name }}
                                    </option>
                                @empty
                                    <option disabled>No permissions available</option>
                                @endforelse
                            </select>
                            @if ($errors->has('permissions'))
                                <span class="text-red-500 text-sm">{{ $errors->first('permissions') }}</span>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 flex justify-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded">
                                Update Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
