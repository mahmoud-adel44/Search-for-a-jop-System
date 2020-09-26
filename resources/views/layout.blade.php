<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  
  @yield('styles')

</head>
  
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="color: red">System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @yield('home')
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
   
            
        @guest
          <li class="nav-item">
          <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
        </li>
        @endguest
        @auth

        @yield('nav')
        <li class="nav-item">
          <a class="nav-link disabled" href="#">{{Auth::user()->name}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
        </li>
        @endauth
      </ul>
    </div>
  </nav>

  <div class="container py-5">
    @yield('content')
  </div>

  <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>

  @yield('scripts')

</body>

</html>