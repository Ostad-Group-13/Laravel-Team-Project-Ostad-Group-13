<x-guest-layout>

  <div class="racipe_page py-[70px]">
    <div class="container">
      <div class="flex flex-col lg:flex-row gap-[30px]">
        <div class="racipe_filter_sidebar lg:w-1/5 w-full">
          <form action="">

            <div class="filter_item mb-[30px]">
              <h2 class="filter_title">Category</h2>
              <ul class="filter_list">
                <li class="filter_list_item">
                  <label for="Breakfast"><input type="checkbox" id="Breakfast">Breakfast</label>
                </li>
                <li class="filter_list_item">
                  <label for="Vegan"><input type="checkbox" id="Vegan">
                    <span>Vegan</span>
                  </label>
                </li>
                <li class="filter_list_item">
                  <label for="Meat"><input type="checkbox" id="Meat">
                    <span>Meat</span>
                    </label>
                </li>
                <li class="filter_list_item">
                  <label for="Dessert"><input type="checkbox" id="Dessert">
                    <span>Dessert</span>
                    </label>
                </li>
                <li class="filter_list_item">
                  <label for="Lunch"><input type="checkbox" id="Lunch">
                    <span>Lunch</span>
                    </label>
                </li>
                <li class="filter_list_item">
                  <label for="Chocolate"><input type="checkbox" id="Chocolate">
                    <span>Chocolate</span>
                    </label>
                </li>
              </ul>
            </div>
            <div class="filter_item mb-[30px]">
              <h2 class="filter_title">Ingredients</h2>
              <ul class="filter_list">
                <li class="filter_list_item">
                  <label for="vegan"><input type="checkbox" id="vegan">vegan</label>
                </li>
                <li class="filter_list_item">
                  <label for="gluten-free"><input type="checkbox" id="gluten-free">
                    <span>gluten-free</span>
                  </label>
                </li>
                <li class="filter_list_item">
                  <label for="dairy-free"><input type="checkbox" id="dairy-free">
                    <span>dairy-free</span>
                    </label>
                </li>
                <li class="filter_list_item">
                  <label for="ketogenic"><input type="checkbox" id="ketogenic">
                    <span>ketogenic</span>
                    </label>
                </li>
                <li class="filter_list_item">
                  <label for="paleo"><input type="checkbox" id="paleo">
                    <span>paleo</span>
                    </label>
                </li>
              </ul>
            </div>
            <div class="filter_item mb-[30px]">
              <h2 class="filter_title">Cuisine</h2>
              <ul class="filter_list">
                <li class="filter_list_item">
                  <label for="Asian"><input type="checkbox" id="Asian">Asian</label>
                </li>
                <li class="filter_list_item">
                  <label for="Italian"><input type="checkbox" id="Italian">
                    <span>Italian</span>
                  </label>
                </li>
                <li class="filter_list_item">
                  <label for="French"><input type="checkbox" id="French">
                    <span>French</span>
                    </label>
                </li>
                <li class="filter_list_item">
                  <label for="Indian"><input type="checkbox" id="Indian">
                    <span>Indian</span>
                    </label>
                </li>
                <li class="filter_list_item">
                  <label for="American"><input type="checkbox" id="American">
                    <span>American</span>
                    </label>
                </li>
              </ul>
            </div>

            <button type="submit" class="btn_primary btn-sm w-full">Apply</button>

          </form>
        </div>
        <div class="racipe_content lg:w-4/5 w-full">

          <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[20px] ">

            @foreach ($recipes as $recipe )  
            <x-recipe-item :recipe="$recipe" />
            @endforeach
            
      
          </div>
          
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