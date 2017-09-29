@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                   
                </div>
                <div class="panel-body">
                    <form action="{{ url('codigo') }}" method="post">
                        <label>Codigo Instructor</label>
                        <input name="_token" type="hidden" value="{{ csrf_token()}}">
                            <input autofocus="true" name="documento" type="number">
                            </input>
                        </input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
