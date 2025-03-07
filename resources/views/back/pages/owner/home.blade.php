@extends('back.layouts.dash_owner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Dashboard</span></div>
            @livewire('admin-owner-client-header-profile-info')
        </div>
        <!-- dashboard-title end -->
        <div class="dasboard-wrapper fl-wrap no-pag">
            <div class="dashboard-stats-container fl-wrap">
                <div class="row">
                    <!--dashboard-stats-->
                    <div class="col-md-3">
                        <div class="dashboard-stats fl-wrap">
                            <i class="fal fa-map-marked"></i>
                            <h4>Active Listings</h4>
                            <div class="dashboard-stats-count">124</div>
                        </div>
                    </div>
                    <!-- dashboard-stats end -->
                    <!--dashboard-stats-->
                    <div class="col-md-3">
                        <div class="dashboard-stats fl-wrap">
                            <i class="fal fa-chart-bar"></i>
                            <h4>Listing Views</h4>
                            <div class="dashboard-stats-count">1056<span>(<strong>+356</strong> this
                                    week)</span></div>
                        </div>
                    </div>
                    <!-- dashboard-stats end -->
                    <!--dashboard-stats-->
                    <div class="col-md-3">
                        <div class="dashboard-stats fl-wrap">
                            <i class="fal fa-comments-alt"></i>
                            <h4>Your Reviews</h4>
                            <div class="dashboard-stats-count">357<span>(<strong>+12</strong> this
                                    week)</span></div>
                        </div>
                    </div>
                    <!-- dashboard-stats end -->
                    <!--dashboard-stats-->
                    <div class="col-md-3">
                        <div class="dashboard-stats fl-wrap">
                            <i class="fal fa-heart"></i>
                            <h4>Times Bookmarked</h4>
                            <div class="dashboard-stats-count">2329<span>(<strong>+234</strong> this
                                    week)</span></div>
                        </div>
                    </div>
                    <!-- dashboard-stats end -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-listings-wrap fl-wrap">
                        <div class="row">
                            <!-- dashboard-listings-item-->
                            <div class="col-md-6">
                                <div class="dashboard-listings-item fl-wrap">
                                    <div class="dashboard-listings-item_img">
                                        <div class="bg-wrap">
                                            <div class="bg  " data-bg="images/all/3.jpg"
                                                style="background-image: url(&quot;images/all/3.jpg&quot;);">
                                            </div>
                                        </div>
                                        <div class="overlay"></div>
                                        <a href="listing-single.html" class="color-bg">View</a>
                                    </div>
                                    <div class="dashboard-listings-item_content">
                                        <h4><a href="listing-single.html">Gorgeous House For Sale</a></h4>
                                        <div class="geodir-category-location">
                                            <a href="#"><i class="fas fa-map-marker-alt"></i> <span>
                                                    70 Bright St New York,
                                                    USA</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="listing-rating card-popup-rainingvis tolt"
                                            data-microtip-position="right" data-tooltip="Good" data-starrating2="4"><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <div class="card-popup-rainingvis_bg"><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="dashboard-listings-item_opt">
                                            <span class="viewed-counter"><i class="fas fa-eye"></i> Viewed
                                                - 645 </span>
                                            <ul>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Edit"><i class="far fa-edit"></i></a></li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Disable"><i class="far fa-signal-alt-slash"></i></a>
                                                </li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Delete"><i class="far fa-trash-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-listings-item end-->
                            <!-- dashboard-listings-item-->
                            <div class="col-md-6">
                                <div class="dashboard-listings-item fl-wrap">
                                    <div class="dashboard-listings-item_img">
                                        <div class="bg-wrap">
                                            <div class="bg  " data-bg="images/all/1.jpg"
                                                style="background-image: url(&quot;images/all/1.jpg&quot;);">
                                            </div>
                                        </div>
                                        <div class="overlay"></div>
                                        <a href="listing-single.html" class="color-bg">View</a>
                                    </div>
                                    <div class="dashboard-listings-item_content">
                                        <h4><a href="listing-single.html">Luxury Family Home</a></h4>
                                        <div class="geodir-category-location">
                                            <a href="#"><i class="fas fa-map-marker-alt"></i> <span>
                                                    40 Journal Square , NJ,
                                                    USA</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="listing-rating card-popup-rainingvis tolt"
                                            data-microtip-position="right" data-tooltip="Excellent" data-starrating2="5"><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i>
                                            <div class="card-popup-rainingvis_bg"><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="dashboard-listings-item_opt">
                                            <span class="viewed-counter"><i class="fas fa-eye"></i> Viewed
                                                - 247 </span>
                                            <ul>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Edit"><i class="far fa-edit"></i></a></li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Disable"><i class="far fa-signal-alt-slash"></i></a>
                                                </li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Delete"><i class="far fa-trash-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-listings-item end-->
                            <!-- dashboard-listings-item-->
                            <div class="col-md-6">
                                <div class="dashboard-listings-item fl-wrap">
                                    <div class="dashboard-listings-item_img">
                                        <div class="bg-wrap">
                                            <div class="bg  " data-bg="images/all/9.jpg"
                                                style="background-image: url(&quot;images/all/9.jpg&quot;);">
                                            </div>
                                        </div>
                                        <div class="overlay"></div>
                                        <a href="listing-single.html" class="color-bg">View</a>
                                    </div>
                                    <div class="dashboard-listings-item_content">
                                        <h4><a href="listing-single.html">Family House for Rent</a></h4>
                                        <div class="geodir-category-location">
                                            <a href="#"><i class="fas fa-map-marker-alt"></i> <span>
                                                    34-42 Montgomery St ,
                                                    NY, USA</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="listing-rating card-popup-rainingvis tolt"
                                            data-microtip-position="right" data-tooltip="Good" data-starrating2="4"><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <div class="card-popup-rainingvis_bg"><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="dashboard-listings-item_opt">
                                            <span class="viewed-counter"><i class="fas fa-eye"></i> Viewed
                                                - 24 </span>
                                            <ul>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Edit"><i class="far fa-edit"></i></a></li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Disable"><i class="far fa-signal-alt-slash"></i></a>
                                                </li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Delete"><i class="far fa-trash-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-listings-item end-->
                            <!-- dashboard-listings-item-->
                            <div class="col-md-6">
                                <div class="dashboard-listings-item fl-wrap">
                                    <div class="dashboard-listings-item_img">
                                        <div class="bg-wrap">
                                            <div class="bg  " data-bg="images/all/6.jpg"
                                                style="background-image: url(&quot;images/all/6.jpg&quot;);">
                                            </div>
                                        </div>
                                        <div class="overlay"></div>
                                        <a href="listing-single.html" class="color-bg">View</a>
                                    </div>
                                    <div class="dashboard-listings-item_content">
                                        <h4><a href="listing-single.html">Contemporary Apartment</a></h4>
                                        <div class="geodir-category-location">
                                            <a href="#"><i class="fas fa-map-marker-alt"></i> <span>
                                                    W 85th St, New York,
                                                    USA</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="listing-rating card-popup-rainingvis tolt"
                                            data-microtip-position="right" data-tooltip="Excellent" data-starrating2="5">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i>
                                            <div class="card-popup-rainingvis_bg"><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="dashboard-listings-item_opt">
                                            <span class="viewed-counter"><i class="fas fa-eye"></i> Viewed
                                                - 921 </span>
                                            <ul>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Edit"><i class="far fa-edit"></i></a></li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Disable"><i class="far fa-signal-alt-slash"></i></a>
                                                </li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Delete"><i class="far fa-trash-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-listings-item end-->
                            <!-- dashboard-listings-item-->
                            <div class="col-md-6">
                                <div class="dashboard-listings-item fl-wrap">
                                    <div class="dashboard-listings-item_img">
                                        <div class="bg-wrap">
                                            <div class="bg  " data-bg="images/all/5.jpg"
                                                style="background-image: url(&quot;images/all/5.jpg&quot;);">
                                            </div>
                                        </div>
                                        <div class="overlay"></div>
                                        <a href="listing-single.html" class="color-bg">View</a>
                                    </div>
                                    <div class="dashboard-listings-item_content">
                                        <h4><a href="listing-single.html">Kayak Point House</a></h4>
                                        <div class="geodir-category-location">
                                            <a href="#"><i class="fas fa-map-marker-alt"></i> <span>
                                                    75 Prince St, NY,
                                                    USA</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="listing-rating card-popup-rainingvis tolt"
                                            data-microtip-position="right" data-tooltip="Average" data-starrating2="3"><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i>
                                            <div class="card-popup-rainingvis_bg"><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="dashboard-listings-item_opt">
                                            <span class="viewed-counter"><i class="fas fa-eye"></i> Viewed
                                                - 434 </span>
                                            <ul>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Edit"><i class="far fa-edit"></i></a></li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Disable"><i class="far fa-signal-alt-slash"></i></a>
                                                </li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Delete"><i class="far fa-trash-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-listings-item end-->
                            <!-- dashboard-listings-item-->
                            <div class="col-md-6">
                                <div class="dashboard-listings-item fl-wrap">
                                    <div class="dashboard-listings-item_img">
                                        <div class="bg-wrap">
                                            <div class="bg  " data-bg="images/all/8.jpg"
                                                style="background-image: url(&quot;images/all/8.jpg&quot;);">
                                            </div>
                                        </div>
                                        <div class="overlay"></div>
                                        <a href="listing-single.html" class="color-bg">View</a>
                                    </div>
                                    <div class="dashboard-listings-item_content">
                                        <h4><a href="listing-single.html">Urban House</a></h4>
                                        <div class="geodir-category-location">
                                            <a href="#"><i class="fas fa-map-marker-alt"></i> <span>
                                                    70 Bright St, Jersey
                                                    City, NJ USA</span></a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="listing-rating card-popup-rainingvis tolt"
                                            data-microtip-position="right" data-tooltip="Excellent" data-starrating2="5">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i>
                                            <div class="card-popup-rainingvis_bg"><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span><span
                                                    class="card-popup-rainingvis_bg_item"></span>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="dashboard-listings-item_opt">
                                            <span class="viewed-counter"><i class="fas fa-eye"></i> Viewed
                                                - 244 </span>
                                            <ul>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Edit"><i class="far fa-edit"></i></a></li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Disable"><i class="far fa-signal-alt-slash"></i></a>
                                                </li>
                                                <li><a href="#" class="tolt" data-microtip-position="top-left"
                                                        data-tooltip="Delete"><i class="far fa-trash-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-listings-item end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
