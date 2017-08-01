@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <div class="row">
    <div class="small-12 columns">

      <div class="small-12 medium-10 medium-centered columns margin_top_15 text_center">

         <h3>Todos los Productos</h3>
         <table class="responsive cien margin_top_15">
            <tbody>
               <tr>
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
                     </tr>
                  @else
                     <tr data-id="{{ $product->id }}">
                        <td>
                          <a class="link_products_show" href="{{ route('products.show', ['id'=> $product->id] )}}">
                            {{ $product->title }}
                          </a>
                          </td>
                        <td>{{ $product->price }}</td>
                        <td>
                          <a href="{{ route('products.show', ['id'=> $product->id] )}}">
                            <img class="imagen_products_show" src="{{ $product->images->src }}" width="60px" height="60px" alt="{{ $product->title }}">
                          </a>
                        </td>
                        <td>
                          <a href="#"> {{ $product->user->email }}</a>
                        </td>
                     </tr>
                  @endif
               @endforeach
            </tbody>
         </table>
      </div>

   </div>
  </div>





@endsection

@section('footer')

  @include('footer.footer')

@endsection
