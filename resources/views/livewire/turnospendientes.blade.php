<div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
     
       @include('layouts.datatables')


@if (Auth::user()->isAdmin())

@include ('navbar.nav-user')

@else
 @include ('navbar.nav-admin')

@endif 
    

@livewireStyles
<div class="py-12 px-5">
 
    <h2 class="bg-primary text-center p-3 text-white shadow mt-3">turnos pendientes</h2>
    <div class="container overflow-hidden p-5">
       <div class="row gx-5 ">
         <div class="col-12 col-md-6 mb-2 mb-md-0">
           <select class="form-select" aria-label="Default select example" wire:model='selectedprof' name="especialidad" id="especialidad" >
             <option selected disabled>Seleccione profesional</option>
             @foreach ($profesionales as $profesional)
            
             <option value="{{$profesional->prof_id}}">{{$profesional->prof_nombre.' '.$profesional->prof_apellido}}</option>
           
           
           @endforeach
           </select>
         </div>
         <div class="col-12 col-md-6">
           <select class="form-select" aria-label="Default select example" name="especialidad" id="especialidad" onchange="ShowSelected();">
             <option selected disabled>Seleccione fecha</option>
            </select>
         </div>
       </div>
     </div>
                          
   @include('layouts.flash-message')
                    <table class="table table-hover display responsive nowrap" style="width:100%" id="tableprof" wire:model='tablaturnos' {{ (!empty($profesionales)) ? '' : 'disabled'}}>
                     <thead class="bg-primary text-white">
                         <tr>
                           <th scope="col">Paciente</th>
                           <th scope="col">Estudio</th>
                           <th scope="col">Profesional</th>
   
                           <th scope="col">Fecha</th>
                           <th scope="col">Hora</th>
   
                           <th scope="col">Medio de pago</th>
                          
   <th></th>
   
   
                         </tr>
                       </thead>
                                         
                       <tbody>
   
                        @if(!is_null($profesionales))
   
                        @foreach ($turno as $dato)
                        <tr>
                        <th>{{$dato->apellido}} {{$dato->name}}</th>
                        <th>{{$dato->nombre_estudio}}</th>
                        <th>{{$dato->prof_apellido}} {{$dato->prof_nombre}}</th>
                        <th> {{date('d-m-y', strtotime($dato->est_fecha)) }}</th>
                        <th> {{date('H:i', strtotime($dato->hora)) }}</th>
                        <th>{{$dato->mediopago}}</th>
                        
                        
                         
                        <td><a class="btn btn-danger delete" id="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{ route('eliminar_prof', $dato->prof_id) }}">
                        
                          <i class="bi bi-trash3"></i>
                        </a> </td>
                        
                        
                        </tr>
                         @endforeach
                         @endif
     </tbody>
                     
                     </table>
                     
                   

                    </div>
                   
                </div>        
     
     
     
     
@livewireScripts 
                  
                     
                    
                    <script>
      $(document).ready( function () {
     $('#tableprof').DataTable(
       {
         
         dom: 'Bfertip',
                  
        
      
           
                    
                       buttons: [
   
         {
                   extend: 'print',
                   text: '<i class="bi bi-printer"></i>',
                   title: '', 
                   className: 'btn btn-info', //Primary class for all buttons
                    exportOptions: {
                       columns: ':visible',
                     
                   },
                    
               },
               
           {
                   extend: 'excelHtml5',
                   className: 'btn btn-success', //Primary class for all buttons
                   text: '<i class="bi bi-filetype-xlsx"></i>',
                   title: 'turnos pendientes',
                            exportOptions: {
                       columns: ':visible',
                     
                   },
               },
                    
           {
                   extend: 'pdfHtml5',
                   title: 'turnos pendientes',
                   text: '<i class="bi bi-filetype-pdf"></i>',
                   className: 'btn btn-danger ', //Primary class for all buttons
                   download: 'open',
                   exportOptions: {
                       columns: ':visible',
                     
                   },
               },
                {
                   extend: 'colvis',
                   text:'<i class="bi bi-columns "></i>',
                    className: 'btn btn-warning ', //Primary class for all buttons     
                       }
       ],
         
            language: {
           searchPlaceholder: "Buscar registros",
           search: "",
           
         }
        
       }
       )
     
     
   }); 
            // paso ruta del form al modal
       $(document).on('click','.delete',function(){
           var data_url = $(this).attr('data-id');
           $('#frm').attr('action', data_url);
   
          
       });         
                     </script>
                         
                           
          
       
   
                     @include('layouts.admin.profesionales.modal_delete')
   
   
   


























