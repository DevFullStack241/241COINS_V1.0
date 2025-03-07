@extends('back.layouts.authowner')

@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="card-title text-uppercase pb-2">Réinitialiser le mot de passe</div>
            <p class="pb-2">Veuillez saisir votre adresse e-mail. Vous recevrez un lien pour créer un nouveau mot de passe.
            </p>
            <form action="{{ route('owner.send-password-reset-link') }}" method="POST">
                @csrf
                <x-alert.form-alert />
                <div class="form-group">
                    <label for="exampleInputEmailAddress" class="">Adresse email</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputEmailAddress" class="form-control input-shadow"
                            placeholder="Adresse E-mail" name="email" value="{{ old('email') }}">

                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>

                    </div>
                </div>
                <br>
                @error('email')
                    <span class="text-danger d-block" style="margin-top: -25px;margin-bottom:5px;">{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-light btn-block mt-3">Soumettre</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Retour à <a href="{{ route('owner.login') }}"> Se connecter</a></p>
    </div>
@endsection
