<section class="newsletter py-[100px]">
    <div class="container">

        <div class="w-full !bg-no-repeat !bg-cover !bg-center h-[442px] rounded-[60px] overflow-hidden relative"
            style="background: url('{{ asset('/assets/img/common/newsletterbg.jpg') }}');">

            <!-- Content -->
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10 md:max-w-2xl w-full px-[40px] md:px-0 mx-auto text-center">
                <h2 class="xl:text-[48px] lg:text-[35px] md:text-[30px] text-[30px] font-semibold text-black mb-4">
                    Deliciousness to your inbox
                </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua
                </p>

                <!-- Subscription form -->
                <form action="{{ route('newsletter.subscribe') }}" method="POST"
                    class="relative max-w-[500px] mx-auto mt-[60px]">
                    @csrf
                    <input type="text" name="email" placeholder="Your email address..."
                        class="w-full h-[80px] rounded-[16px] px-4 border border-[#0000001A] focus:outline-none focus:ring-1 focus:ring-[#0000001A] placeholder:text-[#00000099] placeholder:text-sm placeholder:font-medium placeholder:leading-[28px]">
                    <button type="submit" class="btn_primary absolute top-1/2 right-[10px] -translate-y-1/2 z-10">
                        Subscribe
                    </button>
                </form>
                <!-- Display errors -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4"
                        role="alert">
                        <ul class="list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Display success message -->
                @if (session('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                        role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>
