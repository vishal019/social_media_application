<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class createPostModel extends Model
{
    
    protected $table='posts';

    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    // Define the relationship with comments
    public function comments()
    {
        return $this->hasMany(comments::class, 'post_id');
    }

    
}
