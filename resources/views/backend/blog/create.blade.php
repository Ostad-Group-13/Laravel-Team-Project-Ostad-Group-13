<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full md:w-3/4 lg:w-2/3">
            <div class="bg-white shadow rounded-lg">
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center border-b border-gray-300">
                    <h2 class="text-lg font-semibold">Create Blog</h2>
                    <a href="{{ route('blog.index') }}" class="back-btn">
                        &larr; Back
                    </a>
                </div>
                <div class="p-6">
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-medium mb-1">Title:</label>
                            <input id="title" type="text" name="title"
                                value="{{ old('title') }}" placeholder="Title..."
                                autocomplete="title"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('title') border-red-500 @enderror">
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="cat_id" class="block text-gray-700 font-medium mb-1">Category:</label>
                            <select id="cat_id" name="cat_id"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('cat_id') border-red-500 @enderror">
                                <option selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('cat_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div class="mb-4">
                            <label for="short_description" class="block text-gray-700 font-medium mb-1">Short Description:</label>
                            <textarea id="short_description" name="short_description" placeholder="Short Description"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('short_description') border-red-500 @enderror"></textarea>
                            @error('short_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-medium mb-1">Image:</label>
                            <input type="file" name="image" id="image"
                                class="dropify @error('image') border-red-500 @enderror"
                                data-default-file="" data-height="180" />
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Long Description -->
                        <div class="mb-4">
                            <label for="long_description" class="block text-gray-700 font-medium mb-1">Long Description:</label>
                            <textarea id="long_description" name="long_description" placeholder="Long Description"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-300 focus:outline-none @error('long_description') border-red-500 @enderror"></textarea>
                            @error('long_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="add-new-btn px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                Create Blog
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
