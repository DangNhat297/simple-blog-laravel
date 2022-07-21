<!doctype html>
<html lang="en">


<!-- Mirrored from assiagroupe.site/demo/html/template/oredoo/Oredoo/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jul 2022 02:55:11 GMT -->
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="/client-assets/img/favicon.png">

    <!-- Title -->
    <title>@yield('title')</title>
  
    <!-- CSS Plugins -->
    <link rel="stylesheet" href="/client-assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/client-assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/client-assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="/client-assets/css/fontawesome.css">

    <!-- main style -->
    <link rel="stylesheet" href="/client-assets/css/style.css">
    <link rel="stylesheet" href="/client-assets/css/custom.css">
</head>

<body>
    <!--loading -->
    <div class="loader">
        <div class="loader-element"></div>
    </div>

    @include('layout.client.header')

    @yield('content')

    <!--instagram-->
    <div class="instagram">
        <div class="container-fluid">
            <div class="instagram-area">
                <div class="instagram-list">
                    <div class="instagram-item">
                        <a href="#">
                            <img src="/client-assets/img/instagram/1.jpg" alt="">
                            <div class="icon">
                            <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>

                    <div class="instagram-item">
                        <a href="#">
                            <img src="/client-assets/img/instagram/2.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="/client-assets/img/instagram/3.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="/client-assets/img/instagram/4.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="/client-assets/img/instagram/5.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                    <div class="instagram-item">
                        <a href="#">
                            <img src="/client-assets/img/instagram/6.jpg" alt="">
                            <div class="icon">
                             <i class="lab la-instagram"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
 
 
    @include('layout.client.footer')

    <!--Back-to-top-->
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>
   
    <!--Search-form-->
    <div class="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 m-auto">
                    <div class="search-width">
                        <button type="button" class="close">
                            <i class="far fa-times"></i>
                        </button>
                        <form class="search-form" action="https://assiagroupe.site/demo/html/template/oredoo/Oredoo/search.html">
                            <input type="search" value="" placeholder="What are you looking for?">
                            <button type="submit" class="search-btn"> search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/client-assets/js/jquery.min.js"></script>
    <script src="/client-assets/js/popper.min.js"></script>
    <script src="/client-assets/js/bootstrap.min.js"></script>
    

    <!-- JS Plugins  -->
    <script  src="/client-assets/js/theia-sticky-sidebar.js"></script>
    <script src="/client-assets/js/ajax-contact.html"></script>
    <script src="/client-assets/js/owl.carousel.min.js"></script>
    <script src="/client-assets/js/switch.js"></script>
    <script src="/client-assets/js/jquery.marquee.js"></script>
  
    
    <!-- JS main  -->
    <script src="/client-assets/js/main.js"></script>


</body>


<!-- Mirrored from assiagroupe.site/demo/html/template/oredoo/Oredoo/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jul 2022 02:55:57 GMT -->
</html>