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
                    <article class="blog-post">
                        <h2 class="blog-post-title mb-1">Formulaire de publication de patronyme</h2>
                        <form enctype="multipart/form-data" method="POST" action="{{ route('store-patronyme-data') }}">
                            @csrf
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="designation">Designation du patronyme</label>
                                        <input id="designation" type="text" class="form-control" name="designation" required>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="ethnie">Ethnie du patronyme</label>
                                        <input id="ethnie" type="text" class="form-control" name="ethnie" required>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="origin">Origine du patronyme</label>
                                        <input id="origin" type="text" class="form-control" name="origin" required>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label for="origin">Origine du patronyme</label>
                                        <textarea name="histoire" id="histoire" class="form-control" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="col-sm-12 text-end mb-3">
                                        <button type="submit" class="btn btn-sm btn-success">Publier</button>
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
