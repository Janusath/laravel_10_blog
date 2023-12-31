<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home</title>

    <link href="//fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="website/assets/css/style-starter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- header -->
    <header class="w3l-header">
        <div class="container">
            <!--/nav-->
            <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-sm-3 px-0">
                <a> <img src="/website/assets/images/idb_logo.png" alt="Your logo" title="Your logo" style="height:70px;" />
                </a>


                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <nav class="mx-auto">

                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('home')}}">Home</a>
                            </li>

                            <li class="nav-item @@contact__active">
                                <a class="nav-link" href="{{route('event_post')}}">Event</a>
                            </li>
                            <li class="nav-item @@contact__active">
                                <a class="nav-link" href="{{route('shop')}}">Shop</a>
                            </li>
                            <li class="nav-item @@contact__active">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item @@contact__active">
                                <a class="nav-link" href="{{route('contact')}}">Contact</a>
                            </li>
                            <li class="nav-item @@contact__active">
                                <a href="{{route('entrepreneur_login')}}" class="btn btn-primary">Login</a>
                            </li>
                        </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
        </div>
        </nav>
        <!--//nav-->
    </header>
    <!-- //header -->
    <!-- /homeblock1-->


    <section class="w3l-testimonials" id="testimonials">
        <!-- main-slider -->
        <div class="testimonials pt-2 pb-5">
            <div class="container pb-lg-5">
                <div class="owl-testimonial owl-carousel owl-theme mb-md-0 mb-sm-5 mb-4">

                    <div class="item">
                        <div class="row slider-info">

                            <img src="/website/assets/images/slider_img.png" class="img-fluid radius-image-full" alt="client image">

                        </div>
                    </div>
                    <div class="item">
                        <div class="row slider-info">

                            <img src="/website/assets/images/slider_img2.png" class="img-fluid radius-image-full" alt="client image">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /main-slider -->
    </section>
 <div class="container-fluid">
    <a href="https://idb.gov.lk/"> <img class="m-2" src="website/assets/images/home2.png" alt=""></a>
</div>
    <section>


        <div class="w3l-subscribe ">
            <div class="container py-lg-5 py-md-4">
                <div class="w3l-subscribe-content text-center bg-clr-white py-md-5 py-2">
                    <div class="py-5">
                        <h3 class="section-title-left mb-2">ABOUT US</h3>
                        <p class="mb-md-5 p-4">The Industrial Development Board (IDB) is the premier state organization which comes under the Ministry of Industries. We are empowered by Industrial Development Act No.36 of 1969 and entrusted with the responsibility of developing of the Industrial Sector in Sri Lanka.</p>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <div class="container-fluid">
        <a href="https://idb.gov.lk/"> <img class="m-2 mb-5" src="website/assets/images/home1.png" alt=""></a>
