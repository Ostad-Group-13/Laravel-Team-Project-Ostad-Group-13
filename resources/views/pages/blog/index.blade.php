<x-guest-layout>

  <div class="blog-and-article-section">
      <div class="blog-title">
          <h1 class="text-center text-5xl	my-8 font-bold break-words">
              Blog & Article
          </h1>
      </div>
      <div class="blog-sub-title">
          <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae, debitis. Sint hic
              quas, assumenda ratione ex quidem possimus minus voluptatibus!</p>
      </div>
      <div class="search-blog">
          <div class="flex items-center justify-center">
              <form method="GET" action="#" class="flex w-full max-w-md">
                  <input name="search" value="{{ request('search') }}" type="text" placeholder="Search for something..."
                      class="w-full py-3 pl-4 pr-4 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                  <button type="submit"
                      class="px-6 bg-black text-white font-semibold rounded-r-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
                      Search
                  </button>
              </form>
          </div>
      </div>
      <div class="container mx-auto p-6">
          <!-- Main Section -->
          <div class="flex flex-wrap lg:flex-nowrap gap-8">
              <!-- Left Section -->
              <div class="w-full lg:w-2/3 space-y-6">
                @if ($posts->isEmpty())
                  <p class="text-center text-2xl  text-black">No posts found.</p>
                @else
                  
                @foreach ($posts as $post)
                                  
                  <div class="flex flex-col lg:flex-row gap-8">

                      <img src="{{ asset($post->image) }}" alt="Noodle Recipe"
                          class="w-full lg:w-1/3 rounded-lg object-cover">

                      <div>
                          <a href="{{ route('article.show', $post->slug) }}" class="text-2xl font-bold text-black"><h2 class="text-3xl font-semibold mt-4">{{ $post->title }}</h2></a>
                          <p class="text-gray-500 mt-8 mb-3">
                              {{ $post->short_description }}
                          </p>
                          <div class="flex items-center gap-2 text-sm text-gray-500 mt-8">
                              <span>
                                  <img class="rounded-full user-profile-img"
                                      src="{{ asset($post->users->profile_photo_url) }}" alt="">
                              </span>
                              <span class="font-medium">{{ $post->users->name }}</span>
                              <span class="border-line">|</span>
                              <span>{{ $post->created_at->format('d F Y') }}</span>
                          </div>
                      </div>

                  </div>

                @endforeach
                @endif

              </div>

              <!-- Right Section -->
              <div class="w-full lg:w-1/3">
                  <h3 class="text-xl font-bold mb-4">Tasty Recipes</h3>
                  <div class="space-y-6">
                      <!-- Recipe 1 -->
                      <div class="flex gap-4">
                          <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Recipe 1"
                              class="pagination-btn rounded-lg object-cover">
                          <div>
                              <h4 class="text-lg mt-2 font-medium">Chicken Meatballs with Cream Cheese</h4>
                              <p class="text-sm mt-3 text-gray-500">By Andreas Paula</p>
                          </div>
                      </div>
                      <!-- Recipe 2 -->
                      <div class="flex gap-4">
                          <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Recipe 2"
                              class="pagination-btn rounded-lg object-cover">
                          <div>
                              <h4 class="text-lg mt-2 font-medium">Chicken Meatballs with Cream Cheese</h4>
                              <p class="text-sm mt-3 text-gray-500">By Andreas Paula</p>
                          </div>
                      </div>
                      <!-- Recipe 3 -->
                      <div class="flex gap-4">
                          <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Recipe 3"
                              class="pagination-btn rounded-lg object-cover">
                          <div>
                              <h4 class="text-lg mt-2 font-medium">Chicken Meatballs with Cream Cheese</h4>
                              <p class="text-sm mt-3 text-gray-500">By Andreas Paula</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


<div class="pagination flex justify-center items-center mx-auto mt-5">
  <div class="flex flex-wrap gap-[10px] items-center space-x-2">
      <!-- Previous Page Link -->
      @if ($posts->onFirstPage())
          <button class="pagination-btn bg-gray-300 text-gray-500 rounded-md flex items-center justify-center" disabled>‹</button>
      @else
          <a href="{{ $posts->previousPageUrl() }}"
              class="pagination-btn bg-gray-100 text-gray-800 rounded-md flex items-center justify-center hover:bg-gray-200">‹</a>
      @endif

      <!-- Pagination Elements -->
      @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
          @if ($page == $posts->currentPage())
              <button class="pagination-btn bg-black text-white rounded-md flex items-center justify-center">{{ $page }}</button>
          @else
              <a href="{{ $url }}"
                  class="pagination-btn bg-gray-100 text-gray-800 rounded-md flex items-center justify-center hover:bg-gray-200">{{ $page }}</a>
          @endif
      @endforeach

      <!-- Dots (Optional, for large page ranges) -->
      @if ($posts->lastPage() > 5 && $posts->currentPage() < $posts->lastPage())
          <span class="pagination-btn text-gray-800 flex items-center justify-center">...</span>
      @endif

      <!-- Next Page Link -->
      @if ($posts->hasMorePages())
          <a href="{{ $posts->nextPageUrl() }}"
              class="pagination-btn bg-gray-100 text-gray-800 rounded-md flex items-center justify-center hover:bg-gray-200">›</a>
      @else
          <button class="pagination-btn bg-gray-300 text-gray-500 rounded-md flex items-center justify-center" disabled>›</button>
      @endif
  </div>
</div>


</x-guest-layout>
