<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documento', 'name', 'email', 'password','apellido', 'telefono', 'rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function index(){

        if (Auth::check() && Auth::user()->rol == 'Administrador') {

            return view('admin.index');

        }if(Auth::check() && Auth::user()->rol == 'Almacen'){

            return view('almacen.index');

    

        }
    }
}
