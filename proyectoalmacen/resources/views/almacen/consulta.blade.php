@extends('layouts.app') @section('content')
<div class="row">
    <!-- Box Left -->
    <div class="col-lg-1"></div>
    <!-- Box Center -->
    <div class="col-lg-10">
        <!-- Box Titulo -->
        <div class="title">
            <h2 class="text-center">Consulta Ambiente</h2>
            <hr>
            <br>
        </div>   
        <!-- Box Table -->
        <div class="col">
           
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ambn as $amb)
                    <tr>    
                        <td class="text-center">{{ $amb->id }}</td>
                        <td class="text-center">{{ $amb->nombre }}</td>
                        <td class="text-center">{{ $amb->estado}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>

   


@endsection