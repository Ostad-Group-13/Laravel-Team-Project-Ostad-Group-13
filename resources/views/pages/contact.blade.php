<x-guest-layout>
  <main class="container py-[70px]">
        
    <div class="flex items-center flex-col md:flex-row gap-8">
        <!-- Image Section -->
        <div class="w-full md:w-1/3 ">
            <img src="{{ asset('/assets/img/common/contact1.jpg') }}" alt="Chef giving thumbs up" class="w-full h-auto rounded-lg">
        </div>
        
        <!-- Form Section -->
        <div class="w-full md:w-2/3 space-y-6">
          <h1 class="md:text-[64px] text-[35px] font-semibold mb-16">Contact us</h1>
            <form class="space-y-6">
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
                      <select id="enquiry" name="enquiry" 
                      class="input-field">
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
                    <textarea id="message" name="message" rows="6" placeholder="Enter your messages..." 
                        class="input-textarea"></textarea>
                </div>
                
                <!-- Submit Button -->
                <div class="flex justify-start">
                    <button type="submit" 
                        class="btn_primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
  </main>


  <x-newsletter />



</x-guest-layout>