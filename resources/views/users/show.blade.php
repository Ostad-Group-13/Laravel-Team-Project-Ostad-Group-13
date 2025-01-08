<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow-md rounded-lg">
                <div class="px-6 py-4 border-b border-gray-300 flex justify-between items-center">
                    <h2 class="text-lg font-semibold">User Information</h2>
                    <a href="{{ route('users.index') }}" class="back-btn inline-flex items-center gap-2">
                        &larr; Back
                    </a>
                </div>
                <div class="px-6 py-4">
    
                    <div class="mb-4 flex items-center">
                        <label for="name" class="w-1/3 text-sm font-medium text-gray-600"><strong>Name:</strong></label>
                        <div class="w-2/3 text-sm text-gray-800">
                            {{ $user->name }}
                        </div>
                    </div>
    
                    <div class="mb-4 flex items-center">
                        <label for="email" class="w-1/3 text-sm font-medium text-gray-600"><strong>Email Address:</strong></label>
                        <div class="w-2/3 text-sm text-gray-800">
                            {{ $user->email }}
                        </div>
                    </div>
    
                    <div class="mb-4 flex items-center">
                        <label for="roles" class="w-1/3 text-sm font-medium text-gray-600"><strong>Roles:</strong></label>
                        <div class="w-2/3 flex flex-wrap gap-2">
                            @forelse ($user->getRoleNames() as $role)
                                <span class="bg-blue-500 text-white text-xs font-medium px-2 py-1 rounded">{{ $role }}</span>
                            @empty
                                <span class="text-sm text-gray-500">No roles assigned</span>
                            @endforelse
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
    