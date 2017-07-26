@extends('layouts.app')

@section('header')

    @include('header.header')

@endsection

@section('content')
    <div class="row">
        <div class="small-12 columns">
            <h1>Listado de categorias</h1>
        </div>
        <div class="small-12 medium-10 medium-centered columns margin_top_15">
           <table class="responsive cien">
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td><a href="#"><button class="small button"><i class="ion-android-delete"></i> Borrar</button></a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}">
                        {{ csrf_field() }}
                            <td><input id="category" type="text" name="category" placeholder="Nombre de la nueva categoria" required></td>
                            <td><input id="slug" type="text" name="slug" placeholder="Slug de la nueva categoria" required></td>
                            <td><a href="#"><button type="submit" class="small button"><i class="ion-plus-circled"></i> Agregar</button></a></td>
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
