 @auth
 @if (auth()->user()->favoriteRecipes->contains($recipe->id))
 {{-- <form action="{{ route('recipes.unfavorite', $recipe) }}" method="POST">
 @csrf
 <button class="btn btn-danger top-5 left-5 px-[15px] py-[5px]">Unfavorite</button>

 </form> --}}
 <button onclick="unfavorite({{ $recipe->id }})"
    class="unfavorite-btn absolute top-4 right-[20px] px-[15px] py-[5px] text-white capitalize bg-red-700 unfavorite"
    data-id="{{ $recipe->id }}">Unfavorite</button>
 @else
 {{-- <form action="{{ route('recipes.favorite', $recipe) }}" method="POST">
 @csrf
 <button class="btn btn-primary">Favorite</button>

 </form> --}}
 <button onclick="favorite({{ $recipe->id }})"
    class="favorite-btn absolute top-[20px] right-[20px] px-[10px] py-[5px]  text-white capitalize bg-green-700 favorite"
    data-id="{{ $recipe->id }}">Favorite</button>
 @endif
 @else
 <p><a href="{{ route('login') }}">Login</a> to favorite this recipe.</p>
 @endauth