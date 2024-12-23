<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    // protected $table = 'nutritions';

    protected $guarded = [];

    #Relationship
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id','id');
    }
}
