@extends('layouts.RegistroLogin')
@section('title','Registro Admin')
@section('content')
          @if(session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
          @endif
            <form method="POST" class="p-4 p-md-5 border rounded-3 bg-light" action="{{route('register.admin')}}" enctype="multipart/form-data">
              <h3>Cadastro de Admin</h3>
              @csrf
              <div class="form-floating mb-2">
                <input type="text" name="name" class="form-control" id="exampleInputUser" placeholder="Usuario">
                <label for="exampleInputUser">Usuario</label>
              </div>
              <div class="form-floating mb-2">
                <input type="email" name="email" class="form-control" id="exampleInputPassword" placeholder="Email">
                <label for="exampleInputEmail">Email</label>
              </div>
              <div class="form-floating mb-2">
                <label for="exampleInputPassword">Password</label>
                <input type="password" name="password" class="form-control"id="exampleInputPassword">
              </div>
              <div class="form-floating mb-2">
                <label for="exampleInputDate"></label>
                <input type="date" name="data_nascimento" class="form-control"id="exampleInputPassword">
              </div>
              <div class="form-floating mb-2">
                <label for="exampleInputEndereco">Endereço</label>
                <input type="text" name="endereco" class="form-control"id="exampleInputPassword">
              </div>
              <div class="form-floating mb-2">
                <label for="exampleInputCpf">CPF</label>
                <input type="text" name="cpf" class="form-control"id="exampleInputPassword">
              </div>
              <div class="form-floating mb-2">
                  <input class="form-control" type="file" name="imagem_user">
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Cadastrar-se</button>
              <br>
            </form>
          </div>
        </div>
      </div>
@endsection()