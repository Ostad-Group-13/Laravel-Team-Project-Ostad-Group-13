<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe Slider') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
            <h2 class="py-2 font-semibold pb-4 text-lg">Show Slider</h2>
            <a href="{{ route('recipe-slider.index') }}" class="back-btn">
                &larr; Back
            </a>
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                    <td>
                      
                        <img @if ($recipeSlider->img) src="{{ asset("uploads/slider") }}/{{ $recipeSlider->img }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                        width="180" height="140">

                    </td>
                    <tr class="bg-gray-200 border-b-2 ">
                        <th class="py-4 px-3 text-left text-xs font-medium text-gray-700 uppercase">Title :</th>
                        <td>{{ $recipeSlider->title }}</td>
                    </tr>

                    <tr class="">
                        <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                            Description :</th>
                        <td>{{ $recipeSlider->description }}</td>
                    </tr>

                     <tr class="bg-gray-200 border-b-2">
                        <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                           User:</th>
                        <td>
                            <span class="text-gray-200 bg-green-500 px-1 py-1 rounded">
                                        {{ isset($recipeSlider->user->name)?$recipeSlider->user->name:'N/A' }}
                                    </span>

                                </td>
                    </tr>

                    @if($recipeSlider->recipe_id == null)
                        <tr class="">
                        <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                            Recipe Details:</th>
                        <td class="grid py-4 px-2">
                            Recipe Title : 
                            <span class="text-gray-200 bg-green-500 px-1 py-1 rounded my-2">
                                {{ isset($recipeSlider->recipe->title)?$recipeSlider->recipe->title:'N/A' }}
                            </span>

                            <span class="text-indigo-600 px-2 py-3 my-2 w-25 border-b-2 border-b-slate-300">
                                Cook Time : {{ $recipeSlider->recipe->cook_time }}
                            </span>

                            <span class="text-blue-500 px-2 py-3 my-2 rounded">
                                Pre Time : {{ $recipeSlider->recipe->pre_time }}
                            </span>
                        </td>
                    </tr>
                        @else
                        <tr aria-colspan="6">
                            <td class="py-4 px-3 text-center">
                                <span class="text-red-600">No Recipe Found</span>
                            </td>
                        </tr>
                   
                    @endif

                    </thead>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
