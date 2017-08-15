@extends('layouts.app')

@section('header')

   @include('header.header')

@endsection

@section('content')
   <div class="row">
      <div class="small-12 columns">
         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">Tipo de Documentos</h2>
      </div>
   </div>
   <div class="row">
      <div class="small-12 medium-10 medium-centered columns margin_top_15 text_center">
         <h3>Usuarios con tipo de documento {{ $documentType->name }}</h3>
         <table class="responsive cien margin_top_15">
            <tbody>
               <tr>
                  <th>Nombre y Apellido</th>
                  <th>Email</th>
                  <th>Tipo Documento</th>
                  <th class="text_right">Acciones</th>
               </tr>
               @foreach($users as $user)
                  @if(!isset($user->id))
                     <tr>
                        <td>Sin Usuarios</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                     </tr>
                  @else
                     <tr data-id="{{ $user->id }}">
                        <td>{{ $user->surname .', '. $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->documentType->name }}</td>
                        <td>
                           <button class="boton_editar">
                              <a href="{{ url('admin/users/'. $user->id .'/edit') }}">Editar</a>
                           </button>
                           <button class="boton_editar">
                              <a href="{{ url('admin/users', ['id'=> $user->id]) }}">Ver Usuario</a>
                           </button>
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
      {{ $users->links() }}
    </div>
  </div>

   <div class="row">
      <div class="small-12 medium-4 columns medium-centered margin_top_15 text_center">
         <a href="{{ route('document_types.index') }}"><button class="small button">
            <i class="ion-arrow-left-a"></i> Volver</button>
         </a>
      </div>
   </div>



@endsection

@section('footer')

   @include('footer.footer')

@endsection
