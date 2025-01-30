<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
     protected $table='comments';
     protected $fillable = ['post_id', 'user_id', 'content'];

    public function post()
    {
        return $this->belongsTo(createPostModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
