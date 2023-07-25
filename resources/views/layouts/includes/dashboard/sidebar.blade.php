<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="/dashboard">
                <img src="{{ asset('assets/img/logo/logo-white.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ checkRoute('index', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-house"></i> </span>
                        <span class="nav-link-title"> Home </span>
                    </a>
                </li>

                <li class="nav-item {{ checkRoute('users.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('users.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-users"></i> </span>
                        <span class="nav-link-title"> Users </span>
                    </a>
                </li>

                <li class="nav-item {{ checkRoute('units.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('units.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-users"></i> </span>
                        <span class="nav-link-title"> Units </span>
                    </a>
                </li>

                <li class="nav-item {{ checkRoute('categories.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('categories.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-list"></i> </span>
                        <span class="nav-link-title"> Categories </span>
                    </a>
                </li>

                <li class="nav-item {{ checkRoute('roles.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('roles.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-list"></i> </span>
                        <span class="nav-link-title"> Role-permissions </span>
                    </a>
                </li>

                <li class="nav-item {{ checkRoute('stores.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('stores.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-list"></i> </span>
                        <span class="nav-link-title"> Stores </span>
                    </a>
                </li>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-user"></i> </span>
                        <span class="nav-link-title"> Interface </span>
                    </a>

                    <div class="dropdown-menu px-3">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="./empty.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-user"></i> </span>
                                    <span class="nav-link-title"> Interface </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
