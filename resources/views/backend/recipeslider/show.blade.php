<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe Slider') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
            <h2 class="py-2 font-semibold pb-4 text-lg">Show Blog</h2>
            <a href="{{ route('recipe-slider.index') }}" class="back-btn">
                &larr; Back
            </a>
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                    <td>
                        <img @if ($recipeSlider->img) src="{{ asset("uploads/slider/$recipeSlider->img") }}" @else src="{{ asset('uploads/no-image.png') }}" @endif"
                        alt="" width="120" height="120">
                    </td>
                    <tr class="bg-gray-200 border-b-2 ">
                        <th class="py-4 px-3 text-left text-xs font-medium text-gray-700 uppercase">Title :</th>
                        <td>{{ $recipeSlider->title }}</td>
                    </tr>

                    <tr class="bg-gray-200 border-b-2 ">
                        <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">Short
                            Description :</th>
                        <td>{{ $recipeSlider->description }}</td>
                    </tr>
                    <tr class="bg-gray-200 border-b-2 ">
                        <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">Short
                            Recipe Title :</th>
                        <td>{{ $recipeSlider->recipe->title }}</td>
                    </tr>

                    </thead>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
