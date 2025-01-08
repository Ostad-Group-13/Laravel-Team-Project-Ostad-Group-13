<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recipe') }}
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between align-items-center">


            <h2 class="py-2 font-semibold pb-4 text-lg">Manage Recipe</h2>
            @can('create-user')
                <a href="{{ route('recipe.create') }}" class="add-new-btn inline-flex items-center gap-2 my-2">
                    <x-add-icon /> Create Recipe
                </a>
            @endcan
        </div>

        <div class="mt-4">

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="">
                        <tr class="bg-gray-100">
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-r">SL#</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase">Recipe</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">image</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Category</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">User</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Recipe Type</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Status</th>
                            <th class="py-4 px-3 text-left text-xs font-medium  uppercase border-l">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($recipes as $recipe)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ Str::limit($recipe->title, 10) }}</td>
                                {{-- <td class="px-4 py-2 text-sm text-gray-700">{{ $recipe->title }}</td> --}}
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <img @if ($recipe->photo) src="{{ asset($recipe->photo) }}" @else src="{{ asset('uploads/no-image.png') }}" @endif
                                        width="80" height="40">
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    @if ($recipe->category_id !== null)
                                        <span
                                            class="text-white px-3 py-2 bg-gray-400 rounded">{{ $recipe->category->name }}</span>
                                    @else
                                        <span class="text-red-600 px-3 py-2 font-semibold rounded">No Category</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 text-sm text-gray-700">
                                    @if ($recipe->user_id != null)
                                        <span
                                            class="text-white px-3 py-2 bg-blue-500 rounded">{{ $recipe->user->name }}</span>
                                    @else
                                        <span class="text-red-600 px-3 py-2 font-semibold rounded">No User</span>
                                    @endif

                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <span
                                        class="text-white px-3 py-2 bg-teal-700 rounded  capitalize">{{ $recipe->recipe_type }}</span>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    @if ($recipe->recipe_status == 'pending')
                                        <span
                                            class="text-orange-600 rounded text-lg font-semibold  capitalize">{{ $recipe->recipe_status }}</span>
                                    @else
                                        <span
                                            class="text-green-600 rounded text-lg font-semibold capitalize">{{ $recipe->recipe_status }}</span>
                                    @endif

                                </td>

                                <td>
                                    {{-- <input data-id="{{ $recipe->id }}" class="toggle-class" type="checkbox"
                                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                        data-on="Yes" data-off="No" @if (!empty($recipe) && $recipe->recipe_status) {{ 'checked' }} @endif
                                       > 
                                       
                                       @if (isset($recipe->recipe_status) && $recipe->recipe_status)checked="checked"@endif
                                       
                                       --}}

                                    <input type="checkbox" class="toggle-class" data-toggle="toggle"
                                        data-on="{{ $recipe->recipe_status == 'Approved' }}" data-onstyle="success"
                                        data-off="{{ $recipe->recipe_status == 'Pending' }}" data-offstyle="danger"
                                        data-id="{{ $recipe->id }}">
                                </td>

                                {{-- {{ $recipe->recipe_status ? 'checked' : '' }} --}}
                                {{-- <input  data-toggle="toggle" data-on="Yes" data-off="No" @if (!empty($person) && $person->intern_extern) {{ 'checked' }} @endif data-onstyle="primary" data-offstyle="info" type="checkbox" name="intern_extern"> --}}

                                <td class="px-4 py-2 text-sm text-gray-700 space-x-2">

                                    @if ($recipe->recipe_status == 'pending')
                                        {{-- <a href="{{ route('recipe.status', $recipe) }}"
                                            class="bg-green-600 px-2 py-1.5 rounded text-white"
                                            onclick="statusRecipe({{ $recipe->id }})">Approved</a> --}}
                                            <button onclick="RecipeStatus({{ $recipe->id }})" class="bg-green-600 px-2 py-1.5 rounded text-white">Approved</button>
                                    @else
                                        {{-- <a href="{{ route('recipe.status', $recipe) }}"
                                            class="bg-red-600 px-2 py-1.5 rounded text-white"
                                            onclick="statusRecipe({{ $recipe->id }})">Pending</a> --}}

                                            <button onclick="RecipeStatus({{ $recipe->id }})" class="bg-red-600 px-2 py-1.5 rounded text-white">Pending</button>
                                    @endif

                                    <a href="{{ route('recipe.show', $recipe) }}" class="show-btn">Show</a>
                                    @if (Auth::user()->hasRole('Super Admin'))
                                        <a href="{{ route('recipe.edit', $recipe) }}" class="edit-btn">Edit</a>
                                    @endif

                                    <form action="{{ route('recipe.destroy', $recipe) }}" method="post"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-btn" onclick="DeleteConfirm(event)">
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-sm text-red-500">
                                    <strong>No Recipe Found!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>


</x-app-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>


    let currentPageUrl = window.location.pathname;
    // console.log(currentPageUrl);

    // RecipeStatus(id) {

    function RecipeStatus(id) {

        const url = `/admin/recipe/status/${id}`;

        axios.get(url).then(response => {
            alert(response.data.message);
            window.location.reload();

        }).catch(error => {
            console.error(error);
        });
    }


    // const url = `/recipes?page=${currentPage}&search=${encodeURIComponent(searchQuery)}`;
    // const url = `recipe/status/{recipe}`;

    // axios setup code

    // axios.get(`recipe/status/{recipe}`).then(function(res) {
    //             console.log(res);

    //         })


    // $('body').on('click', '.toggle-class', function() {
    //     let id = $(this).data('id');
    //     console.log(id);

    //     let view = url + '/recipe.status' + '/' + id
    //     // console.log(view);
    //     axios.get(view)
    //         .then(function(res) {
    //             console.log(res);

    //         })
    // })



    $('body').on('click', '.toggle-class', function() {
        let id = $(this).data('id');
        console.log(id);
        // `/admin/recipe/status/${id}`;
        let view = '/admin/recipe/status/' + id
        console.log(view);
        axios.get(view)
            .then(function(res) {
                console.log(res);

            })
    })

</script>
