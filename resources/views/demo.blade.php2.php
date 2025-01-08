<!-- resources/views/recipes/index.blade.php -->


{{-- <input type="text" name="recipe" value="{{ $recipe->id }}"> --}}

{{-- @if (auth()->user()->favoriteRecipes->contains($recipe->id))
    <button onclick="toggleFavorite({{ $recipe->id }}, true)" class="px-2 py-2 bg-red-500 rounded ">Unfavorite</button>
@else
<button onclick="toggleFavorite({{ $recipe->id }}, false)" class="px-2 py-2 bg-green-500 rounded ">Favorite</button>
@endif --}}

<x-app-layout>

   <h2 class="py-2">Recipe List</h2>
   <div id="loading-spinner" class="loading-spinner" style="display: none;">
      Loading...
   </div>

   <div role="status">
      <svg aria-hidden="true" class="inline w-10 h-10 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
         viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor" />
         <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill" />
      </svg>
      <span class="sr-only">Loading...</span>
   </div>


   <div role="status">
      <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
         viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor" />
         <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill" />
      </svg>
      <span class="sr-only">Loading...</span>
   </div>

   <button id="loading-spinner" type="button" class="bg-indigo-500">
      <svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
         <!-- ... -->
      </svg>

   </button>


   <div role="status">
      <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
         viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor" />
         <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill" />
      </svg>
      <span class="sr-only">Loading...</span>
   </div>



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

            @auth
            <button id="favorite-btn-{{ $recipe->id }}" class="favorite-btn bg-green-500 px-2 py-2 text-center text-lime-50 rounded-lg"
               data-recipe-id="{{ $recipe->id }}"
               data-favorited="{{ Auth::user()->favorites->contains($recipe) ? 'true' : 'false'}}">
               {{ Auth::user()->favorites->contains($recipe) ? 'Unfavorite' : 'Favorite','bg-red-600' }}
            </button>
            @endauth
         </div>
      </div>
      @endforeach

   </div>

</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js"></script>
<script>
   document.querySelectorAll('.favorite-btn').forEach(button => {
      button.addEventListener('click', function() {
         const recipeId = this.dataset.recipeId;
         const isFavorited = this.dataset.favorited === 'true';

         const url = `/recipe/${recipeId}/favorite`;
         const method = isFavorited ? 'delete' : 'post';

         axios({
            method: method,
            url: url,
            headers: {
               'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
         }).then(response => {
            this.dataset.favorited = !isFavorited;
            this.textContent = !isFavorited ? 'Unfavorite' : 'Favorite';
         }).catch(error => {
            console.error(error);
         });
      });
   });


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
      axios.get('{{ route('
            demo.index ') }}')
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

   const recipeId = this.dataset.recipeId;
   const isFavorited = this.dataset.favorited === 'true';

   const url = `/recipe/${recipeId}/favorite`;
   const method = isFavorited ? 'delete' : 'post';

   // Favorite Function

   function favorite(id) {

      const url = `/recipe/${id}/favorite`;

      // console.log(id);

      axios.post(url).then(response => {
         alert(response.data.message);
      }).catch(error => {
         console.error(error);
      });

      //             .then(response => {
      //                 // console.log('Recipe Favorite Success ', response.data.message);
      // //  this.props.handleSuccessfullFormSubmission(response.data);
      //                 alert(response.data.message);

      //                 // Page Reload 
      //                 // window.location.reload();

      //                 // fetchTasks();
      //                 // console.log(favID);
      //             }).catch(error => {
      //                 console.error(error);
      //             });

      // setInterval(function() {
      //     axios.post(`/recipe/${id}/favorite`)
      //         .then(response => {
      //             console.log('Recipe Favorite Success ', response.data.message);

      //             alert(response.data.message);

      //             // Page Reload 
      //             // window.location.reload();
      //             // fetchTasks();
      //             // console.log(favID);
      //         }).catch(error => {
      //             console.error(error);
      //         });
      // }, 1000);


      // setInterval(function() {
      //     axios.post(`/recipe/${id}/favorite`)
      //     .then(response => self.bids = response.data);
      // }, 30000);

      // catch(error => console.error('Error creating task:', error));
   }

   // setInterval(function() {

   //     favorite()

   //     }, 30000);

   // // Unfavorite Function


   function unfavorite(id) {
      // console.log(id);
      // recipe.unfavorite   

      const url = `/recipe/${id}/unfavorite`;

      axios.delete(url)
         .then(response => {
            alert(response.data.message);
            // fetchTasks();
            // console.log(favID);
         }).catch(error => {
            console.error(error);
         });

      // catch(error => console.error('Error deleting task:', error));
   }


   function showLoading() {
      document.getElementById('loading-spinner').style.display = 'block';
   }

   function hideLoading() {
      document.getElementById('loading-spinner').style.display = 'none';
   }


   function fetchRecipes(page = 1) {

      showLoading();

      axios.get(`/recipes?page=${page}`)
         .then(response => {
            displayRecipes(response.data.data);
            setupPagination(response.data);
         })
         .catch(handleError)
         .finally(hideLoading);
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