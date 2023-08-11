@extends('layouts.admin.pacientes.plantillabase')



@section('css')   <!-- abrimos section para agregar css de datatable solo para esta vista -->

@include('layouts.datatables')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js"></script>

    @endsection
  
    @if (Auth::user()->isAdmin())

    @include ('navbar.nav-user')
    
    @else
     @include ('navbar.nav-admin')
    
    @endif

 <div class="py-12 px-5">
 
 <h2 class="bg-primary text-center p-3 text-white shadow mt-3">turnos pendientes</h2>
  @section('contenido')
  <div class="container overflow-hidden p-5">
  
    <div class="row gx-5 ">
       
    
      <div class="col-12 col-md-6 mb-2 mb-md-0">
        <div class="input-group ">
       
          <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
  </svg>
          </span>
            <input type="text" id="min" name="min" class="form-control" placeholder="Fecha inicial:" aria-label="Input group example" aria-describedby="basic-addon1">
        </div>
        
      </div>
      <div class="col-12 col-md-6 input">
        <div class="input-group ">
       
        <span class="input-group-text" id="basic-addon1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
</svg>
        </span>
          <input type="text" id="max" name="max" class="form-control" placeholder="Fecha final:" aria-label="Input group example" aria-describedby="basic-addon1">
      </div>
      </div>
    </div>
  </div>
                       
@include('layouts.flash-message')



                 <table class="table table-hover display responsive nowrap" style="width:100%" id="tableprof">
                  <thead class="bg-primary text-white">
                      <tr>
                        <th scope="col">Paciente</th>
                        <th scope="col">Estudio</th>
                        <th scope="col">Profesional</th>

                        <th scope="col" >date</th>
                        <th scope="col" >Fecha</th>
                        <th scope="col">Hora</th>

                        <th scope="col">Medio de pago</th>
                       
<th></th>


                      </tr>
                    </thead>
                    <tbody>
 @foreach ($turno as $dato)
<tr>
<th>{{$dato->apellido}} {{$dato->name}}</th>
<th>{{$dato->nombre_estudio}}</th>
<th>{{$dato->prof_apellido}} {{$dato->prof_nombre}}</th>
<th > {{$dato->est_fecha }}</th>
<th> {{$dato->est_fecha}}</th>
<th> {{date('H:i', strtotime($dato->hora)) }}</th>
<th>{{$dato->mediopago}}</th>


 
<td><a class="btn btn-danger btn-sm rounded-circle delete" id="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{ route('eliminar_estudio', $dato->est_id) }}">

  <i class="bi bi-x-lg"></i>
</a> </td>


</tr>
 @endforeach
  </tbody>
                  
                  </table>
                  @endsection
                 @section('js')
                  
                 
                 <script>
   $(document).ready( function () {
  $('#tableprof').DataTable(
    {
      
      dom: 'Bfertip',
               
             columnDefs: [
            {
                targets: 4,
                render: DataTable.render.datetime('YYYY-MM-DD', 'DD-MM-YY', 'en'),
            },
        ],
                 
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
  
  var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
  
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
       
       
       
        var date = new Date( data[4] );// fecha de la tabla 
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date  && max === null ) ||
            ( min <= date  && date <= max )
        ) {
            return true;
            
        }

        
        return false;
    }
);
 

    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'DD-MM-YY'
    });
   
    maxDate = new DateTime($('#max'), {
      format: 'DD-MM-YY'
    });
   
    // DataTables initialisation
    var table = $('#tableprof').DataTable();
    table.columns( [3] ).visible( false );
    // Refilter the table
    $('#min,#max').on('change', function () {
        table.draw();
    });
   
    
    
}); 
         // paso ruta del form al modal
    $(document).on('click','.delete',function(){




        var data_url = $(this).attr('data-id');
        $('#frm').attr('action', data_url);

       
    });         
                  </script>
                      
                  @endsection          </div>
       
    

                  @include('layouts.admin.profesionales.modal_delete')



 