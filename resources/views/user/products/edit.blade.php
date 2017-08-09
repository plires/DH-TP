@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

	<!--Encabezados start-->
	<div class="row">
		<div class="small-12 columns">
		  <h1 class="back">Edición del producto</h1>
		</div>
	</div>
	<!--Encabezados end-->

	<!--Errores formularios Start-->
	<div class="row text_center">
	  @if ($errors->any())
	  <div class="small-12 medium-8 medium-centered columns errores_panel">
	    <ul>
	      @foreach ($errors->all() as $error)
	          <li> {{  $error }} </li>
	        @endforeach
	    </ul>
	  </div>     
	  @endif
	</div>
	<!--Errores formularios end-->

	<!--Formulario start-->
	<div class="row">
	<div class="small-12 medium-8 medium-centered columns panel">
	  <form class="products-create-form" enctype="multipart/form-data" action="{{ route('products.update', ['product'=> $product->id]) }}" method="post">
	    {{ method_field('PATCH') }}
	    {{ csrf_field() }}
	    
	    <label for="title">Título</label>
	    <input type="text" name="title" value="{{ $product->title }}">
	    
	    <label for="description">Descripcion</label>
	    <textarea name="description" rows="8" cols="80">{{ $product->description }}</textarea>
	    
	    <label for="price">Precio</label>
	    <input type="number" name="price" value="{{ $product->price }}">
	    
	    <label for="category_id">Categoria</label>
	    <select class="" name='category_id'>
	      @foreach ($categories as $category)
	        <option {{ ($product->category->id == $category->id) ? 'selected' : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
	      @endforeach
	    </select>

	    <label for="available">Stock disponible</label>
	    <input type="number" name="available" value="{{ $product->available }}">

	    <label for="img">Foto de tu producto</label>
	    <img  src='{{ $product->images->src }}' class="imagen_products_show">
	    <input id="fileupload" name="img" type="file" />

	    <input name="img_id" value="{{ $product->image_id }}" type="hidden" />

	    <button class="boton_form" name="button"><i class="ion-android-send"></i> Guardar</button>
	  </form>      
	</div>
	</div>
	<!--Formulario end-->

@endsection

@section('footer')

  @include('footer.footer')

@endsection
