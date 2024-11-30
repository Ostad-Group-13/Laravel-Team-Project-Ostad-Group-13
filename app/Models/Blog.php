<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $guarded = [];


    # Relationship

    function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
