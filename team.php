<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Craft Loving | Team</title>
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
        <div id="spinner"
            class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
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
                            <a href="logout.php"
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
                                    <a href="contact.php"
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
                                <a href="userDetails.php"
                                    class="dropdown-item">Your Account</a>
                                <a href="logout.php"
                                    class="dropdown-item btn btn-danger">Logout</a>
                            </div>
                        </div>
                        <button
                            class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"
                            data-bs-toggle="modal"
                            data-bs-target="#searchModal"><i
                                class="fas fa-search"></i></button>
                        <a href="addCart.php"
                            class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"><i
                                class="fas fa-shopping-cart"></i></a>
                        <a href="wishlist.php"
                            class="btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex">
                            <i class="fas fa-heart"></i>
                        </a>
                        <a href="userPlaceOrder.php"
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
            <div class="container text-center animated bounceInDown">
                <h1 class="display-1 mb-4">Our Team</h1>
                <ol
                    class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark"
                        aria-current="page">Our Team</li>
                </ol>
            </div>
        </div>
        <!-- Hero End -->

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
                                <h4 class="text-primary">Anika</h4>
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
                                <h4 class="text-primary">Vinay</h4>
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
                                <h4 class="text-primary">Shalini</h4>
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
                                class="lh-lg mb-4">"Discover unique handmade treasures and design inspirations on our craft website. Connect with artisans, learn new techniques, and explore exclusive collections in a vibrant community of craft lovers."</p>
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
                                        class="fas fa-envelope text-primary me-2"></i>dhanashree.sonune13@gmail.com</p>
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