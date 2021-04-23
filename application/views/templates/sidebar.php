<body>
<div id="app">
<div class="main-wrapper">
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    </form>
    <ul class="navbar-nav navbar-right">
    
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="<?= base_url() ?>assets/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, Admin</div></a>
        <div class="dropdown-menu dropdown-menu-right">
        <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
        </a>
        <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        </div>
    </li>
    </ul>
</nav>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">SIMOGA</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SMG</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="blank.html"><i class="far fa-clock"></i> <span>Dashboard</span></a></li>
        <li><a class="nav-link" href="blank.html"><i class="far fa-file"></i> <span>Dashboard 2</span></a></li>
    </ul>
    </aside>
</div>
