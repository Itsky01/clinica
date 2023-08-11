@extends('pacientes.plantillabase')

<div class="p-5 m-4 ">
  
  <div class="row border border-secondary p-3 rounded-3">
    <h2 class="p-2 bg-danger text-white text-center">Editar usuarios</h2>
  
    <form action="{{route('edicion', $us->id)}}" method="post">
        @csrf
        @method('PUT')
        
          
        
        <div class="col-sm col-md-9 ">
    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" value="{{$us->apellido}}" placeholder="Apellido">
   @error('apellido')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror

</div>

<div class="col-sm col-md-9 ">
  

<div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
    <input type="text" value="{{$us->name}}" class="form-control" name="nombre" placeholder="Nombre">
  </div>
  @error('nombre')
  <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror</div>



<div class="col-sm col-md-9 ">
  

  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">documento</label>
  </div>  <input type="number" class="form-control" value="{{$us->dni}}" name="documento" placeholder="Documento">
 
 
    @error('documento')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror

</div>

<div class="col-sm col-md-9 ">
  

  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">domicilio</label>
  </div>  <input type="text" class="form-control"  value="{{$us->domicilio}}" name="domicilio" placeholder="name@example.com">
    @error('domicilio')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
</div>




<div class="col-sm col-md-9 ">
  

  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">telefono</label>
  </div>  <input type="number" class="form-control" value="{{$us->telefono}}" name="telefono" placeholder="telefono">
    @error('telefono')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
</div>

<div class="col-sm col-md-9 ">
  

  <div class="mt-3">
    <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
   </div> <input type="date" class="form-control" value="{{$us->fecha}}" name="fecha" placeholder="fecha de nacimiento">
    @error('fecha')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
</div>

<div class="col-sm col-md-9 ">
  


  <div class="mt-3 ">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
   </div> <input type="email" value="{{$us->email}}" class="form-control" name="email" placeholder="name@example.com">
    @error('email')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror <div class="mt-3 ">
    <button type="submit" class="btn btn-primary">editar</button>
    <a href ="{{route('pacientes')}}"  class="btn btn-danger" >VOLVER</a>  </div>
</form>

</div>




</div>

