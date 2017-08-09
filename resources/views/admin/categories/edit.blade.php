@extends('layouts.app')

@section('header')

   @include('header.header')

@endsection

@section('content')
   <div class="row">
      <div class="small-12 columns">
         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">Edición de la categoria: {{ $category->name }}</h2>
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

         <form class="form-horizontal" method="POST" action="{{ route('categories.update', ['category'=> $category->id]) }}">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
            <input id="category" type="text" name="category" value="{{ $category->name }}" required>
               <button class="small button"><i class="ion-edit"></i> Grabar</button>
         </form>
         
      </div>
   </div>

   <div class="row">
      <div class="small-12 medium-4 columns medium-centered margin_top_15 text_center">
         <a href="{{ route('categories.index') }}"><button class="small button">
            <i class="ion-arrow-left-a"></i> Volver</button>
         </a>
      </div>
   </div>
   
@endsection

@section('footer')

   @include('footer.footer')

@endsection
