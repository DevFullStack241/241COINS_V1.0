@extends('back.layouts.authclient')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row g-0 auth-row">
        <div class="col-lg-6">
            <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                    <div class="title text-center">
                        <h1 class="text-primary mb-10">Commencer</h1>
                        <p class="text-medium">
                            Créer votre compte pour profiter des nombreux avantages sur 241Coins.
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
            <div class="signup-wrapper">
                <div class="form-wrapper">
                    <h6 class="mb-15">Formulaire d'inscription</h6>
                    <form action="{{ route('client.create') }}" method="POST">
                        @csrf
                        <x-alert.form-alert />
                        <div class="row">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Nom</label>
                                    <input type="text" placeholder="Saisir votre nom" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Email</label>
                                    <input type="email" placeholder="Saisir votre e-mail" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Mot de passe</label>
                                    <input type="password" name="password" placeholder="********">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Confirmer votre mot de passe</label>
                                    <input type="password" name="confirm_password" placeholder="********">
                                    @error('confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <div class="button-group d-flex justify-content-center flex-wrap">
                                    <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                        S'inscrire
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </form>
                    <div class="singup-option pt-40">
                        <p class="text-sm text-medium text-dark text-center">
                            Vous avez déjà un compte ? <a href="{{ route('client.login') }}">Se connecter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
