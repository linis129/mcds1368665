@include('layouts.app')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido - {{ Auth::user()->name}} {{Auth::apellido}}</div>

                <div class="panel-body">
                    Almacenista
                </div>
            </div>
        </div>
    </div>
</div>