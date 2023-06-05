@extends('layouts.RegistroLogin')
@section('title','Login')
@section('content')
        @if(session('danger'))
          <div class="alert alert-danger">
            {{session('danger')}}
          </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
        @endif
        @if(session('invalido'))
            <div class="alert alert-danger">
              {{session('invalido')}}
            </div>
        @endif
          <form method="POST" class="p-4 p-md-5 border rounded-3 bg-light" action="{{route('auth.user')}}">
            @csrf
            <h3>Login</h3>
            <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Email">
              <label for="exampleInputEmail">Email de Acesso</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control"id="exampleInputPassword" placeholder="Senha">
              <label for="exampleInputPassword">Senha</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Entrar</button>
            <br>
            <a href="/cadastro_usuario">Fazer uma conta!</a>
          </form>
        </div>
      </div>
    </div>
@endsection