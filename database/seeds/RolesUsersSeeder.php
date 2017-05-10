<?php

use Illuminate\Database\Seeder;

class RolesUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = DB::table('roles')->get();
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            foreach ($roles as $role) {
                DB::table('roles_users')->insert([
                    'role_id' => $role->id,
                    'user_id' => $user->id,
                ]);
            }
        }

        foreach ( $users as $user){
            DB::table('users_profile')->insert([
                'user_id'   => $user->id
            ]);
        }
    }
}
