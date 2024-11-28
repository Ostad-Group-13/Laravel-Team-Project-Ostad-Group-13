<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Create Category</h2>
                    <a href="{{ route('category.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="flex gap-2">
                            <!-- Category Name -->
                            <div class="mb-4 w-1/3">
                                <label for="categoryName" class="block text-gray-700 font-medium mb-1">Category Name
                                    :</label>
                                <input id="categoryName" type="text" name="categoryName"
                                    value="{{ old('categoryName') }}" placeholder="Category Name"
                                    autocomplete="categoryName"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out @error('name') border-red-500 @enderror">
                                 @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                            </div>

                            <!-- Status -->
                            <div class="w-1/4">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Select an option</label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                    ">
                                    <option selected>Choose a Status</option>
                                    <option value="active"> Active</option>
                                    <option value="inactive"> Inactive</option>
                                   
                                </select>
                            </div>

                            <div class="w-1/4">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Select an option</label>
                               <input type="color" id="html5colorpicker" name="color" value="#ff0000" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full rounded" style="width:85%;" >
                               
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="FileUpload" class="block text-gray-700 font-medium mb-1">Image</label>
                            <input
                                class="px-3 py-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 "
                                id="file_input" type="file" name="FileUpload">

                            {{-- @if ($errors->has('FileUpload'))
                                <span class="text-red-500 text-sm">{{ $errors->first('FileUpload') }}</span>
                            @endif --}}

                            
                        </div>



                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="add-new-btn">
                                Create Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
