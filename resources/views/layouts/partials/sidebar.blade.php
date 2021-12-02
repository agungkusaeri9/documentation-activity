<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ACTIVE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link @if(Route::currentRouteName() === 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link @if(Route::currentRouteName() === 'contents.index' || Route::currentRouteName() === 'contents.create' || Route::currentRouteName() === 'contents.edit' ||Route::currentRouteName() === 'photo-galleries.index' || Route::currentRouteName() === 'video-galleries.index') active @endif">
              <i class="nav-icon fas fa-folder"></i>
              <p>
               Konten
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contents.index') }}" class="nav-link @if(Route::currentRouteName() === 'contents.index') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Konten</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('photo-galleries.index') }}" class="nav-link @if(Route::currentRouteName() === 'photo-galleries.index') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri Foto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('video-galleries.index') }}" class="nav-link @if(Route::currentRouteName() === 'video-galleries.index') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri Video</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link @if(Route::currentRouteName() === 'contacts.index' || Route::currentRouteName() === 'contacts.create' || Route::currentRouteName() === 'contacts.edit') active @endif">
              <i class="nav-icon fas fa-folder"></i>
              <p>
               Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contacts.index') }}" class="nav-link @if(Route::currentRouteName() === 'contacts.index') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontak</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link @if(Route::currentRouteName() === 'users.index') active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>