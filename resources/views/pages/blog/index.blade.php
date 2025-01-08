<x-guest-layout>

    <div class="blog-and-article-section container" >
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
                <div class="flex w-full max-w-md">
                    <input id="search-input" type="text" placeholder="Search for something..."
                        class="w-full py-3 pl-4 pr-4 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                    <button type="button" id="search-button"
                        class="px-6 bg-black text-white font-semibold rounded-r-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600">
                        Search
                    </button>
                </div>
            </div>
        </div>



        <div class="flex justify-center mt-6 space-x-2">
            <!-- Pagination links will be displayed here -->
        </div>

        <div class="container mx-auto p-6">
            <!-- Main Section -->
            <div class="flex flex-wrap lg:flex-nowrap gap-8">
                <!-- Left Section -->
                <div class="lg:w-2/3 w-full">
                    <div id="blog-results" class="w-full space-y-6">

                    </div>
    
                    <div id="pagination-links" class=" pagination flex gap-[10px] justify-center items-center mx-auto mt-20">
    
                    </div>
                </div>


                <!-- Right Section -->
                <!-- siderbar -->
                <div class="sidebar lg:w-1/3 w-full">

                    <x-sidebar-recipe :recipes="$recipes" />

                    <x-sidebar-add />

                </div>
            </div>
        </div>
    </div>





    <script>
        async function fetchBlogs(url = '/search-blogs') {
            const query = document.getElementById('search-input').value;

            try {
                // Fetch blogs from the server
                const response = await axios.get(url, {
                    params: {
                        q: query
                    }, // Send the search query
                });

                const data = response.data;

                const formatDate = (dateString) => {
                    const date = new Date(dateString);
                    return new Intl.DateTimeFormat('en-GB', {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric',
                    }).format(date);
                };

                // Render blogs
                let results = '';
                if (data.data.length > 0) {
                    data.data.forEach((blog) => {
                    results += `
                    <div class="flex flex-col lg:flex-row gap-8">

                      <img src="${blog.image}" alt="Noodle Recipe"
                          class="w-full lg:w-1/3 rounded-lg object-cover">
                      <div>
                          <a href="articles/${blog.slug}" class="text-2xl font-bold text-black"><h2 class="text-3xl font-semibold mt-4">${ blog.title }</h2></a>
                          <p class="text-gray-500 mt-8 mb-3">
                              ${blog.short_description}
                          </p>
                          <div class="flex items-center gap-2 text-sm text-gray-500 mt-8">
                              <span>
                                  <img class="rounded-full user-profile-img"
                                      src="${ blog.user.profile_photo_url}" alt="">
                              </span>
                              <span class="font-medium">${ blog.user.name }</span>
                              <span class="border-line">|</span>
                              <span>${ formatDate(blog.created_at) }</span>
                          </div>
                      </div>

                  </div>
                    `;
                    });
                } else {
                    results = '<p class="text-gray-500">No blogs found.</p>';
                }
                document.getElementById('blog-results').innerHTML = results;

                // Render pagination links
                let pagination = '';
                if (data.links) {
                    data.links.forEach((link) => {
                        pagination += `
                        <button
                            class="pagination-btn rounded-md flex items-center justify-center ${
                                link.active
                                    ? 'bg-gray-900 text-white'
                                    : 'text-black bg-gray-200'
                            } rounded-lg"
                            data-url="${link.url}"
                            ${!link.url ? 'disabled' : ''}
                        >
                            ${link.label}
                        </button>
                    `;
                    });
                }
                document.getElementById('pagination-links').innerHTML = pagination;

                // Attach event listeners for pagination buttons
                document.querySelectorAll('#pagination-links button').forEach((button) => {
                    button.addEventListener('click', function() {
                        if (this.dataset.url) {
                            fetchBlogs(this.dataset.url);
                        }
                    });
                });
            } catch (error) {
                console.error(error);
            }
        }

        // Load recent blogs on page load
        window.addEventListener('DOMContentLoaded', () => {
            fetchBlogs();
        });

        // Fetch blogs on search
        document.getElementById('search-button').addEventListener('click', () => {
            fetchBlogs();
        });
    </script>




</x-guest-layout>
