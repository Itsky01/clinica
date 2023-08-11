<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#">SOY profesional</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profesionales') }}">Mis Turnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Historial</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="#">Reportes medicos</a>
          </li>
        
          <li class="nav-item ">
            <a class="nav-link " href="#">informacion util</a>
          </li>
          
          <li class="nav-item dropdown ml-5">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
              <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
          @else
              {{ Auth::user()->name }}
              @endif
             </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            
              <li><a class="dropdown-item" href="{{ route('profile.show') }}">perfil</a></li>
              <li><a class="dropdown-item" href="{{ route('logout')}}"  onclick="event.preventDefault()
                document.getElementById('logout-form').submit();"> SALIR</a>
               
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
          @csrf
      </form></li>
      </div>
    </div>
  </nav>