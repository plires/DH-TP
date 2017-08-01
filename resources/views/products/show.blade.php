@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <!--Encabezados start-->
  <div class="row">
    <div class="small-12 columns">
      <h1 class="back margin_top_15 text_center"> {{ $product->title }} </h1>
      <h2 class="back">Detalle del producto</h2>
    </div>
  </div>
  <!--Encabezados end-->

  <hr>

  <!--Detalle producto start-->
  <div class="row">
    <div class="small-12 medium-6 columns">
      <h3 class="h3_product_show">Imágen</h3>
      <img  src='{{ $product->images->src }}'>
    </div>
    <div class="small-12 medium-6 columns">
      <h3 class="h3_product_show">Titulo</h3>
      <p>{{ $product->title }}</p>
      <h3 class="h3_product_show">Categoría</h3>
      <p>{{ $product->category->name }}</p>
      <h3 class="h3_product_show">Dueño del producto</h3>
      <p>{{ $product->user->name .' '. $product->user->surname }}</p>
      <h3 class="h3_product_show">Existencias</h3>
      <p>{{ $product->available }}</p>
      <h3 class="h3_product_show">Precio</h3>
      <p>{{ $product->price }}</p>
    </div>
  </div>

  <div class="row margin_top_30">
    <div class="small-12 columns">
      <h3 class="h3_product_show">Descipción</h3>
      <p>{{ $product->description }}</p>
    </div>
  </div>
  <!--Detalle producto end-->

  <hr>

  <!--Acciones start-->
  <div class="row margin_bottom_30 margin_top_30">
    <div class="small-12 columns">
      <form action="{{ route('products.destroy', ['id'=> $product->id] )}}" method='POST'>
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="boton_cat boton_eliminar">
          Eliminar
        </button>
      </form>

        <button type="submit" class="boton_editar">
          <a href="{{ route('products.edit', ['products'=> $product->id] )}}">Editar</a>
        </button>

    </div>
  </div>
  <!--Acciones end-->

@endsection

@section('footer')

  @include('footer.footer')

@endsection
