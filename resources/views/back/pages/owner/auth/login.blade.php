@extends('back.layouts.authowner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
               
            </div>
            <div class="card-title text-uppercase text-center py-3">Propriétaire Connexion</div>

            <form action="{{ route('owner.login-handler') }}" method="POST">
                @csrf
                <x-alert.form-alert />
                <div class="form-group">
                    <label for="exampleInputUsername" class="sr-only">E-mail ou Nom d'utilisateur</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputUsername" class="form-control input-shadow"
                            placeholder="E-mail ou Nom d'utilisateur" name="login_id" value="{{ old('login_id') }}">
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <br>
                @error('login_id')
                    <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Mot de passe</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="exampleInputPassword" class="form-control input-shadow"
                            placeholder="**********" name='password'>
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>
                <br>
                @error('password')
                    <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-row">
                    <div class="form-group col-12 text-right">
                        <a href="{{ route('owner.forgot-password') }}">Mot de passe oublié ?</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-light btn-block">Se connecter</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Vous n'avez pas de compte ? <a href="{{ route('owner.register') }}">
                Inscrivez-vous
                ici</a></p>
    </div>
@endsection
