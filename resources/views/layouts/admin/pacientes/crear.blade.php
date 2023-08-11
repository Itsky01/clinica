@extends('layouts.admin.pacientes.plantillabase')
 
<div class="p-5 ">
  
  <div class="row d-flex justify-content-center ">
    <div class="col-md-7">
      <div class="card p-4 py-4 shadow">
    <h2 class="p-3 bg-info text-white text-center rounded shadow">Nuevo usuario</h2>
   
   
    <form action="" method="post" >
        @csrf
       
    <div class="mt-2">
    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido"  placeholder="Apellido" value="{{ old('apellido') }}">
    @error('apellido')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  </div>

  <div >
<div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">Nombre</label></div>
    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">
    @error('name') 
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  </div>

  <div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">documento</label></div>
    <input type="number" class="form-control" name="documento" placeholder="Documento" value="{{ old('documento') }}">
    @error('documento')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror 
  </div>
  
  

  <div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">domicilio</label></div>
    <input type="text" class="form-control"  name="domicilio" placeholder="domicilio" value="{{ old('domicilio') }}">
    @error('domicilio')  
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  
  </div>
  
  <div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">telefono</label></div>
    <input type="number" class="form-control"  name="telefono" placeholder="telefono" value="{{ old('telefono') }}">
  
    @error('telefono')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
  </div>
  
  <div >
  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label></div>
    <input type="date" class="form-control"  name="fecha" placeholder="fecha de nacimiento" value="{{ old('fecha')}}">
  
    @error('fecha') 
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
    <input type="email" class="form-control" name="email" placeholder="name@example.com" value="{{ old('email') }}">
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
