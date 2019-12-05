<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([//追加

   
            'user_id' => '1',
            'movie_id' => '330457',
            'comment' => 'aaaaaaa',
            'animal_img_path' => 'images/animal.jpg',
            'food_img_path' => 'images/animal5.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            ]);
    // foreach ($avengers as $avenger) {

    //     DB::table('reviews')->insert([
    //         'user_id' => '$user->id',
    //         'movie_id' => $avenger['movie_id'],
    //         'comment' => $avenger['comment'],
    //         'animal_img_path' => $avenger['animal_img_path'], //追加
    //         'food_img_path' => $avenger['food_img_path'],
    //         'create_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ]);
    // }
}
}
