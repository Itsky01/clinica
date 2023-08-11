
        
  
    <div class="container-fluid">
      <h5 class="bg-primary text-center p-4 text-white">Solicitud de consulta</h1>
       @livewireStyles
      <form action="{{route('consulta')}}" method="post" >
     @csrf
        <div class="card text-center mt-3">
         @include('layouts.flash-message')
        <div class="card-header border shadow-sm">
      <h5>  Solicite su consulta desplegando los selectores</h5>
        </div> 
        <div class="card-body shadow">
         
         
          <div class="container"> 
            <div class="row gy-3">
            
      
              <div class="col-12 col-lg-6 ">
        
    
    
                <div class="form-group" >            
                        <label for="my-select">Especialidad</label>
             
                 <select class="form-select" wire:model='esp' wire:loading.attr="disabled" aria-label="Default select example" id="especialidad" onchange="showesp()">
                  <option selected value="">Seleccione especialidad medica</option>
                             
                  @foreach ($especialidad as $especial)
          <option value="{{$especial->esp_id}}">{{$especial->esp_nombre}}</option>
         
          @endforeach 
        
                </select>
    
                   
                </div>
             </div>
    
    
     
              
        <div class="col-12 col-lg-6">
        
                            <div class="form-group" id="divprof">
                    <label for="my-select">Profesionales disponibles</label>
                                  
              
                        <select wire:model='selectedprofesional' {{ (!empty($profesionales)) ? '' : 'disabled'}} wire:loading.attr="disabled" class="form-select" id="tipo" name="tipo" onchange="showprof()">
                                             
                        @if(!is_null($profesionales))
                       <option value="" selected>Seleccione Profesional</option>
                        @foreach ($profesionales as $profesion)
                        <option value="{{$profesion->prof_id}}">{{$profesion->prof_nombre.' '.$profesion->prof_apellido}}</option>
                      
                      
                        @endforeach 
                        @endif
                    </select> 

                   
                   </div> 
               
                  </div>
             
                  
                <div class="col-12 col-lg-6">
                    <div class="form-group" id="divfecha">
                     
                      
                         <label for="my-select">Fechas disponibles</label>
                  
                        <select wire:model='selectedfecha' {{ (!empty($fechas)) ? '' : 'disabled'}} wire:loading.attr="disabled" class="form-select" id="fecha" name="fecha" onchange="showfecha()">
                       
                        @if(!is_null($fechas)&& !empty($divfechas))
                      
                       <option value="">Seleccione Fecha</option>
                        @foreach ($fechas as $fech)
                        <option data-valor="{{$fech->f_id}}" data-texto="{{$fech->fecha}}" value="{{$fech->profesionales_id}}">{{ date('d-m-y', strtotime($fech->fecha)) }}</option>
                        @endforeach 
                   


                        
                      
 @else
 
   <option value="" selected disabled>SIN FECHAS DISPONIBLES</option>
                  
                  
                      
                 
                  @endif </select>
                    </div>
           
    
                  </div> 
    
   
           
                <div class="col-12 col-lg-6">
                    <div class="form-group" id="divhora" >
                        <label for="my-select">Horarios disponibles</label>
                        <select id="hora" name="hora" {{ (!empty($horarios)) ? '' : 'disabled'}}  wire:model="selectedhora" wire:loading.attr="disabled" class="form-select" onchange="showhora()" >
                           
                            @if(!is_null($horarios)&& !empty($divhoras))
                           <option value="" >Seleccione horarios</option>
                         
                           @foreach ($horarios as $hora)
                            <option value="{{$hora->hora_atencion}}">{{date("H:i",(strtotime($hora->hora_atencion))) }}</option>
                                                 
                            @endforeach 
@else


