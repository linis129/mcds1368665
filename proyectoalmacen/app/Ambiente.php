<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    public $table = "ambiente_formacion";
	public $timestamps = false;

    protected $fillable = [
        'nombre', 'estado'
    ];
}
