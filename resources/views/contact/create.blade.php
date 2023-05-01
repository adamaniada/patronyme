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
            <li class="breadcrumb-item active"><a href="{{ route('welcome') }}">Acceuil</a></li>
            <li class="breadcrumb-item">Contact</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <article class="blog-post">
                        <h2 class="blog-post-title mb-1">Formulaire de Contact</h2>
                        <form method="POST" action="{{ route('store-contact-data') }}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nom">Nom complet</label>
                                        <input type="text" name="nom" id="nom" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tel">Numero de telephone</label>
                                        <input type="tel" name="tel" id="tel" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Address Mail</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="sujet">Sujet du Message</label>
                                        <input type="text" name="sujet" id="sujet" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" required></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-success">NOUS CONTATCTEZ</button>
                                    </div>
                                </div>
                        </form>
                    </article>
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
