<x-guest-layout>
    <main class="container py-[70px]">

        <div class="flex items-center flex-col md:flex-row gap-8">
            <!-- Image Section -->
            <div class="w-full md:w-1/3 ">
                <img src="{{ asset('/assets/img/common/contact1.jpg') }}" alt="Chef giving thumbs up"
                    class="w-full h-auto rounded-lg">
            </div>

            <!-- Form Section -->
            <div class="w-full md:w-2/3 space-y-6">
                <h1 class="md:text-[64px] text-[35px] font-semibold mb-16">Contact us</h1>
                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label for="name" class="input-label">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name..."
                                class="input-field ">
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="input-label">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="Your email address..."
                                class="input-field">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Subject Field -->
                        <div class="space-y-2">
                            <label for="subject" class="input-label">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="Enter subject..."
                                class="input-field">
                        </div>

                        <!-- Enquiry Type Dropdown -->
                        <div class="space-y-2">
                            <label for="enquiry" class="input-label">Enquiry Type</label>
                            <select id="enquiry" name="enquiry" class="input-field">
                                <option value="advertising">Advertising</option>
                                <option value="partnership">Partnership</option>
                                <option value="general">General Inquiry</option>
                                <option value="support">Support</option>
                            </select>
                        </div>
                    </div>

                    <!-- Messages Field -->
                    <div class="space-y-2">
                        <label for="message" class="input-label">Messages</label>
                        <textarea id="message" name="message" rows="6" placeholder="Enter your messages..." class="input-textarea"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-start">
                        <button onclick="submitForm()" type="button" class="btn_primary">
                            Submit
                        </button>
                    </div>

                    <!-- Error Message Container -->
                    <div id="ContacterrorContainer"
                        class="mt-4 hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul id="ContacterrorList" class="list-disc list-inside"></ul>
                    </div>

                    <!-- Success Message Container -->
                    <div id="ContactsuccessContainer"
                        class="mt-4 hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        <p id="ContactsuccessMessage"></p>
                    </div>

                </div>
            </div>
        </div>
    </main>


    <x-newsletter />



<script>
    async function submitForm() {
        // Get form values
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let subject = document.getElementById('subject').value;
        let enquiry = document.getElementById('enquiry').value;
        let message = document.getElementById('message').value;

        // Containers for feedback
        let errorContainer = document.querySelector('#ContacterrorContainer');
        let errorList = document.querySelector('#ContacterrorList');
        let successContainer = document.querySelector('#ContactsuccessContainer');
        let successMessage = document.querySelector('#ContactsuccessMessage');

        // Reset containers
        errorContainer.classList.add('hidden');
        successContainer.classList.add('hidden');
        errorList.innerHTML = '';
        successMessage.textContent = '';

        try {
            // Send request
            const res = await axios.post('{{ route('store.contact') }}', {
                name: name,
                email: email,
                subject: subject,
                enquiry_type: enquiry,
                message: message,
            });

            // Show success message
            successMessage.textContent = res.data.message || 'Form submitted successfully!';
            successContainer.classList.remove('hidden');
        } catch (error) {
            if (error.response && error.response.status === 422) {
                // Populate error messages
                const errors = error.response.data.errors;
                Object.values(errors).forEach((messages) => {
                    messages.forEach((msg) => {
                        const li = document.createElement('li');
                        li.textContent = msg;
                        errorList.appendChild(li);
                    });
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

    




</x-guest-layout>
