<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imgs')->insert([
            'path' => 'images/animal.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal1.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal3.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal4.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal5.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal6.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal7.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal8.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal9.jpg',
            'category' => '1',
        ]);

        DB::table('imgs')->insert([
            'path' => 'images/animal10.jpg',
            'category' => '1',
        ]);
    }
}
