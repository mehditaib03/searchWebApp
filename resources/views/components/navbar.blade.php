  <ul class="nav nav-tabs justify-content-center ">
      {{-- <div class="container-fluid">
          <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample"> --}}
              <li class="nav-item ">
                  <a class="nav-link {{ $createActive ?? '' }}" href="{{ route('keyword.create') }}">Ajouter</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ $indexActive ?? '' }}" href="{{ route('keyword.index') }} ">Keyword</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Rechercher</a>
              </li>
              {{-- <li class="nav-item">
                  <a class="nav-link " href="{{ URL::to('/') }}">Acceuil</a>
              </li> --}}
          {{-- </div>
      </div> --}}
  </ul>
