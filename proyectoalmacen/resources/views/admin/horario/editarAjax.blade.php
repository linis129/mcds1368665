@foreach($editar as $edit)
 <form action="{{url('gestion_horario/'.$edit->id)}}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token()}}">
    <input type="hidden" name="_method" value="PUT">
<!-- <div class="form-group">
    <input type="text" class="form-control" name="codigo" placeholder="Digite Codigo" value="{{$edit->codigo }}">
  </div> -->
  <div class="form-group">
    <input type="time" class="form-control" name="hora_inicial" placeholder="Seleccione Hora Inicial" value="{{ $edit->hora_inicial }}">
  </div>
  <div class="form-group">
    <input type="time" class="form-control" name="hora_final" placeholder="Seleccione Hora Final" value="{{$edit->hora_final}}">
  </div>
  <div class="form-group">
    <input type="date" class="form-control" name="fecha_inicial" placeholder="Seleccione Fecha Inicial" value="{{$edit->fecha_inicial}}">
  </div>
    <div class="form-group">
    <input type="date" class="form-control" name="fecha_final" placeholder="Seleccione Fecha Final" value="{{$edit->fecha_final}}">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="{{ $edit->id }}">
</div>
<div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Actualizar Datos">
          </div>
</form>
@endforeach