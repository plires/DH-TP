@extends('layouts.app')

@section('header')

   @include('header.header')

@endsection

@section('content')
   <div class="row">
      <div class="small-12 columns">
         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">Tipos de documentos permitidos</h2>
      </div>
   </div>
   <div class="row">
      <div class="small-12 medium-10 medium-centered columns margin_top_15 text_center">
         <table class="responsive cien margin_top_15">
            <tbody>
            <tr>
               <th>Nombre</th>
               <th>Acciones</th>
            </tr>
               @foreach($documentTypes as $documentType)
                  <tr data-id="{{ $documentType->id }}">
                     <td>{{ $documentType->name }}</td>
                     <td>
                        <button class="boton_cat boton_eliminar">Eliminar</button>
                        <button class="boton_editar">Editar</button>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>

   <div class="row">
      <div class="small-12 medium-4 columns medium-centered margin_top_15 text_center">
         <a href="{{ route('document_types.create') }}"><button class="small button"><i class="ion-plus-circled"></i> Agregar Categoría</button></a>
      </div>
   </div>

@endsection

@section('footer')

   @include('footer.footer')

<form action="{{ route('document_types.destroy', ':CATEGORY_ID') }}" method="DELETE" id="form-delete">
<input name="_method" type="hidden" value="DELETE">
{{ csrf_field() }}
</form>
@endsection

@section('scripts')

<script>
   $(document).ready(function(){
      $('.boton_cat').click(function(e){

         e.preventDefault();

         var row = $(this).parents('tr');
         var id = row.data('id');
         var form = $('#form-delete');

         var url = form.attr('action').replace(':CATEGORY_ID', id) ;
         var data = form.serialize();

         row.fadeOut();

         $.post(url, data, function(result){
            alert(result);            
         }).fail(function(){
            alert('Error en el servidor, el usuario no fue eliminado. Intente mas tarde.');
            row.fadeIn();
         });
      })
   })
</script>   

@endsection