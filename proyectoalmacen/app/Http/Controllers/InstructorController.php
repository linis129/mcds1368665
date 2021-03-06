<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructor;
use App\Ambiente;
use App\Programa;
use App\Horario;
// use App\User;
use App\Http\Requests\InstructorRequest;
use Barryvdh\DomPDF\Facade as PDF;

class InstructorController extends Controller
{
    public function index(){

    $query    = Instructor::all();
    // $usuario  = User::where('rol', '=', 'Instructor')->get();
    $ambiente = Ambiente::where('estado', '=', 'Disponible')->get();
    $programa = Programa::all();
    $horario  = Horario::all();
    return view('admin.instructor.index')->with('query', $query)
                                         ->with('ambiente', $ambiente)
                                         ->with('programa', $programa)
                                         ->with('horario', $horario);
  }
  public function store(InstructorRequest $request)
  {
    $inst = new Instructor();
	  $inst->documento = $request->get('documento');
    $inst->programa_id = $request->get('programa_id');
    $inst->horario_id = $request->get('horario_id');
    $inst->ambiente_id = $request->get('ambiente_id');
    $inst->nombre = $request->get('nombre');
    $inst->save();
    return redirect('gestion_instructor')->with('message','Instructor Registrado Con Exito!');
  }
  public function destroy($id)
  {
    Instructor::destroy($id);
      return redirect('gestion_instructor')->with('message','Instructor Eliminada Con Exito!');
  }
  public function show($id)
  {
      return view('gestion_instructor')->with('query', Instructor::find($id));
  }
  public function edit($id)
  {
      
  }
  public function editarAjax($id, $IdProg, $IdHora, $IdAmbi){

    $editar = Instructor::where('id', '=', $id)->get();
    $pro = Programa::all();
    $hor = Horario::where('id','!=', $IdHora)->get();
    $amb = Ambiente::where('id','!=', $IdAmbi)->get();
    // $use = User::where('id','!=', $IdUsu)->get();


    return view('admin.instructor.editarAjax')->with('editar', $editar)
                                              ->with('pro', $pro)
                                              ->with('hor', $hor)
                                              ->with('amb', $amb);
                                              // ->with('use', $use);




  }
  public function update(InstructorRequest $request, $id)
  {
    $inst = Instructor::find($id);
    $inst->documento = $request->get('documento');
    $inst->programa_id = $request->get('programa_id');
    $inst->horario_id = $request->get('horario_id');
    $inst->ambiente_id = $request->get('ambiente_id');
    $inst->nombre = $request->get('nombre');
    $inst->save();
      return redirect('gestion_instructor')->with('message','Instructor Modificada Con Exito!');


  }

    public function cargar(Request $request) {

    $usr = Instructor::where('documento', '=', $request->get('documento'))->get();

    //dd($usr);

    return view('admin.instructor.consulta')->with('usr', $usr);

  }

      public function pdf() {
        $usr = Instructor::all();
        $pdf = PDF::loadView('admin.instructor.pdf', compact('usr'));
        return $pdf->download('admin.instructor.pdf');
    }

}
