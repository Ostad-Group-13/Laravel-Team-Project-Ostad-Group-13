<x-app-layout>
    {{-- 
    <!-- ✅ Grid Section - Starts Here 👇 -->

    <section class="justify-items-center mt-10 mb-5 flex gap-3">

        <!--   ✅ Product card 1 - Starts Here 👇 -->
        <div class="w-50 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
            <a href="#">
                <img src="https://images.unsplash.com/photo-1646753522408-077ef9839300?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NjZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                <div class="px-4 py-3 w-72">
                    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                    <p class="text-lg font-bold text-black truncate block capitalize">Product Name</p>
                    <div class="flex items-center">
                        <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                        <del>
                            <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                        </del>
                        <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg></div>
                    </div>
                </div>
            </a>
        </div>
        <!--   🛑 Product card 1 - Ends Here  -->

        <!--   ✅ Product card 2 - Starts Here 👇 -->
        <div class="w-50 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
            <a href="#">
                <img src="https://images.unsplash.com/photo-1651950519238-15835722f8bb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8Mjh8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                <div class="px-4 py-3 w-72">
                    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                    <p class="text-lg font-bold text-black truncate block capitalize">Product Name</p>
                    <div class="flex items-center">
                        <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                        <del>
                            <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                        </del>
                        <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg></div>
                    </div>
                </div>
            </a>
        </div>
        <!--   🛑 Product card 2- Ends Here  -->

    </section>

    <!-- 🛑 Grid Section - Ends Here --> --}}

    <div class="bg-white  py-3 px-5 rounded-lg">
        <span>Hi,{{ Auth::user()->name }}</span>
        <h2 class="text-blue-600 font-semibold text-lg px-1 pt-3">Total Favorite Recipe List
            {{ count($user['favoriteRecipes']) }}</h2>
        <div class="py-4">
            <div class="inline-block min-w-full rounded-lg">
                <table class="min-w-full leading-normal">
                    <thead class="bg-blue-500 text-white font-semibold text-lg">
                        <tr>
                            <th class="px-5 py-3 text-left uppercase tracking-wider border-r border-r-blue-600">
                                #Sl
                            </th>

                            <th class="px-5 py-3 text-left uppercase tracking-wider border-r border-r-blue-600">
                                Recipe
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left uppercase tracking-wider border-r border-r-gray-500">
                                Recipe
                            </th>
                            {{-- <th class="px-5 py-3 text-left uppercase tracking-wider border-r border-r-blue-600">
                                Status
                            </th>
                            <th class="px-5 py-3 text-left uppercase tracking-wider border-r border-r-blue-600">Action
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user['favoriteRecipes'] as $recipe)
                            <tr>
                                <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-r border-r-gray-300">
                                    {{ $loop->iteration }}</td>
                                <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-r border-r-gray-300">
                                    <div class="flex">
                                        <div class="flex-shrink-0 w-10 h-10 mt-2">
                                            <img class="w-full h-full rounded"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                                alt="" />
                                        </div>
                                        <span class="px-2 py-3 pt-4 text-green-700">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-r border-r-gray-300">
                                    <div class="flex">
                                        <div class="flex-shrink-0 w-[80px] mt-1">
                                            <img class="w-full h-full rounded-lg" src="{{ $recipe->photo }}"
                                                alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <span>Type{{ Str::limit($recipe['title'], 30, '...') }}</span>
                                            <p class="text-red-600">{{ $recipe['recipe_type'] }}</p>
                                            <span class=" text-blue-600 py-4">{{ $recipe->category->name }}</span>
                                        </div>
                                    </div>
                                </td>

                                {{-- <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-r border-r-gray-300">
                                    <p class="text-gray-900 whitespace-no-wrap">Sept 28, 2019</p>
                                    <p class="text-gray-600 whitespace-no-wrap">Due in 3 days</p>
                                </td> --}}

                                {{-- <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-r border-r-gray-300">

                                    <a href=""
                                        class="px-2 py-2 rounded transition duration-300 ease-linear border-2 border-blue-600 hover:bg-blue-500  text-lg hover:text-white">Show</a>
                                    <a href="" class="px-2 py-2 rounded bg-blue-500 text-white text-lg">Edit</a>
                                    <a href="" class="px-2 py-2 rounded bg-red-500 text-white text-lg">Delete</a>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-r border-r-gray-300 text-center">
                                    <span class=" text-lg font-semibold text-red-600 py-10 px-5">
                                        No favorite recipes available.
                                    </span>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".more-options-btn").forEach((button) => {
            button.addEventListener("click", function() {
                const dropdown = this.nextElementSibling;
                dropdown.classList.toggle("hidden");
            });
        });
    });
</script>
