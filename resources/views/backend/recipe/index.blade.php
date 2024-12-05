<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between align-items-center">


            <h2 class="py-2 font-semibold pb-4 text-lg">Manage Recipe</h2>
            @can('create-user')
                <a href="{{ route('recipe.create') }}" class="add-new-btn inline-flex items-center gap-2 my-2">
                    <x-add-icon /> Create Recipe
                </a>
            @endcan
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <tr class="bg-gray-100">
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-r">SL#</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">Recipe</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">image</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Category</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">User</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($recipes as $recipe)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $recipe->title }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img @if ($recipe->image) src="{{ asset($recipe->image) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                        width="80" height="40">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <span class="text-white px-2 py-1 bg-gray-400 rounded">{{ $recipe->category->name }}</span>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <span class="text-white px-2 py-1 bg-blue-500 rounded">{{ $recipe->user->name }}</span>
                                </td>

                                <td class="px-4 py-2 text-sm text-gray-700 space-x-2">
                                    <a href="{{ route('recipe.show', $recipe) }}" class="show-btn">Show</a>
                                         <a href="{{ route('recipe.edit', $recipe) }}" class="edit-btn"
                                        onclick="edit(event)">
                                       Edit
                                    </a>
                                    <form action="{{ route('recipe.destroy', $recipe) }}" method="post"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-btn"
                                            onclick="DeleteConfirm(event)">
                                           Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-red-500">
                                    <strong>No Recipe Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{-- {{ $recipes->links() }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
