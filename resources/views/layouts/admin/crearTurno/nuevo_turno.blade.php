@extends('layouts.admin.pacientes.plantillabase')
<style>
  .btnn{
    -webkit-box-shadow: 9px 9px 5px -3px rgba(0,0,0,0.75);
-moz-box-shadow: 9px 9px 5px -3px rgba(0,0,0,0.75);
box-shadow: 9px 9px 5px -3px rgba(0,0,0,0.75);
  }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<div class="container">
    

<div class="card text-center mx-auto mt-5 shadow">
  <h2 class="bg-info text-center p-3 text-white shadow">Solicitud de Turno</h1>
  
 
  <div class="card-header">
     Elija Consulta o Estudio, haciendo click en el boton correspondiente <div class="mt-1"> <a href="{{route('dash_admin')}}" class=" btn btn-outline-secondary btn-sm"> volver</a> </div>
    </div>
    <div class="card-body">
        
          <div class="px-4">
            @include('layouts.flash-message')
    <div class="row gx-3 py-5 gy-3 ">
      <div class="col">
        <a class="btn btn-primary btn-lg p-5 btnn" href="{{ route('fechas')}}" role="button">Seleccione consulta</a>
      
      </div>
      <div class="col">
        <a class="btn btn-danger btn-lg p-5 btnn" href="{{route('tipo_estudio')}}" role="button">Seleccione estudios</a>
      </div>
    </div>
  </div>

   

    </div>
    <div class="card-footer text-muted">
     Usuario: {{Auth::user()->name}} {{Auth::user()->apellido}}
    </div>
</div>

  </div>
 