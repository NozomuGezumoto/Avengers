<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('testuser0123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'oooo',
            'comment' => 'oooo'
        ]);
    }
}
