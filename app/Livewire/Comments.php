<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $inputComment;
    public $recipe_id;
    public $replyComment;

    public function addComment()
    {
        // Ensure user is authenticated

        if (!Auth::check()) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'You must be logged in to comment.']);
            return;
        }

        // Validate input
        $this->validate([
            'inputComment' => 'required',
        ]);

        // Create a new comment
        Comment::create([
            'recipe_id' => $this->recipe_id,
            'user_id' => Auth::id(),
            'comment' => $this->inputComment,
        ]);

        // Clear the input field
        $this->inputComment = '';

        // Dispatch success toast
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Your comment has been added.']);
    }

    public function addReply(Comment $comment){
        // Validate input
        $this->validate([
            'replyComment' => 'required',
        ]);

        Comment::create([
            'recipe_id' => $this->recipe_id,
            'user_id' => Auth::id(),
            'comment' => $this->replyComment,
            'parent_id' => $comment->id
        ]);
        $this->replyComment = '';
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Your reply has been added.']);
    }
    public function delete(Comment $comment){
        $comment->delete();
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Your comment has been deleted.']);
    }

    public function render()
    {
        // $comments = Comment::where('recipe_id', $this->recipe_id)->orderBy('created_at', 'desc')->get();
        $comments = Comment::with('user', 'replies.user')
        ->whereNull('parent_id') // Only top-level comments
        ->where('recipe_id', $this->recipe_id) // Filter by recipe
        ->latest()
        ->get();
        return view('livewire.comments', compact('comments'));
    }
}
