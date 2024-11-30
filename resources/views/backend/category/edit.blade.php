<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Edit Category</h2>
                    <a href="{{ route('category.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('category.update', $category) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-2">
                            <!-- Category Name -->
                            <div class="mb-4 w-8/12">
                                <label for="categoryName" class="block text-gray-700 font-medium mb-1">Category Name
                                    :</label>
                                <input id="categoryName" type="text" name="categoryName"
                                    value="{{ $category->name }}" placeholder="Category Name" required
                                    autocomplete="categoryName"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('categoryName') border-red-500 @enderror">
                                @if ($errors->has('categoryName'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('categoryName') }}</span>
                                @endif
                            </div>

                            <!-- Status -->
                            <div class="w-3/12">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                    option</label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                                    <option class="rounded">Choose a Status</option>
                                    <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('status') }}</span>
                                @endif
                            </div>

                        
                            <div class="w-2/12">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Select a Color</label>
                                <input type="color" id="html5colorpicker" name="color" value="{{ $category->color }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full rounded"
                                    style="width: 20%;height: 50px;padding: 5px;">
                            </div>




                        </div>
                        <!-- Image -->
                        <div class="w-1/4 rounded">
                            <label for="FileUpload" class="block text-gray-700 font-medium mb-1">Image</label>
                            <input type="file" class="dropify @error('FileUpload') border-red-500 @enderror"
                                 @if ($category->image) ? data-default-file="{{ asset($category->image) }}":  @else  data-default-file="{{ asset('uploads/no-image.png') }}" @endif data-height="250"   name="FileUpload">
                            @if ($errors->has('FileUpload'))
                                <span class="text-red-500 text-sm">{{ $errors->first('FileUpload') }}</span>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="add-new-btn">
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
