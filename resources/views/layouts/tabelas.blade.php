  <!DOCTYPE html>
  <html lang="en">
  <head>
    <x-header/>
    <title>@yield('title')</title>
  </head>
</head>
<body>
  <x-navbar/>
  @yield('content')
  <x-tabelas.botoesTabela/>
  <x-tabelas.scriptsTabela/>
</body>
</html>