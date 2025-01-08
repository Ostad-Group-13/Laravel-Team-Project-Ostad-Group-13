<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'category_id' => $this->id,
            'category_name' => $this->name,
            'category_slug' => $this->slug,
            'category_color' => $this->color,
            'category_image' => $this->image,
            'active' => $this->active ? 'active' : 'inactive',
            'created_at' => $this->created_at ? $this->created_at->format('d/M/Y H:i A') : null,
        ];

    }
}
