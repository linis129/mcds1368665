@extends('layouts.app') @section('content')
<div class="row">
    <!-- Box Left -->
    <div class="col-lg-1"></div>
    <!-- Box Center -->
    <div class="col-lg-10">
        <!-- Box Titulo -->

        <div class="col">
           
            <form action="{{ url('codigo') }}" method="post">
                        <h3><strong>Documento Instructor</strong></h3>
                        <hr>
                        <input name="_token" type="hidden" value="{{ csrf_token()}}">
                        <input autofocus="true" name="documento" type="number" class="form-control" placeholder="Digite Numero Documento ó Escanee Codigo"> 
                    </form>
        </div>
    </div>

   


@endsection

