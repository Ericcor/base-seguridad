<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
            'confirmation_code' => 'af25dcd8b6f4f0857b1c0c4c97442da7',
            'confirmed' => '1',
            'status' => '1',
            'status_description' => 'confirmada',
            'created_at' => '13/02/19',
            'updated_at' => '13/02/19',


        ]);
    }
}
