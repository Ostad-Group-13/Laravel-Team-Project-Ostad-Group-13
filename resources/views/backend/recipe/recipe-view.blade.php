<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe Views') }}
        </h2>
    </x-slot>

    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700" border="1">
                <thead class="bg-gray-500 text-lime-200">
                    <tr class="divide-x divide-gray-200 dark:divide-neutral-700">
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">
                            Sl</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">
                            Recipe Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">
                            View Count</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium uppercase">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                        @foreach ($recentlyViewedRecipe as $post)
                    <tr class="odd:bg-white even:bg-gray-300 divide-x divide-gray-200 dark:divide-neutral-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                            {{ $loop->index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                            {{ $post->recipes->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                            {{ $post->view }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                            <a href="{{ route('recipe.recipeshow', $post->id) }}"
                                class="font-semibold rounded-lg border-transparent border-green-600 bg-green-600 hover:bg-blue-800  px-4 py-2 transition duration-300 ease-in-out text-white">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

</x-app-layout>
