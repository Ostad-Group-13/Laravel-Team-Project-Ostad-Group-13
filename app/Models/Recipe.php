<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $table = 'recipes';

    protected $guarded = [];

    # Relationship

   function category()
    {
        return $this->belongsTo(Category::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    function nutritions(){
        return $this->hasMany(Nutritions::class);
    }

<<<<<<< HEAD
=======


    // public function favoritedBy()
    // {
    //     return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    // }


    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    function recipeSlider(){
        return $this->hasMany(RecipeSlider::class);
    }


>>>>>>> 4a96b3efd34a9c3e199180acd80d47b5de92af28
}
