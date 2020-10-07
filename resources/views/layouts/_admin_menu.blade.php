<ul class="nav navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Páginas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('admin/sobre') }}">Quem Somos</a><br>
          <a class="dropdown-item" href="{{ url('admin/servicos') }}">Serviços</a><br>
          <a class="dropdown-item" href="{{ url('admin/destaques') }}">Destaques</a><br>
        </div>
    </li>
    <li><a href="{{ url('admin/posts') }}">Notícias</a></li>
    <li><a href="{{ url('admin/categories') }}">Categorias</a></li>
    <li><a href="{{ url('admin/comments') }}">Comentários</a></li>
    <li><a href="{{ url('admin/tags') }}">Tags</a></li>
 
    @if (Auth::user()->is_admin)
        <li><a href="{{ url('admin/users') }}">Usuários</a></li>
    @endif
</ul>
