@extends('layouts.app')

@section('header')

   @include('header.header')

@endsection

@section('content')
   <div class="row">
      <div class="small-12 columns">
         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">Edición del tipo de documento</h2>
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

         <form class="form-horizontal" method="POST" action="{{ route('document_types.update', ['document_types'=> $ducumentType->id]) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <input id="document" type="text" name="document" value="{{ $ducumentType->name }}" required>
            <a class="text_center" href="#">
               <button class="small button"><i class="ion-edit"></i> Grabar</button>
            </a>
         </form>
         
      </div>
   </div>
@endsection

@section('footer')

   @include('footer.footer')

@endsection
