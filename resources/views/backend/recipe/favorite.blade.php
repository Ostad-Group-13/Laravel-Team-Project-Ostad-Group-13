<x-app-layout>

    <div class="bg-white py-3 px-5 rounded-lg">
        <div class="py-1">
            <span>Hi,{{ Auth::user()->name }}</span>
            <h2 class="text-blue-600 font-semibold text-lg pt-3">
                Favorite Recipe List : ( {{ count($user['favorites']) }} )
            </h2>
        </div>
        {{-- {{ $user->favorite_recipes_count }} --}}
  
            <div class="flex min-w-full rounded-lg">
                <table class="min-w-full divide-gray-200">
                    <thead class="text-white">
                        <tr class="bg-gray-500">
                            <th class="px-2 py-3 text-left text-xs font-medium uppercase border-r">SL#</th>
                            <th class="px-2 py-3 text-left text-xs font-medium uppercase">User</th>
                            <th class="px-2 py-3 text-left text-xs font-medium uppercase border-l">Recipe</th>
                            <th class="px-2 py-3 text-left text-xs font-medium uppercase border-l">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($user['favorites'] as $recipe)
                            <tr class="border divide-gray-200 ">
                                <td class="px-4 py-2 text-sm text-gray-700 border-r">{{ $loop->iteration }}</td>
                                <td class="py-2 text-sm text-gray-700 border-r">
                                    <div class="flex px-2 py-1">
                                        <img class="h-[70px] rounded"
                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                            alt="" />
                                        <span class="px-2 pt-2 text-green-700">{{ $user->name }}</span>
                                    </div>
                                </td>

                                <td class="px-4 py-2 text-sm text-gray-700 border-r">
                                    <div class="flex">
                                        <div class="flex-shrink-0 w-[80px]">
                                            <img class="w-full h-[70px] rounded-lg" src="{{ $recipe->photo }}"
                                                alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <span>{{ Str::limit($recipe['title'], 30, '...') }}</span>
                                            <p class="text-red-600">{{ $recipe['recipe_type'] }}</p>
                                            <span class=" text-blue-600 py-4">{{ $recipe->category->name }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('favorite.delete',$recipe) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete_btn bg-red-500 border border-red-600  px-2 py-2 hover:bg-red-800 transition-all duration-300 ease-in-out ml-7 text-white rounded hover:scale-105">Remove Favorite Recipe</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-red-500">
                                    <strong>No Favorite Recipe Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        
    </div>

</x-app-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".more-options-btn").forEach((button) => {
            button.addEventListener("click", function() {
                const dropdown = this.nextElementSibling;
                dropdown.classList.toggle("hidden");
            });
        });
    });
</script>
