

 
<div>
 
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
  
    @include('layouts.styles_dtables')
  <style>  
  
    #tablefecha_filter{ display: none; }
  
  </style>

   

     @livewireStyles
     <div class="container-fluid">
        <h5 class="bg-primary text-center p-4 text-white">Cargar fechas de atencion</h1>
       
         <div class="card text-center mt-3">
           @include('layouts.flash-message')
          <div class="card-header border shadow-sm">
     Para borrar mas de 1 fecha, marque los casilleros correspondientes y luego presione borrar
          </div> 
          <div class="card-body shadow">@if ($chkfecha)<button class="btn btn-secondary" wire:click="deleteChkfechas({{$valor}})" wire:loading.attr="disabled">Borrar {{count($chkfecha)}} FECHA/S</button> @endif 
         <br> <div wire:loading wire:target="deleteChkfechas({{$valor}})" class="text-center" >
              <h4>Procesando informacion...</h4>
          </div>   <form wire:submit.prevent="store({{$valor}})">
           @csrf
            <div class="container"> 
 
<div class="row justify-content-md-center">

  <div class="col-12 col-lg-5 pt-2">

  <div class="form-group" id="divprof">
   
              

    
       
  @error('profesional')
  <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
   
   </div> </div> </div>




   <div class="row justify-content-md-center">
       <div class="col-12 col-lg-5 pt-2">
          @if(!is_null($contarfechas))
               <div class="form-group">  
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif   @if ($chkfecha)
             <input type="hidden" name="idprof" id="idprof" value="{{$valor}}">    
             @endif  <table class="table table-hover display responsive nowrap" id="tablefecha">
                

<thead>
  <tr><th></th>
<th scope="col">Dia</th>
<th scope="col">Fecha</th>
<th scope="col"></th>
</tr>
</thead>

<tbody>
@foreach ($listarfecha as $dato)
<tr><th> <input class="form-check-input" type="checkbox" value="{{ $dato->f_id}}" name="" wire:model='chkfecha'>
 </th>
<th>@if($dato->dias_id=='1') Lunes
  @else @if($dato->dias_id =='2') Martes
   @else @if($dato->dias_id =='3') Miercoles
   @else @if($dato->dias_id =='4') Jueves
   @else @if($dato->dias_id =='5') Viernes
   @endif
    @endif  @endif @endif @endif

   </th>
  
<th>{{ date('d-m-y', strtotime($dato->fecha)) }}</th>
<th>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" wire:click="deletefecha({{ $dato->f_id}})" >Delete</button>
 </th>
</tr>

    @endforeach



</tbody>



  </table>
 
              </div> 

               @else <p class="text-center p-5"> Sin fechas cargadas</p>
              
              @endif
               @include('layouts.datatables')
              
              </div> </div> </div>

<hr>
 
              <div class="row justify-content-md-center">  
          <div class="col-12 col-lg-6">
          
                              <div class="form-group" id="divprof">
                      <label for="my-select">dias de atencion</label>
                                
                
                      <select wire:model='selecteddia'  wire:ignore {{ (!empty($diaprof)) ? '' : 'disabled'}}  class="form-select" wire:loading.attr="disabled" id="day" name="day" required>
                           
                        @if(!is_null($diaprof))
                        
                    <option value="0" selected >Seleccione Dia</option>
                       @foreach ($diaprof as $dias_atencion)
                         <option value="{{$dias_atencion->d_id}}" @if($dias_atencion->id == $dias_atencion->d_id) selected @endif>{{$dias_atencion->dia}}</option>
                      
                        @endforeach 
                      
                      @else

                      <option value="0" selected >Sin dias disponibles</option> 
                      
                        @endif
                        
                    </select> 
                         
                    @error('day')
                    <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
                @enderror
                     
                     </div> 
                 
                    </div>
                              
       
                 
            </div>

         
            
            <div class="container pt-5 ">
  <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3 justify-content-md-center ">
   
      
     <div class="col border border-primary p-3">
             
      
 @if(!is_null($startdate)) <h5 class="bg-primary text-white p-3" >Marque las fechas a cargar</h3> <hr>  @while ($startdate < $enddate) 
   <div class="form-check form-check-inline mt-2 "> 
  <input class="form-check-input" {{ (!empty($startdate)) ? '' : 'disabled'}} type="checkbox" id="inlineCheckbox1" value="{{date('Y-m-d', $startdate)}}" name="prfecha[]"  wire:model="prfecha">
              
  <label class="form-check-label" for="inlineCheckbox1" >{{date("d/m/y", $startdate)}} @php $startdate = strtotime("+1 week", $startdate)@endphp</label>
</div>@endwhile  @endif<div >

@error('fecha') </div>
<div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
   
    </div>

    


    



    <div class="col pt-3">
         
   
    </div>
   
  
       
    
   
    
  </div>
</div>
            

          </div>

         
          </div>
          <div class="card-footer shadow bg-light border">
           Las fechas a cargar contemplan desde hoy hasta 6 semanas de anticipacion <hr>  
            <div class="d-grid gap-2 col-lg-5 mx-auto mt-4 " >
           
              <button type="submit" class="btn btn-primary " {{ (!empty($startdate)) ? '' : 'disabled'}} {{ (!empty($prfecha)) ? '' : 'disabled'}}>Save changes</button>
          
              <a class="btn btn-danger text-white" href ="{{route('dash_admin')}}"  role="button"> Volver</a>
          
            
              <div wire:loading wire:target="Confirmar" class="text-center" >
              <h4>Procesando informacion...</h4>
          </div>
            </div> 

                 </div> 
      </div>
     
           
           
            
          
        
        
   
   </form>
     
   
       
  
    <div class="modal fade" wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" >
  
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title " id="staticBackdropLabel">Borrar profesional</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
           <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
            
            <button type="button" wire:click.prevent="delete({{$valor}})"  class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                   
          </div>
        </div>
    </div>
</div>
</div>

 
    @livewireScripts
      
   
<script>

$(document).ready( function () {; 
  $('#tablefecha').DataTable(
    { language: {
      
        
      }}  
   //   Livewire.emit('mifecha'); 
    )
        }); 

        window.livewire.on('postUpdated', () => { // para ocultar modal al confirmar
            $('#staticBackdrop').modal('hide');Livewire.emit('mifecha');
        });
       
 /*
function seleccionar (){
 
//  const ids = [...$("#eligefecha:selected")].map(e => e.value);
  $('#eligefecha option:selected').appendTo('#fecha').attr("value");

  //var precio = $("option:selected",this).data('precio');
   
//var mifecha= $('#fecha').val();


  $('#confirmar').prop('disabled',false);

  // $('#fecha option]').map(e => e.value).append('@');
 //  $("#pais option[value=2]").attr("selected",true);
  //alert(mifecha)
  
      }
     
      function quitar (){
  //const id = [...$("#fecha:selected")].map(e => e.value); 
  $('#fecha option:selected').appendTo('#eligefecha').attr("value");
  //$('#fecha option:selected').attr("value");
  // $('#fecha option]').map(e => e.value).append('@');
 //  $("#pais option[value=2]").attr("selected",true);
  //alert(mifecha)
      }*/

      
     </script>

   
       
 
     



