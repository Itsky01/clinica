<style>
.navbar-dark .navbar-nav .nav-item .nav-link {
color: white;
}
.navbar{
  background-color: #0c6f72e7;
}
</style>


<nav class="navbar navbar-expand-lg sticky-top navbar-dark shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('profesionales') }}">Profesionales</a>
          </li>


          <ul class="navbar-nav me-auto">
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Turnos
            
            </a>

            <ul  class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           
              <li><a class="dropdown-item" href="{{ route('nuevo_turno')}}">Crear turno</a></li>
                       
              <li><a class="dropdown-item" href="{{ route('pendientes')}}">Turnos pendientes</a></li>
              
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>

         
        
          </ul>


          

          <li class="nav-item">
            <a class="nav-link" href="{{ route('vistaEsp') }}">Especialidades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pacientes') }}">Pacientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Estudios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mutuales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('listarhs') }}">Horarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" >Fechas de atencion</a>
          </li> </ul> 

          <ul class="navbar-nav me-auto">
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
              <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
          @else
              {{ Auth::user()->name }}
              @endif
             </a>
            <ul  class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            
              <li><a class="dropdown-item" href="{{ route('profile.show') }}">perfil</a></li>
              <li><a class="dropdown-item" href="{{ route('logout')}}"  onclick="event.preventDefault()
                document.getElementById('logout-form').submit();"> SALIR</a>
               
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>

         
        
          </ul>
 
<li class="list-group">
       <small class="text-white"> <i>   Hola, {{Auth::user()->name}} </i> </small> 
          </li>
        </ul>
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
          @csrf
      </form></li>
      </div>
    </div>
  </nav>