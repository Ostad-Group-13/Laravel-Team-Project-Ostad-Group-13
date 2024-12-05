<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
       
            'recipeTitle' => 'required|string|max:255',
            'pre_time' => 'required|nullable|string|max:255',
            'cook_time' => 'required|nullable|string|max:255',
            'cat_id' => 'required|string',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video_link' => 'nullable|string',

            'short_description' => 'required|nullable|string',
            'directions' => 'nullable|string',
            'nutrition_text' => 'required|nullable|string',

            'ingredients' => 'nullable|array',
            'ingredients.*.title' => 'required_with:ingredients|string|max:255',
            'ingredients.*.ingredients_list' => 'required_with:ingredients|array',
            'ingredients.*.ingredients_list.*' => 'required_with:ingredients|string|max:255',

            'nutritions' => 'nullable|array',
            'nutritions.*.name' => 'required_with:nutritions|string|max:255',
            'nutritions.*.amount' => 'required_with:nutritions|string|max:255',
            'nutritions.*.unit' => 'required_with:nutritions|string|max:255',

        ];
    }
}
