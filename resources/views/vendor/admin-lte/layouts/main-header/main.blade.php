<header class="main-header">
<link rel="icon" href="https://is4-ssl.mzstatic.com/image/thumb/Purple115/v4/94/72/c1/9472c132-dc35-fbfd-68db-a5df41dba275/source/60x60bb.jpg">
  <!-- Logo -->
  <a href="/" class="logo">
    @section('logo-mini')
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>@yield('short-title', substr(config('app.name', 'AdminLTE'), 0, 3))</b></span>
    @show
    @section('logo-lg')
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>@yield('title', config('app.name', 'AdminLTE'))</b></span>
    @show
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        @if (auth()->check())
        @include('admin-lte::layouts.main-header.navbar-right-menu.user-menu')
        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        @else
        <li>
          <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a>
        </li>
        @endif
        <!-- Control Sidebar Toggle Button -->
       
      </ul>
    </div>
  </nav>
</header>
