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
            'name' => 'Lina',
            'email' => 'lina@gmail.com',
            'documento' => '1053788909',
            'password' => bcrypt('456'),
            'apellido' =>'Hernandez Rendon',
            'telefono' =>'3152524068',
            'rol' => 'Administrador',
        ]);
        User::create([
            'name' => 'Joha',
            'email' => 'Joha@gmail.com',
            'documento' => '106546541',
            'password' => bcrypt('123'),
            'apellido' =>'Arias',
            'telefono' =>'354684354',
            'rol' => 'Almacen',
        ]);
        User::create([
            'name' => 'Luz Adriana',
            'email' => 'luz@gmail.com',
            'documento' => '24123456',
            'password' => bcrypt('123'),
            'apellido' =>'Toro',
            'telefono' =>'354684354',
            'rol' => 'Almacen',
        ]);
        User::create([
            'name' => 'Julian',
            'email' => 'juliancho@gmail.com',
            'documento' => '75101822',
            'password' => bcrypt('123'),
            'apellido' =>'Castano',
            'telefono' =>'354684354',
            'rol' => 'Administrador',
        ]);
    }
}
