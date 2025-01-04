<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Recipe') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Your Recipes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Views</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recipes as $recipe)
                    <tr>
                        <td>{{ $recipe->title }}</td>
                        <td>{{ $recipe->view_count }}</td>
                        <td>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">You have no recipes yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <hr>
        <h3>Total Views Across All Your Recipes: {{ $totalViews }}</h3>
    </div>
    
</x-app-layout>