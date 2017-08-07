@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <div class="row">
    <div class="small-12 columns">

      <div class="small-12 columns margin_top_15 ">

         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">Todos los Productos</h2>

         <table class="responsive cien margin_top_15">
            <tbody>
               <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Precio</th>
                  <th>Imágen</th>
                  <th>Usuario</th>
               </tr>
               @foreach($products as $product)
                  @if(!isset($product->id))
                     <tr>
                        <td>Sin productos</td>
                        <td>- </td>
                        <td>- </td>
                        <td>- </td>
                        <td>- </td>
                     </tr>
                  @else
                     <tr data-id="{{ $product->id }}">
                        <td>{{ $product->id }}</td>
                        <td>
                          <a class="link_products_show" href="{{ url('admin/products', ['id'=> $product->id]) }}">
                            {{ $product->title }}
                          </a>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>
                          <a href="{{ url('admin/products', ['id'=> $product->id]) }}">
                            <img class="imagen_products_show" src="{{ $product->images->src }}" width="60px" height="60px" alt="{{ $product->title }}">
                          </a>
                        </td>
                        <td>
                          <a href="mailto:{{ $product->user->email }}"> {{ $product->user->email }}</a>
                        </td>
                     </tr>
                  @endif
               @endforeach
            </tbody>
         </table>
      </div>

   </div>
  </div>


  <div class="row">
    <div class="small-12 medium-4 medium-centered columns">
      {{ $products->links() }}
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-4 columns medium-centered margin_top_15 text_center">
       <a href="{{ url('admin/products/create') }}"><button class="small button"><i class="ion-plus-circled"></i> Agregar Producto</button></a>
    </div>
  </div>

@endsection

@section('footer')

  @include('footer.footer')

@endsection
