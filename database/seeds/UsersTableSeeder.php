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
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => 'testuser'.$i,
                'email' => 'testuser'.$i.'@example.com',
                'password' => bcrypt('testuser0123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'picture_path' => 'oooo',
                'comment' => 'oooo'
            ]);
        }
    }
}