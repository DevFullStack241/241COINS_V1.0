@extends('back.layouts.dash_owner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="dashboard-title fl-wrap">
        <div class="dashboard-title-item"><span>Mes établissements</span></div>
        @livewire('admin-owner-client-header-profile-info')
    </div>
    <div class="dasboard-wrapper fl-wrap">
        <div class="dasboard-listing-box fl-wrap">
            <div class="dasboard-opt sl-opt fl-wrap">
                <a href="{{ route('owner.etablishment.create') }}" class="gradient-bg dashboard-addnew_btn">Ajouter un
                    établissement <i class="fal fa-plus"></i></a>
            </div>
            <!-- dashboard-listings-wrap-->
            <div class="dashboard-listings-wrap fl-wrap">
                <div class="row">
                    @foreach ($etablishments as $etablishment)
                        <!-- dashboard-listings-item-->
                        <div class="col-md-6">
                            <div class="dashboard-listings-item fl-wrap">
                                <div class="dashboard-listings-item_img">
                                    <div class="bg-wrap">
                                        <div class="bg  " data-bg="{{ asset('storage/' . $etablishment->cover_image) }}"
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
                                    <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="right"
                                        data-tooltip="Good" data-starrating2="{{ $etablishment->note }}">
                                        @for ($i = 1; $i <= 3; $i++)
                                            <i class="fas fa-star {{ $i <= $etablishment->note ? 'active' : '' }}"></i>
                                        @endfor
                                    </div>
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
        <!-- pagination-->
        <div class="pagination float-pagination">
            <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
            <a href="#">1</a>
            <a href="#" class="current-page">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
        </div>
        <!-- pagination end-->
    </div>
@endsection
