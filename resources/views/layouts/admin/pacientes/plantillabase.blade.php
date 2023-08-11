<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    @yield('css')
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    @yield('js')
   @livewireStyles
    <title>Hello, world!</title>
    
  </head>

  <style> 
  /* estilos para barra de busqueda de datatable. */
  
  @media only screen and (min-width: 768px) {
    #profesionales_filter input,#tableprof_filter input {
width:300px;}
  }
@media only screen and (max-width: 768px) {
#profesionales_filter input,#tableprof_filter input {
width:500px;
max-width:300px;
margin-left: auto;
margin-right: auto;
margin-top: 15px;
}
}
@media only screen and (max-width: 369px) {
#profesionales_filter input, #tableprof_filter input {
max-width:150px;

}

}

  </style>
  
  <body style="background-color: rgb(245, 245, 245);">
   
 
<div class="container-fluid p-3 mt-4">

  <div class="d-grid gap-2 col-6 mx-auto col-md-11 ml-md-auto d-md-flex justify-content-md-between mb-3">
  @yield('botones')


</div> 
             
@yield('contenido')  <!-- importa codigo desde html base y extiende hacia otra vista y se llama con section  -->

</div>
   
   
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
   
@livewireScripts

  </body>
  
</html>