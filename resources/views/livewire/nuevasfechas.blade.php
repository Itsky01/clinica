

 
<div>
 
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
  
    @include('layouts.styles_dtables')
  <style>  
  
    #tablefecha_filter{ display: none; }
  
  </style>

   

     @livewireStyles
     <div class="container-fluid">
                    <div class="container"> 
 

<hr>
 
              <div class="row justify-content-md-center">  
          <div class="col-12 col-lg-6">
          
                              <div class="form-group" id="divprof">
                      <label for="my-select">dias de atencion</label>
                                
                
                      <select wire:model='selecteddia' {{ (!empty($diaprof)) ? '' : 'disabled'}}  class="form-select" wire:loading.attr="disabled" id="day" name="day" required>
                           
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


          
            
            <div class="container pt-5">
  <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
    <div class="col">
      
      <label for="my-select">Fechas de atencion</label>
             
      <select multiple class="form-select" id="eligefecha" name="eligefecha" {{ (!empty($startdate)) ? '' : 'disabled'}}  >
   
       @if(!is_null($startdate))
     
      <option value="" disabled>Seleccione Fecha</option>
      @while ($startdate < $enddate) 

     <option value="{{date('Y-m-d', $startdate)}}">{{date("d/m/y", $startdate)}}</option>
         
     {{ $startdate = strtotime("+1 week", $startdate)}}
                   
     @endwhile
     @else

<option value="" disabled>SIN FECHAS DISPONIBLES</option>
   @endif
   </select>

  
   
@error('fecha')
<div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
@enderror
   
    </div>




    <div class="col pt-3">
      <div class="d-grid gap-4 col-6 col-lg-4 mx-auto">
        <input type="button" value="seleccionar" id="btnfecha" onclick="seleccionar()" {{ (!empty($startdate)) ? '' : 'disabled'}} class="" >
        <input type="button" value="Quitar" id="btnpasarfecha" onclick="quitar()" {{ (!empty($startdate)) ? '' : 'disabled'}}>
     
   
   
      </div>
   
   
    </div>
   
    <div class="col">


      <label for="my-select">Las fechas a cargar son:</label>
                  

      <div class="form-group">
      
      <select multiple id="fecha" class="form-control" {{ (!empty($startdate)) ? '' : 'disabled'}} name="fecha[]" wire:model='pfecha' >
      
      
      </select>

      @error('eligefecha')
      <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
   @enderror
    </div>


      
    </div>
    <div class="col">
    
    </div>
    <div class="col">
      
    </div>
    
    
   
    
  </div>
</div>
            

          </div>

         
          </div>
          <div class="card-footer shadow bg-light border">
           Las fechas a cargar contemplan desde hoy hasta 6 semanas de anticipacion <hr>  
            <div class="d-grid gap-2 col-lg-5 mx-auto mt-4 " >
           
              <button type="submit" class="btn btn-primary ">Save changes</button>
          
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

$(document).ready( function () {
  $('#tablefecha').DataTable(
    { language: {
      
        
      }}  
    
    )
        }); 

        window.livewire.on('postUpdated', () => { // para ocultar modal al confirmar
            $('#staticBackdrop').modal('hide');
        });
   
 // siempre detener el submit
function seleccionar (){
 
  const ids = [...$("#eligefecha:selected")].map(e => e.value);
  $('#eligefecha option:selected').appendTo('#fecha').attr("value");

var mifecha= $('#fecha').val();
Livewire.emit('mifecha');

  $('#confirmar').prop('disabled',false);

  // $('#fecha option]').map(e => e.value).append('@');
 //  $("#pais option[value=2]").attr("selected",true);
  //alert(ids)
  
      }
     
      function quitar (){
  const id = [...$("#fecha:selected")].map(e => e.value);
  $('#fecha option:selected').appendTo('#eligefecha');
  //$('#fecha option:selected').appendTo('#fecha');
  // $('#fecha option]').map(e => e.value).append('@');
 //  $("#pais option[value=2]").attr("selected",true);
  //alert(ids)
      }

      
     </script>

   
       
 
     



