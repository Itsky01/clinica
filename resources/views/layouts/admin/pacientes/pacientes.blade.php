
 @extends('layouts.admin.pacientes.plantillabase')
@section('css')   <!-- abrimos section para agregar css de datatable solo para esta vista -->

    @include('layouts.styles_dtables')
    @endsection
   @include ('navbar.nav-user')
    <div class="py-12 px-5">
  <h2 class="bg-primary text-center p-3 text-white shadow mt-3">Listado de Pacientes</h2>
 
           @section('contenido')
       
             
           @section('botones')
           <a href ="{{route('crear_pac')}}"  class="btn btn-primary " >CREAR</a>
       
         <a href ="{{route('dash_admin')}}"  class="btn btn-danger " >VOLVER</a>
       
       @endsection
       
              @include('layouts.flash-message')
                 <table class="table table-bordered display responsive nowrap" id="profesionales" style="width:100%">
                    <thead class="bg-info text-white">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Documento</th>

                        <th scope="col">telefono</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">email</th>

<th></th>
<th></th>
<th></th>


                      </tr>
                    </thead>
                    <tbody>
 @foreach ($usuario as $dato)
<tr>
<th>{{$dato->id}}</th>
<th>{{$dato->name}}</th>
<th>{{$dato->apellido}}</th>
<th>{{$dato->dni}}</th>
<th>{{$dato->telefono}}</th>
<th>{{$dato->domicilio}}</th>
<th>{{ date('d-m-y', strtotime($dato->fecha)) }}</th>
<th>{{$dato->email}}</th>
<!-- action=" {route('eliminar', $dato->id) }}
  {route('editar', $dato->id)}}
  " -->

<td><button type="submit" class="btn btn-primary text-white"><i class="bi bi-unlock"></i></button></td>
<td><button type="submit" class="btn btn-success"><i class="bi bi-calendar-check"></i></button></td>
<td><a class="btn btn-danger delete " id="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{ route('eliminar', $dato->id) }}">
  <i class="bi bi-trash"></i>
  </a>
</td>


</tr>
 @endforeach
  </tbody>
                 
                  </table>
                  @endsection

                  
                  @include ('layouts.datatables')
@section('js')

<script>
$(document).ready( function () {
  $('#profesionales').DataTable(
    { language: {
        searchPlaceholder: "Buscar registros",
        search: "",
        
      }
     
    })
  
  
} 

    
    
    
    );
// paso ruta del form al modal
    $(document).on('click','.delete',function(){
        var data_url = $(this).attr('data-id');
        $('#frm').attr('action', data_url);

       
    });


</script>
    
@endsection
            
    </div>

    @include('layouts.admin.pacientes.modal_delete')

