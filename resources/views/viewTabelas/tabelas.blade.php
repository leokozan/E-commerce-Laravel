@extends('layouts.tabelas')

@section('title','Tabela de usuários')

@section('content')
  @if(session('editarCompradorSucesso'))
        <div class="alert alert-success">
          {{session('editarCompradorSucesso')}}
        </div>
  @endif

  @if(session('excluirCompradorSucesso'))
        <div class="alert alert-success">
          {{session('excluirCompradorSucesso')}}
        </div>
  @endif
  <h1>Lista de Usuarios</h1>
  <br><br>
  <table id="myTable" class="table table-striped">
    <thead>
      <tr>
        <th>IDE</th>
        <th>Nome</th>
        <th>Data Nascimento</th>
        <th>Endereço</th>
        <th>CPF</th>
        <th>Admin</th>
        <th>Client</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach(App\Models\User::get() as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->data_nascimento}}</td>
          <td>{{$user->endereco}}</td>
          <td>{{$user->cpf}}</td>
          <td>{{$user->admin}}</td>
          <td>{{$user->client}}</td>
          <td><a href="/editar-user/{{$user->id}}" class="btn btn-primary">Editar</a></td>
          <td><a href="/excluir-user/{{$user->id}}" class="btn btn-danger">Excluir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection