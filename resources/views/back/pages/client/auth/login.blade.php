@extends('back.layouts.authclient')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row g-0 auth-row">
        <div class="col-lg-6">
            <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                    <div class="title text-center">
                        <h1 class="text-primary mb-10">Bienvenue</h1>
                        <p class="text-medium">
                            Connectez-vous à votre compte existant pour continuer
                        </p>
                    </div>
                    <div class="cover-image">
                        <img src="{{ asset('font_end/auth/client/assets/images/auth/signin-image.svg') }}" alt="">
                    </div>
                    <div class="shape-image">
                        <img src="{{ asset('font_end/auth/client/assets/images/auth/shape.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
            <div class="signin-wrapper">
                <div class="form-wrapper">
                    <h6 class="mb-15">Formulaire de connexion</h6>
                    <p class="text-sm mb-25">
                        Commencez à créer la meilleure expérience utilisateur possible pour vous.
                    </p>
                    <form action="{{ route('client.login-handler') }}" method="POST">
                        @csrf
                        <x-alert.form-alert />
                        <div class="row">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>E-mail ou Nom Utilisateur</label>
                                    <input type="text" placeholder="Saisir votre e-mail ou votre nom utilisateur"
                                        name="login_id" value="{{ old('login_id') }}">
                                </div>
                            </div>
                            @error('login_id')
                                <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!-- end col -->
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Mot de passe</label>
                                    <input type="password" placeholder="********" name="password">
                                </div>
                            </div>
                            @error('password')
                                <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!-- end col -->
                            <div class="col-xxl-12 col-lg-12 col-md-6">
                                <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                    <a href="{{ route('client.forgot-password') }}" class="hover-underline">
                                        Mot de passe oublié ?
                                    </a>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <div class="button-group d-flex justify-content-center flex-wrap">
                                    <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                        Se connecter
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </form>
                    <div class="singin-option pt-40">
                        <p class="text-sm text-medium text-dark text-center">
                            Vous n'avez pas encore de compte ?
                            <a href="{{ route('client.register') }}">Créer un compte</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
