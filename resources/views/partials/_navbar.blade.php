<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">2 Do List</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="{{ url('/') }}">Accueil <span class="sr-only">(current)</span></a></li>
        <li class="{{ Request::is('posts') ? "active" : "" }}"><a href="{{ url('/posts') }}">Tâches</a></li>
        <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="{{ url('/blog') }}">Blog</a></li>
        <li class="{{ Request::is('about') ? "active" : "" }}"><a href="{{ url('/about') }}">A Propos</a></li>
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ url('/contact') }}">Contact</a></li>
      </ul>


      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
              <li><a href="{{ url('/login') }}">S'identifier</a></li>
              <li><a href="{{ url('/register') }}">S'enregistrer</a></li>
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ route('posts.create') }}">Ajouter une tâche</a></li>
                      <li><a href="{{ route('categories.index') }}">Liste des catégories</a></li>
                      <li><a href="{{ route('tags.index') }}">Liste des tags</a></li>
                      <li role="separator" class="divider"></li>
                      <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Se déconnecter
                          </a>

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endif
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>