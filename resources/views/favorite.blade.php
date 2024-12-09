<!-- resources/views/recipes/index.blade.php -->


{{-- <input type="text" name="recipe" value="{{ $recipe->id }}"> --}}

{{-- @if (auth()->user()->favoriteRecipes->contains($recipe->id))
    <button onclick="toggleFavorite({{ $recipe->id }}, true)" class="px-2 py-2 bg-red-500 rounded ">Unfavorite</button>
@else
    <button onclick="toggleFavorite({{ $recipe->id }}, false)" class="px-2 py-2 bg-green-500 rounded ">Favorite</button>
@endif --}}


<div class="container">
    <h1>Recipes</h1>
    <div class="row">
        @foreach ($recipes as $recipe)
            {{-- <button 
    onclick="toggleFavorite({{ $recipe->id }}, {{ $isFavorited ? 'true' : 'false' }})"
    class="btn {{ $isFavorited ? 'btn-danger' : 'btn-primary' }}">
    {{ $isFavorited ? 'Unfavorite' : 'Favorite' }}
</button> --}}

            @if (auth()->user()->favoriteRecipes->contains($recipe->id))
                <button onclick="toggleFavorite({{ $recipe->id }}, true)"
                    class="px-2 py-2 bg-red-500 rounded ">Unfavorite rr</button>
            @else
                <button onclick="toggleFavorite({{ $recipe->id }}, false)"
                    class="px-2 py-2 bg-green-500 rounded ">Favorite rrr</button>
            @endif

           <hr class="clear">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->title }}</h5>
                        <p class="card-text">{{ $recipe->description }}</p>
                        <img class="w-full h-full object-cover" src="{{ asset($recipe->photo) }}" alt="">
                        <div
                            class="recipe_type absolute top-[20px] left-[20px] px-[10px] py-[3px] rounded-[30px] bg-[#FF6363] text-white capitalize">
                            <span>{{ $recipe->recipe_type }}</span>
                        </div>
                        @auth
                            @if (auth()->user()->favoriteRecipes->contains($recipe->id))
                                <form action="{{ route('recipes.unfavorite', $recipe) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger">Unfavorite</button>
                                </form>
                            @else
                                <form action="{{ route('recipes.favorite', $recipe) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary">Favorite</button>
                                </form>
                            @endif
                        @else
                            <p><a href="{{ route('login') }}">Login</a> to favorite this recipe.</p>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js"></script>
<script>
    function toggleFavorite(recipeId, isFavorite) {
        const url = isFavorite ? '/recipes/{recipeId}/unfavorite' : '/recipes/{recipeId}/favorite';

        axios.post(url)
            .then(response => {
                console.log(response.data.message);
                // Update UI accordingly
            })
            .catch(error => {
                console.error(error.response.data);
            });
    }
</script>
