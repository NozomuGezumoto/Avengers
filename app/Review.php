<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        // １対多 の関係の１
        return $this->belongsTo(User::class);
    }
}
