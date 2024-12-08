<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('recipe') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="bg-gray-100 px-4 py-3 flex justify-between items-center">
            <h2 class="py-2 font-semibold pb-4 text-lg">Show recipe</h2>
            <a href="{{ route('recipe.index') }}" class="back-btn">
                &larr; Back
            </a>
        </div>
        <div class="">
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <td>
                            <!-- Recipe Image -->
                            <div class="recipe-image py-2 px-2 flex justify-items-center">
                                <img class="rounded"
                                    @if ($recipe->photo) src="{{ asset($recipe->photo) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                    width="350" height="250">
                            </div>
                        </td>
                        <tr class="bg-gray-200 border-b-2 ">
                            <th class="py-4 px-3 text-left text-xs font-medium text-gray-700 uppercase">Title :</th>
                            <td>{{ $recipe->title }}</td>
                        </tr>
                        <tr class=" border-b-2 ">
                            <th class="py-4 px-3 text-left text-xs font-medium text-gray-700 uppercase">Category :</th>
                            <td>
                                <span
                                    class="text-gray-200 bg-blue-500 px-1 py-1 rounded">{{ $recipe->category->name }}</span>
                            </td>
                        </tr>

                        <tr class="bg-gray-200 border-b-2 ">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Per Time :</th>
                            <td>{{ $recipe->pre_time }}</td>
                        </tr>

                        <tr class="border-b-2 ">
                            <th
                                class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase flex gap-2 align-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg> <span class="py-1">Cook Time :</span>
                            </th>
                            <td>{{ $recipe->cook_time }}</td>
                        </tr>

                        <tr class=" border-b-2 ">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Author :</th>
                            <td><span class="rounded px-2 py-3 text-white bg-green-600">{{ $recipe->user->name }}</span>
                            </td>
                        </tr>

                        <tr class="bg-gray-200 border-b-2 ">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Nutrition Text :</th>
                            <td>{{ $recipe->nutrition_text }}</td>
                        </tr>
                        <tr class=" border-b-2 ">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Short Description :</th>
                            <td>{!! $recipe->short_description !!}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Directions
                                :</th>
                            <td>{!! $recipe->directions !!}</td>
                        </tr>

                        <!-- Ingredients -->
                        <tr class="mb-3">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Ingredient Information:</th>
                            <td>
                                @foreach ($recipe->ingredients as $ingredient)
                                    <h4 class="px-2 py-3 mt-2 flex gap-2">
                                        <span
                                            class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-3 py-2 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400">{{ $ingredient['ingredients_title'] }}</span>
                                    </h4>
                                    {{-- @foreach ($ingredient as $list)
                                        <span>{{ $list->ingredients_list }}</span>
                                    @endforeach --}}
                                   
                                  
                                        @foreach (json_decode($ingredient['ingredients_list'], true) as $item)
                                            {{-- <li>{{ $item }}</li> --}}
                                            <span  class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-3 py-2 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400">{{ $item }}</span>
                                        @endforeach
                                  
                                @endforeach
                            </td>

                        </tr>

                        <!-- Nutrition Information -->
                        <tr class="mb-3 bg-gray-200">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Nutrition Information:</th>
                            <td>
                                <!-- Nutrition Information -->
                                @foreach ($recipe->nutritions as $nutrient)
                                    <span
                                        class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-3 py-2 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400">
                                        {{ $nutrient['name'] }} : {{ $nutrient['amount'] }}
                                        {{ $nutrient['unit'] }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(".btn").click(function() {

            var lable = $(".btn").text().trim();

            if (lable == "Hide") {
                $(".btn").text("Show");
                $(".info").show();
            } else {
                $(".btn").text("Hide");
                $(".info").hide();
            }

        });


        function show(id) {
            var element = document.getElementById(id);

            if (element.style.display == 'none')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }
    </script>

</x-app-layout>
