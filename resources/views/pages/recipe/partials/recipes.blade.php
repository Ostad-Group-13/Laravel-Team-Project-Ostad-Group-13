
    @foreach ($recipes as $recipe)
        <x-recipe-item :recipe="$recipe" />
    @endforeach

