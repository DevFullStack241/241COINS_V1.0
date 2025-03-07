@extends('back.layouts.authowner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="card-title text-uppercase pb-2">Réinitialiser le mot de passe</div>
            <p class="pb-2">Veuillez saisir votre nouveau mot de passe
            </p>
            <form action="{{ route('owner.reset-password-handler') }}" method="POST">
                @csrf
                <x-alert.form-alert />
                <div class="form-group">
                    <label for="exampleInputEmailAddress" class="">Nouveau mot de passe</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="exampleInputEmailAddress" class="form-control input-shadow"
                            placeholder="********" name="new_password" value="{{ old('new_password') }}">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>

                    </div>
                </div>
                <br>
                @error('new_password')
                    <span class="text-danger" style="margin-top:-25px;margin-bottom:5px;">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmailAddress" class="">Confirmer le nouveau mot de passe</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="exampleInputEmailAddress" class="form-control input-shadow"
                            placeholder="********" name="confirm_new_password" value="{{ old('confirm_new_password') }}">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                </div>
                <br>
                @error('new_password')
                    <span class="text-danger" style="margin-top:-25px;margin-bottom:5px;">{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-light btn-block mt-3">Validation</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Retour à <a href="{{ route('owner.login') }}"> Se connecter</a></p>
    </div>
@endsection
