@extends('layouts.app')

@section('header')

   @include('header.header')

@endsection

@section('content')
   <div class="row">
      <div class="small-12 columns">
         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">Creación de un nuevo tipo de documento</h2>
      </div>
   </div>
   <div class="row">
      <div class="small-12 columns margin_top_15">
         @if (count($errors) > 0)
            <span class="error">
               @foreach($errors->all() as $error)
                  <strong>{{ $error }}</strong>
               @endforeach
            </span>
         @endif
         <table class="responsive cien">
            <tbody>
               <tr>
                  <th>Nombre</th>
               </tr>
               <tr>
                  <form class="form-horizontal" method="POST" action="{{ route('document_types.store') }}">
                     {{ csrf_field() }}
                     <td class="text_center margin_top_15" colspan="3">
                        <input id="document" type="text" name="document" placeholder="Nombre del nuevo documento" required>
                        <a class="text_center" href="#"><button type="submit" class="small button"><i class="ion-plus-circled"></i> Agregar</button></a>
                     </td>
                  </form>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
@endsection

@section('footer')

   @include('footer.footer')

@endsection
