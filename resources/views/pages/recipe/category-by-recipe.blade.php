<x-guest-layout>

  <div class="racipe_page pb-[70px]">
    <div class="section_title_area py-10 text-center bg-gray-200 mb-20">
      <div class="container">
        <h1 class="text-3xl font-bold">Category - <span class="text-[#ff0000]">{{ $category->name }}</span></h1>
      </div>
    </div>
    <div class="container">
      <div class="flex flex-col lg:flex-row gap-[30px]">
        <div class="racipe_content w-full">

          @if ($category->recipe->isNotEmpty())
          <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[20px] ">

            @foreach ($category->recipe as $recipe )
              <x-recipe-item :recipe="$recipe" />       
            @endforeach

          </div>
          @else
            <h1 class="text-center text-3xl font-bold">No Recipe Found</h1>
          @endif
          
        </div>
      </div>
    </div>
  </div>



  

  <script>

    const favicon = document.querySelectorAll('.favrict_icon');
    favicon.forEach(icon => {
      icon.addEventListener('click', () => {
      icon.classList.toggle('active');
      })
    })
  
  
  </script>

</x-guest-layout>