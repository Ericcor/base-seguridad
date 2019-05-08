<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(array(
            'name' => '35-01-01-01',
            'display_name' => 'Ver usuarios activos',
            'sort' => '1',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-01-01-02',
            'display_name' => 'Crear usuarios',
            'sort' => '2',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-01-01-03',
            'display_name' => 'Modificar usuarios',
            'sort' => '3',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-01-01-04',
            'display_name' => 'Eliminar usuarios',
            'sort' => '4',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

       	DB::table('permissions')->insert(array(
            'name' => '35-01-02-01',
            'display_name' => 'Ver usuarios inactivos',
            'sort' => '5',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-01-03-01',
            'display_name' => 'Ver usuarios eliminados',
            'sort' => '6',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-02-01-01',
            'display_name' => 'Ver roles registrados',
            'sort' => '7',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-02-01-02',
            'display_name' => 'Crear rol',
            'sort' => '8',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-02-01-03',
            'display_name' => 'Modificar rol',
            'sort' => '9',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-02-01-04',
            'display_name' => 'Eliminar rol',
            'sort' => '10',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

        DB::table('permissions')->insert(array(
            'name' => '35-03-01-01',
            'display_name' => 'Ver reportes listado',
            'sort' => '11',
            'created_at' => '14/02/19',
            'updated_at' => '14/02/19',
            'module' => 'seguridad',
        ));

    }
}
