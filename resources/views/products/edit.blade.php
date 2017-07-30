@extends('layouts.app')

@section('header')

  @include('header.header')

@endsection

@section('content')

  <div class="products-form-container">
    <h2>Crear un nuevo producto</h2>

    @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
            <li> {{  $error }} </li>
          @endforeach
      </ul>
    @endif

    <form class="products-create-form" enctype="multipart/form-data" action="{{ route('products.update', ['id'=> $product->id] )}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

      <div class="">
        <label for="title">Título</label>
        <input type="text" name="title" value="{{ $product->title }}">
      </div>
      <div class="">
        <label for="description">Descripcion</label>
        <textarea name="description" rows="8" cols="80"> {{ $product->description}}</textarea>
      </div>
      <div class="">
        <label for="price">Precio</label>
        <input type="number" name="price" value="{{ $product->price }}">
      </div>
      <div class="">
        <label for="category_id">Categoria</label>
        <select class="" name='category_id'>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>

          @endforeach
        </select>

      </div>
      <div class="">
        <label for="available">Stock disponible</label>
        <input type="number" name="available" value="{{ $product->available }}">
      </div>

      <div class="">
        <label for="img">Foto de tu producto</label>
        <input id="fileupload" name="img" type="file" />
      </div>

      <button type="submit" name="button">Guardar</button>
    </form>
  </div>

@endsection

@section('footer')

  @include('footer.footer')

@endsection
