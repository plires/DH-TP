@extends('layouts.app')

@section('header')

   @include('header.header')

@endsection

@section('content')
   <div class="row">
      <div class="small-12 columns">
         <h1 class="back margin_top_15 text_center">Backend Admin</h1>
         <h2 class="back">Edición de categoria de productos</h2>
      </div>
   </div>
   <div class="row">
      <div class="small-12 columns margin_top_15">

         <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}">
            {{ csrf_field() }}
            <input id="category" type="text" name="category" value="{{ $category->name }}" required>
            <a class="text_center" href="#"><button type="submit" class="small button"><i class="ion-edit"></i> Grabar</button></a>
         </form>
         
      </div>
   </div>
@endsection

@section('footer')

   @include('footer.footer')

@endsection
