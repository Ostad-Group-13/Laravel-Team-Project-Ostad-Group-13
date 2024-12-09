<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe Slider') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between align-items-center">
            <h2 class="py-2 font-semibold pb-4 text-lg">Manage Slider</h2>
            @can('create-user')
                <a href="{{ route('recipe-slider.create') }}" class="add-new-btn inline-flex items-center gap-2 my-2">
                    <i class="bi bi-plus-circle"></i> Create  Slider
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
                        <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Description</th>
                        <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Image</th>
                        <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">User</th>
                        <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Recipe</th>
                        <th class="py-4 px-3 text-left text-xs font-medium  uppercase  border-l">Status</th>
                        <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($recipeSlider as $item)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ Str::limit($item->title,20,'...') }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ Str::limit($item->description,20,'...') }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">
                               
                                 {{-- <img @if ($item->img) src="{{ asset("uploads/slider/{$item->img}") }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                        width="80" height="40"> --}}
                                        
                                        {{-- <img @if ($item->img) src="{{ asset("uploads/slider") }}/{{ $item->img }}" @else src="{{ asset($item->img) }}" @endif
                                        width="80" height="40"> --}}

                                        {{-- <img @if($item->img)  src="{{ $item->img }}" @else src="{{ asset($item->img) }}" @endif width="80" height="40"> --}}

                                        <img @if ($item->img) src="{{ asset($item->img) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                        width="120" height="80">
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-700">

                                    <span class="text-gray-200 bg-green-500 px-1 py-1 rounded">
                                        {{ isset($item->user->name)?$item->user->name:'N/A' }}
                                    </span>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-700">

                                    <span class="text-gray-600 px-1 py-1 rounded">
                                        {{-- {{ $item->recipe->title }} --}}
                                        {{ isset($item->recipe->title) ? $item->recipe->title : 'N/A' }}
                                    </span>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-700">
                                    @if ($item->status == 'inactive')
                                        <span class="text-orange-600 rounded text-lg font-semibold  capitalize">{{ $item->status }}</span>
                                    @else
                                        <span class="text-green-600 rounded  text-lg font-semibold capitalize">{{ $item->status }}</span>
                                    @endif

                                </td>
                            <td class="px-4 py-2 text-sm text-gray-700 space-x-2 flex align-item-center">
                               
                                 @if ($item->status == 'inactive')
                                  <a href="{{ route('recipe-slider.status', $item) }}" class="bg-green-600 px-2 py-1.5 rounded text-white">Active</a>
                                    @else
                                     <a href="{{ route('recipe-slider.status', $item) }}" class="bg-red-600 px-2 py-1.5 rounded text-white">Inactive</a>
                                    @endif

                                <a href="{{ route('recipe-slider.show', $item) }}" class="show-btn">Show</a>
                                <a href="{{ route('recipe-slider.edit', $item) }}" class="edit-btn">Edit</a>
                                <form action="{{ route('recipe-slider.destroy', $item) }}" method="post"
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
                                <strong>No recipe-slider Found!</strong>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $recipeSlider->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
