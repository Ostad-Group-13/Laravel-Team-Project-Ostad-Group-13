  <!-- Header area start -->
  <header class="header_area py-[40px] border-b border-[#0000001A]">
    <div class="container">
      <div class="header_wrapp flex items-center justify-between">
        <div class="logo">
          <a href="{{ url('/') }}"><img src="{{ asset('/assets/img/logo/logo.png') }}" alt="Logo"></a>
        </div>
        <div class="main_menu hidden lg:block">
          <nav>
            <ul class="flex items-center gap-[50px]">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="{{ route('recipesPage') }}">Recipes</a></li>
              <li><a href="{{ route('aboutPage') }}">About us</a></li>
              <li><a href="{{ route('blogPage') }}">Blog</a></li>
              <li><a href="{{ route('contactPage') }}">Contact</a></li>
            </ul>
          </nav>
        </div>

        

        @if (Route::has('login'))
          @auth
          <div class="header_btn hidden lg:flex gap-[20px] items-center">
            <a href="{{ route('register') }}" class="btn_primary btn-sm">Dashboard</a>
          </div>
        @else
          <div class="header_btn hidden lg:flex gap-[20px] items-center">
            <a href="{{ route('login') }}" class="login_btn">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn_primary btn-sm">Sign up</a>
            @endif
            
          </div>
          @endauth
        @endif



        <div class="mobile_menu_toggle_icon block lg:hidden cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </div>
      </div>
    </div>
  
    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-0 pointer-events-none transition-opacity duration-300"></div>
  
    <!-- Mobile Menu -->
    <div id="mobile_menu" class="fixed top-0 right-0 w-[300px] h-full bg-white transform translate-x-full transition-transform duration-300 ease-in-out lg:hidden shadow-lg">
      <div class="p-4 flex justify-between items-center border-b">
        <div class="logo">
          <a href="{{ url('/') }}"><img src="{{ asset('/assets/img/logo/logo.png') }}" alt="Logo"></a>
        </div>
        <button id="close_menu" class="text-xl font-bold">&times;</button>
      </div>
      <nav class="p-4">
        <ul class="flex flex-col gap-4">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ route('recipesPage') }}">Recipes</a></li>
          <li><a href="{{ route('aboutPage') }}">About us</a></li>
          <li><a href="{{ route('blogPage') }}">Blog</a></li>
          <li><a href="{{ route('contactPage') }}">Contact</a></li>
        </ul>
        @if (Route::has('login'))
        @auth
        <div class="header_btn items-center mt-[50px]">
          <a href="{{ route('register') }}" class="btn_primary btn-sm">Dashboard</a>
        </div>
        @else
          <div class="header_btn items-center mt-[50px]">
            <a href="{{ route('login') }}" class="btn_secondary btn-sm block mb-3 text-center">Login</a>
            <a href="{{ route('register') }}" class="btn_primary btn-sm block text-center">Sign up</a>
          </div>
        @endauth
        @endif
      </nav>
    </div>
  </header>
  
  <!-- Header area end -->


  <script>

    document.addEventListener('DOMContentLoaded', () => {
      const mobileMenu = document.getElementById('mobile_menu');
      const overlay = document.getElementById('overlay');
      const toggleIcon = document.querySelector('.mobile_menu_toggle_icon');
      const closeMenuButton = document.getElementById('close_menu');
    
      // Open menu
      toggleIcon.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-full');
        overlay.classList.add('opacity-50'); // Make overlay visible
        overlay.classList.remove('pointer-events-none'); // Enable overlay interactions
      });
    
      // Close menu
      const closeMenu = () => {
        mobileMenu.classList.add('translate-x-full');
        overlay.classList.remove('opacity-50'); // Hide overlay
        overlay.classList.add('pointer-events-none'); // Disable overlay interactions
      };
    
      closeMenuButton.addEventListener('click', closeMenu);
      overlay.addEventListener('click', closeMenu);
    });
    
    
  </script>