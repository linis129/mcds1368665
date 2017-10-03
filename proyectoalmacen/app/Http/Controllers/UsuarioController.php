<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
  public function index(){

    $query = User::all();
    return view('admin.usuarios.index')->with('query', $query);
  }
  public function store(UserRequest $request)
  {
    $cat = new User();
    $cat->documento = $request->get('documento');
    $cat->name = $request->get('name');
    $cat->apellido = $request->get('apellido');
    $cat->telefono = $request->get('telefono');
    $cat->email = $request->get('email');
    $cat->password = Crypt::encrypt($request->get('password'));
    $cat->rol = $request->get('rol');
    $cat->save();
    return redirect('gestion_usuarios')->with('message','Usuario Registrado Con Exito!');
  }
  public function destroy($id)
  {
    User::destroy($id);
      return redirect('gestion_usuarios')->with('message','Usuario Eliminada Con Exito!');
  }
  public function show($id)
  {
      return view('gestion_usuarios')->with('query', User::find($id));
  }
  public function edit($id)
  {
      ;
  }
  public function editarAjax($id){

    $editar = User::where('id', '=', $id)->get();
    return view('admin.usuarios.editarAjax', compact('editar'));

  }
  public function update(UserRequest $request, $id)
  {
    $userUp = User::find($id);
    $userUp->documento = $request->get('documento');
    $userUp->name = $request->get('name');
    $userUp->apellido = $request->get('apellido');
    $userUp->telefono = $request->get('telefono');
    $userUp->email = $request->get('email');
    $userUp->password = Crypt::encrypt($request->get('password'));
    $userUp->rol = $request->get('rol');
    $userUp->save();
      return redirect('gestion_usuarios')->with('message','Usuario Modificada Con Exito!');
  }



  // public function cargar(Request $request) {

  //   $usr = User::where('documento', '=', $request->get('documento'))->get();

  //   dd($usr);k

  // }


}
