@extends('layouts.admin.pacientes.plantillabase')
 
<div class="p-5 ">
  
  <div class="row d-flex justify-content-center ">
    <div class="col-md-7">
      <div class="card p-4 py-4 shadow">

    <h2 class="p-2 bg-info text-white text-center shadow">Nuevo Profesional</h2>
   
   
    <form action="{{route('crear_prof')}}" method="post" >
        @csrf
       
    <div class="mt-2">
    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido"  value="{{ old('apellido') }}"  placeholder="Apellido">
    @error('apellido')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  </div>

  <div >
<div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">Nombre</label></div>
    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre">
    @error('nombre') 
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  </div>

  <div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">documento</label></div>
    <input type="number" class="form-control" name="documento" value="{{ old('documento') }}" placeholder="Documento">
    @error('documento')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror 
  </div>
  
  

  <div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">domicilio</label></div>
    <input type="text" class="form-control" value="{{ old('domicilio') }}"  name="domicilio" placeholder="domicilio">
    @error('domicilio')  
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  
  </div>
  
  <div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">telefono</label></div>
    <input type="number" class="form-control"  value="{{ old('telefono') }}" name="telefono" placeholder="telefono">
  
    @error('telefono')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  </div>
  
  <div >
    <div class="mt-3">
      <label for="exampleFormControlInput1" class="form-label">especialidad</label>
    
    </div>
     
<div class="form-group">
 
  <select class="form-select" aria-label="Default select example" name="especialidad">
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
    <label for="exampleFormControlInput1" class="form-label">password</label></div>
    <input type="password" class="form-control"  name="password" >
    @error('password')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  </div>
  <div >
    <div class="mt-3">
      <label for="exampleFormControlInput1" class="form-label">repetir password</label></div>
      <input type="password" class="form-control"  name="password_confirmation" >
      @error('password')
      <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
  @enderror
    </div>
  
  <div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="name@example.com">
    @error('email')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror </div></div>

<div class="d-grid gap-2 mt-3">
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href ="{{route('dash_admin')}}"  class="btn btn-danger" >VOLVER</a> 
   </div>

</form>
</div>

</div>
  </div>
</div>
