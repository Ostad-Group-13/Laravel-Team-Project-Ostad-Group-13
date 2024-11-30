<x-guest-layout>

    <div class="blog-and-article-section">
      <div class="blog-title">
          <h1 class="text-center text-5xl	my-8 font-bold break-words">
              Blog & Article
            </h1>
      </div>
      <div class="blog-sub-title">
          <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae, debitis. Sint hic quas, assumenda ratione ex quidem possimus minus voluptatibus!</p>
      </div>
      <div class="search-blog">
          <div class="flex items-center justify-center">
              <div class="flex w-full max-w-md">
                <input
                  type="text"
                  placeholder="Search for something..."
                  class="w-full py-3 pl-4 pr-4 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                >
                <button
                class="px-6 bg-black text-white font-semibold rounded-r-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
                Search
              </button>
              </div>
            </div>
      </div>
      <div class="container mx-auto p-6">
          <!-- Main Section -->
          <div class="flex flex-wrap lg:flex-nowrap gap-8">
            <!-- Left Section -->
            <div class="w-full lg:w-2/3 space-y-6">

              <div class="flex flex-col lg:flex-row gap-8">

                  <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Noodle Recipe" class="w-full lg:w-1/3 rounded-lg object-cover">

                  <div>
                  <h2 class="text-3xl font-semibold mt-4">Crochet Projects for Noodle Lovers</h2>
                  <p class="text-gray-500 mt-8 mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </p>
                  <div class="flex items-center gap-2 text-sm text-gray-500 mt-8">
                    <span>
                      <img class="rounded-full user-profile-img" src="{{ asset('/assets/img/sliders/auther01.png') }}" alt="">
                    </span>
                    <span class="font-medium">Wade Warren</span>
                    <span class="border-line">|</span>
                    <span>12 November 2021</span>
                  </div>
                </div>

              </div>

              <!-- Second Article -->
              <div class="flex flex-col lg:flex-row gap-8">

                <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Noodle Recipe" class="w-full lg:w-1/3 rounded-lg object-cover">

                <div>
                <h2 class="text-3xl font-semibold mt-4">Crochet Projects for Noodle Lovers</h2>
                <p class="text-gray-500 mt-8 mb-3">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="flex items-center gap-2 text-sm text-gray-500 mt-8">
                  <span>
                    <img class="rounded-full user-profile-img" src="{{ asset('/assets/img/sliders/auther01.png') }}" alt="">
                  </span>
                  <span class="font-medium">Wade Warren</span>
                  <span class="border-line">|</span>
                  <span>12 November 2021</span>
                </div>
              </div>

            </div>
            <div class="flex flex-col lg:flex-row gap-8">

              <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Noodle Recipe" class="w-full lg:w-1/3 rounded-lg object-cover">

              <div>
              <h2 class="text-3xl font-semibold mt-4">Crochet Projects for Noodle Lovers</h2>
              <p class="text-gray-500 mt-8 mb-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <div class="flex items-center gap-2 text-sm text-gray-500 mt-8">
                <span>
                  <img class="rounded-full user-profile-img" src="{{ asset('/assets/img/sliders/auther01.png') }}" alt="">
                </span>
                <span class="font-medium">Wade Warren</span>
                <span class="border-line">|</span>
                <span>12 November 2021</span>
              </div>
            </div>

          </div>
          <div class="flex flex-col lg:flex-row gap-8">

            <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Noodle Recipe" class="w-full lg:w-1/3 rounded-lg object-cover">

            <div>
            <h2 class="text-3xl font-semibold mt-4">Crochet Projects for Noodle Lovers</h2>
            <p class="text-gray-500 mt-8 mb-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="flex items-center gap-2 text-sm text-gray-500 mt-8">
              <span>
                <img class="rounded-full user-profile-img" src="{{ asset('/assets/img/sliders/auther01.png') }}" alt="">
              </span>
              <span class="font-medium">Wade Warren</span>
              <span class="border-line">|</span>
              <span>12 November 2021</span>
            </div>
          </div>

        </div>
            </div>

            <!-- Right Section -->
            <div class="w-full lg:w-1/3">
              <h3 class="text-xl font-bold mb-4">Tasty Recipes</h3>
              <div class="space-y-6">
                <!-- Recipe 1 -->
                <div class="flex gap-4">
                  <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Recipe 1" class="pagination-btn rounded-lg object-cover">
                  <div>
                    <h4 class="text-lg mt-2 font-medium">Chicken Meatballs with Cream Cheese</h4>
                    <p class="text-sm mt-3 text-gray-500">By Andreas Paula</p>
                  </div>
                </div>
                <!-- Recipe 2 -->
                <div class="flex gap-4">
                  <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Recipe 2" class="pagination-btn rounded-lg object-cover">
                  <div>
                    <h4 class="text-lg mt-2 font-medium">Chicken Meatballs with Cream Cheese</h4>
                    <p class="text-sm mt-3 text-gray-500">By Andreas Paula</p>
                  </div>
                </div>
                <!-- Recipe 3 -->
                <div class="flex gap-4">
                  <img src="{{ asset('/assets/img/racipes/rd01.jpg') }}" alt="Recipe 3" class="pagination-btn rounded-lg object-cover">
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
        <!-- Active page -->
        <button class="pagination-btn bg-black text-white rounded-md flex items-center justify-center">1</button>

        <!-- Other pages -->
        <button class="pagination-btn bg-gray-100 text-gray-800 rounded-md flex items-center justify-center hover:bg-gray-200">2</button>
        <button class="pagination-btn bg-gray-100 text-gray-800 rounded-md flex items-center justify-center hover:bg-gray-200">3</button>
        <button class="pagination-btn bg-gray-100 text-gray-800 rounded-md flex items-center justify-center hover:bg-gray-200">4</button>
        <button class="pagination-btn bg-gray-100 text-gray-800 rounded-md flex items-center justify-center hover:bg-gray-200">5</button>

        <!-- Dots -->
        <span class="pagination-btn text-gray-800 flex items-center justify-center">...</span>

        <!-- Next button -->
        <button class="pagination-btn bg-gray-100 text-gray-800 rounded-md flex items-center justify-center hover:bg-gray-200">›</button>
      </div>
    </div>

  </x-guest-layout>