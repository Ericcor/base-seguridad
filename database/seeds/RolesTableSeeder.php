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
        DB::table('roles')->insert(array(
            'name' => 'Administrador',
            'todos' => '1',
            'sort' => '1',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
        ));

        DB::table('roles')->insert(array(
            'name' => 'rol de prueba modulo de seguridad',
            'todos' => '0',
            'sort' => '2',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
        ));
    }
}
