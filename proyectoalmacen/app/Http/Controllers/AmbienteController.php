<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ambiente;
use App\Http\Requests\AmbienteRequest;

class AmbienteController extends Controller
{
    public function index(){

    $query = Ambiente::all();
    return view('admin.ambiente.index')->with('query', $query);
  }
    public function store(AmbienteRequest $request)
  {
    $amb = new Ambiente();
	  $amb->nombre = $request->get('nombre');
    $amb->codigo = $request->get('codigo');
    $amb->estado = $request->get('estado');
    $amb->save();
    return redirect('gestion_ambiente')->with('message','Ambiente Registrado Con Exito!');
  }
  public function destroy($id)
  {
    Ambiente::destroy($id);
      return redirect('gestion_ambiente')->with('message','Ambiente Eliminada Con Exito!');
  }
  public function show($id)
  {
      return view('gestion_ambiente')->with('query', Ambiente::find($id));
  }
  public function edit($id)
  {
      
  }
  public function editarAjax($id){

    $editar = Ambiente::where('id', '=', $id)->get();
    return view('admin.ambiente.editarAjax', compact('editar'));

  }
  public function update(AmbienteRequest $request, $id)
  {
    $amb = Ambiente::find($id);
    $amb->nombre = $request->get('nombre');
    $amb->codigo = $request->get('codigo');
    $amb->estado = $request->get('estado');
    $amb->save();
      return redirect('gestion_ambiente')->with('message','Ambiente Modificada Con Exito!');
}
}
