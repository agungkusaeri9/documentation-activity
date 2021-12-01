<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="{{ route('logout') }}" title="Logout" class="nav-link" title="Logout" onclick="event.preventDefault();
            document.getElementById('formLogout').submit();">
            <i class="fas fa-sign-out-alt"></i>
            </a>
          <form action="{{ route('logout') }}" method="post" id="formLogout">
            @csrf
          </form>
          </li>
    </ul>
</nav>