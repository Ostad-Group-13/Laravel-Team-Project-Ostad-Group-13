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

            // 'recipeTitle' => 'required|string|max:255',
            // 'pre_time' => 'required|nullable|string|max:255',
            // 'cook_time' => 'required|nullable|string|max:255',
            // 'cat_id' => 'required|nullable|string',
            // 'recipe_type' => 'required|nullable|string',
            // 'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            // 'video_link' => 'nullable|file',

            // 'short_description' => 'required|nullable|string',
            // 'directions' => 'nullable|string',
            // 'nutrition_text' => 'required|nullable|string',

            #ingredients
            // 'ingredients' => 'nullable|array',
            // 'ingredients.*.title' => 'required_with:ingredients|string|max:255',
            // 'ingredients.*.ingredients_list' => 'required_with:ingredients|array',
            // 'ingredients.*.ingredients_list.*' => 'required_with:ingredients|string|max:255',

            #nutritions
            // 'nutritions' => 'nullable|array',
            // 'nutritions.*.name' => 'required_with:nutritions|string|max:255',
            // 'nutritions.*.amount' => 'required_with:nutritions|string|max:255',
            // 'nutritions.*.unit' => 'required_with:nutritions|string|max:255',

        ];


        // $request->validate([
        //     'field' => 'required|numeric|between:1,10',
        // ], [
        //     'field.between' => 'The :attribute must be between 1 and 10.',
        // ]);
    }
}
