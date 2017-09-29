<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //
public $table = "horario";
	public $timestamps = false;

    protected $fillable = [
        'codigo','horario_inicial', 'horario_final','fecha_inicial','fecha_final'
    ];
}