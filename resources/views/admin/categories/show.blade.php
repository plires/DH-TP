@extends('layouts.app')

@section('header')

   @include('header.header')

@endsection

@section('content')
   <div class="row">
      <div class="small-12 columns">
         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">SHOW-Mostrar Categoria individual</h2>
      </div>
   </div>
   <div class="row">
      <div class="small-12 medium-10 medium-centered columns margin_top_15 text_center">
         <h3>Productos de la categoría: {{ $category->name }}</h3>
         <table class="responsive cien margin_top_15">
            <tbody>
               <tr>
                  <th>Productos</th>
                  <th>Precio</th>
               </tr>
               @foreach($products as $product)
                  @if(!isset($product->id))
                     <tr>
                        <td>Sin productos</td>
                        <td>-</td>
                     </tr>
                  @else
                     <tr data-id="{{ $product->id }}">
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                     </tr>
                  @endif
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
   <div class="row">
    <div class="small-12 medium-4 medium-centered columns text_center text_center">
      {{ $products->links() }}
    </div>
  </div>



@endsection

@section('footer')

   @include('footer.footer')

@endsection
