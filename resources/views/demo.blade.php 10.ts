<!-- resources/views/recipes/index.blade.php -->


{{-- <input type="text" name="recipe" value="{{ $recipe->id }}"> --}}

{{-- @if (auth()->user()->favoriteRecipes->contains($recipe->id))
    <button onclick="toggleFavorite({{ $recipe->id }}, true)" class="px-2 py-2 bg-red-500 rounded ">Unfavorite</button>
@else
    <button onclick="toggleFavorite({{ $recipe->id }}, false)" class="px-2 py-2 bg-green-500 rounded ">Favorite</button>
@endif --}}

<x-app-layout>

    <div class="container">

        <h2 class="text-left">Recipe List</h2>
        <hr class="clear my-3">

        <div class="flex flex-wrap md:flex-1">
            @foreach ($recipes as $recipe)
                {{-- <button 
    onclick="toggleFavorite({{ $recipe->id }}, {{ $isFavorited ? 'true' : 'false' }})"
    class="btn {{ $isFavorited ? 'btn-danger' : 'btn-primary' }}">
    {{ $isFavorited ? 'Unfavorite' : 'Favorite' }}
</button> --}}

                {{-- @if (auth()->user()->favoriteRecipes->contains($recipe->id))
                    <button onclick="toggleFavorite({{ $recipe->id }}, true)"
                        class="px-2 py-2 bg-red-500 rounded ">Unfavorite rr</button>
                @else
                    <button onclick="toggleFavorite({{ $recipe->id }}, false)"
                        class="px-2 py-2 bg-green-500 rounded ">Favorite rrr</button>
                @endif --}}


                <div class="flex-none md:flex-1 col-md-4">
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
        </div>
    </div>

</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js"></script>
<script>
    // const getAllData = () => {

    //     axios.get("{{ 'https://jsonplaceholder.typicode.com/comments?postId=1' }}")
    //         .then(response => {
    //             console.log(response.data);
    //         })
    // }

    // getAllData();


    // axios.post('/api/tasks', newTask)
    // .then(response => {
    //     console.log(response.data.message);
    // })
    // .catch(error => {
    //     if (error.response) {
    //         console.error('Error:', error.response.data.message);
    //     } else {
    //         console.error('Unexpected Error:', error.message);
    //     }
    // });


    // axios.get('recipes.favorite',$recipe)
    // .then(response => {
    //     console.log('Tasks on page 2:', response.data.data);
    // });

    // document.addEventListener('DOMContentLoaded', function() {

    // fetch('https://jsonplaceholder.typicode.com/users' https://jsonplaceholder.typicode.com/photos)
    //    .then(response => response.json())
    //    .then(json => console.log(json))

    //   });

    // ==============================

    const fetchTasks = () => {
        axios.get('{{ route('demo.index') }}')
            .then(response => {
                const tasks = response.data;
                const taskList = document.getElementById('task-list');
                taskList.innerHTML = '';
                tasks.forEach(task => {
                    const listItem = document.createElement('li');
                    listItem.textContent = task.title;
                    taskList.appendChild(listItem);
                });
            })
            .catch(error => console.error('Error fetching tasks:', error));
    };

    fetchTasks();

    const unfavorite = (id) => {
        // console.log(id);

        let favID = axios.delete(`/unfavorite/${id}`)
            .then(response => {
                alert(response.data.message);
                fetchTasks();
                console.log(favID);
            }).catch(error => console.error('Error deleting task:', error));
    };


    // Axios setup for CSRF token
    // axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;

    // function favorite(itemId) {
    //     // console.log(itemId);

    //     axios.post(`/favorite/${itemId}`)
    //         .then(response => {
    //             console.log(response.data.message);
    //             document.querySelector(`#item-${itemId} .favorite`).innerText = 'Unfavorite';
    //             document.querySelector(`#item-${itemId} .favorite`).classList.add('unfavorite');
    //             document.querySelector(`#item-${itemId} .favorite`).setAttribute('onclick',
    //                 `unfavorite(${itemId})`);
    //         })
    //         .catch(error => {
    //             console.error('Error favoriting item:', error);
    //         });
    // }

    // function unfavorite(itemId) {
    //     // console.log("Unfavorite"+itemId);

    //     axios.delete(`/unfavorite/${itemId}`)
    //         .then(response => {
    //             console.log(response.data.message);
    //             document.querySelector(`#item-${itemId} .unfavorite`).innerText = 'Favorite';
    //             document.querySelector(`#item-${itemId} .unfavorite`).classList.add('favorite');
    //             document.querySelector(`#item-${itemId} .unfavorite`).setAttribute('onclick',
    //                 `favorite(${itemId})`);
    //         })
    //         .catch(error => {
    //             console.error('Error unfavoriting item:', error);
    //         });
    // }
</script>
