<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nutritions extends Model
{
    protected $table = 'nutrition';

    protected $guarded = [];

    #Relationship
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
