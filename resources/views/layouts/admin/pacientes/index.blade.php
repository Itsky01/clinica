
<x-app-layout> <!-- seccion para pantalla principal de profesionales: titulo y contenido -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('profesionales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Nuevo
                  </button>

                 <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Documento</th>

                        <th scope="col">telefono</th>
                       
                         <th scope="col">email</th>
<th></th>
<th></th>


                      </tr>
                    </thead>
                    <tbody>
 @foreach ($profesion as $dato)
<tr>
<th>{{$dato->id}}</th>
<th>{{$dato->prof_nombre}}</th>
<th>{{$dato->prof_apellido}}</th>
<th>{{$dato->prof_dni}}</th>
<th>{{$dato->prof_telefono}}</th>
<th>{{$dato->prof_domicilio}}</th>
<th>{{$dato->prof_email}}</th>

<form action="" method="post">
@csrf
@method('DELETE')
<td><a href =""  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">EDITAR</a>    </td>
<td><button type="submit" class="btn btn-danger">borrar</button></td>

</form>
</tr>
 @endforeach
  </tbody>
                  
                  </table>

            </div>
        </div>
    </div>
</x-app-layout>