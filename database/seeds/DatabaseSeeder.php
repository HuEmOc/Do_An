<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'address'=>'NgheAn',
            'gender'=>'0',
            'avatar'=>'1.jpg',
            'birthday'=>'1994-7-28',
            'password' => bcrypt('123456'),
            'role'  =>2,
        ]);
    }
}
