<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $guarded = [];

    # Relationship
    function blog(){
        return $this->hasMany(Blog::class);
    }

}
