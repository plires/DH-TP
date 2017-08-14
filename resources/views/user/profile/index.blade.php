@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')
	
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

		    <button type="submit" class="boton_editar">
		      <a href="{{ url('user/profile/'. $user->id .'/edit') }}">Editar</a>
		    </button>

		</div>
	</div>
	<!--Acciones end-->

@endsection

@section('footer')

  @include('footer.footer')

@endsection
