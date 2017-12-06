<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(array(array(
            'id'=>1,
            'name' => 'Usuario Médico',
            'email' => 'medicoUser@gmail.com',
            'password' => bcrypt('user123medico'),
            'role_id'=>2,
        )));
        DB::table('users')->insert(array(array(
            'id'=>2,
            'name' => 'Usuario administrador',
            'email' => 'adminUser@gmail.com',
            'password' => bcrypt('user123admin'),
            'role_id'=>1,
        )));

    }
}
