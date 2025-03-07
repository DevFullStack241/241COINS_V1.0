@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-black h4">Informations de la categorie</h4>
                <br>
            </div>
            <div class="pull-right">
                <a href="{{ route('admin.categorie.index') }}" class="btn btn-primary" role="button">
                    <i class="micon ion-home"></i></a>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom de la catégorie</label>
            <div class="col-sm-12 col-md-10">
                <p class="form-control-plaintext">{{ $categories->name }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Créé le</label>
            <div class="col-sm-12 col-md-10">
                <p>{{ \Carbon\Carbon::parse($categories->created_at)->format('d/m/Y H:i') }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Mis à jour le</label>
            <div class="col-sm-12 col-md-10">
                <p>{{ \Carbon\Carbon::parse($categories->updated_at)->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
@endsection