<option value="" selected disabled>SIN HORARIOS DISPONIBLES</option>
   

                        @endif
                       
                        </select>
                        @error('hora')
                        <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
                    @enderror
                      </div>
            
                  </div>
               
                          
                   
                    <div class="col-12 pt-2" >
 <label for="form-check-input" >Medio de pago</label> &nbsp&nbsp&nbsp

                    <div class="form-check form-check-inline" > 
            
                        <input class="form-check-input "  {{($btncontinuar==true) ? '' : 'disabled'}} type="radio" name="radio" id="radiouno" value="Particular" onclick="check()">
            <label class="form-check-label" for="inlineCheckbox1">Particular</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input"  {{($btncontinuar==true) ? '' : 'disabled'}} type="radio" name="radio" id="radiodos" value="Mutual" onclick="check()">
            <label class="form-check-label" for="inlineCheckbox2">Mutual</label>
          </div>  @error('radio')
          <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
      @enderror
                  </div>
     
               
          </div>
              
        </div>
         
        </div>
       
    </div>
   
         
      <div class="row justify-content-md-center "> 
          <div class="col-md-8 pt-2">
            <div class="card-header border text-center text-white bg-primary">
                <h5 class="p-2">Resumen del turno</h5> 
                 </div>
              <div class="card p-3 shadow">
                
                  <label class="text-uppercase">Paciente</label>
                
                    @csrf
                   
                  <div class="inputbox "> 
                    @if( Auth::user()->rol == '2' )
                    
                    <input type="text" name="paciente" value=" {{Auth::user()->name}} {{Auth::user()->apellido}}" class="form-control" required readonly>  </div>
                
                @else
                <input type="text" name="paciente" value=" {{Auth::user()->apellido}}" class="form-control" required readonly>  </div>
              
@endif
                  <div class="row mt-3">
                      <div class="col-md-6">
                          <label class="text-uppercase">Profesional</label>
                          <div class="inputbox  mr-2"> <input type="text" name="nameprof" id="nameprof"class="form-control" required="required" readonly> <i class="fa fa-credit-card"></i> </div>
                      </div>
                      <div class="col-md-6 mt-3 mt-md-0">
                          <label class="text-uppercase">Especialidad</label>
                          <div class="inputbox mr-2"> <input type="text" name="esp" class="form-control" required="required" readonly>  </div>
                                              
                      </div>
                  </div>
                  <div class="mt-3">
                     
                      <div class="row ">
                          <div class="col-md-6">
                             <label for="mname">Medio pago</label>
                              <div class="inputbox mr-2"> <input type="text" name="txtradio" id="txtradio" class="form-control" required="required" readonly> </div>
                              
                            </div>
                        
                          <div class="col-md-6 mt-3 mt-md-0 ">
                              
                              <div class="d-flex flex-row ">  
                                  <div class="inputbox mr-2 "> <label for="fname">Fecha</label><input type="text" name="txtfecha" id="txtfecha" class="form-control" required="required"  readonly></div>
                              
                                  <div class="inputbox mr-2"> <label for="name">Hora</label><input type="text" name="txthora" id="txthora" class="form-control" required="required" readonly>  </div>
                                                        </div>
                                                        @error('txtfecha')
                                                        <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
                                                    @enderror
                                                        @error('txthora')
                                                        <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
                                                    @enderror
                          </div>
                      </div>
                      <div class="d-grid gap-2 col-lg-8 mx-auto mt-4 " >
                          <button class="btn btn-primary text-white" {{(!empty($profesionales)) && (!empty($fechas)) && (!empty($horarios)) &&($btncontinuar==true) ? '' : 'disabled'}} type="submit" wire:loading.attr="disabled" wire:click='Confirmar' >Confirmar</button>
                          <a class="btn btn-danger text-white"  {{($btnsubmit==false) ? '' : 'disabled'}} href ="{{route('nuevo_turno')}}"  role="button"> Volver</a>
                      
                        
                          <div wire:loading wire:target="Confirmar" class="text-center" >
                          <h4>Procesando informacion...</h4>
                      </div>
                        </div>
                       
                                                
                  </div> 
                
                  <input type="text" class="form-control text-white d-none"  name="fech" id="fech" readonly>
                  <input type="text" class="form-control text-white d-none"  name="hidtxtfecha" id="hidtxtfecha" readonly>
                  @error('hidtxtfecha')
                  <div class="alert alert-danger"> <small> {{ $message }} </small>  </div>
              @enderror 
              </div>
           
              
          </div>
          </form>
      </div>
      
  </div>
   
 
  @livewireScripts
    
  <script src="{{asset('js/funciones_turno.js') }}"></script>
   