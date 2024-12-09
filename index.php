<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Craft Loving | Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content name="keywords">
        <meta content name="description">
        <link rel="icon" href="img/logo1.png" type="image/x-icon">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
            rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
        <!-- Spinner End -->

        <!-- Navbar start -->
        <div class="container-fluid nav-bar">
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-5">
                    <img src="img/logo1.png" style="height: 10vh; ">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="text-primary fw-bold mb-0">Craft<span
                                class="text-dark"> Loving </span></h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php"
                                class="nav-item nav-link">Home</a>
                            <a href="service.php"
                                class="nav-item nav-link">Services</a>
                            <a href="product.php"
                                class="nav-item nav-link">Products</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                    data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu bg-light">
                                    <a href="team.php"
                                        class="dropdown-item">Our Team</a>
                                    <a href="testimonial.php"
                                        class="dropdown-item">Testimonial</a>
                                    <a href="about.php"
                                        class="dropdown-item">About us</a>
                                    <a href="contact.html"
                                        class="dropdown-item">Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#"
                                class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                                data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i>
                            </a>
                            <div
                                class="dropdown-menu bg-light dropdown-menu-end">
                                <a href="userLogin.php"
                                    class="dropdown-item">User Login</a>
                                <a href="adminLogin.php"
                                    class="dropdown-item">Admin Login</a>
                            </div>
                        </div>
                        <button
                            class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                            data-bs-toggle="modal"
                            data-bs-target="#searchModal"><i
                                class="fas fa-searcgith"></i></button>
                        <a href="userLogin.php"
                            class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Order
                            Now</a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar end -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by
                            keyword</h5>
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search"
                                class="form-control bg-transparent p-3"
                                placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1"
                                class="input-group-text p-3"><i
                                    class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        <!-- Hero Start -->
        <div class="container-fluid bg-light py-6 my-6 mt-0">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Welcome
                            to CraftLoving</small>
                        <h1 class="display-1 mb-4 animated bounceInDown"> Shop
                            <span class="text-primary">Custom Creations</span>
                            for Your Perfect Event</h1>
                        <a href="userLogin.php"
                            class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Order
                            Now</a>
                        <a href="about.php"
                            class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Know
                            More</a>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <img src="img/Img1.png"
                            class="img-fluid rounded animated zoomIn" alt>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!-- About Satrt -->
        <div class="container-fluid py-6">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                        <img src="img/image11.jpg" class="img-fluid rounded"
                            alt>
                    </div>
                    <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">About
                            Us</small>
                        <h1 class="display-5 mb-4">Trusted By 200 + satisfied
                            clients</h1>
                        <p class="mb-4">Discover a world of creativity and
                            craftsmanship! From handmade treasures to unique
                            artisanal creations, we bring you the finest
                            collection of crafts made with passion and care.
                            Explore our carefully curated selection to find the
                            perfect addition to your home, a thoughtful gift, or
                            an inspiring piece to cherish. Celebrate the
                            artistry of craft makers and shop with confidence
                            for something truly special.</p>
                        <div class="row g-4 text-dark mb-5">
                            <div class="col-sm-6">
                                <i
                                    class="fas fa-share text-primary me-2"></i>Home
                                Delivery
                            </div>
                            <div class="col-sm-6">
                                <i
                                    class="fas fa-share text-primary me-2"></i>24/7
                                Customer Support
                            </div>
                            <div class="col-sm-6">
                                <i
                                    class="fas fa-share text-primary me-2"></i>Easy
                                Customization Options
                            </div>
                            <div class="col-sm-6">
                                <i
                                    class="fas fa-share text-primary me-2"></i>Shop
                                Unique Crafts
                            </div>
                        </div>
                        <a href="about.php"
                            class="btn btn-primary py-3 px-5 rounded-pill">About
                            Us<i class="fas fa-arrow-right ps-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Fact Start-->
        <div class="container-fluid faqt py-6">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7">
                        <div class="row g-4">
                            <div class="col-sm-4 wow bounceInUp"
                                data-wow-delay="0.3s">
                                <div
                                    class="faqt-item bg-primary rounded p-4 text-center">
                                    <i
                                        class="fas fa-users fa-4x mb-4 text-white"></i>
                                    <h1 class="display-4 fw-bold"
                                        data-toggle="counter-up">443</h1>
                                    <p
                                        class="text-dark text-uppercase fw-bold mb-0">Happy
                                        Customers</p>
                                </div>
                            </div>
                            <div class="col-sm-4 wow bounceInUp"
                                data-wow-delay="0.5s">
                                <div
                                    class="faqt-item bg-primary rounded p-4 text-center">
                                    <i
                                        class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                                    <h1 class="display-4 fw-bold"
                                        data-toggle="counter-up">107</h1>
                                    <p
                                        class="text-dark text-uppercase fw-bold mb-0">Unique
                                        Craft Ideas</p>
                                </div>
                            </div>
                            <div class="col-sm-4 wow bounceInUp"
                                data-wow-delay="0.7s">
                                <div
                                    class="faqt-item bg-primary rounded p-4 text-center">
                                    <i
                                        class="fas fa-check fa-4x mb-4 text-white"></i>
                                    <h1 class="display-4 fw-bold"
                                        data-toggle="counter-up">450</h1>
                                    <p
                                        class="text-dark text-uppercase fw-bold mb-0">Orders
                                        Completed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                        <div class="video">
                            <button type="button" class="btn btn-play"
                                data-bs-toggle="modal"
                                data-src="https://www.youtube.com/embed/DWRcNpR6Kdc"
                                data-bs-target="#videoModal">
                                <span></span>
                            </button> 

                            <!-- <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/reel/CWlS_qEpmSg/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/CWlS_qEpmSg/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/CWlS_qEpmSg/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Rutuja Laddha (@_craft_loving_)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Video -->
        <div class="modal fade" id="videoModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube
                            Video</h5>
                        <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src id="video"
                                allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact End -->

        <!-- Product Start -->
        <div class="container py-5">
            <div class="text-center">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
                    Our Products
                </small>
                <h1 class="display-5 mb-5">Discover the World’s Most Loved
                    Crafts</h1>

                <div class="row" id="product-list">
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div
                            class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                            <div class="position-relative overflow-hidden">
                                <img src="img/product-1.jpg"
                                    class="card-img-top rounded-top product-image img-fluid"
                                    alt="Paper Craft">
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="fw-bold text-primary mb-4">Price:
                                    Rs. 10.99</p>
                                <a href="userLogin.php"
                                    class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 mb-4">
                        <div
                            class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                            <div class="position-relative overflow-hidden">
                                <img src="img/product-2.jpg"
                                    class="card-img-top rounded-top product-image img-fluid"
                                    alt="Wood Craft">
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="fw-bold text-primary mb-4">Price:
                                    Rs. 15.99</p>
                                <a href="userLogin.php"
                                    class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 mb-4">
                        <div
                            class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                            <div class="position-relative overflow-hidden">
                                <img src="img/product-3.jpg"
                                    class="card-img-top rounded-top product-image img-fluid"
                                    alt="Mandala Art">
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="fw-bold text-primary mb-4">Price:
                                    Rs. 12.99</p>
                                <a href="userLogin.php"
                                    class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 mb-4">
                        <div
                            class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                            <div class="position-relative overflow-hidden">
                                <img src="img/product-4.jpg"
                                    class="card-img-top rounded-top product-image img-fluid"
                                    alt="Resin Art">
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="fw-bold text-primary mb-4">Price:
                                    Rs. 18.99</p>
                                <a href="userLogin.php"
                                    class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 mb-4">
                        <div
                            class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                            <div class="position-relative overflow-hidden">
                                <img src="img/product-5.jpg"
                                    class="card-img-top rounded-top product-image img-fluid"
                                    alt="Paper Craft">
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="fw-bold text-primary mb-4">Price:
                                    Rs. 10.99</p>
                                <a href="userLogin.php"
                                    class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 mb-4">
                        <div
                            class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                            <div class="position-relative overflow-hidden">
                                <img src="img/product-6.jpg"
                                    class="card-img-top rounded-top product-image img-fluid"
                                    alt="Wood Craft">
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="fw-bold text-primary mb-4">Price:
                                    Rs. 15.99</p>
                                <a href="userLogin.php"
                                    class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 mb-4">
                        <div
                            class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                            <div class="position-relative overflow-hidden">
                                <img src="img/product-7.jpg"
                                    class="card-img-top rounded-top product-image img-fluid"
                                    alt="Mandala Art">
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="fw-bold text-primary mb-4">Price:
                                    Rs. 12.99</p>
                                <a href="userLogin.php"
                                    class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 mb-4">
                        <div
                            class="card border-0 shadow-lg h-100 rounded-3 hover-card">
                            <div class="position-relative overflow-hidden">
                                <img src="img/product-8.jpg"
                                    class="card-img-top rounded-top product-image img-fluid"
                                    alt="Resin Art">
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="fw-bold text-primary mb-4">Price:
                                    Rs. 18.99</p>
                                <a href="userLogin.php"
                                    class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product End -->

        <!-- Service Start -->
        <div class="container-fluid service py-6">
            <div class="container">
                <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
                        Services</small>
                    <h1 class="display-5 mb-5">We Offers</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp"
                        data-wow-delay="0.1s">
                        <div class="bg-light rounded service-item">
                            <div
                                class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <i
                                        class="fas fa-cut fa-7x text-primary mb-4"></i>
                                    <h4 class="mb-3">Paper Craft</h4>
                                    <p
                                        class="mb-4">"Unleash your creativity with the timeless art of paper crafting—where every fold, cut, and design tells a unique story."</p>
                                    <a href="product.php"
                                        class="btn btn-primary px-4 py-2 rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp"
                        data-wow-delay="0.3s">
                        <div class="bg-light rounded service-item">
                            <div
                                class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <i
                                        class="fas fa-tree fa-7x text-primary mb-4"></i>
                                    <h4 class="mb-3">Wood craft</h4>
                                    <p
                                        class="mb-4">"Wood crafting: Where precision, skill, and imagination shape raw wood into timeless masterpieces."</p>
                                    <a href="product.php"
                                        class="btn btn-primary px-4 py-2 rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp"
                        data-wow-delay="0.5s">
                        <div class="bg-light rounded service-item">
                            <div
                                class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <i
                                        class="fas fa-sun fa-7x text-primary mb-4"></i>

                                    <h4 class="mb-3">Mandalas</h4>
                                    <p
                                        class="mb-4">"Intricate designs that represent the universe, crafted to bring peace, balance, and creativity into your life. Mandalas are not just art—they’re a meditation for your soul."

                                    </p>
                                    <a href="product.php"
                                        class="btn btn-primary px-4 py-2 rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp"
                        data-wow-delay="0.7s">
                        <div class="bg-light rounded service-item">
                            <div
                                class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <i
                                        class="fas fa-cube fa-7x text-primary mb-4"></i>
                                    <h4 class="mb-3">Miniature</h4>
                                    <p
                                        class="mb-4">"Small in size but big on detail—miniature art captures the essence of creativity in the tiniest of forms. Perfect for collectors or as unique keepsakes that tell a story in miniature."

                                    </p>
                                    <a href="product.php"
                                        class="btn btn-primary px-4 py-2 rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp"
                        data-wow-delay="0.1s">
                        <div class="bg-light rounded service-item">
                            <div
                                class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <i
                                        class="fas fa-paint-brush fa-7x text-primary mb-4"></i>
                                    <h4 class="mb-3">Resin Art</h4>
                                    <p
                                        class="mb-4">"A modern medium that turns imagination into glossy, vibrant reality—resin art offers stunning creations with depth, color, and shine. Perfect for decor, or gifts."  </p>
                                    <a href="product.php"
                                        class="btn btn-primary px-4 py-2 rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp"
                        data-wow-delay="0.3s">
                        <div class="bg-light rounded service-item">
                            <div
                                class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <i
                                        class="fas fa-truck fa-7x text-primary mb-4"></i>
                                    <h4 class="mb-3">Home Delivery</h4>
                                    <p
                                        class="mb-4">"Convenience meets creativity—enjoy the beauty of handcrafted art delivered right to your doorstep. Art that comes to you, no matter where you are."
                                    </p>
                                    <a href="product.php"
                                        class="btn btn-primary px-4 py-2 rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp"
                        data-wow-delay="0.5s">
                        <div class="bg-light rounded service-item">
                            <div
                                class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <i
                                        class="fas fa-pencil-alt fa-7x text-primary mb-4"></i>
                                    <h4 class="mb-3">Customization</h4>
                                    <p
                                        class="mb-4">"Add a personal touch with our customization services. Whether it's a name, message, or special design, we craft pieces as unique as you."</p>
                                    <a href="product.php"
                                        class="btn btn-primary px-4 py-2 rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp"
                        data-wow-delay="0.7s">
                        <div class="bg-light rounded service-item">
                            <div
                                class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-icon text-center">
                                    <i
                                        class="fas fa-gift fa-7x text-primary mb-4"></i>
                                    <h4 class="mb-3">Gift to your loved
                                        ones</h4>
                                    <p
                                        class="mb-4">"Give the gift of heartfelt artistry—handcrafted treasures that speak. Perfect for any occasion, our creations show you care."                                    </p>
                                    <a href="product.php"
                                        class="btn btn-primary px-4 py-2 rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

      

        <!-- Team Start -->
        <div class="container-fluid team py-6">
            <div class="container">
                <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
                        Team</small>
                    <h1 class="display-5 mb-5">We have experienced chef
                        Team</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow bounceInUp"
                        data-wow-delay="0.1s">
                        <div class="team-item rounded">
                            <img class="img-fluid rounded-top "
                                src="img/team-1.jpg" alt>
                            <div
                                class="team-content text-center py-3 bg-dark rounded-bottom">
                                <h4 class="text-primary">Mahesh</h4>
                                <p class="text-white mb-0">CEO</p>
                            </div>
                            <div
                                class="team-icon d-flex flex-column justify-content-center m-4">
                                <a
                                    class="share btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fas fa-share-alt"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-facebook-f"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-twitter"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow bounceInUp"
                        data-wow-delay="0.3s">
                        <div class="team-item rounded">
                            <img class="img-fluid rounded-top "
                                src="img/team-2.jpg" alt>
                            <div
                                class="team-content text-center py-3 bg-dark rounded-bottom">
                                <h4 class="text-primary">Ankit</h4>
                                <p class="text-white mb-0">Order manager</p>
                            </div>
                            <div
                                class="team-icon d-flex flex-column justify-content-center m-4">
                                <a
                                    class="share btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fas fa-share-alt"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-facebook-f"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-twitter"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow bounceInUp"
                        data-wow-delay="0.5s">
                        <div class="team-item rounded">
                            <img class="img-fluid rounded-top "
                                src="img/team-3.jpg" alt>
                            <div
                                class="team-content text-center py-3 bg-dark rounded-bottom">
                                <h4 class="text-primary"> Shalini</h4>
                                <p class="text-white mb-0">Report handler</p>
                            </div>
                            <div
                                class="team-icon d-flex flex-column justify-content-center m-4">
                                <a
                                    class="share btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fas fa-share-alt"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-facebook-f"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-twitter"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow bounceInUp"
                        data-wow-delay="0.7s">
                        <div class="team-item rounded">
                            <img class="img-fluid rounded-top "
                                src="img/team-4.jpg" alt>
                            <div
                                class="team-content text-center py-3 bg-dark rounded-bottom">
                                <h4 class="text-primary">Vinay</h4>
                                <p class="text-white mb-0">Delivery partner</p>
                            </div>
                            <div
                                class="team-icon d-flex flex-column justify-content-center m-4">
                                <a
                                    class="share btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fas fa-share-alt"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-facebook-f"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-twitter"></i></a>
                                <a
                                    class="share-link btn btn-primary btn-md-square rounded-circle mb-2"
                                    href><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

        <!-- Testimonial Start -->
        <div class="container-fluid py-6">
            <div class="container">
                <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Testimonial</small>
                    <h1 class="display-5 mb-5">What Our Customers says!</h1>
                </div>
                <div
                    class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4 wow bounceInUp"
                    data-wow-delay="0.1s">
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">
                            <img src="img/testimonialM-1.jpg"
                                class="img-fluid rounded-circle flex-shrink-0"
                                alt>
                            <div class="position-absolute"
                                style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">Aman</h4>
                                <p class="m-0">Developer</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <p
                                class="fs-5 m-0 pt-3">"The paper craft creations are absolutely stunning! Every card and decoration is made with such attention to detail"</p>
                        </div>
                    </div>
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">
                            <img src="img/testimonialF-3.jpg"
                                class="img-fluid rounded-circle flex-shrink-0"
                                alt>
                            <div class="position-absolute"
                                style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">Sakshi</h4>
                                <p class="m-0">Dietician</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <p
                                class="fs-5 m-0 pt-3">"Every piece of wood art I’ve bought from here has been crafted to perfection. The attention to detail is exceptional!"</p>
                        </div>
                    </div>
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">
                            <img src="img/testimonialF-5.jpg"
                                class="img-fluid rounded-circle flex-shrink-0"
                                alt>
                            <div class="position-absolute"
                                style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">Pranjal</h4>
                                <p class="m-0">Interior Designer</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <p
                                class="fs-5 m-0 pt-3">"I ordered a hand-painted mandala for my living room, and it has truly transformed the space. It radiates positivity and calmness."</p>
                        </div>
                    </div>
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">
                            <img src="img/testimonial-4.jpg"
                                class="img-fluid rounded-circle flex-shrink-0"
                                alt>
                            <div class="position-absolute"
                                style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">Shubham</h4>
                                <p class="m-0">S/W engineer</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <p
                                class="fs-5 m-0 pt-3">"From greeting cards to decorative pieces, every paper craft item is made with love. I’m delighted with my purchase!"</p>
                        </div>
                    </div>
                </div>
                <div
                    class="owl-carousel testimonial-carousel testimonial-carousel-2 wow bounceInUp"
                    data-wow-delay="0.3s">
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">
                            <img src="img/testimonialM-5.jpg"
                                class="img-fluid rounded-circle flex-shrink-0"
                                alt>
                            <div class="position-absolute"
                                style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">Swapnil</h4>
                                <p class="m-0">HR</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <p
                                class="fs-5 m-0 pt-3">"These miniatures are perfect! The craftsmanship is superb, and they make a unique addition to my collection."</p>
                        </div>
                    </div>
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">
                            <img src="img/testimonialF-2.jpg"
                                class="img-fluid rounded-circle flex-shrink-0"
                                alt>
                            <div class="position-absolute"
                                style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">Deepika</h4>
                                <p class="m-0">Singer</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <p
                                class="fs-5 m-0 pt-3">"I’ve never seen resin art like this before. The colors pop, and each piece feels like it has its own soul."</p>
                        </div>
                    </div>
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">
                            <img src="img/testimonialF-3.jpg"
                                class="img-fluid rounded-circle flex-shrink-0"
                                alt>
                            <div class="position-absolute"
                                style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">Rashi</h4>
                                <p class="m-0">Doctor</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <p
                                class="fs-5 m-0 pt-3">"I gave a handcrafted gift from this site to my friend, and she was absolutely thrilled. It was  unique, and special!"</p>
                        </div>
                    </div>
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">
                            <img src="img/testimonialF-2.jpg"
                                class="img-fluid rounded-circle flex-shrink-0"
                                alt>
                            <div class="position-absolute"
                                style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">Ankita</h4>
                                <p class="m-0">Pharmacist</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <p
                                class="fs-5 m-0 pt-3">"I’m so happy with my purchases. The products arrived on time and were better than I expected!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

          <!-- Contact Start -->
          <div class="container-fluid contact py-6 wow bounceInUp"
          data-wow-delay="0.1s">
          <div class="container">
              <div class="p-5 bg-light rounded contact-form">
                  <div class="row g-4">
                      <div class="col-12">
                          <small
                              class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Get
                              in touch</small>
                          <h1 class="display-5 mb-0">Contact Us For Any
                              Queries!</h1>
                      </div>
                      <div class="col-md-6 col-lg-7">
                          <p class="mb-4">Have questions or need assistance?
                              Fill out the form below, and we'll get back to
                              you
                              shortly!</p>
                          <!-- Contact Form -->
                          <form action="contact.php" method="POST">
                              <!-- Name -->
                              <input type="text" name="name"
                                  class="w-100 form-control p-3 mb-4 border-primary bg-light"
                                  placeholder="Your Name" required>

                              <!-- Email -->
                              <input type="email" name="email"
                                  class="w-100 form-control p-3 mb-4 border-primary bg-light"
                                  placeholder="Enter Your Email" required>

                              <!-- Subject -->
                              <input type="text" name="subject"
                                  class="w-100 form-control p-3 mb-4 border-primary bg-light"
                                  placeholder="Subject" required>

                              <!-- Message -->
                              <textarea name="message"
                                  class="w-100 form-control mb-4 p-3 border-primary bg-light"
                                  rows="4"
                                  cols="10" placeholder="Your Message"
                                  required></textarea>

                              <!-- Submit Button -->
                              <button
                                  class="w-100 btn btn-primary form-control p-3 border-primary bg-primary rounded-pill"
                                  type="submit">Submit Now</button>
                          </form>
                      </div>
                      <div class="col-md-6 col-lg-5">
                          <div>
                              <!-- Address -->
                              <div
                                  class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                  <i
                                      class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                  <div>
                                      <h4>Address</h4>
                                      <p>CraftLoving Store,Pimpri
                                        Chinchwad,Pune-411017</p>
                                  </div>
                              </div>
                              <!-- Mail Us -->
                              <div
                                  class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                  <i
                                      class="fas fa-envelope fa-2x text-primary me-4"></i>
                                  <div>
                                      <h4>Mail Us</h4>
                                      <p class="mb-2">dhanashree.sonune13@gmail.com</p>
                                      <p class="mb-0">sankrutisoni809@gmail.com</p>
                                  </div>
                              </div>
                              <!-- Telephone -->
                              <div
                                  class="d-inline-flex w-100 border border-primary p-4 rounded">
                                  <i
                                      class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                  <div>
                                      <h4>Telephone</h4>
                                      <p class="mb-2">(+91) 9552003201</p>
                                      <p class="mb-0">(+91) 8485027287</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Contact End -->

        <!-- Footer Start -->
        <div
            class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp"
            data-wow-delay="0.1s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h1 class="text-primary">Craft<span
                                    class="text-dark">Loving</span></h1>
                            <p
                                class="lh-lg mb-4" style="text-align: justify;">"Discover unique handmade treasures and design inspirations on our craft website. Connect with artisans, learn new techniques, and explore exclusive collections in a vibrant community of craft lovers."</p>
                            <div class="footer-icon d-flex">
                                <a
                                    class="btn btn-primary btn-sm-square me-2 rounded-circle"
                                    href><i class="fab fa-facebook-f"></i></a>
                                <a
                                    class="btn btn-primary btn-sm-square me-2 rounded-circle"
                                    href><i class="fab fa-twitter"></i></a>
                                <a
                                    class="btn btn-primary btn-sm-square me-2 rounded-circle"
                                    href="https://www.instagram.com/thecraftshop.in?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                                        class="fab fa-instagram"></i></a>
                                <a
                                    class="btn btn-primary btn-sm-square rounded-circle"
                                    href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="mb-4">Special Facilities</h4>
                            <div class="d-flex flex-column align-items-start">
                                <a class="text-body mb-3" href><i
                                        class="fa fa-check text-primary me-2"></i>Home
                                    Delivery</a>
                                <a class="text-body mb-3" href><i
                                        class="fa fa-check text-primary me-2"></i>Give
                                    & Take</a>
                                <a class="text-body mb-3" href><i
                                        class="fa fa-check text-primary me-2"></i>24/7
                                    Support</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="mb-4">Contact Us</h4>
                            <div class="d-flex flex-column align-items-start">
                                <p><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>
                                    CraftLoving Store,Pimpri
                                    Chinchwad,Pune-411017</p>
                                <p><i
                                        class="fa fa-phone-alt text-primary me-2"></i>(+91)
                                    8485027287</p>
                                <p><i
                                        class="fas fa-envelope text-primary me-2"></i>dhanashree@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="mb-4">Social Gallery</h4>
                            <div class="row g-2">
                                <div class="col-4">
                                    <img src="img/image08.jpg"
                                        class="img-fluid rounded-circle border border-primary p-2"
                                        alt>
                                </div>
                                <div class="col-4">
                                    <img src="img/image12.jpg"
                                        class="img-fluid rounded-circle border border-primary p-2"
                                        alt>
                                </div>
                                <div class="col-4">
                                    <img src="img/image13.jpg"
                                        class="img-fluid rounded-circle border border-primary p-2"
                                        alt>
                                </div>
                                <div class="col-4">
                                    <img src="img/image09.jpg"
                                        class="img-fluid rounded-circle border border-primary p-2"
                                        alt>
                                </div>
                                <div class="col-4">
                                    <img src="img/image5.jpg"
                                        class="img-fluid rounded-circle border border-primary p-2"
                                        alt>
                                </div>
                                <div class="col-4">
                                    <img src="img/image06.jpg"
                                        class="img-fluid rounded-circle border border-primary p-2"
                                        alt>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#"
            class="btn btn-md-square btn-primary rounded-circle back-to-top"><i
                class="fa fa-arrow-up"></i></a>

        <!-- JavaScript Libraries -->
        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>