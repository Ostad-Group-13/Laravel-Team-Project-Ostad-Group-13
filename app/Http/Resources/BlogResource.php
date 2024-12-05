<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'blog_id' => $this->id,
            'blog_title' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'user_id' => $this->user_id,
            'cat_id' => $this->cat_id,
            'blog_image' => $this->image,
            'created_at' => $this->created_at->format('d/M/Y H: i A'),
        ];
    }
}
