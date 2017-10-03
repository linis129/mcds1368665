@extends('layouts.app') @section('content')
<div class="row">
    <!-- Box Left -->
    <div class="col-lg-1"></div>
    <!-- Box Center -->
    <div class="col-lg-10">
        <!-- Box Titulo -->
        <div class="title">
            <h2 class="text-center">Consulta Instructor</h2>
            <hr>
            <br>
        </div>   
        <!-- Box Table -->
        <div class="col">
           
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Documento</th>
                        <th class="text-center">Programa</th>
                        <th class="text-center">Horario</th>
                        <th class="text-center">Ambiente</th>
                        <th class="text-center">Nombre Instructor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usr as $usu)
                    <tr>
                        
                        <td class="text-center">{{ $usu->documento }}</td>
                        <td class="text-center">{{ $usu->programa->nombre }}</td>
                        <td class="text-center">{{ $usu->horario->hora_inicial}}  - {{ $usu->horario->hora_final }} </td>
                        <td class="text-center">{{ $usu->ambiente_formacion->nombre }}</td>
                        <td class="text-center">{{ $usu->nombre }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>

   


@endsection