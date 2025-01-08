<!-- resources/views/recipes/index.blade.php -->


{{-- <input type="text" name="recipe" value="{{ $recipe->id }}"> --}}

{{-- @if (auth()->user()->favoriteRecipes->contains($recipe->id))
    <button onclick="toggleFavorite({{ $recipe->id }}, true)" class="px-2 py-2 bg-red-500 rounded ">Unfavorite</button>
@else
    <button onclick="toggleFavorite({{ $recipe->id }}, false)" class="px-2 py-2 bg-green-500 rounded ">Favorite</button>
@endif --}}

<x-app-layout>


    <section class="container mx-auto flex flex-row justify-center items-center h-screen" x-data="{ open: 2 }">

        <div class="flex flex-row items-stretch min-w-[600px] max-w-[900px] w-screen h-[400px]">

            <div class="relative min-w-[4rem] m-3 bg-red-500 duration-300 overflow-hidden rounded-2xl"
                :class="{ 'flex-grow': open === 1 }" @click="open = 1">
                <!-- image -->
                <img src="https://66.media.tumblr.com/6fb397d822f4f9f4596dff2085b18f2e/tumblr_nzsvb4p6xS1qho82wo1_1280.jpg"
                    alt="image" class="absolute offset-0 object-cover object-center h-full w-full">

                <div class="absolute bottom-3 left-3 flex items-center">
                    <div class="icon bg-white rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-walking text-red-500"></i>
                    </div>
                    <div class="pl-2 mb-2 text-white" :class="{ 'hidden': open !== 1 }">
                        <div class="font-extrabold">Blonkisoaz</div>
                        <div class="font-bold">Omuke trughte a otufta</div>
                    </div>
                </div>

            </div>

            <div class="relative min-w-[4rem] m-3 bg-red-500 duration-300 overflow-hidden rounded-2xl"
                :class="{ 'flex-grow': open === 2 }" @click="open = 2">
                <!-- image -->
                <img src="https://66.media.tumblr.com/6fb397d822f4f9f4596dff2085b18f2e/tumblr_nzsvb4p6xS1qho82wo1_1280.jpg"
                    alt="image" class="absolute offset-0 object-cover object-center h-full w-full">

                <div class="absolute bottom-3 left-3 flex items-center">
                    <div class="icon bg-white rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-walking text-red-500"></i>
                    </div>
                    <div class="pl-2 mb-2 text-white" :class="{ 'hidden': open !== 2 }">
                        <div class="font-extrabold">Blonkisoaz</div>
                        <div class="font-bold">Omuke trughte a otufta</div>
                    </div>
                </div>

            </div>

            <div class="relative min-w-[4rem] m-3 bg-red-500 duration-300 overflow-hidden rounded-2xl"
                :class="{ 'flex-grow': open === 3 }" @click="open = 3">
                <!-- image -->
                <img src="https://66.media.tumblr.com/6fb397d822f4f9f4596dff2085b18f2e/tumblr_nzsvb4p6xS1qho82wo1_1280.jpg"
                    alt="image" class="absolute offset-0 object-cover object-center h-full w-full">

                <div class="absolute bottom-3 left-3 flex items-center">
                    <div class="icon bg-white rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-walking text-red-500"></i>
                    </div>
                    <div class="pl-2 mb-2 text-white" :class="{ 'hidden': open !== 3 }">
                        <div class="font-extrabold">Blonkisoaz</div>
                        <div class="font-bold">Omuke trughte a otufta</div>
                    </div>
                </div>

            </div>

            <div class="relative min-w-[4rem] m-3 bg-red-500 duration-300 overflow-hidden rounded-2xl"
                :class="{ 'flex-grow': open === 4 }" @click="open = 4">
                <!-- image -->
                <img src="https://66.media.tumblr.com/6fb397d822f4f9f4596dff2085b18f2e/tumblr_nzsvb4p6xS1qho82wo1_1280.jpg"
                    alt="image" class="absolute offset-0 object-cover object-center h-full w-full">

                <div class="absolute bottom-3 left-3 flex items-center">
                    <div class="icon bg-white rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-walking text-red-500"></i>
                    </div>
                    <div class="pl-2 mb-2 text-white" :class="{ 'hidden': open !== 4 }">
                        <div class="font-extrabold">Blonkisoaz</div>
                        <div class="font-bold">Omuke trughte a otufta</div>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <div class="flex flex-wrap -m-3">

        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                <div class="bg-cover h-48"
                    style="background-image: url(https://images.unsplash.com/photo-1523978591478-c753949ff840?w=900);">
                </div>
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h3 class="mb-4 text-2xl">My heading</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                    </div>
                    <a href="#"
                        class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide">Twitter</a>
                </div>
            </div>
        </div>

        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                <div class="bg-cover h-48"
                    style="background-image: url(https://images.unsplash.com/photo-1497398276231-94ff5dc90217?w=900);">
                </div>
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h3 class="mb-4 text-2xl">My much longer heading</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tempore sapiente eveniet
                            quibusdam ab ea, quaerat placeat numquam aspernatur, accusamus magnam neque.</p>
                    </div>
                    <a href="#"
                        class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide"
                        style="">Twitter</a>
                </div>
            </div>
        </div>

        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                <div class="bg-cover h-48"
                    style="background-image: url(https://images.unsplash.com/photo-1503863937795-62954a3c0f05?w=900);">
                </div>
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h3 class="mb-4 text-2xl">My heading</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Shorter text.</p>
                    </div>
                    <a href="#"
                        class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide"
                        style="">Twitter</a>
                </div>
            </div>
        </div>

        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                <div class="bg-cover h-48"
                    style="background-image: url(https://images.unsplash.com/photo-1511084901824-1c57f5a16c98?w=900);">
                </div>
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h3 class="mb-4 text-2xl">My heading</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Shorter text.</p>
                    </div>
                    <a href="#"
                        class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide"
                        style="">Twitter</a>
                </div>
            </div>
        </div>

        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                <div class="bg-cover h-48"
                    style="background-image: url(https://images.unsplash.com/photo-1525935944571-4e99237764c9?w=900);">
                </div>
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h3 class="mb-4 text-2xl">My heading</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tempore sapiente eveniet
                            quibusdam ab ea, quaerat placeat numquam aspernatur, accusamus magnam neque.</p>
                    </div>
                    <a href="#"
                        class="border-t border-grey-light pt-2  text-xs text-grey hover:text-red uppercase no-underline tracking-wide"
                        style="">Twitter</a>
                </div>
            </div>
        </div>

        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                <div class="bg-cover h-48"
                    style="background-image: url(https://images.unsplash.com/photo-1486506574467-c44963fc7876?w=900);">
                </div>
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h3 class="mb-4 text-1xl">My heading</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Longer content.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tempore sapiente eveniet
                            quibusdam ab ea, quaerat placeat numquam aspernatur, accusamus magnam neque.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tempore sapiente eveniet
                            quibusdam ab ea, quaerat placeat numquam aspernatur, accusamus magnam neque.</p>
                    </div>
                    <a href="#"
                        class="border-t border-grey-light pt-2  text-xs text-grey hover:text-red uppercase no-underline tracking-wide"
                        style="">Twitter</a>
                </div>
            </div>
        </div>

    </div>

    <h2 class="py-2">Recipe List</h2>

    <div class="flex flex-wrap gap-4">

        @foreach ($recipes as $recipe)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="bg-cover h-52 w-full rounded-t" src="{{ asset($recipe->photo) }}" alt="" />
                <div class="px-2">
                    <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Noteworthy technology acquisitions 2021
                    </h3>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse
                        chronological order.
                    </p>

                    {{-- <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a> --}}

                    <hr>

                    {{-- <div class="border border-blue-700 w-full"></div> --}}

                    <div class="py-2">
                        @if (auth()->user()->favoriteRecipes->contains($recipe))
                            <button onclick="unfavorite({{ $recipe->id }})"
                                class="bg-red-600 px-3 py-2 rounded-lg outline-none capitalize hover:bg-red-800 transition-all duration-300 ease-linear text-white">Unfavorite</button>
                        @else
                            <button onclick="favorite({{ $recipe->id }})"
                                class="bg-green-600 px-3 py-2 rounded-lg outline-none capitalize hover:bg-green-800 transition-all duration-300 ease-linear text-white">Favorite</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

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

//     const newTask = { title: 'Learn Laravel', description: 'Understand API and Axios integration' };

// axios.post('/api/tasks', newTask)
//     .then(response => {
//         console.log('Task created:', response.data);
//     })
//     .catch(error => {
//         console.error('Error creating task:', error);
//     });


    // Favorite Function
    function favorite(id) {

        // console.log(id);

       axios.post(`/favorite/${id}`)
            .then(response => {
        console.log('Task created:', response.data.message);


                // alert(response.data.message);
                fetchTasks();
                // console.log(favID);
            }).catch(error => console.error('Error creating task:', error));
    }

    // Unfavorite Function


    function unfavorite(id) {
        console.log(id);

        let favID = axios.delete(`/unfavorite/${id}`)
            .then(response => {
                alert(response.data.message);
                // fetchTasks();
                // console.log(favID);
            }).catch(error => console.error('Error deleting task:', error));
    }




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
