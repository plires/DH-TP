@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <div class="row">
    <div class="small-12 columns">
    	
    	<!--Encabezados start-->
		  <div class="row">
		    <div class="small-12 columns">
					<h1 class="back margin_top_15 text_center">Backend Admin</h1>
					<h2 class="back">Carga de un nuevo usuario</h2>
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
		      <form class="products-create-form" enctype="multipart/form-data" action="{{ url('admin/users') }}" method="post">
		        {{ csrf_field() }}
		        
		        <label for="title">Nombre</label>
		        <input type="text" name="name" value="{{ old('name') }}">
		        
		        <label for="surname">Apellido</label>
		        <input type="text" name="surname" value="{{ old('surname') }}">
		        
		        <label for="email">Email</label>
		        <input type="email" name="email" value="{{ old('email') }}">

		        <label for="phone">Telefono</label>
		        <input type="tel" name="phone" value="{{ old('phone') }}">
		        
		        <label for="documentType">Tipo de Documento</label>
		        <select class="" name='documentType'>
		          @foreach ($documentTypes as $documentType)
		            <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
		          @endforeach
		        </select>

		        <label for="document">Numero de Documento</label>
		        <input type="number" name="document" value="{{ old('document') }}">

		        <label for="admin">Tipo de Usuario</label>
		        <select class="" name='admin'>
		            <option value="0">Usuario</option>
		            <option value="1">Administrador</option>
		        </select>

		        <label for="img">Foto de tu Perfil</label>
		        <input id="fileupload" name="img" type="file" />

		        <label for="password">Password</label>
		        <input type="password" name="password">

		        <label for="rpassword">Repita su Password</label>
		        <input type="password" name="rpassword">

		        <button class="boton_form" name="button"><i class="ion-android-send"></i> Guardar</button>
		      </form>      
		    </div>
		  </div>
		  <!--Formulario end-->

   </div>
  </div>


@endsection

@section('footer')

  @include('footer.footer')

@endsection
