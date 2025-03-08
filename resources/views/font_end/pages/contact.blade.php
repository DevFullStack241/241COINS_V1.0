@extends('font_end.layout.layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
<section class="hidden-section single-par2  " data-scrollax-parent="true">
                        <div class="bg-wrap bg-parallax-wrap-gradien">
                            <div class="bg par-elem " data-bg="images/bg/10.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;images/bg/10.jpg&quot;); transform: translateZ(0px) translateY(-3.93258%);"></div>
                        </div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <h2><span>Our Contacts</span></h2>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4>
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
                                <a href="#">Home</a> <a href="#">Pages</a><span>Contacts</span>
                            </div>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                                <div class="share-container  isShare"><a href="http://www.facebook.com/share.php?u=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fcontacts.html" class="pop share-icon share-icon-facebook"></a><a href="http://pinterest.com/pin/create/button/?url=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fcontacts.html&amp;media=&amp;description=" class="pop share-icon share-icon-pinterest"></a><a href="http://www.tumblr.com/share?v=3&amp;u=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fcontacts.html" class="pop share-icon share-icon-tumblr"></a><a href="https://twitter.com/share?via=in1.com&amp;text=Homeradar - Real Estate Listing Template" class="pop share-icon share-icon-twitter"></a><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fcontacts.html&amp;title=Homeradar - Real Estate Listing Template&amp;summary=&amp;source=in1.com" class="pop share-icon share-icon-linkedin"></a><a href="http://digg.com/submit?url=file%3A%2F%2F%2FC%3A%2FUsers%2Fjoelr%2FDownloads%2Fhomeradar.kwst.net%2Fcontacts.html&amp;title=Homeradar - Real Estate Listing Template" class="pop share-icon share-icon-digg"></a></div>
                            </div>
                        </div>
                    </div>
                    <section class="gray-bg small-padding">
                        <div class="container">
                            <div class="row">
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-envelope"></i>
                                        <h4>Our Mails <span>01</span></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                        <a href="#" class="serv-link sl-b">yourmail@domain.com</a>
                                    </div>
                                </div>
                                <!-- services-item  end-->
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-phone-rotary"></i>
                                        <h4>Our Phones<span>02</span></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                        <a href="#" class="serv-link sl-b">+7(111)123456789</a>
                                    </div>
                                </div>
                                <!-- services-item  end-->
                                <!-- services-item -->
                                <div class="col-md-4">
                                    <div class="services-item fl-wrap">
                                        <i class="fal fa-map-marked"></i>
                                        <h4>Our Adress <span>03</span></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                        <a href="#" class="serv-link sl-b">USA 27TH Brooklyn NY</a>
                                    </div>
                                </div>
                                <!-- services-item  end-->								
                            </div>
                            <div class="clearfix"></div>
                            <div class="contacts-opt fl-wrap">
                                <div class="contact-social">
                                    <span class="cs-title">Find us on: </span>
                                    <ul>
                                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn small-btn float-btn color-bg cf_btn">Write Mesagge</a>
                                <div class="contact-notifer">Or visit our <a href="help.html">  help page</a></div>
                            </div>
                            <!--box-widget  -->			
                            <div class="box-widget">
                                <div class="box-widget-title single_bwt fl-wrap   ">Office Location</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                <!--box-widget end-->
                            </div>
                            <!--box-widget-->
                            <div class="box-widget fl-wrap">
                                <div class="map-widget contacts-map fl-wrap">
                                    <div class="map-container mapC_vis">
                                        <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-infotitle="Our Loacation In NewYork" data-infotext="70 Bright St New York, USA" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon"><img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" alt="" draggable="false" style="user-select: none;"></div><div class="gm-err-title">Petit problème... Une erreur s'est produite</div><div class="gm-err-message">Google&nbsp;Maps ne s'est pas chargé correctement sur cette page. Pour plus d'informations techniques sur cette erreur, veuillez consulter la console JavaScript.</div></div></div></div></div>
                                        <div class="scrollContorl"></div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget end --> 									
                        </div>
                    </section>
@endsection
