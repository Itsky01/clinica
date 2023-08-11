
@extends('layouts.admin.pacientes.plantillabase')
  

<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
 @include('layouts.datatables')

     
        <div class="container">
           <h5 class="bg-primary text-center p-4 text-white">Cargar horarios de atencion</h1>
          
            <div class="card text-center mt-3">
              @include('layouts.flash-message')
            
             <div class="row d-flex justify-content-center mt-3 ">
              <div class="col-sm-7 col-md-5">
<h3>Horarios asignados</h3>
<div >
<div class="table-responsive-md p-3" >
<table class="table table-bordered">
  <thead class="thead text-center bg-info text-white">
    <tr>
    <th>profesional</th>
  <th>dia</th>
  <th>hora</th>
  <th>tipo</th>
  <th> </th>
    </tr>
   
  </thead>
  <tbody class="text-center">
    

    @foreach ($horas as $dato)

<tr>
 <td>{{$dato->prof_nombre}} {{$dato->prof_apellido}}
  </td> 
  <td>{{$dato->dia}}
  </td>
  <td>{{date("H:i",(strtotime($dato->hora_atencion)))}}
  </td>
  <td>{{$dato->tipo_turno}}
  </td>

  <td><a class="btn btn-danger btn-sm delete rounded-circle" id="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  data-id="{{ route('eliminar_hora', $dato->hs_id)}}" >
    <i class="bi bi-x-lg"></i></a>
  </td>
  </tr>
@endforeach




  </tbody>
  
</table>

              </div></div>
              </div>         


             
             
             <div class="d-grid gap-2 d-sm-block mt-3 p-3">
 <div class="card-header bg-light border">
               1º seleccione CONSULTA o ESTUDIO
                       </div> 


              <form action="{{route('asignahoras')}}" method="post" class="pt-5">
              @csrf
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="radiohs" id="radio1" value="consulta" required >
                    <label class="form-check-label" for="radio1">
                      CONSULTAS
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="radiohs" id="radio2" value="estudio">
                    <label class="form-check-label" for="radio2">
                      ESTUDIOS
                    </label>
                  </div>
          </div> 
          



        
             

             <div id="diasest" style="display: none;">
             
              <div class="row d-flex justify-content-center"  >
            
                <div class="col-12">
             <div class="card-header bg-light border">
                   2º seleccione dia de atencion  </div>  </div>
          
                 <div class="col-sm-7 col-md-5">
                            
                   
                   <div class="input-group p-3 mt-3">
                    
                   <select class="form-select " aria-label="Default select example" name="selectest" id="selectest" >
                     <option selected="" disabled="">Elija dia de atencion para estudios</option>
                     @foreach ($dias as $dias_trabajo)
 <option value="{{$dias_trabajo->d_id}}">{{$dias_trabajo->dia}}</option>
 @endforeach
                     </select>  
                    
             </div>
                   @error('selectest')
                     <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
                 @enderror   
               </div> </div>
            
            </div>



             
              <div id="divest" style="display: none;">
                 
                        
             
              <div class="card-header bg-light border mt-3 ">
                3º haga CLICK en los casilleros con los horarios que desea agregar y luego presione CARGAR
                       </div> 

    <input type="hidden" value="{{$idprof->prof_id}}" name="profid" id="profid">

    @error('profid')
    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
<div class="container p-5">
  
<div class="table-responsive-md p-3">
    <table class="table table-hover display responsive nowrap text-center" id="tablehoras">
   
   <thead>
  <tr>
 <th></th> 
<th>Horario</th>
</tr>


   </thead>

   

   <tbody>

    @foreach ($hsreloj as $dato)

<tr>
   <td class="text-end"><input id="selecthora" class="form-check-input" name="selecthora[]" value="{{$dato->horas_reloj}}" type="checkbox"/></td>
 
   <th class="text-center">{{$dato->horas_reloj}} </th>
 
  

  
  </tr>
    @endforeach
   </tbody>
    
   
    </table>

</div>
@error('selecthora')
<div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror        
                <div class="d-grid gap-2 d-sm-block mt-3">
                  <button class="btn btn-primary btn-lg me-md-5" type="button" id="limpiar">Reiniciar</button>
                  <button class="btn btn-danger btn-lg" type="submit">Cargar Horas</button>
            </div> </form>
              </div>
    </div>         

    @include('layouts.admin.profesionales.modal_delete')


              
               
              
                                  
                  
            
              
            
            
   
  
             
 
   
<script>
  $(document).ready(function(){
       $("#radio1,#radio2").on( "click", function() { 
  	    $( '#diasest' ).show();

  
       });
  $("#limpiar").on( "click", function() { 
		 
     $('input[type=checkbox]').prop('checked',false);
         
     
       });

  
// SELECT DIAS
         $("#selectest").on( "change", function() { 
       
        $( '#divest').show();
       })    

        
});

$(document).on('click','.delete',function(){
        var data_url = $(this).attr('data-id');
        $('#frm').attr('action', data_url);

       
    });

  </script>    
    
        
    
   
   