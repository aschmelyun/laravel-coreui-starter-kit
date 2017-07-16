<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Activity</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item">Someone cool commented on your item</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="d-md-down-none">{{ $user->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Notification Settings</a>
                <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> My Settings</a>
                <a class="dropdown-item" href="{{ route('auth.signout') }}"><i class="fa fa-lock"></i> Sign Out</a>
            </div>
        </li>
        <li class="nav-item d-md-down-none">

        </li>

    </ul>
</header>