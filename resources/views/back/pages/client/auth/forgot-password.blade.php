@extends('back.layouts.authclient')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row g-0 auth-row">
        <div class="col-lg-6">
            <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                    <div class="title text-center">
                        <h1 class="text-primary mb-10">Réinitialiser le mot de passe</h1>
                        <p class="text-medium">
                            Veuillez saisir votre adresse e-mail. Vous recevrez un lien pour créer un nouveau mot de passe.
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
                    <h6 class="mb-15">Sign Up Form</h6>
                    <p class="text-sm mb-25">
                        Start creating the best possible user experience for you
                        customers.
                    </p>
                    <form action="{{ route('client.send-password-reset-link') }}" method="POST">
                        @csrf
                        <x-alert.form-alert />
                        <div class="row">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Email</label>
                                    <input type="email" placeholder="Saisir votre adresse e_mail" name="email"
                                        value="{{ old('email') }}">

                                </div>
                                @error('email')
                                    <span class="text-danger d-block"
                                        style="margin-top: -25px;margin-bottom:5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <div class="button-group d-flex justify-content-center flex-wrap">
                                    <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                        Soumettre
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </form>
                    <div class="singup-option pt-40">
                        <p class="text-sm text-medium text-dark text-center">
                            Already have an account? <a href="{{ route('client.login') }}">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
