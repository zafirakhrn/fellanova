<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="{{ asset('css/dashboard.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  @section('head')
  @show

  <style>
    a {
      color: black;
      font-weight: 700;
    }

    #navbarSupportedContent a:hover {
      color: black;
    }
  </style>
</head>

<body>
  <nav style="background-color: #fefefe !important; padding: 0; justify-content: space-between;box-shadow: 0 0.25rem 0.25rem rgba(0, 0, 1, 0.025); margin-bottom:0 !important;" class="navbar navbar-expand-lg">
    <nav style="display: contents; padding: 0; justify-content: space-between; margin: 0;" class="navbar navbar-expand-lg">
      <div style="display: flex; flex-direction: row; margin-inline-end: auto;">
        <a style="padding: 0; margin: 0; margin-left: 80px;" class="navbar-brand" href="/">
          <img style=" width: 180px; height: 70px; margin: auto; display: flex; flex-direction: row;" src="https://media.discordapp.net/attachments/767049115808694343/963502725843263588/unknown.png">
        </a>

        <nav class="navbar navbar-expand-lg" style="font-family:Roboto;font-size: large;margin-top:5px;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
              <li class="nav-item">
                <a class="nav-link" href="/product/" style="margin-left:20px;">Produk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about/" style="margin-left:20px;">About</a>
              </li>
              @if(isset(Auth::user()->email))
              <li class="nav-item">
                <a class="nav-link" href="/myorder" style="margin-left:20px;">My Order</a>
              </li>
              @endif
              <li class="nav-item">
                <a class="nav-link" href="/" style="margin-left:20px;">Custom Order</a>
              </li>
   </li>
   </ul>
          </div>
        </nav>
      </div>

      <div style="width: fit-content; margin-right: 50px; background-color:#FFFFFF;  font-display: white;" class="button">
        @if(isset(Auth::user()->email))
        <strong style="margin-right:20px;">Welcome,<a href="/profile/"> {{Auth::user()->name}}</a></strong>

        <a href="/cart">
          <button style="margin-right: 20px; font-size:15px; background-color: green; border: none;" type="button" class="btn">
            <span style="color: white;" class="glyphicon glyphicon-shopping-cart"></span></button>
        </a>
        <a href="/logout/">
          <button style="background-color: #B81900; color:white;" id="loginBtn" type="button" class="btn btn-danger">Logout</button>
        </a>
        @else
        <a href="/logincs/">
          <button style="background-color: #EF9630; color:white;" id="loginBtn" type="button" class="btn">Login</button>
        </a>
        @endif
      </div>
    </nav>
  </nav>
  @section('body')
  <main class="py-4">
            @yield('content')
        </main>
  @show
  @section('jscript')
  @show
</body>

</html>