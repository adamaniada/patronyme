@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-12 mb-1">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <nav aria-label="breadcrumb" class="py-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Acceuil</a></li>
            <li class="breadcrumb-item active">Patronyme</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div></div>
                        @auth
                            <div class="d-flex">
                                <div class="dropdown me-2">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Trier par
                                    </button>
                                    <ul class="dropdown-menu">
                                        {{-- <li><h6 class="dropdown-header">Dropdown header</h6></li> --}}
                                        <li>
                                            <form action="{{ route('patronyme') }}" method="GET">
                                                <input type="hidden" name="trier" value="{{ __('date_de_creation_recentes') }}">
                                                <button type="submit" class="dropdown-item">Date de creation recentes</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('patronyme') }}" method="GET">
                                                <input type="hidden" name="trier" value="{{ __('date_de_creation_moins_recentes') }}">
                                                <button type="submit" class="dropdown-item">Date de creation moins recentes</button>
                                            </form>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('patronyme') }}" method="GET">
                                                <input type="hidden" name="trier" value="{{ __('Nom_de_famille_A-Z') }}">
                                                <button type="submit" class="dropdown-item">Nom de famille A-Z</button>
                                            </form>
                                        <li>
                                            <form action="{{ route('patronyme') }}" method="GET">
                                                <input type="hidden" name="trier" value="{{ __('Nom_de_famille_Z-A') }}">
                                                <button type="submit" class="dropdown-item">Nom de famille (Z-A)</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <a href="{{ route('form-create-patronyme') }}" class="btn btn-sm btn-primary">Nouveau</a>
                            </div>
                        @endauth
                    </div>
                    @foreach ($patronymes as $patronyme)
                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">
                                {{ $patronyme->designation }}
                                @auth
                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('form-edit-patronyme-data', $patronyme->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                    </a>
                                    <a class="btn btn-sm btn-outline-danger" href="{{ route('destroy-patronyme-data', $patronyme->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </a>
                                @endauth
                            </h2>
                            <p class="blog-post-meta">Ethnie : {{ $patronyme->ethnie }} ,Origine : {{ $patronyme->origin }}</p>
                    
                            @include('include.histoire_patronyme')
                            @include('include.published_at')
                        </article>
                    @endforeach

                    <div class="mb-3">{{ $patronymes->links() }}</div>

                </div>

                <div class="col-md-4 mb-3">
                    @include('include.aside.about')
                    @include('include.aside.archive')
                    @include('include.aside.ailleurs')
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
