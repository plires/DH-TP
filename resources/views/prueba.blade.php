@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-6 medium-centered columns margin_top_15">
            <div class="panel">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Estas logueado!
                </div>
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
            <h1>FAVORITOS del Usuario {{ Auth::user()->id }}</h1>
                @foreach($favorites as $favorite)
                    <p>Favoritos <br>{{ $favorite->price }}</p><br>
                    <hr>
                @endforeach
            </div>    
        </div>

        <div class="row">
            <div class="small-12 columns">
            <h1>PRODUCTOS</h1>
                @foreach($products as $product)
                    <p>titulo <br>{{ $product->title }}</p><br>
                    <p>precio <br>{{ $product->price }}</p><br>
                    <p>Stocks <br>{{ $product->available }}</p><br>
                    <p>CAtegor <br>{{ $product->category->name }}</p><br>
                    <p>USUARIO <br>{{ $product->user->name }}</p><br>
                    <img src="{{ $product->images->src }}" alt="">
                    <hr>
                @endforeach
            </div>    
        </div>

        <div class="row">
            <div class="small-12 columns">
            <h1>USUARIOS</h1>
                @foreach($users as $user)
                    <p>nombre <br>{{ $user->name }}</p><br>
                    <p>apellido <br>{{ $user->surname }}</p><br>
                    <p>Tipo de dto <br>{{ $user->documentType->name }}</p><br>
                    <hr>
                @endforeach
            </div>    
        </div>

        <div class="row">
            <div class="small-12 columns">
            <h1>IMAGEN</h1>
                {{ $image }}
            </div>    
        </div>

    </div>
@endsection

@section('footer')

    @include('footer.footer')

@endsection
