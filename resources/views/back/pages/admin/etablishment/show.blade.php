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
                <img src="{{ asset('storage/' . $etablishment->cover_image) }}" alt="" class="avatar-photo1">
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body pd-5">
                                <div class="img-container">
                                    <img id="image" src="{{ asset('storage/' . $etablishment->cover_image) }}"
                                        alt="Picture">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-info">
                <h5 class="mb-20 h5 text-blue">Information sur l'établissement</h5>
                <ul>
                    <li><span>Nom:</span>{{ $etablishment->name }}</li>
                    <li><span>Catégorie:</span>{{ $etablishment->category->name ?? 'Non spécifié' }}
                    </li>
                    <li><span>Adresse:</span>{{ $etablishment->address }}</li>
                    <li><span>Statut:</span>{{ $etablishment->status }}</li>
                    <li><span>E-mail:</span>{{ $etablishment->email }}</li>
                    <li><span>Téléphone Whatsapp:</span>{{ $etablishment->phone_whatsapp }}
                    </li>
                    <li><span>Téléphone Service:</span>{{ $etablishment->phone_service }}</li>
                    <li><span>Site Web:</span>{{ $etablishment->website }}</li>
                    <li><span>Jours et Heures:</span>{{ $etablishment->opening_hours }}</li>
                    <li><span>Services:</span>{{ $etablishment->services }}</li>
                </ul>
            </div>
            <div class="profile-social">
                <form action="{{ route('admin.client.delete', $etablishment->id) }}" method="POST"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" style="border: none; background: none;">
                        <i class="dw dw-delete-3"></i> Supprimer
                    </button>
                </form>

                <a class="dropdown-item" href="{{ route('admin.client.index') }}"><i class="icon-copy dw dw-back"></i>
                    Retour</a>
            </div>
        </div>
    </div>
@endsection
