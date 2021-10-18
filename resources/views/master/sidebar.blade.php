<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
          class="logo-name">Surat</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menu</li>
      <li class="dropdown active">
        <a href="{{ url('/home') }}" class="nav-link {{Request::is('home') ? 'active': ''}}"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="briefcase"></i><span>Jenis Surat</span></a>
        <ul class="dropdown-menu">
          <li><a  href="{{ url('/ijinKerja') }}" class="nav-link {{Request::is('ijinKerja') ? 'active': ''}}">Ijin Kerja</a></li>
          <li><a  href="{{ url('/lamarKerja') }}" class="nav-link {{Request::is('lamarKerja') ? 'active': ''}}">Lamar Kerja</a></li>
        </ul>
      </li>
    </ul>
  </aside>
