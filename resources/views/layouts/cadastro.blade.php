<!DOCTYPE html>
<html lang="en">
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <style>
      .Alinhamento {
        text-align: center;
      }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('index.css') }}">
    @vite(['resources/sass/app.scss','resources/js/app.js',])
  </head>
  <body class="Alinhamento">
    @yield('content')
  </body>
</html>
