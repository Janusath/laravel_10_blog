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

    <title>Event</title>

    <link href="//fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="website/assets/css/style-starter.css">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Home</a>
                            </li>

                            <li class="nav-item @@contact__active active">
                                <a class="nav-link" href="{{route('event_post')}}">Event</a>
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

    <!-- //homeblock1-->



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
                                <div class="text-center border border-warning-subtle">
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

                <script>
                    $(document).ready(function() {
                        $(document).on('click', '.editbtn', function() {
                            var id = $(this).val();
                            $('#editEventModal').modal('show');
                            console.log('Edit button clicked. ID:', id);
                            $.ajax({
                                url: '/editEvent/' + id
                                , method: 'get'
                                , success: function(response) {
                                    console.log('AJAX response:', response);
                                    $("#eventCreated_at").text(response.created_at);
                                    $("#title").text(response.title);
                                    $("#subTitle").text(response.subTitle);
                                    $("#author").text(response.author);
                                    $("#description").text(response.description);
                                    $("#eventCategory").text(response.category);
                                    $("#image").html(
                                        `<img src="storage/images/admin_images/${response.image}" width="100" class="img-fluid img-thumbnail">`);

                                }
                            });
                        });

                    });

                </script>

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
                              <h5 class="mt-2">Design by <a href="">Vidya</a></h5>

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
</body>
</html>
