<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
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

                // 'title' => 'required|string|max:255',
                // 'slug' => 'required|string|max:255|unique:recipes,slug,' . $recipe->id,
                // 'pre_time' => 'nullable|string|max:255',
                // 'cook_time' => 'nullable|string|max:255',
                // 'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

                // 'ingredients' => 'nullable|array',
                // 'ingredients.*.title' => 'required_with:ingredients|string|max:255',
                // 'ingredients.*.ingredients_list' => 'required_with:ingredients|array',
                // 'ingredients.*.ingredients_list.*' => 'required_with:ingredients|string|max:255',
                // 'nutritions' => 'nullable|array',

                // 'nutritions.*.name' => 'required_with:nutritions|string|max:255',
                // 'nutritions.*.amount' => 'required_with:nutritions|string|max:255',
                // 'nutritions.*.unit' => 'required_with:nutritions|string|max:255',
        ];

        
    }
}
