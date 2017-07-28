@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <div class="products-show-container">
    <h2>Muestra de producto</h2>

  {{-- {{  dd($img->src)}} --}}
    <img  src='{{ $img->src }}'>  
    <ul>
      <li> {{ $product->title}} </li>
      <li> {{ $product->description}} </li>
      <li> {{ $product->price}} </li>
      <li> {{ $product->available}} </li>
    </ul>

</div>

@endsection

@section('footer')

  @include('footer.footer')

@endsection
