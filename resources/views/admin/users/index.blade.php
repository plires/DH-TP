@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

	<div class="row">
		<div class="small-12 columns margin_top_15">

			<h1 class="back margin_top_15 text_center">Backend Admin</h1>
			<h2 class="back">Todos los Usuarios</h2>

			<table class="responsive cien margin_top_15">
            <tbody>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Tipo Documento</th>
                  <th>Numero</th>
                  <th>Foto</th>
               </tr>
               @foreach($users as $user)
                  @if(!isset($user->id))
                     <tr>
                        <td>Sin usuarios</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                     </tr>
                  @else
                     <tr data-id="{{ $user->id }}">
                        <td>{{ $user->id }}</td>
                        <td>
                        	<a class="link_products_show" href="{{ url('admin/users', ['id'=> $user->id]) }}">
                        	{{ $user->name }}
                        	</a>
                      	</td>
                        <td>{{ $user->documentType->name }}</td>
                        <td>{{ $user->document }}</td>
                        <td>
                        	<a class="link_products_show" href="{{ url('admin/users', ['id'=> $user->id]) }}">
                        		<img class="imagen_products_show" src="{{ $user->src }}" alt="{{ $user->src }}">
                        	</a>
                        </td>
                     </tr>
                  @endif
               @endforeach
            </tbody>
         </table>
		</div>
	</div>

   <div class="row">
      <div class="small-12 medium-4 medium-centered columns">
         {{ $users->links() }}
      </div>
   </div>

   <div class="row">
      <div class="small-12 medium-4 columns medium-centered margin_top_15 text_center">
         <a href="{{ url('admin/users/create') }}">
            <button class="small button">
               <i class="ion-plus-circled"></i> Agregar Usuario
            </button>
         </a>
      </div>
   </div>
	
@endsection

@section('footer')

  @include('footer.footer')

@endsection
