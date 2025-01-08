 @foreach ($recipes as $recipe)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body" id="task-list">
                            <img class="w-full h-[280px] object-cover rounded" src="{{ asset($recipe->photo) }}"
                                alt="">
                            <h5 class="card-title text-left py-2">{{ $recipe->title }}</h5>
                            <p class="card-text">{{ $recipe->description }}</p>

                            <div
                                class="recipe_type absolute top-5 left-5 px-[15px] py-[5px] rounded-[10px] bg-[#FF6363] text-white capitalize">
                                <span>{{ $recipe->recipe_type }}</span>
                            </div>

                            {{-- @if (auth()->user()->favorites->contains($recipe))
                                <button onclick="unfavorite({{ $recipe->id }})" class="unfavorite">Unfavorite</button>
                            @else
                                <button onclick="favorite({{ $recipe->id }})" class="favorite">Favorite</button>
                            @endif --}}

                            @if (auth()->user()->favoriteRecipes->contains($recipe))
                                <button onclick="unfavorite({{ $recipe->id }})"
                                    class="unfavorite bg-transparent border border-blue-800 ring-4 focus:ring-2  px-3 py-2 rounded outline-none hover:text-white capitalize hover:bg-red-800 transition-all duration-300 ease-linear">Unfavorite</button>
                            @else
                                <button onclick="favorite({{ $recipe->id }})"
                                    class="bg-transparent  border-blue-800 ring-4 focus:ring-2  px-3 py-2 rounded outline-none hover:text-white capitalize hover:bg-green-800 transition-all duration-300 ease-linear">Favorite</button>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach