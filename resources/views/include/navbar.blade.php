<nav class="navbar  navbar-expand-lg bg-light b-s-2" aria-label="Light offcanvas navbar">
    <div class="container-fluid">
        <a class="navbar-brand fs-4 fw-bolder" href="{{ url('/') }}">
            <img class="rounded-circle" width="40px" height="40px" src="{{ asset('logo/logo_pmub.jpg') }}" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">Menus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @guest
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('acceuil') }}">ACCEUIL</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home') }}">PAGE PRINCIPALE</a></li>
                    @endguest
                    <li class="nav-item"><a class="nav-link" href="{{ route('patronyme') }}">PATRONYME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('form-contact') }}">CONTACTS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">A PROPOS</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @guest
                                {{ __('CONNEXION') }}
                            @else
                                {{ Auth::user()->name }}
                            @endguest
                        </a>
                        <ul class="dropdown-menu">
                            @guest
                                <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Se connectez') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">{{ __("S'inscrire") }}</a></li>
                            @else
                                <li><a class="dropdown-item" href="#">Mon profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout.perForm') }}">Deconnexion</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
