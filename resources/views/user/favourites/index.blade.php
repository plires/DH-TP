@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <div class="row">
    <div class="small-12 columns">

      <div class="small-12 medium-10 medium-centered columns margin_top_15 text_center">

         <h3>Productos Favoritos de: {{ $user->name .' '. $user->surname }}</h3>

         <table class="responsive cien margin_top_15">
            <tbody>
               <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Precio</th>
                  <th>Categoria</th>
                  <th>Imágen</th>
               </tr>
               @foreach($products as $product)
                  @if(!isset($product->id))
                     <tr>
                        <td>Sin productos</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                     </tr>
                  @else
                     <tr data-id="{{ $product->id }}">
                        <td>{{ $product->id }}</td>
                        <td>
                          <a class="hover_principal link_products_show" href="{{ route('products.show', ['id'=> $product->id] )}}">
                            {{ $product->title }}
                          </a>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>
                          <a class="hover_principal" href="{{ route('categories.show', ['id'=> $product->category->id] )}}">
                            {{ $product->category->name }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('products.show', ['id'=> $product->id] )}}">
                            <img class="imagen_products_show" src="{{ $product->images->src }}" width="60px" height="60px" alt="{{ $product->title }}">
                          </a>
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
