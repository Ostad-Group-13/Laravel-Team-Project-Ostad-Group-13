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
  
  
    public function ingredient()
    {
        return $this->hasMany(Ingredient::class);
    }


    function user(){
        return $this->belongsTo(User::class);
    }

    function nutritions(){
        return $this->hasMany(Nutrition::class);
    }




}
