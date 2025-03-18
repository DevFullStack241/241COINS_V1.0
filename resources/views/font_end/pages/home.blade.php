@extends('font_end.layout.layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <section class="hero-section gray-bg">
        <div class="bg-wrap">
            <div class="half-hero-bg-media full-height">
                <div class="slider-progress-bar">
                    <span>
                        <svg class="circ" width="30" height="30">
                            <circle class="circ2" cx="15" cy="15" r="13" stroke="rgba(255,255,255,0.4)"
                                stroke-width="1" fill="none" />
                            <circle class="circ1" cx="15" cy="15" r="13" stroke="#fff" stroke-width="2"
                                fill="none" />
                        </svg>
                    </span>
                </div>
                <div class="slideshow-container">
                    <!-- slideshow-item -->
                    <div class="slideshow-item">
                        <div class="bg" data-bg="{{ asset('font_end/assets/images/bg/19.jpg') }}"></div>
                    </div>
                    <!--  slideshow-item end  -->
                    <!-- slideshow-item -->
                    <div class="slideshow-item">
                        <div class="bg" data-bg="{{ asset('font_end/assets/images/bg/12.jpg') }}"></div>
                    </div>
                    <!--  slideshow-item end  -->
                    <!-- slideshow-item -->
                    <div class="slideshow-item">
                        <div class="bg" data-bg="{{ asset('font_end/assets/images/bg/17.jpg') }}"></div>
                    </div>
                    <!--  slideshow-item end  -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="hero-title hero-title_small">
                <h4>Un seul endroit pour tous vos besoins</h4>
                <h2>Restaurants, entreprises, fast-foods, agences... <br>
                    Trouvez l’établissement parfait en quelques clics !
                </h2>
            </div>
        </div>
    </section>
    <!--  section  end-->
    <!-- breadcrumbs-->
    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
        <div class="container">

        </div>
    </div>
    <!-- breadcrumbs end -->
    <!-- section -->
    <section class="gray-bg small-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="section-title fl-wrap">
                        <h4>Parcourir les offres spéciales</h4>
                        <h2>Derniers établissements</h2>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- grid-item-holder-->
            <div class="grid-item-holder gallery-items gisp fl-wrap">
                @foreach ($etablishments as $etablishment)
                    <!-- gallery-item-->
                    <div class="gallery-item for_rent">
                        <!-- listing-item -->
                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img fl-wrap">
                                    <a href="" class="geodir-category-img_item">
                                        @if ($etablishment->cover_image)
                                            <img src="{{ asset('storage/' . $etablishment->cover_image) }}" alt="">
                                        @endif
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="geodir-category-location">
                                        <a href="#" class="single-map-item tolt" data-newlatitude="40.94982541"
                                            data-newlongitude="-73.84357452" data-microtip-position="top-left"
                                            data-tooltip="On the map"><i class="fas fa-map-marker-alt"></i> <span>
                                                {{ $etablishment->address }}</span></a>
                                    </div>
                                    <ul class="list-single-opt_header_cat">
                                        <li><a href="#"
                                                class="cat-opt color-bg">{{ $etablishment->category->name ?? 'Non spécifié' }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="geodir-category-content fl-wrap">
                                    <h3 class="title-sin_item"><a
                                            href="{{ route('etablishment.detail', $etablishment->id) }}">{{ $etablishment->name }}</a>
                                    </h3>
                                    <div class="geodir-category-content_price">{{ $etablishment->status }}</div>

                                    
                                    <div class="geodir-category-footer fl-wrap">
                                        <a href="#" class="gcf-company">
                                            <img src="{{ $etablishment->owner->picture }}" alt="">
                                            <span>By {{ $etablishment->owner->name ?? 'Inconnu' }}</span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- listing-item end-->
                    </div>
                @endforeach
                <!-- gallery-item end-->
            </div>
            <!-- grid-item-holder-->
            <a href="{{ route('etablissement') }}" class="btn float-btn small-btn color-bg">Voir tous les
                établissements</a>
        </div>
    </section>
    <!-- section end-->
    <!-- section -->
    <section class="color-bg small-padding">
        <div class="container">
            <div class="main-facts fl-wrap">
                <!-- inline-facts  -->
                <div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="{{ $totalCategories }}">0</div>
                            </div>
                        </div>
                        <h6>Nombre de catégories</h6>
                    </div>
                </div>
                <!-- inline-facts end -->
                <!-- inline-facts  -->
                <div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="{{ $totalEtablishments }}">0</div>
                            </div>
                        </div>
                        <h6>Nombre d'établissements</h6>
                    </div>
                </div>
                <!-- inline-facts end -->
                <!-- inline-facts  -->
                <div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="{{ $totalClients }}">0</div>
                            </div>
                        </div>
                        <h6>Nombre de clients</h6>
                    </div>
                </div>
                <!-- inline-facts end -->
                <!-- inline-facts  -->
                <div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="{{ $totalOwners }}">0</div>
                            </div>
                        </div>
                        <h6>Nombre de propriétaires</h6>
                    </div>
                </div>
                <!-- inline-facts end -->
            </div>
        </div>
        <div class="svg-bg">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
                <defs>
                    <lineargradient id="bg">
                        <stop offset="0%" style="stop-color:rgba(255, 255, 255, 0.6)"></stop>
                        <stop offset="50%" style="stop-color:rgba(255, 255, 255, 0.1)"></stop>
                        <stop offset="100%" style="stop-color:rgba(255, 255, 255, 0.6)"></stop>
                    </lineargradient>
                    <path id="wave" stroke="url(#bg)" fill="none"
                        d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
                                                                                                                                                                                                                                                                            s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
                </defs>
                <g>
                    <use xlink:href="#wave">
                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="10s"
                            calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                            keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                    </use>
                    <use xlink:href="#wave">
                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                            calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                            keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                    </use>
                    <use xlink:href="#wave">
                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                            calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                            keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                    </use>
                    <use xlink:href="#wave">
                        <animatetransform attributeName="transform" attributeType="XML" type="translate" dur="12s"
                            calcMode="spline" values="0 240;140 200;0 230" keyTimes="0; .4; 1"
                            keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                    </use>
                </g>
            </svg>
        </div>
    </section>
    <!-- section end-->
    <!-- section -->
    <section class="gray-bg ">

        <div class="container">
            <div class="section-title st-center fl-wrap">
                
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="testimonials-slider-wrap">

            <div class="testimonials-slider">
                @foreach ($clients as $client)
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item fl-wrap">
                            <div class="text-carousel-item-header fl-wrap">
                                <div class="popup-avatar"><img src="{{ $client->picture }}" alt=""></div>
                                <div class="review-owner fl-wrap">{{ $client->name }}</div>
                                <div class="text-carousel-content fl-wrap">
                                    <p>{{ $client->profession }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--slick-item end -->
                @endforeach
            </div>

        </div>

    </section>
@endsection
