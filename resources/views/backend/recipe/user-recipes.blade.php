<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Recipe') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="bg-gray-600 text-white flex px-2 py-3 justify-between align-middle">
            <h2>User Recipe List</h2>
            <button>Back</button>
        </div>
        <table class="table mt-2">
            <thead class="bg-gray-400 text-white divide-2">
                <tr class="divide-2">
                    <th>Title</th>
                    <th>Views</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recipes as $recipe)
                    <tr class="border border-b">
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
        <h3 class="py-2">Total Views Across All Your Recipes :  {{ $totalViews }}</h3>
    </div>
    
</x-app-layout>