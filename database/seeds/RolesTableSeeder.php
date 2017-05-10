<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "superman",
            'description' => "Super Administrator",
        ]);

        DB::table('roles')->insert([
            'name' => "admin",
            'description' => "Administrator",
        ]);

        DB::table('roles')->insert([
            'name' => "publisher",
            'description' => "Publisher",
        ]);

        DB::table('roles')->insert([
            'name' => "moderator",
            'description' => "Moderator",
        ]);

        DB::table('roles')->insert([
            'name' => "author",
            'description' => "Author",
        ]);

        DB::table('roles')->insert([
            'name' => "editor",
            'description' => "Editor",
        ]);

        DB::table('roles')->insert([
            'name' => "normal",
            'description' => "Public",
        ]);
    }
}
