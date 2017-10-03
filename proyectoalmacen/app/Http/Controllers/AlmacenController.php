<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ambiente;

class AlmacenController extends Controller
{
    public function index(){

    $ambn = Ambiente::all();
    return view('almacen.consulta')->with('ambn', $ambn);
  }
  public function consultaInstructor(){
  	return view('almacen.consulta_instructor');
  }
}
