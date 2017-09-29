<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{

	public $table = "programa";
	public $timestamps = false;

    protected $fillable = [
        'nombre', 'codigo', 'fecha_vencimiento'
    ];
}
