<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $inputComment;
    public $recipe_id;

    protected $rules = [
        'inputComment' => 'required',
    ];

    public function addComment()
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'You must be logged in to comment.']);
            return;
        }

        // Validate input
        $this->validate();

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

    public function render()
    {
        $comments = Comment::where('recipe_id', $this->recipe_id)->orderBy('created_at', 'desc')->get();
        return view('livewire.comments', compact('comments'));
    }
}
