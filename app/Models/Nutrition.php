<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id','id');
    }
}
