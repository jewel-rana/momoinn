@extends('layouts.front')

@section('content')
    @include('layouts.parts.front.banner')
    <div class="container">
        <div class="intro">
            <div class="row">
                <div class="col-md-6">
                    <div class="text">
                        <h1 class="tagline tagline callout animation-element test2"># Welcome to MOMOINN</h1>
                        <h2 class="tagline callout animation-element test2">Unwind The Pearl Of Luxury At MOMOINN</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="general tagline callout animation-element test2">
                        MOMOINN Beach Resort &amp; Spa is located on Inani beach, Cox's
                        Bazar with lush green hills rise from the east and endless sea
                        stretching on the west, the resort offers panoramic visuals of Bay of
                        Bengal. Nestled in the heart of nature along the world’s longest natural
                        sandy beach, the resort is spread over 15 acres, located 40 minutes
                        away from the hustle of the Cox's Bazar city with easy accessibility to
                        all the major tourist.</p>
                    <div class="gap-30"></div>
                    <p class="general tagline callout animation-element test2">Apart
                        from luxurious rooms &amp; suites and two swimming pools (one
                        exclusively for ladies) the resort boasts of a plethora of indoor &amp;
                        outdoor activities for both adults and kids which include an
                        internationally acclaimed water park, tennis &amp; badminton courts, 3D
                        movie hall, billiards, amphitheater, a luxurious spa and a
                        well-appointed gym.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="video-holder">
                <img src="{{ asset('assets/front/img/rt004.jpg')}}">
            </div>
            <div class="overlay">
                <a id="play-video" class="video-play-button popup-xs popup-vt"
                   href="#vtours/swimming-pool-mixed/index.html"
                   data-xs-href="vtours-xs/index.html?panorama=images/swimming-pool-mixed.jpg&amp;iframe=true">
                    <span></span>
                </a>
            </div>
            <div class="video-text">
                <!-- <h4>Experience the MOMOINNHotel</h4> -->
            </div>

        </div>
    </div>

    <div class="container">
        <div class="intro">
            <div class="row">
                <div class="col-md-6">
                    <div class="text">
                        <h2 class="tagline callout animation-element test2">STAY WITH LUXURY AT MOMOINN </h2>
                    </div>
                </div>
                <div class="offset-md-1 col-md-5">
                    <p class="general tagline callout animation-element test2">Royal
                        Tulip MOMOINN Beach Resort offers 493 luxuriously appointed rooms
                        &amp; suites with comfort of kitchenette, branded amenities, and
                        balconies with panoramic view of sea and hill.</p>
                    <button class="btn-1"><span class="btn-1"><a href="#rooms-suites.php"
                                                                 class="btn-1">Discover More</a></span></button>
                </div>
            </div>
        </div>
    </div>


    <div>
        <div class="room-list">
            <div class="row">
                <div class="col-md-12">

                    <div class="carousel-wrap">
                        <div class="owl-carousel owl-loaded owl-drag" id="room-list">


                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                     style="transform: translate3d(-2710px, 0px, 0px); transition: all 0s ease 0s; width: 10298px;">
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#executive-suite-sea.php">
                                                <img src="{{ asset('assets/front/img/5203-ess.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Executive Suite Sea</h4>
                                                    <p>720 sft area in the Executive Suite gives the guests cherish feeling
                                                        of living.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#executive-suite-hill.php">
                                                <img src="{{ asset('assets/front/img/executive-suite-hill.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Executive Suite Hill</h4>
                                                    <p>720 sft area in the Executive Suite gives the guests cherish feeling
                                                        of living.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#royal-family-suite.php">
                                                <img src="{{ asset('assets/front/img/3317-rfs.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Royal Family Suite</h4>
                                                    <p>1050 sft. 2 bedrooms suites mirror the warmth of a home.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#royal-paradise-suite.php">
                                                <img src="{{ asset('assets/front/img/royal-paradise-suite.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Royal Paradise Suite</h4>
                                                    <p>2020 sft. 2 bedrooms suites mirror the warmth of a home.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#presidential-suite.php">
                                                <img src="{{ asset('assets/front/img/presidential-suite.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Presidential Suite</h4>
                                                    <p>2500 sft. 2 bedrooms suites mirror the warmth of a home.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a href="#superior-hill.php">
                                                <img src="{{ asset('assets/front/img/superior-hill.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="tagline callout animation-element test2">Superior Hill</h4>
                                                    <p>Functionality and individuality are the essence of 400 sft wide
                                                        Superior Hill View.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a href="#superior-sea.php">
                                                <img src="{{ asset('assets/front/img/2409-sps.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="tagline callout animation-element test2">Superior King-
                                                        Garden View</h4>
                                                    <p>Functionality and individuality are the essence of 400sft wide
                                                        Superior King - Garden View</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a href="#premier.php">
                                                <img src="{{ asset('assets/front/img/3501-premier-new.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Premier (Sea View)</h4>
                                                    <p>690 sft wide Premier room involves and offers most relaxation of the
                                                        guests.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#executive-suite-sea.php">
                                                <img src="{{ asset('assets/front/img/5203-ess.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Executive Suite Sea</h4>
                                                    <p>720 sft area in the Executive Suite gives the guests cherish feeling
                                                        of living.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#executive-suite-hill.php">
                                                <img src="{{ asset('assets/front/img/executive-suite-hill.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Executive Suite Hill</h4>
                                                    <p>720 sft area in the Executive Suite gives the guests cherish feeling
                                                        of living.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#royal-family-suite.php">
                                                <img src="{{ asset('assets/front/img/3317-rfs.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Royal Family Suite</h4>
                                                    <p>1050 sft. 2 bedrooms suites mirror the warmth of a home.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#royal-paradise-suite.php">
                                                <img src="{{ asset('assets/front/img/royal-paradise-suite.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Royal Paradise Suite</h4>
                                                    <p>2020 sft. 2 bedrooms suites mirror the warmth of a home.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#presidential-suite.php">
                                                <img src="{{ asset('assets/front/img/presidential-suite.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Presidential Suite</h4>
                                                    <p>2500 sft. 2 bedrooms suites mirror the warmth of a home.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a href="#superior-hill.php">
                                                <img src="{{ asset('assets/front/img/superior-hill.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="tagline callout animation-element test2">Superior Hill</h4>
                                                    <p>Functionality and individuality are the essence of 400 sft wide
                                                        Superior Hill View.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a href="#superior-sea.php">
                                                <img src="{{ asset('assets/front/img/2409-sps.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="tagline callout animation-element test2">Superior King-
                                                        Garden View</h4>
                                                    <p>Functionality and individuality are the essence of 400sft wide
                                                        Superior King - Garden View</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a href="#premier.php">
                                                <img src="{{ asset('assets/front/img/3501-premier-new.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Premier (Sea View)</h4>
                                                    <p>690 sft wide Premier room involves and offers most relaxation of the
                                                        guests.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 532px; margin-right: 10px;">
                                        <div class="item"><a
                                                href="#executive-suite-sea.php">
                                                <img src="{{ asset('assets/front/img/5203-ess.jpg')}}">
                                                <div class="holder">
                                                    <h4 class="callout animation-element test2">Executive Suite Sea</h4>
                                                    <p>720 sft area in the Executive Suite gives the guests cherish feeling
                                                        of living.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav">
                                <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                            <div class="owl-dots">
                                <div class="owl-dot active"><span></span></div>
                                <div class="owl-dot"><span></span></div>
                                <div class="owl-dot"><span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="facility">
        <div class="intro introbot">
            <div class="container">
                <div class="holder-facility">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text">
                                <h2 class="tagline callout animation-element test2">INTERNATIONAL STANDARD WITH LOCAL
                                    FLAVOURS</h2>
                            </div>
                        </div>
                        <div class="offset-md-1 col-md-5">
                            <p class="general tagline callout animation-element test2">The
                                MOMOINN Cox’s Bazar provides two swimming pools, one exclusively for
                                ladies. The resort boasts of a plethora of indoor &amp; outdoor
                                activities for both adults and kids which include an internationally
                                acclaimed water park, tennis &amp; badminton courts, 3D movie hall,
                                billiards, amphitheater, a luxurious spa and a well-appointed gym. </p>
                            <div class="gap-30"></div>
                            <p class="general tagline callout animation-element test2">The
                                MOMOINN Cox’s Bazar also offers a stunning range of Banqueting &amp;
                                Conferencing options for all your needs. Our selection of restaurants
                                and bars will leave you spoilt for choice with 5 specialty restaurants, a
                                multi-cuisine all day dining with indoor &amp; alfresco seating, 2
                                well-stocked bars &amp; lounge, an ice cream parlor and a juice bar.</p>
                        </div>
                    </div>
                </div>
            </div> <!-- END Facility Primery -->

            <div class="intro-facility">
                <div class="row">
                    <div class="col-md-4">
                        <div class="type1">
                            <a href="#">
                                <img src="{{ asset('assets/front/img/rt005.jpg')}}"
                                     alt="Swimming Pool" style="height: 596px;">
                                <div class="overlay callout animation-element test3 one">
                                    <h2>Swimming Pool</h2>
                                    <p>Two separate pools right next to the beach.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="type1">
                            <a href="#">
                                <img src="{{ asset('assets/front/img/rt006.jpg')}}"
                                     alt="Convention Hall" style="height: 596px;">
                                <div class="overlay callout animation-element test3 two">
                                    <h2>Convention Hall</h2>
                                    <p>The largest convention hall in Cox’s Bazar.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4" id="third">
                        <div class="type2 gap">
                            <a href="#">
                                <img src="{{ asset('assets/front/img/rt008.jpg')}}"
                                     id="dynamic_img" alt="Restaurants">
                                <div class="overlay callout animation-element test3 two">
                                    <h2>Restaurants</h2>
                                    <p>A wide range of restaurants for gourmet dining.</p>
                                </div>
                            </a>
                        </div>
                        <div class="type2">
                            <a href="#">
                                <img src="{{ asset('assets/front/img/rt007.jpg')}}"
                                     id="dynamic_img">
                                <div class="overlay callout animation-element test3 two">
                                    <h2>Straight access to beach</h2>
                                    <p>Exclusive and secure beach- easy and straight accessible for guest.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>  <!-- END Facility Secondery -->
        </div> <!-- End Intro -->

    </div> <!-- End Facility Section -->


    <div class="container">
        <div class="offer" style="padding-bottom:5px;">
            <div class="row">
            </div>
        </div>


        <div class="offer">
            <div class="row">
            </div>
        </div>
    </div>
@endsection

@section('head')

@endsection

@section('foot')

@endsection
