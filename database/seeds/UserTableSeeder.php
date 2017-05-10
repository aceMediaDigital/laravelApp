<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Anele",
            'last_name' => "M",
            'email' => "johndoe@gmail.com",
            'password' => bcrypt("myverysercretlongpassword"),
            'isActive' => 1,
            'remember_token' => str_random(10)
        ]);
    }
}
