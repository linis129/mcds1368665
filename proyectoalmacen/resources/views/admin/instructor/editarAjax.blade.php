@foreach($editar as $edit)
 <form action="{{url('gestion_instructor/'.$edit->id)}}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token()}}">

    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <input type="text" readonly="readonly" value="{{ $edit->documento }}" name="documento" class="form-control">
    </div>
    <div class="form-group">
        <select name="programa_id" class="form-control">
            <option value="{{ $edit->programa->id }}">{{ $edit->programa->nombre  }}</option>
            @foreach($pro as $prog)
            <option value="{{ $prog->id }}">{{ $prog->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <select name="horario_id" class="form-control">
            <option value="{{ $edit->horario->id }}">{{ $edit->horario->hora_inicial }}</option>
            @foreach($hor as $hora)
            <option value="{{ $hora->id }}">{{ $hora->hora_inicial }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <select name="ambiente_id" class="form-control">
            <option value="{{ $edit->ambiente_formacion->id }}">{{ $edit->ambiente_formacion->nombre}}</option>
            @foreach($amb as $ambi)
            <option value="{{ $ambi->id }}">{{ $ambi->nombre}}</option>
            @endforeach
        </select>
    </div>
  <div class="form-group">
      <select name="nombre" class="form-control">
        <option value="">-- Seleccione Instructor --</option>
        <option value="Yaneth Mejia Rendon">Yaneth Mejia Rendon</option>
        <option value="Oscar Fernando">Oscar Fernando</option>
        <option value="Consuelo Garcia">Consuelo Garcia</option>
        <option value="Cristian Toro">Cristian Toro</option>
        <option value="Andres Felipe Henao">Andres Felipe Henao</option>
        <option value="Alirio Londoño">Alirio Londoño</option>
        <option value="Luisa Fernanda Castaño">Luisa Fernanda Castaño</option>
        <option value="Julian Salgado">Julian Salgado</option>



      </select>
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