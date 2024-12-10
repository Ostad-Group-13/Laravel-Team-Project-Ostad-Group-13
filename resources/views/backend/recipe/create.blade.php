<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold flex gap-2"><x-add-icon />Create Recipe</h2>
                    <a href="{{ route('recipe.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('recipe.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-2">

                            <!-- Title -->
                            <div class="mb-4 w-3/4">
                                <label for="title" class="block text-gray-700 font-medium mb-1">
                                    Recipe Name:</label>
                                <input id="title" type="text" name="title" value="{{ old('title') }}"
                                    placeholder="Recipe Name..." autocomplete="title"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('title') border-red-500 @enderror">
                                @error('title')
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
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('cat_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        {{-- <div class="mb-4 w-3/4">
                                <label for="short_description" class="block text-gray-700 font-medium mb-1">
                                    Short Description:</label>
                                <textarea id="description" name="short_description" placeholder="Short Description"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out summernote @error('short_description') border-red-500 @enderror">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div> --}}

                              <div class="flex gap-2">
                            <!-- pre_time -->
                            <div class="mb-4 w-2/12">
                                <label for="pre_time" class="block text-gray-700 font-medium mb-1">
                                    Pre Time:</label>
                                <input type="number" id="pre_time" min="1" name="pre_time" placeholder="Pre Time"
                                    value="{{ old('pre_time') }}"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('pre_time') border-red-500 @enderror">

                                @error('pre_time')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            <!-- cook_time -->
                            <div class="mb-4 w-2/12">
                                <label for="cook_time" class="block text-gray-700 font-medium mb-1">Cook Time:</label>
                                <input type="number" id="cook_time"  min="1" id="cook_time" name="cook_time" placeholder="Cook Time"
                                    value="{{ old('cook_time') }}"
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
                                    <option value="asian">Asian</option>
                                    <option value="thai">Thai</option>
                                    <option value="chines">Chines</option>
                                    <option value="indian">Indian</option>
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
                                class="px-2 py-3 rounded w-full pt-2 border-gray-300 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out  @error('short_description') border-red-500 @enderror">{{ old('short_description') }}</textarea>
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
                            {{ old('directions') }}</textarea>

                                @error('directions')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!--  Image  -->
                            <div class="mb-4 w-1/4">
                                <label for="photo" class="block text-gray-700 font-medium mb-1">Image :</label>
                                <input type="file" name="photo"
                                    class="dropify @error('photo') border-red-500 @enderror" data-default-file=""
                                    data-height="265" />
                                @error('photo')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <label for="nutrition_text" class="block text-gray-700 font-medium mb-1">Nutrition
                                Text</label>
                            <textarea name="nutrition_text" id="nutrition_text" cols="5" rows="2" placeholder="Nutrition Text..."
                                class="px-2 py-3 rounded w-full pt-2 border-gray-300 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('nutrition_text') border-red-500 @enderror">{{ old('nutrition_text') }}</textarea>
                            @error('nutrition_text')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Input field add more Button -->

                        <div class="flex gap-2 justify-center align-center">

                            <!-- Ingredients Section Start -->
                            <div class="w-6/12">

                                <!-- Add More Total Button -->
                                <div class="mt-4 mb-2">
                                    <button id="add-more-total" type="button"
                                        class="flex gap-2 align-middle px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                                        <x-add-icon />Add More Ingredients
                                    </button>
                                </div>

                                <!-- Ingredients Section -->
                                <div id="total-container" class="space-y-4">
                                    <!-- Dynamic Total Blocks -->
                                </div>

                            </div>
                            <!-- Ingredients Section End -->


                            <!-- Nutrition Section -->

                            <div class="w-6/12">

                                <!-- Add More Nutrition Button -->
                                <div class="mt-4 mb-2">
                                    <button id="add-more-nutrition" type="button"
                                        class="flex gap-2 align-middle px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                                        <x-add-icon /> Add More Nutritions
                                    </button>
                                </div>

                                <!-- Nutrition Section -->
                                <div id="nutrition-container" class="space-y-4">
                                    <!-- Dynamic Nutrition Blocks -->
                                </div>

                            </div>

                            <!-- Nutrition Section End -->


                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="flex gap-2 align-middle add-new-btn py-2">
                                <x-add-icon />Create Recipe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>



<script>
    $(document).ready(function() {
        let totalCounter = 0;

        // Add More Ingredient Block
        $("#add-more-total").on("click", function() {
            totalCounter++;
            const newBlock = `
            <div class="total-block space-y-4 border p-4 rounded shadow relative">
                <!-- Remove Button -->
                <button type="button" class="flex gap-2 align-center absolute top-2 right-2 px-2 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 remove-total ">
                    <x-delete-icon />
                    Remove List
                </button>

                <!-- Ingredient Title -->
                <div class="mb-2">
                    <label for="ingredient-title-${totalCounter}" class="block text-sm font-medium py-2">Ingredient Title</label>
                    <input type="text" name="ingredients[${totalCounter}][title]" id="ingredient-title-${totalCounter}"
                        class="w-full p-2 border border-gray-300 rounded shadow-sm" placeholder="Ingredient Title">
                </div>

                <!-- Ingredients List Container -->
                <div class="list-container space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="text" name="ingredients[${totalCounter}][ingredients_list][]"
                            class="w-full p-2 border border-gray-300 rounded" placeholder="List Item 1">
 <button type="button" class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600 remove-list flex gap-2 align-center">
                    <x-close-icon />Remove
                </button>

                    </div>
                </div>

                <!-- Add More List Button -->
                <button type="button" class="add-more-list px-4 py-2 mt-2 text-white bg-blue-500 rounded hover:bg-blue-600 flex">
                    <x-add-icon />
                    Add More List Items
                </button>
            </div>
        `;
            $("#total-container").append(newBlock);
        });

        // Remove Ingredient Block
        $(document).on("click", ".remove-total", function() {
            $(this).closest(".total-block").remove();
        });

        // Add More List Items
        $(document).on("click", ".add-more-list", function() {
            const listContainer = $(this).siblings(".list-container");
            const newListItem = `
            <div class="flex items-center space-x-2">
                <input type="text" name="${listContainer.find('input').first().attr('name')}"
                    class="w-full p-2 border border-gray-300 rounded" placeholder="List Item">
                <button type="button" class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600 remove-list flex gap-2 align-center">
                    <x-close-icon />Remove
                </button>
            </div>
        `;
            listContainer.append(newListItem);
        });

        // Remove List Item
        $(document).on("click", ".remove-list", function() {
            $(this).closest("div").remove();
        });


        // Add More Nutrition Block
        let nutritionCounter = 0;

        // Add More Nutrition
        $("#add-more-nutrition").on("click", function() {
            nutritionCounter++;
            const newBlock = `
            <div class="nutrition-block space-y-4 border p-4 rounded shadow relative">
                <!-- Remove Nutrition Button -->

                 <button type="button" class="flex gap-2 align-center absolute top-2 right-2 px-2 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 remove-nutrition">
                    <x-delete-icon />
                    Remove List
                </button>

                <!-- Nutrition Name -->
                <div class="mb-2 md:w-3/3 w-full">
                    <label for="nutrition-name-${nutritionCounter}" class="block text-sm font-medium py-2">Nutrition Name</label>
                    <input type="text" name="nutritions[${nutritionCounter}][name]" id="nutrition-name-${nutritionCounter}"
                        class="w-full p-2 border border-gray-300 rounded shadow-sm" placeholder="Nutrition Name">
                </div>

                <div class="flex gap-2 align-center">

                    <!-- Nutrition Amount -->
                    <div class="mb-4 md:w-2/3 w-full">
                        <label for="nutrition-amount-${nutritionCounter}" class="block text-sm font-medium py-2">Amount</label>
                        <input type="text" name="nutritions[${nutritionCounter}][amount]" id="nutrition-amount-${nutritionCounter}"
                            class="w-full p-2 border border-gray-300 rounded shadow-sm" placeholder="Amount">
                    </div>

                    <!-- Nutrition Unit -->
                    <div class="mb-4 md:w-2/3 w-full">
                        <label for="nutrition-unit-${nutritionCounter}" class="block text-sm font-medium py-2">Unit</label>
                        <input type="text" name="nutritions[${nutritionCounter}][unit]" id="nutrition-unit-${nutritionCounter}"
                            class="w-full p-2 border border-gray-300 rounded shadow-sm" placeholder="Unit (e.g., grams, mg)">
                    </div>

                </div>

            </div>
        `;
            $("#nutrition-container").append(newBlock);
        });

        // Remove Nutrition
        $(document).on("click", ".remove-nutrition", function() {
            $(this).closest(".nutrition-block").remove();
        });


    });
</script>
