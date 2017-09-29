@extends('layouts.app')

@section('content')
  <div class="row">
    <!-- Box Left -->
    <div class="col-lg-1"></div>

    <!-- Box Center -->
    <div class="col-lg-10">

      <!-- Box Titulo -->
      <div class="title">
        <h2 class="text-center">Usuarios</h2>
        <hr>
        <br>
      </div>

      <!-- Alert Registro -->
      @if (Session::has('message'))
      <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          {{ Session::get('message') }}
      </div>
      @endif

      <!-- Box Crear -->
      <div class="col">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">Crear Usuario</button>
        <br><br><br>
      </div>
      <!-- Box Table -->
      <div class="col">
        @if(!$query->isEmpty())
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="text-center">Id</th>
              <th class="text-center">Documento</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Apellido</th>
              <th class="text-center">Email</th>
              <th class="text-center">Telefono</th>
              <th class="text-center">Rol</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($query as $row)
            <tr>
              <td class="text-center">{{ $row->id }}</td>
              <td class="text-center">{{ $row->documento }}</td>
              <td class="text-center">{{ $row->name }}</td>
              <td class="text-center">{{ $row->apellido }}</td>
              <td class="text-center">{{ $row->email }}</td>
              <td class="text-center">{{ $row->telefono }}</td>
              <td class="text-center">{{ $row->rol }}</td>
              <td class="text-center">
                <button class="btn btn-primary editUsuario" data-UUID="{{ $row->id }}" data-toggle="modal"  data-target="#modal-actualizar">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                <form action="{{url('gestion_usuarios/'.$row->id)}}" method="post" style="display: inline-block;">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <h5 class="text-center">Sin Registros De Usuarios...</h5>
        @endif
      </div>

    </div>
    <!-- Box Rigth -->
    <div class="col-lg-1"></div>

    <!-- Modal Registro-->
    <form method="post" enctype="multipart/form-data">
    <!-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> -->
    {{ csrf_field() }}
      <div id="modal-crear" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Registrar Usuario</h4>
          </div>
          <div class="modal-body">
            <!-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> -->
            <div class="form-group">
                <input type="text" class="form-control" name="documento" placeholder="Digite Documento">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Digite Nombre">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="apellido" placeholder="Digite Apellido">
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="telefono" placeholder="Digite Telefono">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Digite Email">
              </div>
              <div class="form-group">
                <select name="rol" id="roles" class="form-control">
                  <option value="">-- Seleccione Rol --</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Almacen">Almacen</option>
                  <option value="Instructor">Instructor</option>
                </select>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Digite Password">
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal Editar -->
    <div id="modal-actualizar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Actualizar Datos Usuario</h4>
          </div>
          <div class="modal-body" id="editar">   
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
    $(document).ready(function(){

      $('.editUsuario').click(function(){

        var UUID = $(this).attr('data-UUID');
        console.log(UUID)
        $.get('http://localhost:8000/gestion_usuarios/editarAjax/'+UUID,
          function(data){
            $('#editar').html(data);
            console.log(data);
          });
      });
    });
  </script>
      
@endsection
