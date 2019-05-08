<?php

use Illuminate\Database\Seeder;

class PasswordRequirementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('password_requirements')->insert(array(
            'name' => 'min',
            'status' => '1',
            'description' => 'cantidad minima de caracteres para contraseña',
            'value' => '8',
            'cod_requirement' => '0001',
            'regex' => '0',
            'message' => 'La contraseña debe tener al menos 8 caracteres',
        ));

        DB::table('password_requirements')->insert(array(
            'name' => 'max',
            'status' => '1',
            'description' => 'cantidad maxima de caracteres par la contraseña',
            'value' => '16',
            'cod_requirement' => '0002',
            'regex' => '0',
            'message' => 'La contraseña debe no debemas de 16 caracteres',
        ));

        DB::table('password_requirements')->insert(array(
            'name' => 'num',
            'status' => '0',
            'description' => 'al menos un digito numerico requerido',
            'value' => '(.*[0-9].*)',
            'cod_requirement' => '0003',
            'regex' => '1',
            'message' => 'al menos un caracter numerico',
        ));

        DB::table('password_requirements')->insert(array(
            'name' => 'uper',
            'status' => '0',
            'description' => 'al menos una letra mayuscula',
            'value' => '(.*[A-Z].*)',
            'cod_requirement' => '0004',
            'regex' => '1',
            'message' => 'al menos una letra mayuscula ',
        ));

        DB::table('password_requirements')->insert(array(
            'name' => 'lower',
            'status' => '0',
            'description' => 'al menos una letra minuscula',
            'value' => '(.*[a-z].*)',
            'cod_requirement' => '0005',
            'regex' => '1',
            'message' => 'al menos una minuscula',
        ));

        DB::table('password_requirements')->insert(array(
            'name' => 'special',
            'status' => '0',
            'description' => 'al menos un cararacter especial es requerido',
            'value' => '(.*[#\*_!@$%&-].*)',
            'cod_requirement' => '0006',
            'regex' => '1',
            'message' => 'al menos un carcater especial es requerido (.*[#\*_!@$%&-].*)',
        ));
    }
}
