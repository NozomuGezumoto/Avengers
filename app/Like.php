<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

}
