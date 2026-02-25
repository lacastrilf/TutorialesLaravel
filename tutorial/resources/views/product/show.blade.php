@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', "Product information")
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["product"]["name"] }}
                </h5>
                @if ($viewData["product"]["price"] > 80)
                <p class="card-text text-color">{{ $viewData["product"]["price"] }}€</p>
                @else
                <p class="card-text"> {{ $viewData["product"]["price"] }}€</p>
                @endif

                @foreach($viewData["product"]->comments as $comment)
                - {{ $comment->getDescription() }}<br />
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection