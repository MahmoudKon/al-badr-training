<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard.index') }}">
                <img src="{{ asset('assets/img/logo/logo-white.svg') }}" width="110" height="32" alt="Tabler"
                    class="navbar-brand-image">
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="nav-link-title">الرئيسية</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"> <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="nav-link-title">واجهه المستخدم</span>
                    </a>
                    <div class="dropdown-menu px-3">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                {{-- shops --}}
                                <a class="dropdown-item" href="{{ route('dashboard.shops.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i class="fa-solid fa-shop"></i> </span>
                                    <span class="nav-link-title">قائمة المتاجر</span>
                                </a>
                                {{-- users --}}
                                <a class="dropdown-item" href="{{ route('dashboard.users.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i class="fa-solid fa-users"></i> </span>
                                    <span class="nav-link-title">قائمة المستخدمين</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
