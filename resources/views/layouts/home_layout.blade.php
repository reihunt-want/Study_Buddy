<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Study Buddy</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header class="navbar">
    <div class="logo">STUDY BUDDY</div>

    <nav class="nav-menu">
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>
            <li><a href="{{ url('/biaya') }}">Biaya & Pendaftaran</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </nav>

    <div class="nav-login">
        <a href="{{ url('/login') }}" class="btn-login">Login</a>
    </div>
</header>


  <main>
    @yield('content')
  </main>
</body>
</html>
