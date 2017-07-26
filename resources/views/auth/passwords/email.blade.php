@extends('layouts.app')

@section('header')

    @include('header.header')

@endsection

@section('content')
    <div class="row">
        <div class="small-12 medium-8 medium-centered column margin_top_15">
            <div class="panel">
                <div class="panel-heading">Reset del Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

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

                        <div class="row form-group">
                            <div class="small-12 columns">
                                <button type="submit" class="button">
                                    Enviar Link de Reset
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
