<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Edit Recipe</h2>
                    <a href="{{ route('recipe-slider.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('recipe-slider.update', $recipeSlider) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-2">
                            <!-- Title Name -->
                            <div class="mb-4 w-3/4">
                                <label for="title" class="block text-gray-700 font-medium mb-1">
                                    Title:</label>
                                <input id="title" type="text" name="title" value="{{ $recipeSlider->title }}"
                                       placeholder="Category Name" autocomplete="title"
                                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('title') border-red-500 @enderror">
                                @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Category -->
                        </div>

                        <div class="flex gap-2">
                            <!-- Short Description -->
                            <div class="mb-4 w-3/4">
                                <label for="short_description" class="block text-gray-700 font-medium mb-1">
                                    Description:</label>
                                <textarea id="description" name="description" placeholder="Short Description"
                                          class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out summernote @error('short_description') border-red-500 @enderror">{{ $recipeSlider->description }}</textarea>
                                @error('short_description')
                                <span class="text-red-500 text-sm" >{{ $message }}</span>
                                @enderror
                            </div>

                            <!--  Image  -->
                            <div class="mb-4 w-1/4">
                                <label for="FileUpload" class="block text-gray-700 font-medium mb-1">Image :</label>
                                <input type="file" name="img" class="dropify @error('img') border-red-500 @enderror"
                                       @if ($recipeSlider->img) data-default-file="{{ asset($recipeSlider->img) }}" @else data-default-file="{{ asset('uploads/no-image.png') }}" @endif data-height="265" />
                                @error('img')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Long Description -->


                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="add-new-btn">
                                Update Recipe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
