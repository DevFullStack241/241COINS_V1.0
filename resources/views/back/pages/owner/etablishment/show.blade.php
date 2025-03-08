@extends('back.layouts.dash_owner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="content">
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Vue</span></div>
            @livewire('admin-owner-client-header-profile-info')
        </div>
        <div class="breadcrumbs fw-breadcrumbs smpar fl-wrap">
            <div class="container">
                <a href="{{ route('owner.etablishment.index') }}" class="gradient-bg dashboard-addnew_btn"> Retour <i
                        class="fal fa-arrow-left"></i></a>
            </div>
        </div>

        <section class="hidden-section   single-hero-section" data-scrollax-parent="true" id="sec1">
            <div class="bg-wrap bg-parallax-wrap-gradien">
                <div class="bg par-elem" data-bg="{{ asset('storage/' . $etablishment->cover_image) }}"
                    data-scrollax="properties: { translateY: '30%' }"
                    style="background-image: url('{{ asset('storage/' . $etablishment->cover_image) }}');">
                </div>
            </div>

            <div class="container">
                <div class="list-single-opt_header fl-wrap">
                    <ul class="list-single-opt_header_cat">
                        <li><a href="#"
                                class="cat-opt color-bg">{{ $etablishment->category->name ?? 'Non spécifié' }}</a></li>
                    </ul>
                </div>
                <!--  list-single-header-item-->
                <div class="list-single-header-item no-bg-list_sh fl-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>{{ $etablishment->name }} <span class="verified-badge tolt" data-microtip-position="bottom"
                                    data-tooltip="Verified"><i class="fas fa-check"></i></span></h1>
                            <div class="geodir-category-location fl-wrap">
                                <a href="#"><i class="fas fa-map-marker-alt"></i> {{ $etablishment->address }}</a>

                            </div>

                        </div>
                    </div>
                    <div class="list-single-header-footer fl-wrap">
                        <div class="list-single-stats">
                            <ul class="no-list-style">
                                <li><span class="viewed-counter"><i class="fas fa-eye"></i>
                                        14 </span></li>
                                <li><span class="bookmark-counter"><i class="fas fa-heart"></i> 24 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="gray-bg small-padding fl-wrap">
            <div class="container">
                <div class="row2">
                    <!--  listing-single content -->
                    <div class="col-md-12">
                        <div class="list-single-main-wrapper fl-wrap">

                            <div class="list-single-main-media fl-wrap" id="sec2">
                                <!-- gallery-items   -->
                                <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery"
                                    style="position: relative; height: 474.843px;">
                                    <!-- 1 -->
                                    <div class="gallery-item " style="position: absolute; left: 0px; top: 0px;">
                                        <div class="grid-item-holder">
                                            <div class="box-item">
                                                <img src="images/all/1.jpg" alt="">
                                                <a href="images/all/1.jpg" class="gal-link popup-image"><i
                                                        class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 1 end -->
                                    <!-- 2 -->
                                    <div class="gallery-item" style="position: absolute; left: 235px; top: 0px;">
                                        <div class="grid-item-holder">
                                            <div class="box-item">
                                                <img src="images/all/8.jpg" alt="">
                                                <a href="images/all/8.jpg" class="gal-link popup-image"><i
                                                        class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 end -->
                                    <!-- 3 -->
                                    <div class="gallery-item gallery-item-second"
                                        style="position: absolute; left: 0px; top: 158px;">
                                        <div class="grid-item-holder">
                                            <div class="box-item">
                                                <img src="images/all/3.jpg" alt="">
                                                <a href="images/all/3.jpg" class="gal-link popup-image"><i
                                                        class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 3 end -->
                                    <!-- 4 -->
                                    <div class="gallery-item" style="position: absolute; left: 470px; top: 0px;">
                                        <div class="grid-item-holder">
                                            <div class="box-item">
                                                <img src="images/all/4.jpg" alt="">
                                                <a href="images/all/4.jpg" class="gal-link popup-image"><i
                                                        class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 4 end -->
                                    <!-- 5 -->
                                    <div class="gallery-item" style="position: absolute; left: 470px; top: 158px;">
                                        <div class="grid-item-holder">
                                            <div class="box-item">
                                                <img src="images/all/5.jpg" alt="">
                                                <a href="images/all/5.jpg" class="gal-link popup-image"><i
                                                        class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 5 end -->
                                    <!-- 7 -->
                                    <div class="gallery-item" style="position: absolute; left: 470px; top: 316px;">
                                        <div class="grid-item-holder">
                                            <div class="box-item">
                                                <img src="images/all/9.jpg" alt="">
                                                <a href="images/all/9.jpg" class="gal-link popup-image"><i
                                                        class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 7 end -->
                                </div>
                                <!-- end gallery items -->
                            </div>
                            <div class="list-single-facts fl-wrap">
                            </div>
                            <div class="list-single-main-container fl-wrap" id="sec3">
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title">
                                        <h3>A propos</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <p class="justify-text">{{ $etablishment->description }}</p>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title">
                                        <h3>Détails</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="details-list">
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
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fw-lmi fl-wrap" id="sec6">
                                    <div class="map-container mapC_vis mapC_vis2">
                                        <div id="singleMap" data-latitude="40.7427837"
                                            data-longitude="-73.11445617675781" data-maptitle="Our Location"
                                            data-infotitle="House in Financial Distric"
                                            data-infotext="70 Bright St New York, USA"
                                            style="position: relative; overflow: hidden;">
                                            <div
                                                style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                                <div class="gm-err-container">
                                                    <div class="gm-err-content">
                                                        <div class="gm-err-icon"><img
                                                                src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png"
                                                                alt="" draggable="false"
                                                                style="user-select: none;"></div>
                                                        <div class="gm-err-title">Petit problème... Une erreur s'est
                                                            produite</div>
                                                        <div class="gm-err-message">Google&nbsp;Maps ne s'est pas chargé
                                                            correctement sur cette page. Pour plus d'informations techniques
                                                            sur cette erreur, veuillez consulter la console JavaScript.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="scrollContorl"></div>
                                    </div>
                                    <input id="pac-input" class="controls fl-wrap controls-mapwn pac-target-input"
                                        autocomplete="off" type="text" placeholder="What Nearby? Schools, Gym... "
                                        value="">
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec7">
                                    <div class="list-single-main-item-title">
                                        <h3>Reviews <span>2</span></h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap fl-wrap">
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="images/avatar/2.jpg" alt="">
                                                </div>
                                                <div class="reviews-comments-item-text smpar">
                                                    <div class="box-widget-menu-btn smact"><i
                                                            class="far fa-ellipsis-h"></i></div>
                                                    <div class="show-more-snopt-tooltip bxwt">
                                                        <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                        <a href="#"> <i class="fas fa-exclamation-triangle"></i>
                                                            Report </a>
                                                    </div>
                                                    <h4><a href="#">Liza Rose</a></h4>
                                                    <div class="clearfix"></div>
                                                    <p>......</p>
                                                    <div class="reviews-comments-item-date"><span
                                                            class="reviews-comments-item-date-item"><i
                                                                class="far fa-calendar-check"></i>12 April 2018</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                {{-- <div class="list-single-main-item fl-wrap" id="sec15">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Add Your Review</h3>
                                    </div>
                                    <!-- Add Review Box -->
                                    <div id="add-review" class="add-review-box">
                                        <!-- Review Comment -->
                                        <form class="add-comment custom-form">
                                            <fieldset>
                                                <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                            </fieldset>
                                            <button class="btn big-btn color-bg float-btn">Submit Review <i
                                                    class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                    <!-- Add Review Box / End -->
                                </div> --}}
                                <!-- list-single-main-item end -->
                            </div>
                        </div>
                    </div>
                    <!-- listing-single content end-->


                </div>


            </div>
        </div>
    </div>

@endsection
