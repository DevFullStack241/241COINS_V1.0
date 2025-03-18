@extends('font_end.layout.layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="content">
        <section class="hidden-section   single-hero-section" data-scrollax-parent="true" id="sec1">
            <div class="bg-wrap bg-parallax-wrap-gradien">
                <div class="bg par-elem" data-bg="{{ asset('storage/' . $etablishment->cover_image) }}"
                    data-scrollax="properties: { translateY: '30%' }"
                    style="background-image: url('{{ asset('storage/' . $etablishment->cover_image) }}');">
                </div>
            </div>
            <div class="container">
                <!--  list-single-opt_header-->
                <div class="list-single-opt_header fl-wrap">
                    <ul class="list-single-opt_header_cat">
                        <li><a href="#"
                                class="cat-opt color-bg">{{ $etablishment->category->name ?? 'Non spécifié' }}</a></li>
                    </ul>
                </div>
                <!--  list-single-opt_header end -->
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
                                <li>
                                    <span class="bookmark-counter">
                                        <i class="fas fa-heart"></i> {{ $etablishment->likes()->count() }}
                                    </span>
                                </li>
                                <li>
                                    <span class="viewed-counter">
                                        <i class="fas fa-thumbs-down"></i> {{ $etablishment->dislikes()->count() }}
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="breadcrumbs fw-breadcrumbs smpar fl-wrap">
            <div class="container">
                @if (auth('client')->check())
                    <form action="{{ route('client.like', $etablishment->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="dislike">
                        <button type="submit" class="like-btn {{ $clientReaction === 'dislike' ? 'active' : '' }}">
                            <i class="fas fa-thumbs-down"></i> Je n'aime pas
                        </button>
                    </form>

                    <form action="{{ route('client.like', $etablishment->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="like">
                        <button type="submit" class="like-btn {{ $clientReaction === 'like' ? 'active' : '' }}">
                            <i class="fas fa-heart"></i> J'aime
                        </button>
                    </form>
                @else
                    <p class="text-danger">Connectez-vous pour liker cet établissement.</p>
                @endif
            </div>
        </div>
        <div class="gray-bg small-padding fl-wrap">
            <div class="container">
                <div class="row">
                    <!--  listing-single content -->
                    <div class="col-md-8">
                        <div class="list-single-main-wrapper fl-wrap">
                            <!--  scroll-nav-wrap -->
                            <div class="scroll-nav-wrap">
                                <nav class="scroll-nav scroll-init fixed-column_menu-init"
                                    style="z-index: 20; position: absolute; top: 0px;">
                                    <ul class="no-list-style">
                                        <li><a class="act-scrlink" href="#sec1"><i
                                                    class="fal fa-home-lg-alt"></i></a><span>Main</span></li>
                                        <li><a href="#sec2" class=""><i
                                                    class="fal fa-image"></i></a><span>Gallery</span></li>
                                        <li><a href="#sec3" class=""><i class="fal fa-info"></i>
                                            </a><span>Details</span></li>
                                        <li><a href="#sec6" class=""><i
                                                    class="fal fa-map-pin"></i></a><span>Location</span></li>
                                        <li><a href="#sec7" class=""><i
                                                    class="fal fa-comment-alt-lines"></i></a><span>Reviews</span></li>
                                    </ul>
                                    <div class="progress-indicator">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                                            <circle cx="16" cy="16" r="15.9155"
                                                class="progress-bar__background"></circle>
                                            <circle cx="16" cy="16" r="15.9155"
                                                class="progress-bar__progress 
                                                            js-progress-bar"
                                                style="stroke-dashoffset: 100px;"></circle>
                                        </svg>
                                    </div>
                                </nav>
                            </div>
                            <!--  scroll-nav-wrap end-->
                            <div class="list-single-main-media fl-wrap" id="sec2">
                                <!-- gallery-items -->
                                <div class="gallery-items grid-small-pad list-single-gallery three-coulms lightgallery">
                                    @foreach ($etablishment->images as $image)
                                        <div class="gallery-item">
                                            <div class="grid-item-holder">
                                                <div class="box-item">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image">
                                                    <a href="{{ asset('storage/' . $image->image_path) }}"
                                                        class="gal-link popup-image">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- end gallery items -->
                            </div>
                            <div class="list-single-main-container fl-wrap" id="sec3">
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title">
                                        <h3>A propos</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <p>{{ $etablishment->description }}</p>
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
                                        <div id="singleMap" data-latitude="0.3901" data-longitude="9.4544"
                                            data-maptitle="Libreville, Gabon" data-infotitle="Ma Position"
                                            data-infotext="Centre de Libreville"
                                            style="position: relative; overflow: hidden;">
                                            <div
                                                style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                                <div class="gm-err-container">

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
                                        <h3>Commentaires <span></span></h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <div class="reviews-comments-wrap fl-wrap">
                                            <!-- Boucle sur les commentaires principaux uniquement -->
                                            @foreach ($etablishment->comments->where('parent_id', null) as $comment)
                                                <!-- Commentaire principal -->
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="{{ $comment->client->picture ?? asset('images/default-avatar.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="reviews-comments-item-text smpar">
                                                        <h4><a href="#">{{ $comment->client->name }}</a></h4>
                                                        <div class="clearfix"></div>
                                                        <p>{{ $comment->content }}</p>
                                                        <div class="reviews-comments-item-date">
                                                            <span class="reviews-comments-item-date-item">
                                                                <i class="far fa-calendar-check"></i>
                                                                {{ $comment->created_at->format('d M Y') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Affichage des réponses associées -->
                                                @foreach ($comment->replies as $reply)
                                                    <div class="reviews-comments-item">
                                                        <div class="review-comments-avatar">
                                                            <img src="{{ $reply->owner->picture ?? asset('images/default-avatar.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="reviews-comments-item-text smpar">
                                                            <h4>
                                                                <a href="#">
                                                                    {{ $reply->owner->name }}
                                                                    <span style="color: #ff9800;">(Propriétaire)</span>
                                                                </a>
                                                            </h4>
                                                            <div class="clearfix"></div>
                                                            <p>{{ $reply->content }}</p>
                                                            <div class="reviews-comments-item-date">
                                                                <span class="reviews-comments-item-date-item">
                                                                    <i class="far fa-calendar-check"></i>
                                                                    {{ $reply->created_at->format('d M Y') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="sec15">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Ajoutez votre commentaire</h3>
                                    </div>

                                    <!-- Vérification si un client est connecté -->
                                    @if (auth()->guard('client')->check())
                                        <!-- Affichage des messages de confirmation -->
                                        @if (session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif

                                        <!-- Formulaire de commentaire -->
                                        <div id="add-review" class="add-review-box">
                                            <form class="add-comment custom-form"
                                                action="{{ route('client.client.comment', $etablishment->id) }}"
                                                method="POST">
                                                @csrf
                                                <fieldset>
                                                    <textarea name="content" cols="40" rows="3" placeholder="Votre commentaire..." required></textarea>
                                                </fieldset>
                                                <button type="submit" class="btn big-btn color-bg float-btn">
                                                    Envoyer <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <p>Vous devez <a href="{{ route('client.login') }}">vous connecter</a> pour
                                            laisser un
                                            commentaire.</p>
                                    @endif
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- listing-single content end-->
                    <!-- sidebar -->
                    <div class="col-md-4">
                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="profile-widget">
                                <div class="profile-widget-header color-bg smpar fl-wrap">
                                    <div class="pwh_bg"></div>
                                    <div class="profile-widget-card">
                                        <div class="profile-widget-image">
                                            <img src="{{ $etablishment->owner->picture }}" alt="">
                                        </div>
                                        <div class="profile-widget-header-title">
                                            <h4><a href="#">{{ $etablishment->owner->name ?? 'Inconnu' }}</a>
                                            </h4>
                                            <div class="clearfix"></div>
                                            {{-- <div class="pwh_counter"><span>22</span>Property Listings</div> --}}
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-content fl-wrap">
                                    <div class="contats-list fl-wrap">
                                        <ul class="no-list-style">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget end -->
                    </div>
                    <!--  sidebar end-->
                </div>
                <div class="fl-wrap limit-box"></div>
            </div>
        </div>
    </div>
@endsection
