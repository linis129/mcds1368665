<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sebastian',
            'email' => 'sbitashenaol@gmail.com',
            'password' => bcrypt('123'),
            'apellido' =>'Henao Loaiza',
            'telefono' =>'3108552509',
            'rol' => 'Administrador',
        ]);
        User::create([
            'name' => 'Lina',
            'email' => 'lina@gmail.com',
            'password' => bcrypt('456'),
            'apellido' =>'Hernandez Rendon',
            'telefono' =>'3152524068',
            'rol' => 'Administrador',
        ]);
    }
}
