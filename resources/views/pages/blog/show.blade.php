<x-guest-layout>

  <div class="container mx-auto px-4 text-center blog-and-article-details-section py-[60px]">
    <div class="blog-title">
      <h1 class="text-center text-5xl my-8 font-bold break-words">
        {{ $blog->title }}
      </h1>
    </div>
    <div class="blog-posted-by flex justify-center items-center mt-4">
      <div class="flex items-center gap-2 text-sm text-gray-500">
        <img class="rounded-full user-profile-img" src="{{ asset($blog->users->profile_photo_url) }}" alt="User">
        <span class="font-medium">{{ $blog->users->name }}</span>
        <span class="border-line">|</span>
        <span>{{ $blog->created_at->format('d F Y') }}</span>
      </div>
    </div>
    <div class="blog-sub-title mt-8">
      <p class="text-center text-lg text-gray-700">
        {{ $blog->short_description }}
      </p>
    </div>
    <div class="mt-8 ">
      <div class="w-full rounded-[50px] overflow-hidden">
        <img src="{{ asset($blog->image) }}" class="blog-details-image rounded-[50px] mx-auto max-w-full h-full object-cover" alt="Blog Details">
      </div>
    </div>
    <div class="mt-8">
      <p class="text-center text-lg text-gray-700">
        {{ $blog->long_description }}
      </p>
    </div>
  </div>

</x-guest-layout>