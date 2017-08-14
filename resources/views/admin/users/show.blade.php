@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')
	
	<!--borrado con exito start-->
	<div class="exito row">
		<div class="small-12 columns">
		  El usuario fue borrado con exito
		</div>
	</div>
		<!--borrado con exito end-->

	<div class="usuario row margin_top_15">

		<div class="small-12 medium-6 columns">
			<h3 class="h3_product_show">Nombre</h3>
			<p class="p_post_h3">{{ $user->name }}</p>
			<h3 class="h3_product_show">Apellido</h3>
			<p class="p_post_h3">{{ $user->surname }}</p>
			<h3 class="h3_product_show">Email</h3>
			<p class="p_post_h3">{{ $user->email }}</p>
			<h3 class="h3_product_show">Telefono</h3>
			<p class="p_post_h3">{{ $user->phone }}</p>
			<h3 class="h3_product_show">Tipo de Documento</h3>
			<p class="p_post_h3">{{ $user->documentType->name }}</p>
			<h3 class="h3_product_show">Numero</h3>
			<p class="p_post_h3">{{ $user->document }}</p>
		</div>

		<div class="small-12 medium-6 columns">
			<img src="{{ $user->src }}" alt="{{ $user->name }}">
		</div>

	</div>

	<!--Acciones start-->
	<div class="usuario row margin_bottom_30 margin_top_30">
		<div class="small-12 columns">
		  <form id="form-delete" action="{{ url('admin/users/'. $user->id) }}" method='POST'>
		    {{ method_field('DELETE') }}
		    {{ csrf_field() }}
		    <button class="boton_cat boton_eliminar">
		      Eliminar
		    </button>
		  </form>

		    <button type="submit" class="boton_editar">
		      <a href="{{ url('admin/users/'. $user->id .'/edit') }}">Editar</a>
		    </button>

		</div>
	</div>
	<!--Acciones end-->

	<!--Volver Start-->
  <div class="row">
    <div class="small-12 medium-4 columns medium-centered margin_top_15 text_center">
      <a href="{{ url('admin/users') }}"><button class="small button">
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
      var usuario = $('.usuario');
      var exito = $('.exito');

      exito.fadeOut();

      $('.boton_cat').click(function(e){

         e.preventDefault();

         var form = $('#form-delete');

         var url = form.attr('action');
         var data = form.serialize();
         usuario.fadeOut();
         exito.fadeIn();

         $.post(url, data, function(result){
            alert(result);            
         }).fail(function(){
            alert('Error en el servidor o el usuario tiene atributos asociados. Intente mas tarde o elimine dichos atributos.');
            producto.fadeIn();
            exito.fadeOut();
         });
      });
   });
</script>   

@endsection
