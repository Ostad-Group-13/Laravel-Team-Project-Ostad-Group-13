<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between align-middle">

            <span class="">
                <h4 class=" bg-gray-200 px-3 py-2  border border-blue-600 rounded">Hello, {{ $user->name }}</h4>
            </span>

            <span class=" text-blue-600 py-3 px-2">Total Post ( {{ $userList->count() }} )</span>

            {{-- <div class="text-lg font-semibold border-b pb-4"></div> --}}
            {{-- <span class="text-gray-200 bg-blue-500 px-1 py-1 rounded"></span> --}}

           <span class="">
             <h2 class=" bg-gray-200 px-3 py-2 border border-blue-600 rounded">
                Manage User Post</h2>
           </span>

        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <tr class="bg-gray-100">
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-r">SL#</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">Title</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Short Description
                            </th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Category</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">User Name</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Image</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 border-2 border-blue-500">
                        @forelse ($userList as $user)
                            <tr class="">
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $user->title }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    {{ Str::limit($user->short_description, 40, ' ...') }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $user->category->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $user->user->name }} </td>
                                <td class="px-4 py-2 text-sm text-gray-700">

                                    <img @if ($user->image) src="{{ asset($user->image) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                        alt="" width="120" height="120">
                                </td>


                                <td class="px-4 py-2 text-sm text-gray-700 space-x-2">
                                    <a href="#" class="edit-btn" onclick="edit(event)">Edit</a>
                                    <form action="#" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-btn inline-flex items-center gap-2"
                                            onclick="DeleteConfirm(event)">
                                            Delete</button>

                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-sm text-red-500">
                                    <strong>Sorry No Post Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{-- {{ $categories->links() }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
