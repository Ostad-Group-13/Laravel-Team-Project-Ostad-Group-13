<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $table = 'recipes';

    protected $guarded = ['id'];

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
  
  public function nutritions()
    {
        return $this->hasMany(Nutrition::class);
    }
  
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    function recipeSlider()
    {
        return $this->hasMany(RecipeSlider::class);
    }
}
