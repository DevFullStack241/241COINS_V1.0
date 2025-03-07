@extends('font_end.layout.authowner')

@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="{{ asset('font_end/auth/owner/assets/images/logo-icon.png') }}" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Connexion</div>
            <form>
                <div class="form-group">
                    <label for="exampleInputUsername" class="sr-only">Username</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputUsername" class="form-control input-shadow"
                            placeholder="Enter Username">
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="exampleInputPassword" class="form-control input-shadow"
                            placeholder="Enter Password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 text-right">
                        <a href="{{ route('home.auth.forgot.password.owner') }}">Mot de passe oublié ?</a>
                    </div>
                </div>
                <button type="button" class="btn btn-light btn-block">Se connecter</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Vous n'avez pas de compte ? <a href="{{ route('home.auth.register.owner') }}">
                Inscrivez-vous
                ici</a></p>
    </div>
@endsection
