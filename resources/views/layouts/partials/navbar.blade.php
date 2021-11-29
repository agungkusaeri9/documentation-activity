<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <img src="{{ asset('assets/dist/img/avatar5.png') }}" alt="" class="img-fluid rounded-circle" style="max-height:30px">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="{{ route('logout') }}" title="Logout" class="nav-link dropdown-item" onclick="event.preventDefault();
                document.getElementById('formLogout').submit();">
                Logout
              </a>
              <form action="{{ route('logout') }}" method="post" id="formLogout">
                @csrf
              </form>
            </div>
          </li>
    </ul>
</nav>