<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert(array(array(
            'id'=>1,
            'tipo' => 'admin',
        )));
        DB::table('roles')->insert(array(array(
            'id'=>2,
            'tipo' => 'medico',
        )));
    }
}
