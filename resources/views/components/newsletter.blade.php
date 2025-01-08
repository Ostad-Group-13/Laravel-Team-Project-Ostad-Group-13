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
                <div class="relative max-w-[500px] mx-auto mt-[60px]">
                    <input id="subscribeEmail" type="email" name="email" placeholder="Your email address..."
                        class="w-full h-[80px] rounded-[16px] px-4 border border-[#0000001A] focus:outline-none focus:ring-1 focus:ring-[#0000001A] placeholder:text-[#00000099] placeholder:text-sm placeholder:font-medium placeholder:leading-[28px]">
                    <button onclick="subscribeNewsletter()" type="button"
                        class="btn_primary absolute top-1/2 right-[10px] -translate-y-1/2 z-10">
                        Subscribe
                    </button>
                </div>

                <!-- Error Message Container -->
                <div id="errorContainer" class="mt-4 hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul id="errorList" class="list-inside"></ul>
                </div>

                <!-- Success Message Container -->
                <div id="successContainer" class="mt-4 hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    <p id="successMessage"></p>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
async function subscribeNewsletter() {
    // Clear previous messages
    const errorContainer = document.querySelector('#errorContainer');
    const errorList = document.querySelector('#errorList');
    const successContainer = document.querySelector('#successContainer');
    const successMessage = document.querySelector('#successMessage');

    errorContainer.classList.add('hidden');
    successContainer.classList.add('hidden');
    errorList.innerHTML = '';
    successMessage.textContent = '';

    try {
        const res = await axios.post('{{ route('newsletter.subscribe') }}', {
            email: document.querySelector('#subscribeEmail').value
        });

        document.querySelector('#subscribeEmail').value = '';
        // Show success message
        successMessage.textContent = res.data.message || 'Subscribed successfully!';
        successContainer.classList.remove('hidden');
    } catch (error) {
        if (error.response && error.response.data.errors) {
            // Show error messages
            const errors = error.response.data.errors;
            Object.values(errors).forEach((message) => {
                const li = document.createElement('li');
                li.textContent = message;
                errorList.appendChild(li);
            });
            errorContainer.classList.remove('hidden');
        } else {
            // Handle unexpected errors
            const li = document.createElement('li');
            li.textContent = 'Something went wrong. Please try again.';
            errorList.appendChild(li);
            errorContainer.classList.remove('hidden');
        }
    }
}

</script>
