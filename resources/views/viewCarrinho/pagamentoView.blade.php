<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/sass/app.scss','resources/js/app.js',])
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Login</title>
</head>
<body>
  <x-navbar/>
  <section>
    <div class="container mt-4">
      <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-5">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
          @endif
          <form method="POST" class="p-4 p-md-5 border rounded-3 bg-light" action="{{route('efetuar.pagamento')}}">
            @csrf
            <h3>Pagamento</h3>
            <div class="form-floating mb-3">
              <label for="">Numero do cartão</label>
              <input type="text" name="cartao" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Efetuar Compra</button>
            <br>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>