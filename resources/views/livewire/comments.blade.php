<div class="p-4 max-w-xl mx-auto bg-white shadow-lg rounded-lg">
    <!-- Comment Form -->
    @if (Auth::user())
        <form wire:submit.prevent="addComment" class="space-y-4">
            @csrf
            <div>
                <textarea
                    wire:model="inputComment"
                    placeholder="Add your comment"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4">
                </textarea>
                @error('inputComment')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition">
                Submit
            </button>
        </form>
    @endif

    <!-- Comments List -->
    <ul class="mt-6 space-y-4">
        <p class="text-lg font-semibold text-gray-800">Comments:-</p>
        @foreach($comments as $comment)
            <li class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                <p class="text-gray-800">{{ $comment->comment }}</p>
                <span class="block text-sm text-gray-600">
                    <i class="fas fa-calendar-alt"></i>
                    {{ ($comment->created_at) ? $comment->created_at->diffForHumans() : '' }}
                </span>
                <span class="block text-sm text-gray-600 mt-2">
                    <i class="fas fa-user"></i>
                    <strong>{{ $comment->user->name ?? 'Guest' }}</strong>
                </span>
            </li>
        @endforeach
    </ul>
</div>

<!-- Toaster Notification Script -->
@push('modals')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('toast', ( type, message) => {
                console.log(type, message);
            })
        });
    </script>
@endpush
