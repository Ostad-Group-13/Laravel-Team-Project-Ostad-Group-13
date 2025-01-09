<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Popular Posts Views') }}
        </h2>
    </x-slot>

    <h1>Popular Posts</h1>
  <ul>
        @foreach ($posts as $post)
            <a href="{{ route('recipe.recipeshow', $post->id) }}"
                class="text-red-600 px-2 py-1 bg-gray-400 rounded my-5">{{ $post->title }}</a> - {{ $post->views }}
            views
        @endforeach
    </ul> 

    <div class="mt-3 bg-green-400 text-white rounded">
        <h2 class=" px-2 py-2 border-b-1">Recently Viewed Recipe List</h2>
        <div class="border rounded-b overflow-hidden dark:border-neutral-700 bg-gray-400">
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
                        @foreach ($posts as $post)
                    <tr class="odd:bg-white even:bg-gray-300 divide-x divide-gray-200 dark:divide-neutral-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                            {{ $loop->index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                            {{ $post->title }}</td>
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
        </div>

        {{-- <h3>Total Views for All Recipes by {{ $recipe->user->name }}: {{ $totalViews }}</h3>  --}}

    </div>

</x-app-layout>
