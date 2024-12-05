<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{

  use HasFactory;
    protected $guarded = ['id'];

    # Relationship
    function blog(){
        return $this->hasMany(Blog::class);
    }
        
    function recipe(){
        return $this->hasMany(Recipe::class);
    }


    

}
