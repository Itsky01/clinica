@extends('layouts.admin.pacientes.plantillabase')

@section('css')   <!-- abrimos section para agregar css de datatable solo para esta vista -->

@include('layouts.styles_dtables')

    @endsection
  
    @if (Auth::user()->isAdmin())

    @include ('navbar.nav-user')
    
    @else
     @include ('navbar.nav-admin')
    
    @endif

 <div class="py-12 px-5">
 
 <h2 class="bg-primary text-center p-3 text-white shadow mt-3">LISTADO DE PROFESIONALES</h2>
  @section('contenido')
    
   
        
    @section('botones')
    <a href ="{{route('crearpr')}}"  class="btn btn-primary " >CREAR</a>

  <a href ="{{route('dash_admin')}}"  class="btn btn-danger " >VOLVER</a>

@endsection



 
             
                
                    
@include('layouts.flash-message')
                 <table class="table table-hover display responsive nowrap" style="width:100%" id="tableprof">
                  <thead class="bg-primary text-white">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Documento</th>

                        <th scope="col">telefono</th>
                        <th scope="col">domicilio</th>
                         <th scope="col">email</th>
<th></th>
<th></th>
<th></th>
<th></th>

                      </tr>
                    </thead>
                    <tbody>
 @foreach ($profesion as $dato)
<tr>
<th>{{$dato->prof_id}}</th>
<th>{{$dato->prof_nombre}}</th>
<th>{{$dato->prof_apellido}}</th>
<th>{{$dato->esp_nombre}}</th>
<th>{{$dato->prof_dni}}</th>
<th>{{$dato->prof_telefono}}</th>
<th>{{$dato->prof_domicilio}}</th>
<th>{{$dato->prof_email}}</th>

 
<td><a href ="{{route('editprof', $dato->prof_id)}}"  class="btn btn-info" ><i class="bi bi-pen"></i></a>   </td>
<td><a href ="{{route('cargafechas', $dato->prof_id)}}"  class="btn btn-success" ><i class="bi bi-calendar-range"></i></a>   </td>
<td><a href ="{{route('creahoras', $dato->prof_id)}}"  class="btn btn-warning" ><i class="bi bi-clock-history"></i></i></a>   </td>



<td><a class="btn btn-danger delete" id="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{ route('eliminar_prof', $dato->prof_id) }}">

  <i class="bi bi-trash3"></i>
</a> </td>


</tr>
 @endforeach
  </tbody>
                  
                  </table>
                  @endsection
                   @include('layouts.datatables')
                  @section('js')
                  
                 
                 <script>
   $(document).ready( function () {
  $('#tableprof').DataTable(
    { language: {
        searchPlaceholder: "Buscar registros",
        search: "",
        
      }
     
    })
  
  
}); 
         // paso ruta del form al modal
    $(document).on('click','.delete',function(){
        var data_url = $(this).attr('data-id');
        $('#frm').attr('action', data_url);

       
    });         
                  </script>
                      
                  @endsection          </div>
       
    

                  @include('layouts.admin.profesionales.modal_delete')



 