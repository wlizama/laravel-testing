<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app" class="container">
      <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-md">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#appNavbarCollapse" aria-controls="appNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <!-- Branding Image -->
          <a class="navbar-brand" href="{{ url('/') }}">
              Laravel - My Gallery
          </a>
          <div class="collapse navbar-collapse" id="appNavbarCollapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav">
                  <li class="nav navbar-item">
                    <form action="/galeria">
                      <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Buscar..." required>
                        <span class="input-group-btn">
                          <button class="btn btn-outline-success">Buscar</button>
                        </span>
                      </div>
                    </form>
                  </li>
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav ml-auto">

                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                  @else
                      <li class="nav-item dropdown mr-2">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Notificaciones <span class="caret"></span></a>
                        <notifications :user="{{ Auth::user()->id }}"></notifications>
                      </li>
                      <li class="nav-item dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/{{ Auth::user()->username }}/follows">
                                Follows <span class="badge badge-default">{{ Auth::user()->follows->count() }}</span>
                            </a>
                            <a class="dropdown-item" href="/{{ Auth::user()->username }}/followers">
                                Followers <span class="badge badge-default">{{ Auth::user()->followers->count() }}</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </nav>

      @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
