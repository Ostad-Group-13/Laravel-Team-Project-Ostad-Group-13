<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe Views') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="flex justify-between align-middle border-b border-red-600">
            <h2 class="py-2 px-0">Single Recipe Information :- </h2>
            <a href="{{ route('recipe.index') }}" class="px-2 py-1 mb-2 bg-green-800 rounded text-white">Go Back</a>
        </div>
        <div class="overflow-x-auto">
            <img class="w-[450px] h-[270px] rounded-lg my-3" src="{{ $recipe->photo }}" alt="" />
             <table class="min-w-full bg-gray-600 divide-gray-200">
                <thead class="text-white">
                    <tr class="bg-gray-600 divide-gray-200">
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-r">Recipe Title</th>
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-l">:</th>
                        <td class="px-2 py-3 text-left text-xs font-medium uppercase border-l">
                            {{ $recipe['title'] }}
                        </td>
                    </tr>

                    <tr class="bg-gray-300 divide-gray-200">
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-r">Recipe Description</th>
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-l">:</th>
                        <td class="px-2 py-3 text-left text-xs font-medium uppercase border-l">
                            {{ $recipe->short_description }}
                        </td>
                    </tr>
                    
                    <tr class="bg-gray-600">
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-r">Recipe Type</th>
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-l">:</th>
                        <td class="px-2 py-3 text-left text-xs font-medium uppercase border-l">
                            {{ $recipe['recipe_type'] }}
                        </td>
                    </tr>
                    
                    <tr class="bg-gray-300">
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-r">Category</th>
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-l">:</th>
                        <td class="px-2 py-3 text-left text-xs font-medium uppercase border-l">
                            {{ $recipe->category['name'] }}
                        </td>
                    </tr>

                    <tr class="bg-gray-600">
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-r">User Name</th>
                        <th class="px-2 py-3 text-left text-xs font-medium uppercase border-l">:</th>
                        <td class="px-2 py-3 text-left text-xs font-medium uppercase border-l">
                            {{ $recipe->user['name']}}
                        </td>
                    </tr>

                </thead>

            </table>
        </div>

        <div class="flex min-w-full rounded-lg">
           
        </div>

    </div>

</x-app-layout>
