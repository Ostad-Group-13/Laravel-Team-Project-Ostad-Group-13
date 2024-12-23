<footer class="footer_area py-10">

  <div class="container">
    <div class="footer_wrap flex flex-col lg:flex-row items-center justify-between gap-[20px] pb-[40px]">
      <div class="footer_left space-y-4">
        <div class="logo flex items-center justify-center lg:justify-start">
          <a href="{{ url('/') }}"><img src="{{ asset('/assets/img/logo/logo.png') }}" alt="Logo"></a>
        </div>
        <p class="text-center lg:text-start">Lorem ipsum dolor sit amet, consectetuipisicing elit, </p>
      </div>
      <div class="footer_menu">
        <nav>
          <ul class="flex items-center lg:gap-[50px] gap-[20px] flex-wrap justify-center">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('recipesPage') }}">Recipes</a></li>
            <li><a href="{{ route('aboutPage') }}">About us</a></li>
            <li><a href="{{ route('blogPage') }}">Blog</a></li>
            <li><a href="{{ route('contactPage') }}">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <hr>
    <div class="copy_right_area flex sm:flex-row flex-col gap-[20px] items-center justify-between pt-[40px]">
      <div class="text-center">
        <p>© 2020 Flowbase. Powered by <a class="link_text" href="#">Webflow</a></p>
      </div>
      <div class="footer_social flex items-center justify-end gap-[20px]">
        <a href="#">
          <svg width="10" height="20" viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.11163 3.29509H9.92331V0.139742C9.61075 0.0967442 8.53581 0 7.28393 0C4.67183 0 2.88248 1.643 2.88248 4.66274V7.44186H0V10.9693H2.88248V19.845H6.41654V10.9701H9.18243L9.6215 7.44269H6.41571V5.01251C6.41654 3.99297 6.69106 3.29509 8.11163 3.29509Z" fill="currentColor"/>
          </svg>
        </a>
        <a href="#">
          <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22.9617 2.11613C22.1435 2.475 21.2718 2.71288 20.3629 2.82838C21.2979 2.27013 22.0115 1.39287 22.347 0.3355C21.4753 0.85525 20.5128 1.22238 19.487 1.42725C18.6593 0.545875 17.4795 0 16.1925 0C13.6955 0 11.6853 2.02675 11.6853 4.51137C11.6853 4.86888 11.7155 5.21263 11.7898 5.53988C8.04017 5.357 4.72229 3.55988 2.49342 0.82225C2.10429 1.49738 1.87604 2.27012 1.87604 3.102C1.87604 4.664 2.68042 6.04862 3.87942 6.85025C3.15479 6.8365 2.44392 6.62613 1.84167 6.29475C1.84167 6.3085 1.84167 6.32638 1.84167 6.34425C1.84167 8.536 3.40505 10.3565 5.45517 10.7759C5.08805 10.8763 4.68792 10.9244 4.27267 10.9244C3.98392 10.9244 3.69242 10.9079 3.41879 10.8474C4.00317 12.6335 5.66142 13.9466 7.63317 13.9893C6.09867 15.1896 4.1503 15.9129 2.04104 15.9129C1.67117 15.9129 1.31642 15.8964 0.96167 15.851C2.95954 17.1394 5.3273 17.875 7.88067 17.875C16.1802 17.875 20.7177 11 20.7177 5.04075C20.7177 4.84137 20.7108 4.64887 20.7012 4.45775C21.5963 3.8225 22.3484 3.02913 22.9617 2.11613Z" fill="currentColor"/>
          </svg>
        </a>
        <a href="#">
          <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.83667 0H16.0867C19.883 0 22.9617 3.07862 22.9617 6.875V15.125C22.9617 18.9214 19.883 22 16.0867 22H7.83667C4.04029 22 0.96167 18.9214 0.96167 15.125V6.875C0.96167 3.07862 4.04029 0 7.83667 0ZM16.0867 19.9375C18.7404 19.9375 20.8992 17.7787 20.8992 15.125V6.875C20.8992 4.22125 18.7404 2.0625 16.0867 2.0625H7.83667C5.18292 2.0625 3.02417 4.22125 3.02417 6.875V15.125C3.02417 17.7787 5.18292 19.9375 7.83667 19.9375H16.0867Z" fill="currentColor"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.46167 11C6.46167 7.96263 8.92429 5.5 11.9617 5.5C14.999 5.5 17.4617 7.96263 17.4617 11C17.4617 14.0374 14.999 16.5 11.9617 16.5C8.92429 16.5 6.46167 14.0374 6.46167 11ZM8.52417 11C8.52417 12.8948 10.0669 14.4375 11.9617 14.4375C13.8564 14.4375 15.3992 12.8948 15.3992 11C15.3992 9.10388 13.8564 7.5625 11.9617 7.5625C10.0669 7.5625 8.52417 9.10388 8.52417 11Z" fill="currentColor"/>
            <circle cx="17.8742" cy="5.08737" r="0.732875" fill="currentColor"/>
            </svg>            
        </a>
      </div>
    </div>
  </div>

</footer>