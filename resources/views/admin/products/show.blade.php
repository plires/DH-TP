@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <!--Encabezados start-->
  <div class="row">
    <div class="small-12 columns">
      <h1 class="back margin_top_15 text_center">Backend Admin</h1>
      <h2 class="back">Detalle del Producto</h2>
    </div>
  </div>
  <!--Encabezados end-->

  <hr>

  <!--borrado con exito start-->
  <div class="exito row">
    <div class="small-12 columns">
      El producto fue borrado con exito
    </div>
  </div>

  <!--borrado con exito end-->

  <!--Detalle producto start-->
  <div class="producto row">
    <div class="small-12 medium-6 columns">
      <h3 class="h3_product_show">Imágen</h3>
      <img  src='{{ $product->images->src }}'>
    </div>
    <div class="small-12 medium-6 columns">
      <h3 class="h3_product_show">Titulo</h3>
      <p class="p_post_h3">{{ $product->title }}</p>
      <h3 class="h3_product_show">Categoría</h3>
      <p class="p_post_h3">{{ $product->category->name }}</p>
      <h3 class="h3_product_show">Dueño del producto</h3>
      <p class="p_post_h3">{{ $product->user->name .' '. $product->user->surname }}</p>
      <h3 class="h3_product_show">Existencias</h3>
      <p class="p_post_h3">{{ $product->available }}</p>
      <h3 class="h3_product_show">Precio</h3>
      <p class="p_post_h3">{{ $product->price }}</p>
    </div>
  </div>

  <div class="producto row margin_top_30">
    <div class="small-12 columns">
      <h3 class="h3_product_show">Descipción</h3>
      <p class="p_post_h3">{{ $product->description }}</p>
    </div>
  </div>
  <!--Detalle producto end-->

  <hr>

  <!--Acciones start-->
  <div class="producto row margin_bottom_30 margin_top_30">
    <div class="small-12 columns">
      <form id="form-delete" action="{{ url('admin/products/'. $product->id) }}" method='POST'>
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="boton_cat boton_eliminar">
          Eliminar
        </button>
      </form>

        <button type="submit" class="boton_editar">
          <a href="{{ url('admin/products/'. $product->id .'/edit') }}">Editar</a>
        </button>

    </div>
  </div>
  <!--Acciones end-->

  <!--Volver Start-->
  <div class="row">
    <div class="small-12 medium-4 columns medium-centered margin_top_15 text_center">
      <a href="{{ url('admin/products') }}"><button class="small button">
        <i class="ion-arrow-left-a"></i> Volver</button>
      </a>
    </div>
  </div>
  <!--Volver end-->

@endsection

@section('footer')

  @include('footer.footer')

@endsection

@section('scripts')

<script>
   $(document).ready(function(){
      var producto = $('.producto');
      var exito = $('.exito');

      exito.fadeOut();



      $('.boton_cat').click(function(e){

         e.preventDefault();

         //var row = $(this).parents('tr');
         //var id = row.data('id');
         
         var form = $('#form-delete');

         var url = form.attr('action');
         var data = form.serialize();
         producto.fadeOut();
         exito.fadeIn();

         $.post(url, data, function(result){
            alert(result);            
         }).fail(function(){
            alert('Error en el servidor o el producto tiene atributos asociados. Intente mas tarde o elimine dichos atributos.');
            producto.fadeIn();
            exito.fadeOut();
         });
      });
   });
</script>   

@endsection
