<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe Views List') }}
        </h2>
    </x-slot>

    <div class="mt-3 bg-green-400 text-white rounded">
        <h2 class="px-2 py-2 border-b-1 mb-1"> Recipe View List</h2>
    </div>

    <div class="border rounded-b overflow-hidden dark:border-neutral-700 bg-gray-400">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead class="bg-gray-500 text-lime-200">
                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">
                        Sl</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">
                        Recipe Photo</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">
                        Recipe Name</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">
                        View Count</th>

                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                    @foreach ($recipes as $recipe)
                <tr class="odd:bg-white even:bg-gray-300 divide-x divide-gray-200 dark:divide-neutral-700">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                        {{ $loop->index + 1 }}</td>
                    <td class="p-3">
                        <img class="rounded-lg w-[120px] h-20"
                            @if ($recipe->photo) src="{{ asset($recipe->photo) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                        {{ $recipe->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                        {{ $recipe->view_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2 class="px-4 py-3 text-white mt-2">Total Views Across All Your Recipe : {{ $totalViews }}</h2>
    </div>

</x-app-layout>
