@extends('back.layouts.dash_owner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Tableau de bord</span></div>
            @livewire('admin-owner-client-header-profile-info')
        </div>
        <!-- dashboard-title end -->
        <div class="dasboard-wrapper fl-wrap no-pag">
            <div class="dashboard-stats-container fl-wrap">
                <div class="row">
                    <!--dashboard-stats-->
                    <div class="col-md-6">
                        <div class="dashboard-stats fl-wrap">
                            <i class="fas fa-building"></i>
                            <h4>Nombre total de vos établissements</h4>
                            <div class="dashboard-stats-count">{{ $totalEtablishments }}</div>
                        </div>
                    </div>
                    <!-- dashboard-stats end -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- dashboard-listings-wrap-->
                    <div class="dashboard-listings-wrap fl-wrap">
                        <div class="row">
                            @foreach ($etablishments as $etablishment)
                                <!-- dashboard-listings-item-->
                                <div class="col-md-6">
                                    <div class="dashboard-listings-item fl-wrap">
                                        <div class="dashboard-listings-item_img">
                                            <div class="bg-wrap">
                                                <div class="bg  "
                                                    data-bg="{{ asset('storage/' . $etablishment->cover_image) }}"
                                                    style="background-image: url('{{ asset('storage/' . $etablishment->image) }}')">
                                                </div>
                                            </div>
                                            <div class="overlay"></div>
                                            <a href="{{ route('owner.etablishment.show', $etablishment->id) }}"
                                                class="color-bg">Voir</a>
                                        </div>
                                        <div class="dashboard-listings-item_content">
                                            <h4><a href="#">{{ $etablishment->name }}</a></h4>
                                            <div class="geodir-category-location">
                                                <a href="#"><i class="fas fa-map-marker-alt"></i>
                                                    <span>{{ $etablishment->address }}</span></a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="dashboard-listings-item_opt">
                                                <ul>
                                                    <li><a href="{{ route('owner.etablishment.edit', $etablishment->id) }}"
                                                            class="tolt" data-microtip-position="top-left"
                                                            data-tooltip="Modifier"><i class="far fa-edit"></i></a></li>
                                                    <li>
                                                        <form id="delete-form-{{ $etablishment->id }}"
                                                            action="{{ route('owner.etablishment.delete', $etablishment->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#" class="tolt delete-link"
                                                                data-microtip-position="top-left" data-tooltip="Supprimer"
                                                                data-id="{{ $etablishment->id }}">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </form>

                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                document.querySelectorAll('.delete-link').forEach(link => {
                                                                    link.addEventListener('click', function(event) {
                                                                        event.preventDefault(); // Empêche la navigation
                                                                        let etablishmentId = this.getAttribute('data-id');
                                                                        let form = document.getElementById('delete-form-' + etablishmentId);

                                                                        if (confirm("Voulez-vous vraiment supprimer cet établissement ?")) {
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        </script>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- dashboard-listings-item end-->
                            @endforeach
                        </div>
                    </div>
                    <!-- dashboard-listings-wrap end-->
                </div>
            </div>
        </div>
    </div>
@endsection
