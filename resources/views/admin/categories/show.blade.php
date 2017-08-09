@extends('layouts.app')

@section('header')

   @include('header.header')

@endsection

@section('content')
   <div class="row">
      <div class="small-12 columns">
         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">Productos de la categoría: {{ $category->name }}</h2>
      </div>
   </div>
   <div class="row">
      <div class="small-12 medium-10 medium-centered columns margin_top_15 text_center">
         <table class="responsive cien margin_top_15">
            <tbody>
               <tr>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Categoria</th>
                  <th class="text_right">Acciones</th>
               </tr>
               @foreach($products as $product)
                  @if(!isset($product->id))
                     <tr>
                        <td>Sin productos</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                     </tr>
                  @else
                     <tr data-id="{{ $product->id }}">
                        <td><a class="hover_principal" href="{{ url('admin/products', ['product'=> $product->id]) }}">{{ $product->title }}</a></td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                           <button class="boton_editar"><a href="{{ url('admin/products/'. $product->id .'/edit') }}">Editar</a></button>
                           <button class="boton_editar"><a href="{{ url('admin/products', ['product'=> $product->id]) }}">Ver</a></button>
                        </td>
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

   <div class="row">
      <div class="small-12 medium-4 columns medium-centered margin_top_15 text_center">
         <a href="{{ route('categories.index') }}"><button class="small button">
            <i class="ion-arrow-left-a"></i> Volver</button>
         </a>
      </div>
   </div>



@endsection

@section('footer')

   @include('footer.footer')

@endsection
