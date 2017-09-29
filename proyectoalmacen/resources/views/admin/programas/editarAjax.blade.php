@foreach($editar as $edit)
 <form action="{{url('gestion_programas/'.$edit->id)}}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token()}}">
    <input type="hidden" name="_method" value="PUT">
<div class="form-group">
    <input type="text" class="form-control" name="nombre" placeholder="Digite Nombre" value="{{ $edit->nombre }}">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="codigo" placeholder="Digite Codigo" value="{{ $edit->codigo }}">
  </div>
  <div class="form-group">
    <input type="date" class="form-control" name="fecha_vencimiento" placeholder="Digite Fecha Vencimiento" value="{{$edit->fecha_vencimiento}}">
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