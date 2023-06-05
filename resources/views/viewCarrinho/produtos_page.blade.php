<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos</title>
  @vite(['resources/sass/app.scss','resources/js/app.js',])
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <x-navbar/>
  @if(session('CompraConcluida'))
              <div class="alert alert-success">
                {{session('CompraConcluida')}}
              </div>
  @endif
  <div class="d-flex justify-content-center container-fluid">
    @foreach ($produtos as $prod)
        <div class="card" style="width: 18rem; margin: 10px;">
          @foreach (App\Models\imagens_produtos::take(1)->where('id_produto', $prod->id)->get() as $img)
            <img class="card-img-top" src="{{url("storage/{$img->imagem}")}}" width="200" height="100" alt="Imagem Produto" >
          @endforeach
        <div class="card-body">
          <p class="card-text">{{$prod->nome}}</p>
          <p class="card-text">R$ {{number_format($prod->valor,2 ,',' ,  '.')}}</p>
          <form action="{{route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$prod->id}}" >
            <input type="hidden" name="nome" value="{{$prod->nome}}" >
            <input type="hidden" name="valor" value="{{$prod->valor}}" >
            <input type="hidden" name="imagem" value="{{$prod->imagem}}" >
            <input type="hidden" name="quantidade" value=1>
            <button class="btn btn-primary">Comprar</button>
          </form>
          <a href="/sobre-produto/{{$prod->id}}">Mais informações</a>
        </div>
      </div>
    @endforeach
    </div>
    <div  class="d-flex justify-content-center">
      {{$produtos->onEachSide(1)->links()}}
    </div>
</body>
</html>
