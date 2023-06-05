<!DOCTYPE html>
<html lang="en">
<head>
  <x-header/>
  <title>@yield('title')</title>
</head>
<body>
  <x-navbar/>
  <h1>Lista de Vendas</h1>
  <br><br>
  <table id="myTable" class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Localização</th>
        <th>Total</th>
        <th>Status da Compra</th>
        <th>Mais detalhes</th>
      </tr>
    </thead>
    <tbody>
      @foreach(App\Models\Compra::get() as $compra)
        <tr>
          <td>{{$compra->id}}</td>
          <td>{{$compra->compr_user->name}}</td>
          <td>{{$compra->compr_user->endereco}}</td>
          <td>R${{number_format($compra->total,2 ,',' ,  '.')}}</td>
          <td>
            <form action="/editar-status/{{$compra->id}}" method="POST" class="d-flex">
              @csrf
              @method("PUT")
              <select name='id_status' class="form-select" aria-label="Default select example">
                  @foreach (App\Models\Status::get() as $status)
                      @if($status->id==$compra->status->id)
                          <option value="{{$status->id}}" selected>{{$status->status}}</option>
                      @else
                          <option value="{{$status->id}}">{{$status->status}}</option>
                      @endif
                  @endforeach
              </select>
              <button class="btn btn-secondary" type="submit" style="margin-left:5px;">Atualizar</button>
          </form>
          </td>
          <td><a href="/details_venda/{{$compra->id}}" class="btn btn-primary">Mais detalhes</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
