<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Role Information</h2>
                    <a href="{{ route('roles.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium py-1 px-3 rounded">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-1">
                            <strong>Name:</strong>
                        </label>
                        <div class="text-gray-900 text-sm">
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="permissions" class="block text-gray-700 font-medium mb-1">
                            <strong>Permissions:</strong>
                        </label>
                        <div class="flex flex-wrap gap-2">
                            @if ($role->name == 'Super Admin')
                                <span class="bg-blue-500 text-white text-xs font-medium py-1 px-2 rounded">
                                    All
                                </span>
                            @else
                                @forelse ($rolePermissions as $permission)
                                    <span class="bg-blue-500 text-white text-xs font-medium py-1 px-2 rounded">
                                        {{ $permission->name }}
                                    </span>
                                @empty
                                    <span class="text-gray-500 text-sm">No Permissions Assigned</span>
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
