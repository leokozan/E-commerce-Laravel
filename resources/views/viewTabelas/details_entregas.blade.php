<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mais informações sobre a entrega</title>
  @vite(['resources/sass/app.scss','resources/js/app.js',])
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <x-navbar/>
  <p>Nome do cliente: {{$compra->compr_user->name}}</p>
  <p>Endereço: {{$compra->compr_user->endereco}}</p>
  <p>Total da compra: R${{number_format($compra->total,2 ,',' ,  '.')}}</p>
  <p>Status do pedido: {{$compra->status->status}}</p>
  @foreach($compra->produtos()->wherePivot('compra_id', $compra->id)->get() as $compras)
      <p>Nome do produto: {{$compras->nome}}</p>
      <p>Quantidade pedida: {{$compras->pivot->quantidade}}</p>
  @endforeach
</body>
