<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ routeHelper('index') }}">
                <img src="{{ asset('assets/img/logo/logo-white.svg') }}" width="110" height="32" alt="Tabler"
                    class="navbar-brand-image">
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ URL::current() === route(env('ROUTE_PREFIX') . '.index') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ routeHelper('index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="nav-link-title"> الرئيسية </span>
                    </a>
                </li>
                <li class="nav-item {{ checkRoute('users.*', 'active') }}">

                    <a class="nav-link" href="{{ routeHelper('users.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="nav-link-title"> المستخدمين </span>
                    </a>
                </li>
                <li class="nav-item {{ checkRoute('clients.*', 'active') }}">

                    <a class="nav-link" href="{{ routeHelper('clients.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-users-between-lines"></i>
                        </span>
                        <span class="nav-link-title"> العملاء </span>
                    </a>
                </li>
                <li class="nav-item {{ checkRoute('shop.index', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('shop.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-shop"></i>
                        </span>
                        <span class="nav-link-title"> المتجر </span>
                    </a>
                </li>
                <li class="nav-item {{ checkRoute('categories.*', 'active') }}">
                    <a class="nav-link" href="{{ routeHelper('categories.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-list"></i>
                        </span>
                        <span class="nav-link-title"> الاقسام </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
