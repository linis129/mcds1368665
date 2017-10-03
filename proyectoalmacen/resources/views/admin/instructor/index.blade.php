@extends('layouts.app') @section('content')
<div class="row">
    <!-- Box Left -->
    <div class="col-lg-1"></div>
    <!-- Box Center -->
    <div class="col-lg-10">
        <!-- Box Titulo -->
        <div class="title">
            <h2 class="text-center">Instructor</h2>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">Crear Instructor</button>
            <br>
            <br>
            <br>
        </div>
        <!-- Box Table -->
        <div class="col">
            @if(!$query->isEmpty())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Documento</th>
                        <th class="text-center">Programa</th>
                        <th class="text-center">Horarios</th>
                        <th class="text-center">Ambiente</th>
                        <th class="text-center">Instructor</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($query as $row)
                    <tr>
                        <td class="text-center">{{ $row->id}}</td>
                        <td class="text-center">{{ $row->documento}}</td>
                        <td class="text-center">{{ $row->programa->nombre }}</td>
                        <td class="text-center">{{ $row->horario->hora_inicial}}</td>
                        <td class="text-center">{{ $row->ambiente_formacion->nombre }}</td>
                        <td class="text-center">{{ $row->nombre}}</td>
                        <td class="text-center">
                            <button class="btn btn-primary editInstructor" data-UUID="{{ $row->id }}" data-IDProg="{{ $row->programa_id }}" data-IdHora="{{ $row->horario_id }}" data-toggle="modal" data-IdAmbi="{{ $row->ambiente_id }}" data-target="#modal-actualizar">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            <form action="{{url('gestion_instructor/'.$row->id)}}" method="post" style="display: inline-block;">
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
            <h5 class="text-center">Sin Registros De Instructor...</h5> @endif
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
                        <h4 class="modal-title">Registrar Instructor</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="documento" placeholder="Digite Documento">
                        </div>
                        <div class="form-group">
                            <select name="programa_id" class="form-control">
                                <option value="">-- Seleccione Programa --</option>
                                @foreach($programa as $pro)
                                <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="horario_id" class="form-control">
                                <option value="">-- Seleccione Horario --</option>
                                @foreach($horario as $hor)
                                <option value="{{ $hor->id }}">{{ $hor->hora_inicial }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="ambiente_id" class="form-control">
                                <option value="">-- Seleccione Ambiente --</option>
                                @foreach($ambiente as $amb)
                                <option value="{{ $amb->id }}">{{ $amb->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="nombre" class="form-control">
                                <option value="">-- Seleccione Instructor --</option>
                                <option value="Yaneth Mejia Rendon">Yaneth Mejia Rendon</option>
                                <option value="Oscar Fernando">Oscar Fernando</option>
                                <option value="Pepito Perez">Pepito Perez"</option>
                                <option value="Hann">Hann</option>
                            </select>
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
                    <h4 class="modal-title">Actualizar Datos Instructor</h4>
                </div>
                <div class="modal-body" id="editar">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    $('.editInstructor').click(function() {

        var UUID = $(this).attr('data-UUID');
        var IdProg = $(this).attr('data-IDProg');
        var IdHora= $(this).attr('data-IdHora');
        var IdAmbi= $(this).attr('data-IdAmbi');

        console.log(IdProg, UUID, IdHora, IdAmbi);
        $.get('http://localhost:8000/gestion_instructor/editarAjax/' + UUID +'/'+ IdProg + '/'+ IdHora + '/' + IdAmbi,
            function(data) {
                $('#editar').html(data);
                console.log(data);
            });
    });
});
</script>
@endsection