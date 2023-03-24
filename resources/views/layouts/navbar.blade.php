<nav class="navbar navbar-expand-lg navbar-light bg-withe">
  <div class="container-fluid">
  
    <a href="{{url('/')}}"><img src="{{ asset('images/question-reponse.jpg') }}"  style="width:150px; height:50x"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Compte
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @guest
                <li><a class="dropdown-item" href="{{route('login')}}">Se connecter</a></li>
                <li><a class="dropdown-item" href="{{route('register')}}">S'enregistrer</a></li>
            @endguest
            @auth
                <li>
                    <form id="logoutForm" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <a  class="dropdown-item" href="#"
                        onclick="document.getElementById('logoutForm').submit()">Deconnexion</a>
                </li>
            @endauth
          </ul>
        </li>
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Collectifs
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('collectives.index')}}">
                        Mes Collectifs
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('collectives.create')}}">
                        Créer un Collectifs
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Questions
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('questions.index')}}">
                        Mes Questions
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('questions.create')}}">
                        Créer une question
                    </a>
                </li>
            </ul>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
