<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: black;">
      <div class="container-fluid">
        <a class="navbar-brand"style="color: white;">Loja de itens</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/produtos_page" style="color: white;">Produtos</a>
            </li>
            @auth
              @if(auth()->user()->admin)
                <li class="nav-item">
                  <a class="nav-link"style="color: white;" href="{{route('authTabelas')}}">Tabelas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"style="color: white;" href="{{route('viewVendas')}}">Vendas</a>
                </li>
                <li>
                  <a class="nav-link"style="color: white;" href="{{route('view.registarAdmin')}}">Registar Admin</a>
                </li>
              @endif
            @endauth
          </div>
          </ul>
          <ul class="navbar-nav">
          <div class="collapse navbar-collapse justify-content-end">
              <li class="nav-item active">
                <a class="nav-link" style="color: white;" href="/carrinho"><i class="material-icons">shopping_cart</i></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::check() && Auth::user()->imagem_user)
                    <img src="{{ url("storage/" . auth()->user()->imagem_user) }}" alt="Imagem Usuário" width="50" height="50" class="rounded float-start">
                  @else
                    <img src="{{ url("storage/fotos_user/default4.png") }}" alt="Imagem Usuário" width="50" height="50" class="rounded float-start">
                  @endif
                </a>
                <ul class="dropdown-menu">
                  @if(Auth::check())
                    <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                    @else
                    <li><a class="dropdown-item" href="{{ route('viewLogin') }}">Login</a></li>
                  @endif
              </ul>
            </li>
        </div>
        </ul>
      </div>
    </nav>