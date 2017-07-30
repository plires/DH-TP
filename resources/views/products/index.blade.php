@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <div class="products-show-container">
    <h2>Muestra de producto por Usuario</h2>



    <ul>
      @foreach ($products as $product)


      <li> {{ $product->title}} </li>
      <li> {{ $product->description}} </li>
      <li> {{ $product->price}} </li>
      <li> {{ $product->available}} </li>
      <img src="{{ $product->images->src }}" alt="">
    @endforeach
    </ul>

</div>

@endsection

@section('footer')

  @include('footer.footer')

@endsection
