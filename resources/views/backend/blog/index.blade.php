<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between align-items-center">
            <h2 class="py-2 font-semibold pb-4 text-lg">Manage Blog</h2>
            @can('create-user')
                <a href="{{ route('blog.create') }}" class="add-new-btn inline-flex items-center gap-2 my-2">
                    <i class="bi bi-plus-circle"></i> Create Blog
                </a>
            @endcan
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <tr class="bg-gray-100">
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-r">SL#</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">Title</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">Category</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">User/Author</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Short Description</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Image</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($blogs as $item)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $item->title }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <span class="text-gray-200 bg-blue-500 px-1 py-1 rounded">{{ isset($item->category->name)?$item->category->name:'N/A' }}</span>

                                </td>
                                 <td class="px-4 py-2 text-sm text-gray-700">

                                    <span class="text-gray-200 bg-green-500 px-1 py-1 rounded">
                                        <a href="{{ route('User-Post',$item->user_id) }}">{{ isset($item->user->name)?$item->user->name:'N/A' }}</a>
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $item->short_description }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img @if ($item->image) src="{{ asset($item->image) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                        alt="" width="120" height="120">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700 space-x-2 flex align-item-center">
                                    <a href="{{ route('blog.show', $item->slug) }}" class="show-btn">Show</a>
                                    <a href="{{ route('blog.edit', $item) }}" class="edit-btn">Edit</a>
                                    <form action="{{ route('blog.destroy', $item) }}" method="post"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-btn inline-flex items-center gap-2 " onclick="DeleteConfirm(event)">
                                            Delete</button>

                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-red-500">
                                    <strong>No Blog Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
