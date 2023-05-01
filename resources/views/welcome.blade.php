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

    <nav class="breadcrumb-divider py-3" aria-label="breadcrumb" >
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Acceuil</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 mb-3">
                    @foreach ($patronymes as $patronyme)
                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">{{ $patronyme->designation }}</h2>
                            <p class="blog-post-meta">Ethnie : {{ $patronyme->ethnie }} ,Origine : {{ $patronyme->origin }}</p>
                    
                            @include('include.histoire_patronyme')
                        </article>
                    @endforeach
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
