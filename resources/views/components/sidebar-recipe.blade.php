<div class="sider_item">
  <h2 class="text-2xl font-bold mb-6">Other Recipe</h2>
  
  <!-- Recipe Cards Container -->
  <div class="space-y-4">
    @foreach ($recipes as $recipe)
    <div class="flex gap-4 items-center">
      <div class="sm:w-[180px] sm:h-[120px] w-[100px] h-[80px] flex-shrink-0">
        <img src="{{ asset($recipe->photo) }}" alt="Chicken Meatball" class="w-full h-full object-cover rounded-lg">
      </div>
      <div>
        <a href="{{ route('recipe.show', $recipe->slug) }}"><h3 class="font-semibold sm:text-[20px] text-[16px] leading-tight sm:leading-[28px]">{{ $recipe->title }}</h3></a>
        <p class="text-sm text-gray-600 mt-[16px]">By {{ $recipe->user->name }}</p>
      </div>
    </div>
    @endforeach


  </div>
</div>