@extends('layouts.admin.pacientes.plantillabase')

<div class="p-5 ">
  
  <div class="row d-flex justify-content-center ">
    <div class="col-md-7">
      <div class="card p-4 py-4 shadow">
   
   
   
   
    <h2 class="p-2 bg-info text-white text-center shadow">Editar profesionales</h2>
  
    <form action="{{route('edicion', $pr->prof_id)}}" method="post">
        @csrf
        @method('PUT')
        
          
        
        <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" value="{{$pr->prof_apellido}}" placeholder="Apellido">
   @error('apellido')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror

</div>

<div >
  
rt
<div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
    <input type="text" value="{{$pr->prof_nombre}}" class="form-control" name="nombre" placeholder="Nombre">
  </div>
  @error('nombre')
  <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror</div>




<div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">especialidad</label>
  
  </div>
  <div class="mt-3">
   
    <input type="text" value="{{$pr->esp_nombre}}" class="form-control" name="esp" id="esp" readonly>
 <input type="hidden" value="{{$pr->esp_id}}" name="id_esp" id="id_esp"> 
  </div>
<div class="form-group mt-2">

<select class="form-select" aria-label="Default select example" name="especialidad" id="especialidad" onchange="ShowSelected();">
  <option selected disabled>Elija una especialidad</option>
  @foreach ($esp as $dato)
  <option value="{{$dato->esp_id}}">{{$dato->esp_nombre}}</option>
  @endforeach
</select>
</div> 


    @error('especialidad')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  </div>

<div >
  

  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">documento</label>
  </div>  <input type="number" class="form-control" value="{{$pr->prof_dni}}" name="documento" placeholder="Documento">
 
 
    @error('documento')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror

</div>

<div >
  

  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">domicilio</label>
  </div>  <input type="text" class="form-control"  value="{{$pr->prof_domicilio}}" name="domicilio" placeholder="name@example.com">
    @error('domicilio')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
</div>




<div >
  

  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">telefono</label>
  </div>  <input type="number" class="form-control" value="{{$pr->prof_telefono}}" name="telefono" placeholder="telefono">
    @error('telefono')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
</div>

<div >
  
  <div class="mt-3 ">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
   </div> <input type="email" value="{{$pr->prof_email}}" class="form-control" name="email" placeholder="name@example.com">
    @error('email')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror 
</div>

<div class="d-grid gap-2 mt-3">
  <button type="submit" class="btn btn-primary">Editar</button>
  <a href ="{{route('dash_admin')}}"  class="btn btn-danger" >VOLVER</a> 
 </div>


  </form>




    </div>
  </div>

</div>

<script>
  function ShowSelected()
  {
  /* Para obtener el valor */
  var esp_value = document.getElementById("especialidad").value;
   
  /* Para obtener el texto */
  var combo = document.getElementById("especialidad");
  var selected = combo.options[combo.selectedIndex].text;
   
  document.getElementsByName("esp")[0].value = selected;
  document.getElementsByName("id_esp")[0].value = esp_value;
	
  }
  </script>