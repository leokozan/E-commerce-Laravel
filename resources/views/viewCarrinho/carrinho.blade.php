<x-header titulo="Carrinho"/>
<body>
<x-navbar/>
<div class="container-fluid">
  @if(session('prodAdicionadoSucess'))
    <div class="alert alert-success">
      {{session('prodAdicionadoSucess')}}
    </div>
  @endif
  @if(session('prodRemovidoSucess'))
    <div class="alert alert-danger">
      {{session('prodRemovidoSucess')}}
    </div>
  @endif
  @if(session('prodAtualizadoSucess'))
    <div class="alert alert-success">
      {{session('prodAtualizadoSucess')}}
    </div>
  @endif
  @if(session('limpoSucess'))
    <div class="alert alert-success">
      {{session('limpoSucess')}}
    </div>
  @endif
  <h5 class="h5">Seu carrinho possui {{$itens->count()}} produtos</h5>
  @if(Cart::isEmpty() )
    <div class="alert alert-success">
      <p>Seu carrinho está vazio</p>
    </div>
  @else
    <table class="table table-striped">
          <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($itens as $item)
            <tr>
              @foreach (App\Models\imagens_produtos::take(1)->where('id_produto', $item->id)->get() as $img)
               <td><img src="{{url("storage/{$img->imagem}")}}" width="100" height="100" alt="Imagem Produto" ></td>
              @endforeach
              <td>{{$item->name}}</td>
              <td>{{number_format($item->price,2 ,',' ,  '.')}}</td>
              <form action="{{route('site.atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <td><input type="number" min=1 name="quantity" value="{{$item->quantity}}"></td>
                <td>
                    <button type="submit" class="btn btn-primary"><i class="material-icons">refresh</i></button>
                  </form>
                <!-- Remover Carrinho -->
                  <form action="{{route('site.removercarrinho')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button type="submit"  class="btn btn-danger"><i class="material-icons">delete</i></button>  
                  </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <h5>Valor total do carrinho: R$ {{number_format(\Cart::getTotal(),2 ,',' ,  '.')}}  </h5>
      @endif
    <div class="btn-group" role="group" aria-label="Basic example">
      <a href="{{route('viewProdutos')}}"class="btn btn-primary"></i>Continuar comprando</a>
      <a href="{{route('site.limparcarrinho')}}" class="btn btn-danger" >Limpar carrinho</a>
      <a href="{{route('pagamentoView')}}" class="btn btn-primary">Finalizar pedido</a>
  </div>
  </div>
</body>
</html>