</div>

    <div class="w3l-homeblock2 py-5">
        <div class="container py-lg-5 py-md-4">
            <!-- block -->
            <div class="left-right">
                <h3 class="section-title-left mb-sm-4 mb-2"> Entrepreneur</h3>
                <a href="fashiom.html" class="more btn btn-small mb-sm-0 mb-4"></a>
            </div>
            <div class="row">
                @foreach($entrepreneurUsers as $entrepreneurUser)
                @if($entrepreneurUser->entrepreneur_status == 1)

                <div class=" col-lg-4 col-md-6 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#blog-single.html">
                                <img class="card-img-bottom d-block radius-image-full" src="images/enterpreneur_images/{{ $entrepreneurUser->picture }}" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <a href="" class="blog-desc"> {{ $entrepreneurUser->ownerName }}
                            </a>
                            <div class="author align-items-center">
                                <img src="images/enterpreneur_images/{{ $entrepreneurUser->picture }}" alt="" class="img-fluid rounded-circle" />
                                <ul class="blog-meta">
                                    <li>
                                        <a class="link-underline-light" href="">{{ $entrepreneurUser->shopName }}</a> </a>
                                    </li>
                                    <li>
                                        <a class="link-underline-light" href="">{{ $entrepreneurUser->location }}</a> </a>
                                    </li>
                                    <li>
                                        <a class="link-underline-light" href="">{{ $entrepreneurUser->category }}</a> </a>
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> {{ $entrepreneurUser->created_at }} </span>. <span class="meta-value ml-2"></span>

                                        <button type="button" value="{{ $entrepreneurUser->businessReNo}}" class="editbtn1 btn btn-primary m-2" data-bs-toggle="modal">
                                           View
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <button type="button" value="{{ $entrepreneurUser->businessReNo}}" class="editbtn2 btn btn-success " data-bs-toggle="modal">
                                    Opening
                                </button>

                                <button type="button" value="{{ $entrepreneurUser->businessReNo}}" class="editbtn3 btn btn-warning" data-bs-toggle="modal">
                                 Products
                                </button>

                                <button type="button" value="{{ $entrepreneurUser->businessReNo}}" class="editbtn4 btn btn-info" data-bs-toggle="modal">
                                    Banner
                                </button>
                         </div>
                        </div>
                    </div>
                </div>

                @else
                <p>No record found</p>
                @endif
                @endforeach

            </div>
            <div class="left-right mt-4">
                <h3 class="section-title-left mb-sm-4 mb-2"></h3>
                 {{$entrepreneurUsers->links('pagination::bootstrap-4')  }}

            </div>

        </div>
    </div>
    </div>
    </div>

    <div class="w3l-homeblock2 w3l-homeblock5 py-5">
        <div class="container py-lg-5 py-md-4">
            <!-- block -->
            <div class="left-right">
                <h3 class="section-title-left mb-sm-4 mb-2"> Events</h3>
            </div>
            <div class="row">
                @foreach($events as $item)
                @if($item)
                <div class="col-lg-6 mt-4">
                    <div class="bg-clr-white hover-box">
                        <div class="row">
                            <div class="col-sm-5 position-relative">
                                <a href="#blog-single.html" class="image-mobile">
                                    <img class="card-img-bottom d-block radius-image-full" src="storage/images/admin_images/{{ $item->image }}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="col-sm-7 card-body blog-details align-self">
                                <a href="#blog-single.html" class="blog-desc">{{ $item->title }}</a>
                                <div class="author align-items-center">
                                    <img src="storage/images/admin_images/{{ $item->image }}" alt="" class="img-fluid rounded-circle" />
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="author.html">{{ $item->subTitle }}</a> </a>
                                        </li>
                                        <li class="meta-item blog-lesson">
                                            <span class="meta-value"> {{ $item->created_at }}</span>. <span class="meta-value ml-2"></span>

                                            <button type="button" value="{{ $item->id }}" class="editbtn btn btn-primary">
                                                view more
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <p>No record found</p>
                @endif
                @endforeach
                <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Event</h5>
                            </div>
                            <div class="modal-body">

                                <div class="text-center">
                                    <p class="d-inline">Date: <h6 class="d-inline" id="eventCreated_at"></h6>
                                    </p>
                                    <p class="d-inline">Title: <h6 class="d-inline" id="title"></h6>
                                    </p>
                                    <p class="d-inline">Sub Title: <h6 class="d-inline" id="subTitle"></h6>
                                    </p>
                                    <p class="d-inline">Author: <h6 class="d-inline" id="author"></h6>
                                    </p>
                                    <p class="d-inline">Category: <h6 class="d-inline" id="eventCategory"></h6>
                                    </p>
                                    <p class="d-inline">Description: <h6 class="d-inline" id="description"></h6>
                                    </p>
                                    <p class="d-inline">Image: <h6 class="d-inline" id="image"></h6>
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--entrepreneur Modal -->
                <div class="modal fade" id="entrepreneurModal" tabindex="-1" aria-labelledby="entrepreneurModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="entrepreneurModalLabel">Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <p class="d-inline">Date: <h6 class="d-inline" id="created_at"></h6>
                                    </p>
                                    <p class="d-inline">Owner Name: <h6 class="d-inline" id="ownerName"></h6>
                                    </p>
                                    <p class="d-inline">Shop Name: <h6 class="d-inline" id="shopName"></h6>
                                    </p>
                                    <p class="d-inline">location: <h6 class="d-inline" id="location"></h6>
                                    </p>
                                    <p class="d-inline">Category: <h6 class="d-inline" id="category"></h6>
                                    </p>
                                    <p class="d-inline">Phone No: <h6 class="d-inline" id="phoneNo"></h6>
                                    </p>
                                    <p class="d-inline">Email: <h6 class="d-inline" id="email"></h6>
                                    </p>
                                    <p class="d-inline">Image: <h6 class="d-inline" id="picture"></h6>
                                    </p>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--productModal Modal -->
                <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel"> Product Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="products"></div> {{--this is come from ajax for loop all record --}}

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--timeslotModal Modal -->
                <div class="modal fade" id="timeslotModal" tabindex="-1" aria-labelledby="timeslotModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="timeslotModalLabel"> Timeslot Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="timeslots"></div> {{--this is come from ajax for loop all record --}}
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--bannerModal Modal -->
                <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bannerModalLabel"> Product Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="banners"></div> {{--this is come from ajax for loop all record --}}

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-right mt-4">
                    <h3 class="section-title-left mb-sm-4 mb-2 "></h3>
                    {{$events->links('pagination::bootstrap-4')  }}
                </div>

            </div>
        </div>
    </div>



    <!-- footer-28 block -->
    <section class="app-footer">
        <footer class="footer-28 py-5">
            <div class="footer-bg-layer">
                <div class="container py-lg-3">
                    <div class="row footer-top-28">
                        <div class="col-lg-4 footer-list-28 copy-right mb-lg-0 mb-sm-5 mt-sm-0 mt-4">
                            <a class="navbar-brand mb-3" href="index.html">
                                <span class="fa fa-newspaper-o"></span> vidya</a>
                            <p class="copy-footer-28"> © 2020. All Rights Reserved. </p>
                            <h5 class="mt-2">Design by <a href="#">vidya</a></h5>
                        </div>
                        <div class="col-lg-8 row">
                            <div class="col-sm-4 col-6 footer-list-28">
                                <h6 class="footer-title-28">Useful links</h6>
                                <ul>
                                    <li><a href="#categories">food blogs</a></li>
                                    <li><a href="#advertise">Advertise with us</a></li>
                                    <li><a href="#authors">Our Authors</a></li>
                                    <li><a href="contact.html">Get in touch</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-6 footer-list-28">
                                <h6 class="footer-title-28">Categories</h6>
                                <ul>
                                    <li><a href="beauty.html">Beauty</a></li>
                                    <li><a href="fashion.html">Fashion and Style</a></li>
                                    <li><a href="#food"> Food and Wellness</a></li>
                                    <li><a href="#lifestyle">Lifestyle</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-6 footer-list-28 mt-sm-0 mt-4">
                                <h6 class="footer-title-28">Social Media</h6>
                                <ul class="social-icons">
                                    <li class="facebook">
                                        <a href="#facebook"><span class="fa fa-facebook"></span> Facebook</a></li>
                                    <li class="twitter"> <a href="#twitter"><span class="fa fa-twitter"></span> Twitter</a></li>
                                    <li class="linkedin"> <a href="#linkedin"><span class="fa fa-linkedin"></span> Linkedin</a></li>
                                    <li class="dribbble"><a href="#dribbble"><span class="fa fa-dribbble"></span> Dribbble</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </footer>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fa fa-angle-up"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

        </script>
        <!-- /move top -->
    </section>
    <!-- //footer-28 block -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });

    </script>
    <!-- disable body scroll which navbar is in active -->

    <!-- Template JavaScript -->


    <!-- theme changer js -->
    <script src="website/assets/js/theme-change.js"></script>
    <!-- //theme changer js -->

    <!-- courses owlcarousel -->
    <script src="website/assets/js/owl.carousel.js"></script>

    <!-- script for testimonials -->
    <script>
        $(document).ready(function() {
            $('.owl-testimonial').owlCarousel({
                loop: true
                , margin: 0
                , nav: true
                , responsiveClass: true
                , autoplay: false
                , autoplayTimeout: 5000
                , autoplaySpeed: 1000
                , autoplayHoverPause: false
                , responsive: {
                    0: {
                        items: 1
                        , nav: false
                    }
                    , 480: {
                        items: 1
                        , nav: false
                    }
                    , 667: {
                        items: 1
                        , nav: true
                    }
                    , 1000: {
                        items: 1
                        , nav: true
                    }
                }
            })
        })

    </script>
    <!-- //script for testimonials -->

    <!-- bootstrap -->
    <script src="website/assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

<!-- Template Javascript -->
<script src="website/website/assets/js/main.js"></script>
@include('website.home_ajax');
</body>
</html>

