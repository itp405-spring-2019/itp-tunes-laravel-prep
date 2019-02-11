<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>@yield('title') - ITP Tunes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
    <ul class="nav">
      <li class="nav-item">
        <a href="/" class="nav-link">Home</a>
      </li>
      @if(Auth::check())
        <li class="nav-item">
          <a href="/profile" class="nav-link">My Profile</a>
        </li>
        <li class="nav-item">
          <a href="/invoices" class="nav-link">Invoices</a>
        </li>
        <li class="nav-item">
          <a href="/logout" class="nav-link">Logout</a>
        </li>
      @else
        <li class="nav-item">
          <a href="/login" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
          <a href="/signup" class="nav-link">Signup</a>
        </li>
      @endif
    </ul>
    @yield('main')
  </div>
</body>
</html>
