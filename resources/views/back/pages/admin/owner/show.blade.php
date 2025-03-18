@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-xl-12 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
                <a href="" data-toggle="" data-target="#modal" class=""><i class=""></i></a>
                <img src="{{ $owner->picture ?? asset('images/default-avatar.png') }}" alt="" class="avatar-photo">
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pd-5">
                                <div class="img-container">
                                    <img id="image" src="{{ $owner->picture ?? asset('images/default-avatar.png') }}" alt="Picture">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Update" class="btn btn-primary">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="text-center h5 mb-0">{{ $owner->name }}</h5>
            <p class="text-center text-muted font-14">
                {{ $owner->profession }}
            </p>
            <div class="profile-info">
                <h5 class="mb-20 h5 text-blue">Information propriétaire</h5>
                <ul>
                    <li>
                        <span>Nom d'utilisateur:</span>
                        {{ $owner->username }}
                    </li>
                    <li>
                        <span>Adresse E-mail:</span>
                        {{ $owner->email }}
                    </li>
                    <li>
                        <span>Adresse:</span>
                        {{ $owner->address }}
                    </li>
                    <li>
                        <span>Téléphone:</span>
                        {{ $owner->phone }}
                    </li>
                </ul>
            </div>
            <div class="profile-social">
                <form action="{{ route('admin.owner.delete', $owner->id) }}" method="POST"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce propriétaire ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" style="border: none; background: none;">
                        <i class="dw dw-delete-3"></i> Supprimer
                    </button>
                </form>

                <a class="dropdown-item" href="{{ route('admin.client.index') }}"><i
                        class="icon-copy dw dw-back"></i> Retour</a>
            </div>
        </div>
    </div>
@endsection
