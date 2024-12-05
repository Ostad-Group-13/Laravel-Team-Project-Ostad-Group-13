<x-guest-layout>



  <div class="racipe_details_area py-[80px]">
    <div class="container">
      <div class="racipe_details_wrapp flex flex-col lg:flex-row gap-[40px] items-center">
        <div class="rd_head_info lg:w-2/3 w-full">
          <h1 class="xl:text-[64px] md:text-[50px] text-[35px] leading-tight font-semibold text-black">{{ $recipe->title }}</h1>
          <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-[20px] items-center py-[50px]">
            <div class="rd_head_info_item">
              <div class="flex items-center gap-[16px]">
                <img class="w-[50px] h-[50px] rounded-full" src="{{ asset($recipe->user->profile_photo_url) }}" alt="user profile image">
                <div class="flex flex-col">
                  <span class="font-medium text-sm">{{ $recipe->user->name }}</span>
                  <p class="text-[#00000099] text-sm font-medium">{{ $recipe->created_at->format('d F Y') }}</p>
                </div>
              </div>
            </div>
            <div class="rd_head_info_item">
              <div class="flex items-center sm:justify-center justify-start gap-[10px]">
                <div class="icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.75 1.5H14.25C14.4489 1.5 14.6397 1.42098 14.7803 1.28033C14.921 1.13968 15 0.948912 15 0.75C15 0.551088 14.921 0.360322 14.7803 0.21967C14.6397 0.0790176 14.4489 0 14.25 0L9.75 0C9.55109 0 9.36032 0.0790176 9.21967 0.21967C9.07902 0.360322 9 0.551088 9 0.75C9 0.948912 9.07902 1.13968 9.21967 1.28033C9.36032 1.42098 9.55109 1.5 9.75 1.5Z" fill="black"/>
                    <path d="M12 3C10.22 3 8.47991 3.52784 6.99987 4.51677C5.51983 5.50571 4.36628 6.91131 3.68509 8.55585C3.0039 10.2004 2.82567 12.01 3.17294 13.7558C3.5202 15.5016 4.37737 17.1053 5.63604 18.364C6.89472 19.6226 8.49836 20.4798 10.2442 20.8271C11.99 21.1743 13.7996 20.9961 15.4442 20.3149C17.0887 19.6337 18.4943 18.4802 19.4832 17.0001C20.4722 15.5201 21 13.78 21 12C20.9973 9.61388 20.0482 7.32626 18.361 5.63902C16.6737 3.95178 14.3861 3.0027 12 3ZM16.2426 8.81799L12.5304 12.5303C12.4607 12.6 12.378 12.6552 12.2871 12.6929C12.1961 12.7306 12.0985 12.75 12 12.75C11.9015 12.75 11.804 12.7306 11.713 12.6929C11.622 12.6553 11.5393 12.6 11.4697 12.5304C11.4 12.4607 11.3448 12.378 11.3071 12.2871C11.2694 12.1961 11.25 12.0985 11.25 12C11.25 11.9015 11.2694 11.804 11.3071 11.713C11.3448 11.622 11.4 11.5393 11.4696 11.4697L15.182 7.75736C15.2516 7.68771 15.3343 7.63246 15.4253 7.59477C15.5163 7.55708 15.6138 7.53767 15.7123 7.53767C15.8108 7.53767 15.9083 7.55707 15.9993 7.59476C16.0903 7.63244 16.173 7.68769 16.2426 7.75733C16.3123 7.82697 16.3675 7.90965 16.4052 8.00065C16.4429 8.09164 16.4623 8.18916 16.4623 8.28766C16.4623 8.38615 16.4429 8.48368 16.4052 8.57467C16.3675 8.66567 16.3123 8.74835 16.2427 8.81799H16.2426Z" fill="black"/>
                    </svg>                    
                </div>
                <div class="flex flex-col">
                  <span class="font-medium text-sm">PREP TIME</span>
                  <p class="text-[#00000099] text-sm font-medium">{{ $recipe->pre_time }}</p>
                </div>
              </div>
            </div>
            <div class="rd_head_info_item">
              <div class="flex items-center lg:justify-center justify-start gap-[10px]">
                <div class="icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.75 1.5H14.25C14.4489 1.5 14.6397 1.42098 14.7803 1.28033C14.921 1.13968 15 0.948912 15 0.75C15 0.551088 14.921 0.360322 14.7803 0.21967C14.6397 0.0790176 14.4489 0 14.25 0L9.75 0C9.55109 0 9.36032 0.0790176 9.21967 0.21967C9.07902 0.360322 9 0.551088 9 0.75C9 0.948912 9.07902 1.13968 9.21967 1.28033C9.36032 1.42098 9.55109 1.5 9.75 1.5Z" fill="black"/>
                    <path d="M12 3C10.22 3 8.47991 3.52784 6.99987 4.51677C5.51983 5.50571 4.36628 6.91131 3.68509 8.55585C3.0039 10.2004 2.82567 12.01 3.17294 13.7558C3.5202 15.5016 4.37737 17.1053 5.63604 18.364C6.89472 19.6226 8.49836 20.4798 10.2442 20.8271C11.99 21.1743 13.7996 20.9961 15.4442 20.3149C17.0887 19.6337 18.4943 18.4802 19.4832 17.0001C20.4722 15.5201 21 13.78 21 12C20.9973 9.61388 20.0482 7.32626 18.361 5.63902C16.6737 3.95178 14.3861 3.0027 12 3ZM16.2426 8.81799L12.5304 12.5303C12.4607 12.6 12.378 12.6552 12.2871 12.6929C12.1961 12.7306 12.0985 12.75 12 12.75C11.9015 12.75 11.804 12.7306 11.713 12.6929C11.622 12.6553 11.5393 12.6 11.4697 12.5304C11.4 12.4607 11.3448 12.378 11.3071 12.2871C11.2694 12.1961 11.25 12.0985 11.25 12C11.25 11.9015 11.2694 11.804 11.3071 11.713C11.3448 11.622 11.4 11.5393 11.4696 11.4697L15.182 7.75736C15.2516 7.68771 15.3343 7.63246 15.4253 7.59477C15.5163 7.55708 15.6138 7.53767 15.7123 7.53767C15.8108 7.53767 15.9083 7.55707 15.9993 7.59476C16.0903 7.63244 16.173 7.68769 16.2426 7.75733C16.3123 7.82697 16.3675 7.90965 16.4052 8.00065C16.4429 8.09164 16.4623 8.18916 16.4623 8.28766C16.4623 8.38615 16.4429 8.48368 16.4052 8.57467C16.3675 8.66567 16.3123 8.74835 16.2427 8.81799H16.2426Z" fill="black"/>
                    </svg>                    
                </div>
                <div class="flex flex-col">
                  <span class="font-medium text-sm">COOK TIME</span>
                  <p class="text-[#00000099] text-sm font-medium">{{ $recipe->cook_time }}</p>
                </div>
              </div>
            </div>
            <div class="rd_head_info_item">
              <div class="flex items-center sm:justify-center justify-start gap-[10px]">
                <div class="icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.9989 7.47893C11.9985 7.46538 11.998 7.45183 11.9969 7.43819C11.9957 7.42451 11.994 7.41101 11.9922 7.39754C11.9912 7.39059 11.9909 7.38367 11.9898 7.37667L11.2398 2.87667C11.2237 2.77947 11.1885 2.6864 11.1364 2.60278C11.0843 2.51916 11.0162 2.44663 10.936 2.38934C10.8559 2.33205 10.7652 2.29111 10.6692 2.26887C10.5732 2.24663 10.4738 2.24352 10.3766 2.25972C10.2794 2.27592 10.1864 2.31112 10.1028 2.36329C10.0192 2.41547 9.9467 2.4836 9.88946 2.5638C9.83222 2.644 9.79134 2.73469 9.76916 2.8307C9.74699 2.9267 9.74394 3.02613 9.76021 3.12331L10.3646 6.74999H8.625V2.99999C8.625 2.80108 8.54598 2.61031 8.40533 2.46966C8.26468 2.32901 8.07391 2.24999 7.875 2.24999C7.67609 2.24999 7.48532 2.32901 7.34467 2.46966C7.20402 2.61031 7.125 2.80108 7.125 2.99999V6.74999H5.38536L5.98979 3.12331C6.00606 3.02613 6.00301 2.9267 5.98083 2.8307C5.95866 2.73469 5.91778 2.644 5.86053 2.5638C5.80329 2.4836 5.73081 2.41547 5.64722 2.36329C5.56364 2.31112 5.47059 2.27592 5.3734 2.25972C5.27621 2.24352 5.17678 2.24663 5.08079 2.26887C4.9848 2.29111 4.89413 2.33205 4.81397 2.38934C4.73381 2.44663 4.66572 2.51916 4.6136 2.60278C4.56148 2.6864 4.52635 2.77947 4.51021 2.87667L3.76021 7.37667C3.75906 7.38367 3.75879 7.39059 3.75778 7.39754C3.75595 7.411 3.75426 7.42451 3.75311 7.43819C3.75197 7.45183 3.75146 7.46538 3.75105 7.47893C3.75087 7.48598 3.75 7.4929 3.75 7.49999C3.75 7.50667 3.75046 7.51322 3.7505 7.51986C3.75064 7.52448 3.75064 7.52906 3.75087 7.53364C3.75993 8.4912 4.1014 9.41586 4.71687 10.1495C5.33235 10.8831 6.18359 11.3801 7.125 11.5554V21C7.125 21.1989 7.20402 21.3897 7.34467 21.5303C7.48532 21.671 7.67609 21.75 7.875 21.75C8.07391 21.75 8.26468 21.671 8.40533 21.5303C8.54598 21.3897 8.625 21.1989 8.625 21V11.5554C9.56641 11.3801 10.4177 10.8831 11.0331 10.1495C11.6486 9.41586 11.9901 8.49119 11.9991 7.53364C11.9994 7.52906 11.9994 7.52448 11.9995 7.51986C11.9995 7.51322 12 7.50667 12 7.49999C12 7.4929 11.9991 7.48598 11.9989 7.47893Z" fill="black"/>
                    <path d="M19.8743 2.98673C19.8741 2.97126 19.8732 2.95578 19.872 2.94026C19.8712 2.92973 19.8702 2.9193 19.8689 2.90891C19.8673 2.89595 19.8653 2.883 19.863 2.87004C19.8607 2.85699 19.8582 2.84409 19.8553 2.83131C19.8529 2.82115 19.8503 2.81104 19.8475 2.80092C19.8433 2.78586 19.8388 2.77103 19.8337 2.75638C19.8323 2.75217 19.8314 2.74791 19.8299 2.7437C19.8282 2.73917 19.826 2.73495 19.8243 2.73047C19.8186 2.71577 19.8125 2.70134 19.806 2.68716C19.8018 2.67791 19.7974 2.66879 19.7928 2.65979C19.7866 2.64771 19.7801 2.63582 19.7733 2.62413C19.7673 2.61365 19.7611 2.60335 19.7546 2.59323C19.7484 2.58371 19.742 2.57446 19.7354 2.56522C19.7274 2.55405 19.7194 2.54311 19.7109 2.53249C19.7046 2.52466 19.6981 2.51711 19.6916 2.50955C19.6823 2.49875 19.6727 2.48808 19.6628 2.47787C19.6558 2.47073 19.6486 2.46387 19.6414 2.457C19.6314 2.44748 19.6213 2.43814 19.6108 2.42921C19.6024 2.42203 19.5937 2.41525 19.5849 2.40843C19.5751 2.40083 19.5653 2.39328 19.5551 2.38614C19.5447 2.37886 19.534 2.37204 19.5233 2.36531C19.5142 2.35959 19.5051 2.35382 19.4957 2.34851C19.4835 2.34155 19.471 2.33514 19.4583 2.32887C19.4497 2.32457 19.4411 2.32027 19.4322 2.31628C19.419 2.31033 19.4055 2.30493 19.3918 2.29971C19.3827 2.29628 19.3737 2.29285 19.3644 2.28973C19.3513 2.28529 19.338 2.2814 19.3246 2.27769C19.3139 2.27472 19.3032 2.27193 19.2924 2.26941C19.2805 2.26671 19.2685 2.26437 19.2564 2.26222C19.2432 2.25984 19.2301 2.25783 19.2168 2.25618C19.2066 2.25494 19.1963 2.25394 19.186 2.25307C19.1706 2.25183 19.1552 2.25105 19.1397 2.25073C19.1347 2.25064 19.13 2.25 19.125 2.25C19.1205 2.25 19.1161 2.2506 19.1116 2.25069C19.0962 2.25096 19.0808 2.25179 19.0654 2.25302C19.0548 2.25385 19.0443 2.2548 19.0339 2.25609C19.0209 2.25769 19.008 2.2597 18.9951 2.26199C18.982 2.26428 18.9691 2.2668 18.9563 2.26978C18.9462 2.27211 18.9361 2.27476 18.9259 2.27756C18.9109 2.28168 18.8961 2.28621 18.8814 2.29129C18.8772 2.29271 18.8729 2.29362 18.8687 2.29513C18.8595 2.29852 18.8504 2.30255 18.8412 2.30598C18.8377 2.3074 18.8341 2.30864 18.8306 2.3101C16.8985 3.03625 15.3511 5.4066 14.2315 9.35806C13.7237 11.1814 13.3552 13.0408 13.1293 14.9201C13.1181 15.0247 13.1291 15.1305 13.1614 15.2306C13.1938 15.3308 13.2469 15.423 13.3172 15.5012C13.3875 15.5795 13.4735 15.6421 13.5696 15.685C13.6657 15.7278 13.7698 15.75 13.875 15.75H18.375V21C18.375 21.1989 18.454 21.3897 18.5947 21.5303C18.7353 21.671 18.9261 21.75 19.125 21.75C19.3239 21.75 19.5147 21.671 19.6554 21.5303C19.796 21.3897 19.875 21.1989 19.875 21V3C19.875 2.99551 19.8744 2.99121 19.8743 2.98673Z" fill="black"/>
                    </svg>                                        
                </div>
                <div class="flex flex-col">
                  <span class="font-medium text-sm">{{ $recipe->category->name }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 w-full text-end mb-[30px] lg:mb-0 ">
          <div class="print&shareButton flex lg:justify-end justify-start w-full gap-[30px]">
            <a href="#" class="rounded-btn">
              <div class="icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.99988 9V2H17.9999V9" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M5.99988 18H3.99988C3.46944 18 2.96074 17.7893 2.58566 17.4142C2.21059 17.0391 1.99988 16.5304 1.99988 16V11C1.99988 10.4696 2.21059 9.96086 2.58566 9.58579C2.96074 9.21071 3.46944 9 3.99988 9H19.9999C20.5303 9 21.039 9.21071 21.4141 9.58579C21.7892 9.96086 21.9999 10.4696 21.9999 11V16C21.9999 16.5304 21.7892 17.0391 21.4141 17.4142C21.039 17.7893 20.5303 18 19.9999 18H17.9999" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M17.9999 14H5.99988V22H17.9999V14Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>                  
              </div>
              <span>Print</span>
            </a>
            <a href="#" class="rounded-btn">
              <div class="icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 12V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V12" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16 6L12 2L8 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12 2V15" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>                                   
              </div>
              <span>SHARE</span>
            </a>
          </div>
        </div>
      </div>

      <div class="image_and_Nutrition flex flex-col lg:flex-row gap-[40px] justify-between">
        <div class="image lg:w-2/3 w-full">

          <div class="relative w-full max-w-4xl mx-auto h-64 sm:h-80 md:h-[400px] lg:h-[500px] rounded-[30px] shadow-lg overflow-hidden bg-white">
            <!-- Preview Image -->
            <img id="video-preview" 
                 src="{{ asset($recipe->photo) }}" 
                 alt="Video Preview" 
                 class="w-full h-full object-cover">
            
            <!-- Play Button -->
            <button id="play-button" 
                    class="absolute inset-0 flex items-center justify-center bg-transparent z-10">
              <svg xmlns="http://www.w3.org/2000/svg" 
                   viewBox="0 0 24 24" 
                   fill="currentColor" 
                   class="w-20 h-20 text-gray-800">
                <circle cx="12" cy="12" r="10" fill="white"></circle>
                <path d="M10 8l6 4-6 4V8z" fill="black"></path>
              </svg>
            </button>

            <video class="hidden w-full object-cover max-w-4xl mx-auto h-64 sm:h-80 md:h-[400px] lg:h-[500px]" id="video-iframe" Controls src="{{ asset($recipe->video_link) }}"></video>
          
          </div>
          
          
  
        </div>

        <div class="nutrition_info lg:w-1/3 w-full">
          <div class="nutrition grid">
              <div>
                <h2 class="text-2xl font-semibold mb-4">Nutrition Information</h2>
                <ul class="mt-[30px]">
                  @foreach ($recipe->nutritions as  $nutrition)
                  <li><span >{{ $nutrition->name }}</span> <span class="nu_value">{{ $nutrition->amount }} {{ $nutrition->unit }}</span></li>
                  @endforeach
                </ul>
              </div>
              <p class="text-center self-end">{{ $recipe->nutritions_text }}</p>
          </div>
        </div>
          
      </div>

      <div class="short_desc py-[80px]">
        <p>{{ $recipe->short_description }}</p>
      </div>


      <div class="flex flex-col lg:flex-row gap-[40px]">

        <div class="ingridents lg:w-2/3 w-full">
          <h2 class="text-[36px] font-semibold mb-4">Ingredients</h2>

          <div class="checklist py-[30px]">
            <h3 class="text-[24px] font-semibold mb-4">For main dish</h3>
            <ul>
              <li>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" class="hidden peer">
                  <span class="w-6 h-6 ml-0 flex rounded-full border-2 border-gray-300 items-center justify-center peer-checked:border-black peer-checked:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-4 h-4 peer-checked:block">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </span>
                  <span class="checktext">Custom Checkbox</span>
                </label>
              </li>
              <li>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" class="hidden peer">
                  <span class="w-6 h-6  flex rounded-full border-2 border-gray-300 items-center justify-center peer-checked:border-black peer-checked:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-4 h-4 peer-checked:block">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </span>
                  <span class="checktext">Lorem ipsum dolor sit amet</span>
                </label>
              </li>
              <li>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" class="hidden peer">
                  <span class="w-6 h-6  flex rounded-full border-2 border-gray-300 items-center justify-center peer-checked:border-black peer-checked:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-4 h-4 peer-checked:block">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </span>
                  <span class="checktext">Lorem ipsum dolor sit amet</span>
                </label>
              </li>
              <li>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" class="hidden peer">
                  <span class="w-6 h-6  flex rounded-full border-2 border-gray-300 items-center justify-center peer-checked:border-black peer-checked:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-4 h-4 peer-checked:block">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </span>
                  <span class="checktext">Custom Checkbox</span>
                </label>
              </li>
            </ul>
          </div>

          <div class="checklist py-[30px]">
            <h3 class="text-[24px] font-semibold mb-4">For main dish</h3>
            <ul>
              <li>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" class="hidden peer">
                  <span class="w-6 h-6  flex rounded-full border-2 border-gray-300 items-center justify-center peer-checked:border-black peer-checked:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-4 h-4 peer-checked:block">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </span>
                  <span class="checktext">Custom Checkbox</span>
                </label>
              </li>
              <li>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" class="hidden peer">
                  <span class="w-6 h-6  flex rounded-full border-2 border-gray-300 items-center justify-center peer-checked:border-black peer-checked:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-4 h-4 peer-checked:block">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </span>
                  <span class="checktext">Lorem ipsum dolor sit amet</span>
                </label>
              </li>
              <li>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" class="hidden peer">
                  <span class="w-6 h-6  flex rounded-full border-2 border-gray-300 items-center justify-center peer-checked:border-black peer-checked:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-4 h-4 peer-checked:block">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </span>
                  <span class="checktext">Lorem ipsum dolor sit amet</span>
                </label>
              </li>
              <li>
                <label class="flex items-center space-x-2">
                  <input type="checkbox" class="hidden peer">
                  <span class="w-6 h-6  flex rounded-full border-2 border-gray-300 items-center justify-center peer-checked:border-black peer-checked:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-4 h-4 peer-checked:block">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </span>
                  <span class="checktext">Custom Checkbox</span>
                </label>
              </li>
            </ul>
          </div>

          <!-- description -->
         <div class="description mt-6">
          <h2 class="text-[36px] font-semibold mb-4">Directions</h2>

          <div class="desc-content">
            {{ $recipe->directions }}
          </div>

         </div>
          
        </div>


        <!-- siderbar -->
        <div class="sidebar lg:w-1/3 w-full">


          <x-sidebar-recipe :recipes="$recipes" />

          <x-sidebar-add />


        </div>

      </div>

    </div>
  </div>





  <script>



    // Select elements
    const playButton = document.getElementById('play-button');
    const previewImage = document.getElementById('video-preview');
    const videoIframe = document.getElementById('video-iframe');

    // Add event listener to the play button
    playButton.addEventListener('click', () => {
        // Hide preview image and play button
        previewImage.classList.add('hidden');
        playButton.classList.add('hidden');

        // Show iframe and set video source
        videoIframe.classList.remove('hidden');
        videoIframe.play();
    });
</script>





</x-guest-layout>