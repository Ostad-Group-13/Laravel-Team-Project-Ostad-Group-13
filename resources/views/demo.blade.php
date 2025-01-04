<x-app-layout>

    <h2 class="py-2">Recipe List</h2>

    <div class="flex flex-wrap gap-4">

        <!-- Recipe data will be dynamically inserted here -->
        @foreach ($recipes as $recipe)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
                <img class="bg-cover h-52 w-full rounded-t" src="{{ asset($recipe->photo) }}" alt="" />
                <div
                    class="recipe_type absolute top-3 left-3 px-[10px] py-[5px] rounded-[12px] bg-[#FF6363] text-white capitalize">
                    <span>{{ $recipe->recipe_type }}</span>
                </div>

                <div
                    class="recipe_type absolute top-3 right-1 px-[10px] py-[5px] rounded-[20px] text-white capitalize">
                    @if (auth()->user()->favoriteRecipes->contains($recipe))
                        <button onclick="unfavorite({{ $recipe->id }})"
                            class="bg-red-600 px-3 py-2 rounded-lg outline-none capitalize hover:bg-red-700 transition-all duration-300 ease-linear text-white">Unfavorite</button>
                    @else
                        <button onclick="favorite({{ $recipe->id }})"
                            class="bg-green-600 px-3 py-2 rounded-lg outline-none capitalize hover:bg-green-700 transition-all duration-300 ease-linear text-white">Favorite</button>
                    @endif
                </div>

                <div class="px-2">
                    <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021
                    </h3>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                    </p>


                </div>
            </div>
        @endforeach



        <div id="loading-spinner" style="display: none;">Loading...</div>
    </div>

</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js"></script>
<script>
    function displayRecipes(recipes) {
        const recipeList = document.getElementById('recipe-list');
        recipeList.innerHTML = '';

        recipes.forEach(recipe => {
            const recipeItem = document.createElement('div');
            recipeItem.innerHTML = `
                <h3>${recipe.title}</h3>
                <p>${recipe.description}</p>
            `;
            recipeList.appendChild(recipeItem);
        });
    }

    // Favorite Function

    function favorite(id) {

        const url = `/recipes/${id}/favorite`;

        axios.post(url).then(response => {
            alert(response.data.message);
            window.location.reload();
            // showLoading();
            // Display recipes
            // displayRecipes(response.data);
        }).catch(error => {
            console.error(error);
        });




    }

    function unfavorite(id) {

        const url = `/recipes/${id}/unfavorite`;

        axios.delete(url)
            .then(response => {
                alert(response.data.message);
                window.location.reload();

                // showLoading();
                // fetchTasks();
                // Display recipes
                // displayRecipes(response.data);


            }).catch(error => {
                console.error(error);
            });

    }


    function showLoading() {
        document.getElementById('loading-spinner').style.display = 'block';
    }

    function hideLoading() {
        document.getElementById('loading-spinner').style.display = 'none';
    }
</script>
