@extends('layouts.app')

@section('content')
  <div class="row">
    <!-- Box Left -->
    <div class="col-lg-1"></div>

    <!-- Box Center -->
    <div class="col-lg-10">

      <!-- Box Titulo -->
      <div class="title">
        <h2 class="text-center">Horario</h2>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">Crear Horario</button>
        <br><br><br>
      </div>
      <!-- Box Table -->
      <div class="col">
        @if(!$query->isEmpty())
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="text-center">Id</th> 
              <!-- <th class="text-center">Codigo</th> -->
              <th class="text-center">Hora Inicial</th>
              <th class="text-center">Hora Final</th>
              <th class="text-center">Fecha Inicial</th>
              <th class="text-center">Fecha Final</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($query as $row)
            <tr>
              <td class="text-center">{{ $row->id }}</td>
              <!-- <td class="text-center">{{ $row->codigo }}</td> -->
              <td class="text-center">{{ $row->hora_inicial }}</td>
              <td class="text-center">{{ $row->hora_final }}</td>
              <td class="text-center">{{ $row->fecha_inicial }}</td>
              <td class="text-center">{{ $row->fecha_final }}</td>
              <td class="text-center">
                <button class="btn btn-primary editHorario" data-UUID="{{ $row->id }}" data-toggle="modal"  data-target="#modal-actualizar">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                <form action="{{url('gestion_horario/'.$row->id)}}" method="post" style="display: inline-block;">
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
            <h5 class="text-center">Sin Registros De Horario...</h5>
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
            <h4 class="modal-title">Registrar Horario</h4>
          </div>
          <div class="modal-body">
              <!-- <div class="form-group">
                <input type="text" class="form-control" name="codigo" placeholder="Digite Codigo">
              </div> -->
              <div class="form-group">
                  <input type="time" class="form-control" name="hora_inicial" placeholder="Seleccione Hora Inicial">
              </div>
              <div class="form-group">
                  <input type="time" class="form-control" name="hora_final" placeholder="Seleccione Hora Final">
              </div>
              <div class="form-group">
                  <input type="date" class="form-control" name="fecha_inicial" placeholder="Seleccione Fecha Inicial">
              </div>
              <div class="form-group">
                  <input type="date" class="form-control" name="fecha_final" placeholder="Seleccione Fecha Final">
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
            <h4 class="modal-title">Actualizar Datos Horario</h4>
          </div>
          <div class="modal-body" id="editar">   
          </div>
        </div>
      </div>
    </div>

  </div>
  <script>
    $(document).ready(function(){

      $('.editHorario').click(function(){

        var UUID = $(this).attr('data-UUID');
        console.log(UUID)
        $.get('http://localhost:8000/gestion_horario/editarAjax/'+UUID,
          function(data){
            $('#editar').html(data);
            console.log(data);
          });
      });
    });
  </script>
      
@endsection
