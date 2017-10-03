@include('layouts.app')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido - {{ Auth::user()->name}} {{Auth::apellido}}</div>

                <div class="panel-body">
                    <!-- <form action="{{ url('codigo') }}" method="post">
                        <label>Codigo Instructor</label>
                        <input name="_token" type="hidden" value="{{ csrf_token()}}">
                            <input autofocus="true" name="documento" type="number">
                            </input>
                        </input>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>