<x-app-layout>
    <div class="bg-white shadow rounded-lg p-4">
        <div class="text-xl font-semibold mb-4">Manage Roles</div>
        <div class="space-y-4">
            @can('create-role')
                <a href="{{ route('roles.create') }}" class="add-new-btn">
                    <i class="bi bi-plus-circle"></i> Add New Role
                </a>
            @endcan
            <table class="w-full table-auto border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">S#</th>
                        <th class="border px-4 py-2 text-left">Name</th>
                        <th class="border px-4 py-2 text-left">Permissions</th>
                        <th class="border px-4 py-2 text-left" style="width: 250px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $role->name }}</td>
                            <td class="border px-4 py-2">
                                @forelse ($role->permissions as $permission)
                                    <span class="bg-blue-500 text-white text-xs font-medium py-1 px-2 rounded inline-block">{{ $permission->name }}</span>
                                @empty
                                    @if ($role->name == 'Super Admin')
                                        <span class="bg-blue-500 text-white text-xs font-medium py-1 px-2 rounded inline-block">All</span>
                                    @else
                                        <span class="bg-gray-500 text-white text-xs font-medium py-1 px-2 rounded inline-block">No Permissions</span>
                                    @endif
                                @endforelse
                            </td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('roles.show', $role->id) }}" class="show-btn">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    @if ($role->name != 'Super Admin')
                                        @can('edit-role')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="edit-btn">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        @endcan
                                        @can('delete-role')
                                            @if ($role->name != Auth::user()->hasRole($role->name))
                                                <button type="submit" class="delete-btn" onclick="return confirm('Do you want to delete this role?');">
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
                            <td colspan="4" class="border px-4 py-2 text-center text-red-500">
                                <strong>No Role Found!</strong>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $roles->links() }}
        </div>
    </div>
</x-app-layout>
