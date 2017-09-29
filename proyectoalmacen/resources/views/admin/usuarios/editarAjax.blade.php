@foreach($editar as $edit)
 <form action="{{url('gestion_usuarios/'.$edit->id)}}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token()}}">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
    <input type="Integer" class="form-control" name="documento" placeholder="Digite Documento" value="{{ $edit->documento }}">
  </div>
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Digite Nombre" value="{{ $edit->name }}">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="apellido" placeholder="Digite Apellido" value="{{ $edit->apellido }}">
  </div>
  <div class="form-group">
    <input type="number" class="form-control" name="telefono" placeholder="Digite Telefono" value="{{$edit->telefono}}">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="Digite Email" value="{{$edit->email}}">
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
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="{{ $edit->id }}">
</div>
<div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Actualizar Datos">
          </div>
</form>
@endforeach