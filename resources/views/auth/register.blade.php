@extends('layouts.app')

@section('header')

    @include('header.header')

@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-10 medium-centered columns margin_top_15">
            <div class="panel">
                <div class="panel-heading">Registración</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="small-12 columns">
                                <label for="name">Nombre</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('surname') ? ' has-error' : '' }}">

                            <div class="small-12 columns">
                                <label for="surname">Apellido</label>
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="error">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('document_id') ? ' has-error' : '' }}">

                            <div class="small-12 columns">
                                <label for="document_id">Tipo de documento</label>
                                <select name="document_id" id="document_id">
                                    @foreach($documentTypes as $documentType)
                                        <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                                    @endforeach
                                </select>
                                <table>

                                </table>

                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('document') ? ' has-error' : '' }}">

                            <div class="small-12 columns">
                                <label for="document">Número de documento</label>
                                <input id="document" type="text" class="form-control" name="document" value="{{ old('document') }}" required autofocus>

                                @if ($errors->has('document'))
                                    <span class="error">
                                        <strong>{{ $errors->first('document') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                            <div class="small-12 columns">
                                <label for="phone">Teléfono</label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="error">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="small-12 columns">
                                <label for="email">E-Mail</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="error">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="small-12 columns">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="error">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="small-12 columns">
                                <label for="password-confirm">Confirmar Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="small-12 columns">
                                <button type="submit" class="button">
                                    <i class="ion-person-add"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

    @include('footer.footer')

@endsection
