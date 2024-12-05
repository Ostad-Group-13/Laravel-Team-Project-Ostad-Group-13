<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $table = 'recipes';
    
    protected $guarded = [];

    # Relationship

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function ingredient(){
    //     return $this->belongsTo(Ingredient::class, 'recipe_id');

    // }

    // public function nutrition(){
    //     return $this->belongsTo(Nutrition::class, 'recipe_id');

    // }

    public function ingredient()
    {
        return $this->hasMany(Ingredient::class,'id');
    }

    public function nutrition()
    {
        return $this->hasMany(Nutrition::class,'id');
    }

}
