<?php

namespace App;

use App\Ambiente;
use App\Programa;
use App\User;
use App\Horario;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public $table = "instructor";
	public $timestamps = false;

    protected $fillable = [
        'programa_id',  'ambiente_id', 'horario_id', 'nombre', 'documento'
    ];

    public function programa(){
        return $this->belongsTo('App\Programa', 'programa_id');
    }
    
    public function ambiente_formacion(){
        return $this->belongsTo('App\Ambiente', 'ambiente_id');
    }
     public function horario(){
        return $this->belongsTo('App\Horario', 'horario_id');
    }
    
    //   public function user(){
    //     return $this->belongsTo('App\User', 'user_id');
    // }
        
}
