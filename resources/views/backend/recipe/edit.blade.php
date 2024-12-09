<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold flex gap-2"><x-edit-icon />Edit Recipe</h2>
                    <a href="{{ route('recipe.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>

                <div class="p-4">

                    <form action="{{ route('recipe.update', $recipe) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-2">

                            <!-- Title -->
                            <div class="mb-4 w-3/4">
                                <label for="recipeTitle" class="block text-gray-700 font-medium mb-1">
                                    Recipe Name:</label>
                                <input id="title" type="text" name="recipeTitle"
                                    value="{{ old('recipeTitle', $recipe->title) }}" placeholder="Recipe Name..."
                                    autocomplete="recipeTitle"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('recipeTitle') border-red-500 @enderror">
                                @error('recipeTitle')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="w-1/4">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Select an Category</label>
                                <select id="cat_id" name="cat_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                    @error('cat_id') border-red-500 @enderror">
                                    <option selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $recipe->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('cat_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="flex gap-2">
                            <!-- pre_time -->
                            <div class="mb-4 w-2/12">
                                <label for="pre_time" class="block text-gray-700 font-medium mb-1">
                                    Pre Time:</label>
                                <input type="number" id="pre_time" min="1" name="pre_time"
                                    placeholder="Pre Time" value="{{ old('pre_time', $recipe->pre_time) }}"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('pre_time') border-red-500 @enderror">

                                @error('pre_time')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            <!-- cook_time -->
                            <div class="mb-4 w-2/12">
                                <label for="cook_time" class="block text-gray-700 font-medium mb-1">Cook Time:</label>
                                <input type="number" id="cook_time" min="1" id="cook_time" name="cook_time"
                                    placeholder="Cook Time" value="{{ old('cook_time', $recipe->cook_time) }}"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('cook_time') border-red-500 @enderror">

                                @error('cook_time')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            <!-- Video Link -->
                            <div class="mb-4 w-5/12">
                                <label for="video_link" class="block text-gray-700 font-medium mb-1">
                                    Video Link:</label>
                                <input id="video_link" type="file" name="video_link" placeholder="Video Link"
                                    value="{{ old('video_link') }}"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('video_link') border-red-500 @enderror">

                                @error('video_link')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            <!-- Recipe Type -->
                            <div class="w-3/12">
                                <label for="recipe_type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Select an Recipe Type</label>
                                <select id="recipe_type" name="recipe_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                    @error('recipe_type') border-red-500 @enderror"
                                    value="{{ old('recipe_type') }}">
                                    <option selected>Select Recipe Type</option>
                                    <option value="asian" {{ $recipe->recipe_type == 'asian' ? 'selected' : '' }}>
                                        Asian
                                    </option>
                                    {{-- <option value="asian" @if ($recipe->recipe_type == 'asian') ? 'selected' : '' @endif>Asian</option> --}}
                                    <option value="thai" {{ $recipe->recipe_type == 'thai' ? 'selected' : '' }}>Thai
                                    </option>
                                    <option value="chines" {{ $recipe->recipe_type == 'chines' ? 'selected' : '' }}>
                                        Chines</option>
                                    <option value="indian" {{ $recipe->recipe_type == 'indian' ? 'selected' : '' }}>
                                        Indian</option>
                                </select>
                                @error('recipe_type')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>


                        <!-- Short Description -->
                        <div class="">
                            <label for="short_description" class="block text-gray-700 font-medium mb-1">
                                Short Description:</label>
                            <textarea id="description" name="short_description" placeholder="Short Description" cols="5" rows="2"
                                class="px-2 py-3 rounded w-full pt-2 border-gray-300 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out  @error('short_description') border-red-500 @enderror">{{ $recipe->short_description }}</textarea>
                            @error('short_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <!-- directions -->
                            <div class="w-3/4">
                                <label for="directions" class="block text-gray-700 font-medium mb-1">
                                    Directions:</label>
                                <textarea id="description" name="directions" placeholder="Directions"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out summernote @error('directions') border-red-500 @enderror">
                            {{ $recipe->directions }}</textarea>

                                @error('directions')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!--  Image  -->
                            <div class="mb-4 w-1/4">
                                <label for="photo" class="block text-gray-700 font-medium mb-1">Image :</label>
                                <input type="file" name="photo"
                                    class="dropify @error('photo') border-red-500 @enderror"
                                    data-default-file="{{ asset($recipe->photo) }}" data-height="265" />
                                @error('photo')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <label for="nutrition_text" class="block text-gray-700 font-medium mb-1">Nutrition
                                Text</label>
                            <textarea name="nutrition_text" id="nutrition_text" cols="5" rows="2" placeholder="Nutrition Text..."
                                class="px-2 py-3 rounded w-full pt-2 border-gray-300 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('nutrition_text') border-red-500 @enderror">
                                {{ $recipe->nutrition_text }}</textarea>
                            @error('nutrition_text')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- //{{dd($recipe->ingredients)}} --}}
                        <div id="total-container" class="space-y-4">
                            @foreach ($recipe->ingredients as $ingredient)
                                <div class="total-block space-y-4 border p-4 rounded shadow relative">
                                    <!-- Remove Button -->
                                    <button type="button"
                                        class="absolute top-2 right-2 px-2 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 remove-total">
                                        Remove
                                    </button>

                                    <!-- Ingredient Title -->
                                    <div class="mb-4">
                                        <label for="ingredient-title-{{ $ingredient->id }}"
                                            class="block text-sm font-medium py-2">Ingredient Title</label>
                                        <input type="text" name="ingredients[{{ $ingredient->id }}][title]"
                                            id="ingredient-title-{{ $ingredient->id }}"
                                            value="{{ $ingredient->ingredients_title }}"
                                            class="w-full p-2 border border-gray-300 rounded shadow-sm"
                                            placeholder="Ingredient Title">
                                    </div>

                                    <!-- Ingredients List Container -->
                                    <div class="list-container space-y-2">

                                        <span>Item List</span>
                                        @foreach (json_decode($ingredient->ingredients_list) as $item)
                                            <div class="flex items-center space-x-2">
                                                <input type="text"
                                                    name="ingredients[{{ $ingredient->id }}][ingredients_list][]"
                                                    value="{{ $item }}"
                                                    class="w-full p-2 border border-gray-300 rounded transition duration-300 ease-in-out"
                                                    placeholder="List Item">
                                                <button type="button"
                                                    class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600 remove-list">
                                                    Remove
                                                </button>
                                            </div>
                                        @endforeach

                                        <!-- Add More List Button -->
                                        <button type="button"
                                            class="add-more-list px-4 py-2 mt-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                            Add More List Items
                                        </button>
                                    </div>
                                </div>
                            @endforeach




                            <div id="nutrition-container" class="space-y-4">
                                @foreach ($recipe->nutritions as $index => $nutrition)
                                    <div class="nutrition-block space-y-4 border p-4 rounded shadow relative">
                                        <!-- Remove Nutrition Button -->
                                        <button type="button"
                                            class="absolute top-2 right-2 px-2 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600 remove-nutrition">
                                            Remove All
                                        </button>

                                        <!-- Nutrition Name -->
                                        <div class="mb-4 md:w-1/3 w-full">
                                            <label for="nutrition-name-{{ $index }}"
                                                class="block text-sm font-medium py-2">Nutrition Name</label>
                                            <input type="text" name="nutritions[{{ $index }}][name]"
                                                id="nutrition-name-{{ $index }}"
                                                value="{{ $nutrition['name'] }}"
                                                class="w-full p-2 border border-gray-300 rounded shadow-sm"
                                                placeholder="Nutrition Name">
                                        </div>

                                        <!-- Nutrition Amount -->
                                        <div class="mb-4 md:w-1/3 w-full">
                                            <label for="nutrition-amount-{{ $index }}"
                                                class="block text-sm font-medium py-2">Amount</label>
                                            <input type="text" name="nutritions[{{ $index }}][amount]"
                                                id="nutrition-amount-{{ $index }}"
                                                value="{{ $nutrition['amount'] }}"
                                                class="w-full p-2 border border-gray-300 rounded shadow-sm"
                                                placeholder="Amount">
                                        </div>

                                        <!-- Nutrition Unit -->
                                        <div class="mb-4 md:w-1/3 w-full">
                                            <label for="nutrition-unit-{{ $index }}"
                                                class="block text-sm font-medium py-2">Unit</label>
                                            <input type="text" name="nutritions[{{ $index }}][unit]"
                                                id="nutrition-unit-{{ $index }}"
                                                value="{{ $nutrition['unit'] }}"
                                                class="w-full p-2 border border-gray-300 rounded shadow-sm"
                                                placeholder="Unit (e.g., grams, mg)">
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button type="submit" class="flex gap-2 align-middle add-new-btn py-2">
                                    <x-add-icon />Update Recipe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const totalContainer = document.getElementById('total-container');

        totalContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('add-more-list')) {
                const listContainer = event.target.closest('.list-container');
                const newItem = `
                    <div class="flex items-center space-x-2">
                        <input type="text" name="ingredients[new][ingredients_list][]" class="w-full p-2 border border-gray-300 rounded transition duration-300 ease-in-out" placeholder="List Item">
                        <button type="button" class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600 remove-list">
                            Remove
                        </button>
                    </div>`;
                listContainer.insertAdjacentHTML('beforeend', newItem);
            }
        });

        totalContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-list')) {
                event.target.closest('.flex').remove();
            }
        });

        totalContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-total')) {
                event.target.closest('.total-block').remove();
            }
        });

        const nutritionContainer = document.getElementById('nutrition-container');

        const addNutritionButton = document.createElement('button');
        addNutritionButton.textContent = 'Add New Nutrition';
        addNutritionButton.className = 'mt-4 px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600';
        addNutritionButton.type = 'button';
        nutritionContainer.insertAdjacentElement('afterend', addNutritionButton);

        addNutritionButton.addEventListener('click', function () {
            const newIndex = nutritionContainer.querySelectorAll('.nutrition-block').length;
            const newNutritionBlock = `
                <div class="nutrition-block space-y-4 border p-4 rounded shadow relative">
                    <button type="button" class="absolute top-2 right-2 px-2 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600 remove-nutrition">Remove All</button>

                    <div class="mb-4 md:w-1/3 w-full">
                        <label for="nutrition-name-${newIndex}" class="block text-sm font-medium py-2">Nutrition Name</label>
                        <input type="text" name="nutritions[${newIndex}][name]" id="nutrition-name-${newIndex}" class="w-full p-2 border border-gray-300 rounded shadow-sm" placeholder="Nutrition Name">
                    </div>

                    <div class="mb-4 md:w-1/3 w-full">
                        <label for="nutrition-amount-${newIndex}" class="block text-sm font-medium py-2">Amount</label>
                        <input type="text" name="nutritions[${newIndex}][amount]" id="nutrition-amount-${newIndex}" class="w-full p-2 border border-gray-300 rounded shadow-sm" placeholder="Amount">
                    </div>

                    <div class="mb-4 md:w-1/3 w-full">
                        <label for="nutrition-unit-${newIndex}" class="block text-sm font-medium py-2">Unit</label>
                        <input type="text" name="nutritions[${newIndex}][unit]" id="nutrition-unit-${newIndex}" class="w-full p-2 border border-gray-300 rounded shadow-sm" placeholder="Unit (e.g., grams, mg)">
                    </div>
                </div>`;
            nutritionContainer.insertAdjacentHTML('beforeend', newNutritionBlock);
        });

        nutritionContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-nutrition')) {
                event.target.closest('.nutrition-block').remove();
            }
        });
    });
</script>

