<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe Views') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>{{ $recipe->title }}</h1>
        <p>{{ $recipe->description }}</p>
        <p><strong>Views:</strong> {{ $recipe->view_count }}</p>
        <hr>
        <h3>Total Views for All Recipes by {{ $recipe->user->name }}: {{ $totalViews }}</h3>

        {{-- <h1>{{ $recipe->title }}</h1>
        <p>{{ $recipe->description }}</p>
        <p><strong>Views:</strong> {{ $recipe->view_count }}</p>

        <h2>Recently Viewed Products</h2>
<ul>
    {{-- @foreach ($recentlyViewedProducts as $recentProduct)
        <li>
            <a href="{{ route('recipes.show', $recentProduct) }}">
                {{ $recentProduct->name }}
            </a>
        </li>
    @endforeach --}}
    
</ul>
    </div>

</x-app-layout>
