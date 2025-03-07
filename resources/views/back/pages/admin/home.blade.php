@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('back/vendors/images/banner-img.png') }}" alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Bienvenue dans votre espace Administrateur
                    <div class="weight-600 font-30 text-blue">{{ auth()->user()->name }}</div>
                </h4>
            </div>
        </div>
    </div>
    <div class="title pb-20">
        <h2 class="h3 mb-0">Vue d'ensemble</h2>
    </div>
    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">5</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Clients
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                            <i class="icon-copy fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">11</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Propriétaires
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
                            <i class="icon-copy fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">40</div>
                        <div class="font-14 text-secondary weight-500">
                            Etablissements
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon">
                            <i class="icon-copy fa fa-building" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">4</div>
                        <div class="font-14 text-secondary weight-500">Catégories</div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);">
                            <i class="icon-copy fa fa-th-large" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 mb-20">
            <div class="card-box height-100-p pd-20 min-height-200px">
                <div class="d-flex justify-content-between pb-10">
                    <div class="h5 mb-0">Liste des clients</div>
                    <div class="dropdown">
                        
                    </div>
                </div>
                <div class="user-list">
                    <ul>
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="name-avatar d-flex align-items-center pr-2">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="vendors/images/photo1.jpg" class="border-radius-100 box-shadow" width="50"
                                        height="50" alt="">
                                </div>
                                <div class="txt">
                                    <div class="font-14 weight-600">Dr. Neil Wagner</div>
                                    <div class="font-12 weight-500" data-color="#b2b1b6" style="color: rgb(178, 177, 182);">
                                        Pediatrician
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="name-avatar d-flex align-items-center pr-2">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="vendors/images/photo2.jpg" class="border-radius-100 box-shadow"
                                        width="50" height="50" alt="">
                                </div>
                                <div class="txt">
                                    <div class="font-14 weight-600">Dr. Ren Delan</div>
                                    <div class="font-12 weight-500" data-color="#b2b1b6"
                                        style="color: rgb(178, 177, 182);">
                                        Pediatrician
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-20">
            <div class="card-box height-100-p pd-20 min-height-200px">
                <div class="d-flex justify-content-between pb-10">
                    <div class="h5 mb-0">Liste des propriétaires</div>
                    <div class="dropdown">
                        
                    </div>
                </div>
                <div class="user-list">
                    <ul>
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="name-avatar d-flex align-items-center pr-2">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="vendors/images/photo1.jpg" class="border-radius-100 box-shadow" width="50"
                                        height="50" alt="">
                                </div>
                                <div class="txt">
                                    <div class="font-14 weight-600">RENAMY Joél Obame</div>
                                    <div class="font-12 weight-500" data-color="#b2b1b6" style="color: rgb(178, 177, 182);">
                                        propriétaire
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="name-avatar d-flex align-items-center pr-2">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="vendors/images/photo2.jpg" class="border-radius-100 box-shadow"
                                        width="50" height="50" alt="">
                                </div>
                                <div class="txt">
                                    <div class="font-14 weight-600">Arthur LONGORIA</div>
                                    <div class="font-12 weight-500" data-color="#b2b1b6"
                                        style="color: rgb(178, 177, 182);">
                                        propriétaire
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>

@endsection
