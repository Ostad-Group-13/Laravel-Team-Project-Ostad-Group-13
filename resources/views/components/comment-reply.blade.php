<li class="p-2 border border-gray-100 rounded-lg bg-gray-50"  x-data="{ openReply: false }">
    <div class="flex justify-between items-center">
        <strong>{{ $comment->user->name ?? 'Guest' }}</strong>
        <span class="text-sm text-gray-600">{{ $comment->created_at->diffForHumans() }}</span>
    </div>
    <p class="mt-2 text-gray-700">{{ $comment->comment }}</p>

    <!-- Reply Button -->
    @if(Auth::user())
    <span
        class="cursor-pointer text-blue-500 hover:underline"
        @click="openReply = !openReply"
        >Reply</span>

        <!-- Delete Button -->
        @if(Auth::user() && $comment->user_id == Auth::id())
            <span
                wire:click="delete({{ $comment->id }})"
                class="cursor-pointer text-red-500 hover:underline ml-4"
            >Delete</span>
        @endif
        <!-- Reply Form -->
        <div x-show="openReply" x-cloak class="mt-4">
        <form wire:submit.prevent="addReply({{ $comment->id }})" class="space-y-2">
            @csrf
            <div>
                <textarea
                    wire:model="replyComment"
                    placeholder="Add your reply"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="2">
                </textarea>
                @error('replyComment')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition">
                Reply
            </button>
            <button
                type="button"
                class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition"
                @click="openReply = false"
            >Cancel</button>
        </form>
    </div>
    @endif

    <!-- Recursive Replies -->
    @if($comment->replies->count())
        <ul class="mt-2 space-y-2 pl-4 border-l-2 border-gray-200">
            @foreach ($comment->replies as $reply)
                @include('components.comment-reply', ['comment' => $reply])
            @endforeach
        </ul>
    @endif
</li>
