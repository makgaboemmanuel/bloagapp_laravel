<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*   user added code  */
    public function posts(){
        return $this->hasMany(Post::class);
    }

    /* recently added code */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
