<x-guest-layout>
    <!-- Demo styles -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        /* body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        } */

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            /* text-align: center; */
            /* font-size: 18px; */
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            /* width: 100%; */
            /* height: 100%; */
            object-fit: cover;
        }

        .swiper {
            margin-left: auto;
            margin-right: auto;
        }

        .autoplay-progress {
            position: absolute;
            right: 16px;
            bottom: 16px;
            z-index: 10;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--swiper-theme-color);
        }

        .autoplay-progress svg {
            --progress: 0;
            position: absolute;
            left: 0;
            top: 0px;
            z-index: 10;
            width: 100%;
            height: 100%;
            stroke-width: 4px;
            stroke: var(--swiper-theme-color);
            fill: none;
            stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
            stroke-dasharray: 125.6;
            transform: rotate(-90deg);
        }
    </style>
    <!-- slider area start -->
    <section class="slider_area py-[40px]">
        <!-- Swiper -->
        {{-- <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div> --}}

        <div class="container swiper mySwiper">
            <div class="slider_wrapp swiper-wrapper">
                {{-- @for ($slide = 1; $slide <= 3; $slide++)
                @endfor --}}
                @foreach ($allSlider as $slider)
                    @if ($slider->status == 'active')
                        <x-home-slider :slider="$slider" />
                    @endif
                @endforeach

             

            </div>
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>
        </div>
    </section>
    <!-- slider area end -->

    <section class="category_area py-[50px]">
        <div class="container">
            <div class="flex sm:flex-row flex-col gap-10 items-center justify-between mb-[80px]">
                <div class="section_title_area">
                    <h2 class="section_title">Categories</h2>
                </div>
                <div class="section_btn_area">
                    <a href="#" class="btn_secondary">View All Categories</a>
                </div>
            </div>

            <div class="grid lg:grid-cols-6 md:grid-cols-3 grid-cols-2 gap-[30px] justify-center pt-[50px]">
                @foreach ($categorys as $category)
                    <div class="category_card">
                        <div class="category_item" style="background: linear-gradient(180deg, #70824600, #7082461A);">
                            <div class="category_img">
                                <img src="{{ asset($category->image) }}" alt="category-img">
                            </div>
                            <div class="category_content">
                                <a href="{{ route('category.by.recipe', $category->slug) }}">
                                    <h3 class="category_title">{{ $category->name }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>

    </section>

    <section class="racipes_area py-[50px]">
        <div class="container">
            <div class="mb-[80px]">
                <div class="section_title_area text-center">
                    <h2 class="section_title ">Simple and tasty recipes</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuipisicing elit, sed do eiusmod tempor incididunt ut<br>
                        labore et dolore magna aliqut enim ad minim </p>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[40px] ">

                @foreach ($recipes as $recipe)
                    <x-recipe-item :recipe="$recipe" />
                @endforeach

            </div>
        </div>

    </section>

    <x-newsletter />



</x-guest-layout>
