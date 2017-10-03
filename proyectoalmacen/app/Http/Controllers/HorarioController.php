<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\Http\Requests\HorarioRequest;

class HorarioController extends Controller
{
    public function index(){

    $query = Horario::all();
    return view('admin.horario.index')->with('query', $query);
  }
  public function store(HorarioRequest $request)
  {
    $hor = new Horario();
	   // $hor->codigo = $request->get('codigo');
    $hor->hora_inicial = $request->get('hora_inicial');
    $hor->hora_final = $request->get('hora_final');
    $hor->fecha_inicial = $request->get('fecha_inicial');
    $hor->fecha_final = $request->get('fecha_final');
    $hor->save();
    return redirect('gestion_horario')->with('message','Horario Registrado Con Exito!');
  }
  public function destroy($id)
  {
    Horario::destroy($id);
      return redirect('gestion_horario')->with('message','Horario Eliminada Con Exito!');
  }
  public function show($id)
  {
      return view('gestion_horario')->with('query', Horario::find($id));
  }
  public function edit($id)
  {
      
  }
  public function editarAjax($id){

    $editar = Horario::where('id', '=', $id)->get();
    return view('admin.horario.editarAjax', compact('editar'));

  }
  public function update(HorarioRequest $request, $id)
  {
    $hor = Horario::find($id);
    // $hor->codigo = $request->get('codigo');
    $hor->hora_inicial = $request->get('hora_inicial');
    $hor->hora_final = $request->get('hora_final');
    $hor->fecha_inicial = $request->get('fecha_inicial');
    $hor->fecha_final = $request->get('fecha_final');
    $hor->save();
      return redirect('gestion_horario')->with('message','Horario Modificada Con Exito!');
  }
}
