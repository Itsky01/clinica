
 @extends('layouts.admin.pacientes.plantillabase')
 @section('css')   <!-- abrimos section para agregar css de datatable solo para esta vista -->
 
     @include('layouts.styles_dtables')
     @endsection
    @include ('navbar.nav-user')
     <div class="px-5">
   
            @section('contenido')
           
         
 <h2 class="text-center bg-secondary text-white p-4"> Horarios de trabajo</h2>
 
 <div class="row d-flex justify-content-center ">
  <div class="col-sm-7 col-md-5">
  <form action="{{route('nuevahora')}}" method="post">
    @csrf
 <div class="input-group mt-3">
 
  <input type="time" class="form-control" placeholder="Ingrese nuevo horario" id="imphora" name="imphora" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
  <button class="btn btn-primary" type="submit" >Cargar nuevo horario</button>
 



</div>
 @error('imphora')
  <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
      </form>      
  </div> 


  <div class="input-group my-4 mx-auto">
                 
                  
                    <a href ="{{route('dash_admin')}}"  class="btn btn-secondary " >VOLVER</a>  </div>
                
                @include('layouts.flash-message')

                <div class="col-sm-7 col-md-8">
                  <table class="table table-bordered display responsive nowrap" id="esp" style="width:100%">
                     <thead class="bg-primary text-white text-center">
                       <tr>
                       
                         <th scope="col">Horario</th>
                         
                                               
                             <th></th>
 
                       </tr>
                     </thead>
                     <tbody class="text-center">
  @foreach ($horarios as $dato)
 <tr>
 
 <th>{{$dato->horas_reloj}}</th>
 
 <form action="" method="post" >
 @csrf
 @method('DELETE')
 
 <td><a class="btn btn-danger delete" id="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{ route('borra_hs', $dato->id_horas) }}">
  <i class="bi bi-trash"></i>
</a> </td>
 
 </form>
 </tr>
  @endforeach
   </tbody>
                  
                   </table> </div> </div>
                   @endsection


                                    
                  
                   @include ('layouts.datatables')



 @section('js')
 
 <script>
    // paso ruta del form al modal
   $(document).on('click','.delete',function(){
        var data_url = $(this).attr('data-id');
        $('#frm').attr('action', data_url);

       
    });       
 </script>
      </div>
 @endsection
             
    
 
     @include('layouts.admin.profesionales.modal_delete')

