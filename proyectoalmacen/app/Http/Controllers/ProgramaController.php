<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programa;
use App\Http\Requests\ProgramaRequest;
use Barryvdh\DomPDF\Facade as PDF;


class ProgramaController extends Controller
{
    public function index(){

    $query = Programa::all();
    return view('admin.programas.index')->with('query', $query);
  }
  public function store(ProgramaRequest $request)
  {
    $pro = new Programa();
	$pro->nombre = $request->get('nombre');
    $pro->codigo = $request->get('codigo');
    $pro->fecha_vencimiento = $request->get('fecha_vencimiento');
    $pro->save();
    return redirect('gestion_programas')->with('message','Programa Registrado Con Exito!');
  }
  public function destroy($id)
  {
    Programa::destroy($id);
      return redirect('gestion_programas')->with('message','Programa Eliminada Con Exito!');
  }
  public function show($id)
  {
      return view('gestion_programas')->with('query', Programa::find($id));
  }
  public function edit($id)
  {
      
  }
  public function editarAjax($id){

    $editar = Programa::where('id', '=', $id)->get();
    return view('admin.programas.editarAjax', compact('editar'));

  }
  public function update(ProgramaRequest $request, $id)
  {
    $pro = Programa::find($id);
    $pro->nombre = $request->get('nombre');
    $pro->codigo = $request->get('codigo');
    $pro->fecha_vencimiento = $request->get('fecha_vencimiento');
    $pro->save();
      return redirect('gestion_programas')->with('message','Programa Modificada Con Exito!');
  }
        public function pdf() {
        $pro = Programa::all();
        $pdf = PDF::loadView('admin.programas.pdf', compact('pro'));
        return $pdf->download('admin.programas.pdf');
    }
}
