@extends('layouts.app')

@section('content')
  <div class="row">
    <!-- Box Left -->
    <div class="col-lg-1"></div>

    <!-- Box Center -->
    <div class="col-lg-10">

      <!-- Box Titulo -->
      <div class="title">
        <h2 class="text-center">Programas</h2>
        <hr>
        <br>
      </div>
         @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

      <!-- Alert Registro -->
      @if (Session::has('message'))
      <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          {{ Session::get('message') }}
      </div>
      @endif

      <!-- Box Crear -->
      <div class="col">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">Crear Programa</button>
        <a class="btn btn-default" href="{{ url('pdf3') }}"> Generar Reporte </a>
        <br><br><br>
      </div>
      <!-- Box Table -->
      <div class="col">
        @if(!$query->isEmpty())
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="text-center">Id</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Codigo</th>
              <th class="text-center">Fecha Vencimiento</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($query as $row)
            <tr>
              <td class="text-center">{{ $row->id }}</td>
              <td class="text-center">{{ $row->nombre }}</td>
              <td class="text-center">{{ $row->codigo }}</td>
              <td class="text-center">{{ Carbon\Carbon::parse($row->fecha_vencimiento)->format('d/m/Y')}}</td>
              <td class="text-center">
                <button class="btn btn-primary editPrograma" data-UUID="{{ $row->id }}" data-toggle="modal"  data-target="#modal-actualizar">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                <form action="{{url('gestion_programas/'.$row->id)}}" method="post" style="display: inline-block;">
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
            <h5 class="text-center">Sin Registros De Programas...</h5>
        @endif
      </div>

    </div>
    <!-- Box Rigth -->
    <div class="col-lg-1"></div>

    <!-- Modal Registro-->
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token()}}">
      <div id="modal-crear" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Registrar Programa</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" name="nombre" placeholder="Digite Nombre">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="codigo" placeholder="Digite Codigo">
              </div>
              <div class="form-group">
                  <input type="date" class="form-control" name="fecha_vencimiento" placeholder="Digite Fecha Vencimiento">
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
            <h4 class="modal-title">Actualizar Datos Programa</h4>
          </div>
          <div class="modal-body" id="editar">   
          </div>
        </div>
      </div>
    </div>

  </div>
   <script src="{{ asset('js/app.js') }}"></script>
  <script>
    $(document).ready(function(){

      $('.editPrograma').click(function(){

        var UUID = $(this).attr('data-UUID');
        console.log(UUID)
        $.get('http://localhost:8000/gestion_programas/editarAjax/'+UUID,
          function(data){
            $('#editar').html(data);
            console.log(data);
          });
      });
    });
  </script>
      
@endsection
