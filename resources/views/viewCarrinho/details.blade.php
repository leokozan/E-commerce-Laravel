<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mais informações</title>
  @vite(['resources/sass/app.scss','resources/js/app.js',])
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <x-navbar/>
  <div class="card justify-content-center container-fluid" style="max-width: 800px;padding: 30px;">
    <div class="row g-0">
      <div class="col-md-4">
      @php 
        use App\Models\imagens_produtos;
        $produtos = imagens_produtos::where('id_produto', $prod->id)->get();
      @endphp
        <img src="{{url("storage/".$produtos[0]->imagem)}}" width="200" height="200" alt="" class="card-img-top thumb">
        <div class="row">
          <div class="col-4">
            <img src="{{url("storage/".$produtos[0]->imagem)}}"width="100" height="100" alt="" class="img-small">
          </div>
          <div class="col-4">
            <img src="{{url("storage/".$produtos[1]->imagem)}}"width="100" height="100" alt="" class="img-small">
          </div>
          <div class="col-4">
            <img src="{{url("storage/".$produtos[2]->imagem)}}"width="100" height="100" alt="" class="img-small">
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title">{{$prod->nome}}</h3>
          <p class="card-text">Descrição: {{$prod->descricao}}</p>
          <p class="card-text">R$ {{number_format($prod->valor,2 ,',' ,  '.')}}</p>
          <form action="{{route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$prod->id}}" >
              <input type="hidden" name="nome" value="{{$prod->nome}}" >
              <input type="hidden" name="valor" value="{{$prod->valor}}" >
              <input type="hidden" name="imagem" value="{{$prod->imagem}}" >
              <input type="number" name="quantidade" value=1>
              <button class="btn btn-primary">Comprar</button>
          </form>
        </div>
      </div>
  </div>
</div>
</body>
  <script>
    let thumb = document.querySelector('img.thumb');
    let imgSmall = document.querySelectorAll('img.img-small');

    imgSmall.forEach(function(el) { 
      el.addEventListener('click', function() {
        let srcImgSmall = el.src;
        thumb.src = srcImgSmall;
      });
    });
  </script>
