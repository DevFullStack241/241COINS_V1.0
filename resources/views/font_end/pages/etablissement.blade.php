@extends('font_end.layout.layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <section class="hidden-section single-par2  " data-scrollax-parent="true">
        <div class="bg-wrap bg-parallax-wrap-gradien">
            <div class="bg par-elem " data-bg="images/bg/11.jpg" data-scrollax="properties: { translateY: '30%' }"
                style="background-image: url(&quot;images/bg/11.jpg&quot;); transform: translateZ(0px) translateY(-3.93258%);">
            </div>
        </div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>About Us</span></h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.
                </h4>
            </div>
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down To Discover</span>
            </div>
        </div>
    </section>
    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
        <div class="container">
            <div class="breadcrumbs-list">
                <a href="#">Home</a> <span>About</span>
            </div>
            <div class="share-holder hid-share">
                <a href="#" class="share-btn showshare sfcs"> <i class="fas fa-share-alt"></i> Share </a>
                <div class="share-container  isShare"><a
                        href="http://www.facebook.com/share.php?u=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fabout.html"
                        class="pop share-icon share-icon-facebook"></a><a
                        href="http://pinterest.com/pin/create/button/?url=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fabout.html&amp;media=&amp;description="
                        class="pop share-icon share-icon-pinterest"></a><a
                        href="http://www.tumblr.com/share?v=3&amp;u=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fabout.html"
                        class="pop share-icon share-icon-tumblr"></a><a
                        href="https://twitter.com/share?via=in1.com&amp;text=Homeradar - Real Estate Listing Template"
                        class="pop share-icon share-icon-twitter"></a><a
                        href="http://www.linkedin.com/shareArticle?mini=true&amp;url=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fabout.html&amp;title=Homeradar - Real Estate Listing Template&amp;summary=&amp;source=in1.com"
                        class="pop share-icon share-icon-linkedin"></a><a
                        href="http://digg.com/submit?url=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fabout.html&amp;title=Homeradar - Real Estate Listing Template"
                        class="pop share-icon share-icon-digg"></a></div>
            </div>
        </div>
    </div>
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
                <div class="col-md-8">
                    <div class="listing-filters gallery-filters">
                        <a href="#" class="gallery-filter gallery-filter-active" data-filter="*">
                            <span>Tous Catégories</span>
                        </a>
                        @foreach ($categories as $category)
                            <a href="#" class="gallery-filter" data-filter=".{{ Str::slug($category->name) }}">
                                <span>{{ $category->name }}</span>
                            </a>
                        @endforeach
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
                                    <a href="#" class="geodir_save-btn tolt" data-microtip-position="left"
                                        data-tooltip="Save"><span><i class="fal fa-heart"></i></span></a>
                                    <a href="#" class="compare-btn tolt" data-microtip-position="left"
                                        data-tooltip="Compare"><span><i class="fal fa-random"></i></span></a>
                                </div>
                                <div class="geodir-category-content fl-wrap">
                                    <h3 class="title-sin_item"><a
                                            href="{{ route('etablishment.detail', $etablishment->id) }}">{{ $etablishment->name }}</a>
                                    </h3>
                                    <div class="geodir-category-content_price">{{ $etablishment->status }}</div>

                                    <div class="geodir-category-content-details">
                                        <p>{{ $etablishment->description }}</p>
                                    </div>
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
            @if ($etablishments->hasPages())
                <div class="pagination">
                    {{-- Lien Précédent --}}
                    @if ($etablishments->onFirstPage())
                        <a href="#" class="prevposts-link disabled"><i class="fa fa-caret-left"></i></a>
                    @else
                        <a href="{{ $etablishments->previousPageUrl() }}" class="prevposts-link"><i
                                class="fa fa-caret-left"></i></a>
                    @endif

                    {{-- Liens Numériques --}}
                    @foreach ($etablishments->getUrlRange(1, $etablishments->lastPage()) as $page => $url)
                        @if ($page == $etablishments->currentPage())
                            <a href="#" class="current-page">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Lien Suivant --}}
                    @if ($etablishments->hasMorePages())
                        <a href="{{ $etablishments->nextPageUrl() }}" class="nextposts-link"><i
                                class="fa fa-caret-right"></i></a>
                    @else
                        <a href="#" class="nextposts-link disabled"><i class="fa fa-caret-right"></i></a>
                    @endif
                </div>
            @endif

        </div>
    </section>
    <!-- section end-->


@endsection
