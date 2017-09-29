@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido -  {{ Auth::user()->name}} {{ Auth::user()->apellido}}</div>

                <div class="panel-body">
                    {{ Auth::user()->rol}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
