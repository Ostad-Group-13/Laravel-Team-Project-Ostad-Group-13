<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe Views 330') }}
        </h2>
    </x-slot>

    <div class="container">
        {{-- <h1>{{ $recipe->title }}</h1>
        <p>{{ $recipe->description }}</p>
        <p><strong>Views:</strong> {{ $recipe->view_count }}</p>
        <hr>
        <h3>Total Views for All Recipes by {{ $recipe->user->name }}: {{ $totalViews }}</h3> --}}

        {{-- <h1>{{ $recipe->title }}</h1>
        <p>{{ $recipe->description }}</p>
        <p><strong>Views:</strong> {{ $recipe->view_count }}</p> --}}

        <h2>Recently Viewed Products on User hhh :{{ $recentlyViewedRecipe['user']->name }} </h2>
        <ul>
            @foreach ($recentlyViewedRecipe as $recentProduct)
                {{-- @foreach ($recentlyViewedRecipe->recipe as $recipe)
                    <li>
                        <a href="{{ route('recipes.show', $recipe) }}">
                            {{ $recipe->id }}
                            {{ $recipe->title }}
                        </a>
                    </li>
                @endforeach --}}
                {{ $recentProduct->user_id }}

                @if($recentProduct->user_id == Auth::user()->id)
                    <span>Yor PRO : {{ $recentProduct->user_id }}</span>
                @endif
            @endforeach

        </ul>
    </div>

</x-app-layout>
