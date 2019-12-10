<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'movie_id', 'animal_img_path', 'food_img_path',
    ];
    public function user()
    {
        // １対多 の関係の１
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        // reviewsテーブルとusersテーブルは、
        // likesテーブルを介して多対多の関係です
        return $this->belongsToMany('App\User', 'likes')
            ->withTimestamps();
    }

}
