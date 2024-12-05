<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('recipe') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
            <h2 class="py-2 font-semibold pb-4 text-lg">Show recipe</h2>
            <a href="{{ route('recipe.index') }}" class="back-btn">
                &larr; Back
            </a>
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <td>
                            {{-- <img @if ($recipe->image) ? src="{{ asset($recipe->image) }}" : src="{{ asset($recipe->image) }}" @endif"
                            alt="" width="250" height="250" class="p-2 rounded"> --}}

                            {{-- <img @if ($recipe->photo) src="{{ asset($recipe->photo) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif"
                                alt="" width="120" height="120"> --}}

                            <img src="{{ asset($recipe->photo) }}" alt="" width="120" height="120">

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

                        <tr class=" border-b-2 ">
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

                        <tr class="bg-gray-200 border-b-2 ">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Video Link :</th>
                            <td>
                                <iframe src="{{ $recipe->video_link }}" width="560" height="315" frameborder="0"
                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>

                                {{-- <iframe src="http://www.youtube.com/embed/{{ $recipe->video_link }}" width="560"
                                    height="315" frameborder="0" allowfullscreen></iframe> --}}

                                {{-- <video sources="{{ $recipe->video_link }}" width="560" height="315" frameborder="0"
                                    allowfullscreen></video> --}}


                                {{-- <video width="320" height="240" autoplay="off" controls>
                                    <source src="{{ $recipe->video_link }}" type="video/mp4">
                                </video> --}}
                                {{-- MVZ8nEgJSbs &ab_channel=SUNDARBANVLOG --}}

                                {{-- <iframe width="560" height="250" src="https://www.youtube.com/embed/{{ $recipe->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin"  allowfullscreen></iframe> --}}


                            </td>
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
                        {{-- <tr class="">
                            <th class="py-6 px-2 text-left text-xs font-medium text-gray-700 uppercase">
                                Ingredient
                                :</th>
                            <td>{{ $recipe->nutrition->id }}</td>

                           @foreach ($recipe->ingredient as $ing)
                                <td>{{ $ing->id }}</td>
                            @endforeach
                        </tr> --}}

                        <!-- Ingredients -->
                        <div class="recipe-ingredients">
                            <h2>Ingredients</h2>
                            @foreach ($recipe['ingredient'] as $ingredient)
                                <h3>{{ $ingredient['ingredients_title'] }}</h3>
                                <ul>
                                    @foreach (json_decode($ingredient['ingredients_list'], true) as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>

                        <!-- Nutrition Information -->
    <div class="recipe-nutrition">
        <h2>Nutrition Information</h2>
        <ul>
            @foreach ($recipe['nutritions'] as $nutrient)
                <li>{{ $nutrient['name'] }}: {{ $nutrient['amount'] }} {{ $nutrient['unit'] }}</li>
            @endforeach
        </ul>
    </div>

                    </thead>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
