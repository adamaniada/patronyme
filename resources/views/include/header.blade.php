<header class="py-3">
    <div class="container-fluid d-flex flex-wrap justify-content-center">
        <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <span class="fs-4 fw-bolder">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 d-flex" role="search" method="POST" action="{{ route('recherche') }}">
            {{ csrf_field() }}
            <input type="search" class="form-control me-2" placeholder="Recherche..." aria-label="Search" name="q">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </form>
    </div>
</header>