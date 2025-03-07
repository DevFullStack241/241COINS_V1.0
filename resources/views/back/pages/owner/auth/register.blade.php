@extends('back.layouts.authowner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
            </div>
            <div class="card-title text-uppercase text-center py-3">Créer votre compte propriètaire</div>
            <form action="{{ route('owner.create') }}" method="POST">
                @csrf
                <x-alert.form-alert />
                <div class="form-group">
                    <label for="exampleInputName" class="sr-only">Nom</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputName" class="form-control input-shadow"
                            placeholder="Entrer votre nom" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger ml-2">{{ $message }}</span>
                        @enderror
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmailId" class="sr-only">Email</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputEmailId" class="form-control input-shadow"
                            placeholder="Entrer votre email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger ml-2">{{ $message }}</span>
                        @enderror
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Mot de passe</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" name="password" id="exampleInputPassword" class="form-control input-shadow"
                            placeholder="**********">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Confirmer votre mot de passe</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" name="confirm_password" id="exampleInputPassword"
                            class="form-control input-shadow" placeholder="**********">
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-light btn-block waves-effect waves-light">S'inscrire</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Vous avez déjà un compte ? <a href="{{ route('owner.login') }}">  Connectez-vous ici</a></p>
    </div>
@endsection
