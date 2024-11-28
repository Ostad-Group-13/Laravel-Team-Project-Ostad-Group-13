<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between align-items-center">

            {{-- <div class="text-lg font-semibold border-b pb-4"></div> --}}
            <h2 class="py-2 font-semibold pb-4 text-lg">Manage Category</h2>
            @can('create-user')
                <a href="{{ route('category.create') }}" class="add-new-btn inline-flex items-center gap-2 my-2">
                    <i class="bi bi-plus-circle"></i> Add New Category
                </a>
            @endcan
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <tr class="bg-gray-100">
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-r">SL#</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">Name</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">image</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Status</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($categories as $category)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $category->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img @if ($category->image) ? src="{{ asset($category->image) }}" : src="default.jpg" @endif"
                                        alt="" width="120" height="120">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    @if ($category->status == 'active')
                                        <span class="text-green-600 font-bold text-8">{{ $category->status }}</span>
                                    @else
                                        <span class="text-red-600">{{ $category->status }}</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 text-sm text-gray-700 space-x-2">
                                    <a href="{{ route('category.edit', $category->id) }}" class="edit-btn">Edit</a>
                                    <form action="{{ route('category.destroy', $category) }}" method="post"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-btn inline-flex items-center gap-2 ">
                                            Delete</button>

                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-red-500">
                                    <strong>No Category Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
