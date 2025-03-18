@extends('back.layouts.dash_owner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="content">
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Vue</span></div>
            @livewire('admin-owner-client-header-profile-info')
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

        <div class="gray-bg small-padding fl-wrap">
            <div class="container">
                <div class="row2">
                    <!--  listing-single content -->
                    <div class="col-md-12">
                        <div class="list-single-main-wrapper fl-wrap">

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
                                        <h3><span></span></h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        @foreach ($etablishment->comments as $comment)
                                            <div class="reviews-comments-wrap fl-wrap">

                                                <!-- Commentaire principal -->
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="{{ $comment->client->picture ?? asset('images/default-avatar.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="reviews-comments-item-text smpar">
                                                        <div class="box-widget-menu-btn smact"><i
                                                                class="far fa-ellipsis-h"></i></div>
                                                        <div class="show-more-snopt-tooltip bxwt">
                                                            @if (Auth::guard('owner')->check())
                                                                <a href="#" class="btn btn-outline-secondary"
                                                                    onclick="toggleReplyForm({{ $comment->id }})">
                                                                    <i class="fas fa-reply"></i> Répondre
                                                                </a>

                                                                <form id="reply-form-{{ $comment->id }}"
                                                                    action="{{ route('owner.owner.reply', ['id' => $comment->id]) }}"
                                                                    method="POST" class="reply-form"
                                                                    style="display: none;">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <textarea name="content" rows="6" required class="form-control" placeholder="Votre réponse..."></textarea>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm">Envoyer</button>
                                                                </form>
                                                            @endif
                                                        </div>

                                                        <!-- CSS -->
                                                        <style>
                                                            .reply-form {
                                                                margin-top: 15px;
                                                                background-color: #f9f9f9;
                                                                padding: 20px;
                                                                border-radius: 8px;
                                                                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                                                                transition: all 0.3s ease;
                                                                width: 100%;
                                                                max-width: 600px;
                                                                /* Limite la largeur du formulaire */
                                                            }

                                                            .reply-form .form-group {
                                                                margin-bottom: 20px;
                                                            }

                                                            .reply-form textarea {
                                                                border: 1px solid #ccc;
                                                                border-radius: 5px;
                                                                padding: 12px;
                                                                width: 100%;
                                                                font-size: 16px;
                                                                resize: vertical;
                                                                min-height: 150px;
                                                                /* Augmente la hauteur minimale du champ de texte */
                                                            }

                                                            .reply-form button {
                                                                background-color: #007bff;
                                                                border: none;
                                                                color: white;
                                                                padding: 10px 20px;
                                                                border-radius: 5px;
                                                                cursor: pointer;
                                                                transition: background-color 0.3s;
                                                                font-size: 16px;
                                                            }

                                                            .reply-form button:hover {
                                                                background-color: #0056b3;
                                                            }

                                                            .btn-outline-secondary {
                                                                font-size: 16px;
                                                                padding: 8px 16px;
                                                                border-radius: 4px;
                                                                border: 1px solid #ccc;
                                                                color: #333;
                                                                transition: background-color 0.3s;
                                                            }

                                                            .btn-outline-secondary:hover {
                                                                background-color: #f0f0f0;
                                                            }
                                                        </style>

                                                        <h4>
                                                            <a href="#">
                                                                {{ $comment->client ? $comment->client->name : $comment->owner->name }}
                                                            </a>
                                                        </h4>
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
                                                <!-- Réponses (si elles existent) -->
                                                @foreach ($comment->replies as $reply)
                                                    <div class="reviews-comments-item">
                                                        <div class="review-comments-avatar">
                                                            <img src="{{ $reply->owner->picture ?? asset('images/default-avatar.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="reviews-comments-item-text smpar">
                                                            <h4><a href="#">{{ $reply->owner->name }}</a></h4>
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
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- listing-single content end-->


                </div>


            </div>
        </div>
    </div>
    <script>
        function toggleReplyForm(commentId) {
            var form = document.getElementById('reply-form-' + commentId);
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>

@endsection
