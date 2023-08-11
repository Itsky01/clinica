
 @extends('layouts.admin.pacientes.plantillabase')
 @section('css')   <!-- abrimos section para agregar css de datatable solo para esta vista -->
 
     @include('layouts.styles_dtables')
     @endsection
    @include ('navbar.nav-user')
     <div class="px-5">
   
            @section('contenido')
           
         
 <h2 class="text-center bg-secondary text-white p-4"> LISTADO DE ESPECIALIDADES</h2>
 
 <div class="row d-flex justify-content-center ">
  <div class="col-sm-7 col-md-5">
  <form action="{{route('nuevaEsp')}}" method="post">
    @csrf
 <div class="input-group mt-3">
 
  <input type="text" class="form-control" placeholder="Ingrese nueva especialidad" id="nombre" name="nombre" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
  <button class="btn btn-primary" type="submit" >Cargar</button>

  
</div>
      </form>      
  </div> </div>


  <div class="input-group my-4 mx-auto">
                 
                  
                    <a href ="{{route('dash_admin')}}"  class="btn btn-secondary " >VOLVER</a>  </div>
                
                @include('layouts.flash-message')
                  <table class="table table-bordered display responsive nowrap" id="esp" style="width:100%">
                     <thead class="bg-primary text-white text-center">
                       <tr>
                        
                         <th scope="col">Denominacion</th>
                         
                                               <th></th>
 
 
 
 
                       </tr>
                     </thead>
                     <tbody class="text-center">
  @foreach ($esp as $dato)
 <tr>
 
 <th>{{$dato->esp_nombre}}</th>
  
 <form action="" method="post" >
 @csrf
 @method('DELETE')
 
 <td><a class="btn btn-danger delete" id="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{ route('eliminar_esp', $dato->esp_id) }}">
  <i class="bi bi-trash"></i>
</a> </td>
 
 </form>
 </tr>
  @endforeach
   </tbody>
                  
                   </table>
                   @endsection


                                    
                  
                   @include ('layouts.datatables')



 @section('js')
 
 <script>
 $(document).ready( function () {
   $('#esp').DataTable(
     { language: {
         searchPlaceholder: "Buscar registros",
         search: "",
         
       }
      
     })
   
   
 } );
   // paso ruta del form al modal
   $(document).on('click','.delete',function(){
        var data_url = $(this).attr('data-id');
        $('#frm').attr('action', data_url);

       
    });       
 </script>
      </div>
 @endsection
             
    
 
     @include('layouts.admin.profesionales.modal_delete')

