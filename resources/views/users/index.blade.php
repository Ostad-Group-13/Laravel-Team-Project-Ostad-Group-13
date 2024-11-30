<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="text-lg font-semibold border-b pb-4">Manage Users</div>
        <div class="mt-4">
            @can('create-user')
                <a href="{{ route('users.create') }}" class="add-new-btn inline-flex items-center gap-2 my-2">
                    <i class="bi bi-plus-circle"></i> Add New User
                </a>
            @endcan
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 uppercase">S#</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 uppercase">Name</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 uppercase">Email</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 uppercase">Roles</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 uppercase">Total Post</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $user->email }}</td>

                                <td class="px-4 py-2 text-sm text-gray-700">
                                    @forelse ($user->getRoleNames() as $role)
                                        <span
                                            class="bg-blue-500 text-white text-xs font-medium px-2 py-1 rounded">{{ $role }}</span>
                                    @empty
                                        <span class="text-gray-500 text-sm">No Roles</span>
                                    @endforelse
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700 mt-3">
                                    <a href="{{ route('User-Post', $user->id) }}" class="px-2 py-3 hover:text-white  rounded border border-gray-200 bg-gray-200 hover:bg-blue-600 transition duration-300 edit-btn">Show Post (
                                        {{ $user->blogs->count() }} ) </a>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700 space-x-2">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="show-btn inline-flex items-center gap-2">
                                            <i class="bi bi-eye"></i> Show
                                        </a>
                                        @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []))
                                            @if (Auth::user()->hasRole('Super Admin'))
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="edit-btn inline-flex items-center gap-2">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                            @endif
                                            @if (Auth::user()->hasRole('Super Admin') && Auth::user()->id == $user->id)
                                                <button type="submit" class="delete-btn inline-flex items-center gap-2"
                                                    onclick="return confirm('Do you want to delete this user?');">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            @endif
                                        @else
                                            @can('edit-user')
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="edit-btn inline-flex items-center gap-2">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                            @endcan
                                            @can('delete-user')
                                                @if (Auth::user()->id != $user->id)
                                                    <button type="submit" class="delete-btn inline-flex items-center gap-2"
                                                        onclick="return confirm('Do you want to delete this user?');">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                @endif
                                            @endcan
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-red-500">
                                    <strong>No User Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
