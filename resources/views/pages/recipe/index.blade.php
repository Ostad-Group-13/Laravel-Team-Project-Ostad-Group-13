<x-guest-layout>

    <div class="racipe_page py-[70px]">
        <div class="container">
            <div class="flex flex-col lg:flex-row gap-[30px]">
                <div class="racipe_filter_sidebar lg:w-1/5 w-full">
                    <form id="filter-form">
                        <div class="filter_item mb-[30px]">
                            <h2 class="filter_title">Category</h2>
                            <ul class="filter_list">
                                @foreach ($allCategories as $category)
                                    <li class="filter_list_item">
                                        <label>
                                            <input class="filter_recipe" type="checkbox" name="categories[]"
                                                value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="filter_item mb-[30px]">
                            <h2 class="filter_title">Recipe Type</h2>
                            <ul class="filter_list">
                                @foreach (['Asian', 'Indian', 'Thai', 'Chinese'] as $recipeType)
                                    <li class="filter_list_item">
                                        <label>
                                            <input class="filter_recipe" type="checkbox" name="recipe_types[]"
                                                value="{{ $recipeType }}">
                                            {{ $recipeType }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="filter_item mb-[30px]">
                            <h2 class="filter_title">Cook Time</h2>
                            <div class="flex gap-[10px]">
                                <input type="number" min="1" name="cook_time_min" placeholder="Min"
                                    class="filter_recipe form-input w-1/2" value="{{ request('cook_time_min') }}">
                                <input type="number" min="1" name="cook_time_max" placeholder="Max"
                                    class="filter_recipe form-input w-1/2" value="{{ request('cook_time_max') }}">
                            </div>
                        </div>

                    </form>
                </div>


                <div class="racipe_content relative lg:w-4/5 w-full">

                    <div id="loader" class="hidden">
                        <div class="loader">
                            <!-- Add your spinner or loading animation here -->
                            <div class="border-gray-300 h-20 w-20 animate-spin rounded-full border-8 border-t-blue-600">
                            </div>
                        </div>
                    </div>

                    <div id="no-recipes-found"
                        class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <p class="text-4xl font-bold ">No Recipes Found.</p>
                    </div>


                    <div id="recipes-list" class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[20px]">
                        @include('pages.recipe.partials.recipes', ['recipes' => $recipes])
                    </div>
                    <div id="recipes-pagination" class="mt-10">
                        {{ $recipes->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filter-form');
            const loader = document.getElementById('loader');
            const recipesList = document.getElementById('recipes-list');

            filterForm.querySelectorAll('.filter_recipe').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    applyFilters();
                });
            });

            function applyFilters() {
                const formData = new FormData(filterForm);
                const params = new URLSearchParams(formData).toString();

                // Show the loader
                loader.style.display = 'block';
                recipesList.style.opacity = 0.5; // Optional: dim the recipes list

                axios.get(`/recipes-filter?${params}`)
                    .then(response => {
                        // Check if the server explicitly returned a "No recipes found" message
                        if (response.data == '') {
                            document.getElementById('recipes-pagination').style.display = 'none';
                            document.getElementById('no-recipes-found').style.display = 'block';
                            recipesList.innerHTML = '';
                        } else {
                            recipesList.innerHTML = response.data;
                            document.getElementById('recipes-pagination').style.display = 'block';
                            document.getElementById('no-recipes-found').style.display = 'none';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        // Hide the loader
                        loader.style.display = 'none';
                        recipesList.style.opacity = 1; // Restore opacity
                    });
            }

        });
    </script>



</x-guest-layout>
