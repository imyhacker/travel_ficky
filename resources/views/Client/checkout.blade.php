<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iPortfolio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="https://media.istockphoto.com/vectors/plane-icon-vector-id1078558156?k=20&m=1078558156&s=612x612&w=0&h=89EY0z-XJpP41_K0iKSzHpHX0kYYH4Anme8Do5xF3CE=" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">{{config('app.name')}}</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Jadwal</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Pesan Tiket</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Cari Pesananmu</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container table-responsive">

        <div class="section-title">
          <h2>Checkout</h2>
          <p>Checkout Pembayaran</p>
        </div>
        <form action="/cari_tiket/{{$jadwal->slug_jadwal}}/{{$penumpang}}/pesan/checkout" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 order-md-2 mb-4">
                                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Your cart</span>
                                        </h4>
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0">Pesananmu</h6>
                                                    <small
                                                        class="text-muted">{{$jadwal->dari}}-{{$jadwal->tujuan}} : Rp. {{number_format($jadwal->tarif)}},-</small><br>
                                                    <small
                                                        class="text-muted">Penumpang : {{$penumpang}}</small>

                                                </div>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Total (Rp)</span>
                                                <strong>Rp. {{number_format($total_harga)}},-</strong>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-md-8 order-md-1">
                                        <h4 class="mb-3">Billing address</h4>
                                        <form class="needs-validation" novalidate>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="firstName">First name</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"  required >
                                                    
                                                </div>

                                            </div>


                                            <div class="mb-3">
                                                <label for="email">Email <span
                                                        class="text-muted">(Optional)</span></label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="you@example.com">
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address for shipping updates.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="address">Dari</label>
                                                <input type="text" class="form-control" id="address" placeholder="Dari"
                                                    required value="{{$jadwal->dari}}" readonly name="dari">

                                            </div>

                                            <div class="mb-3">
                                                <label for="address2">Tujuan <span
                                                        class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control" id="address" placeholder="Tujuan"
                                                    required value="{{$jadwal->tujuan}}" readonly name="tujuan">

                                            </div>

                                            <hr class="mb-4">

                                            <h4 class="mb-3">Payment</h4>

                                            <div class="d-block my-3">
                                                <div class="custom-control custom-radio">
                                                    <input id="credit" name="paymentMethod" type="radio"
                                                        class="custom-control-input" checked required value="BNI">
                                                    <label class="custom-control-label" for="credit">BNI</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input id="debit" name="paymentMethod" type="radio"
                                                        class="custom-control-input" required value="BRI">
                                                    <label class="custom-control-label" for="debit">BRI</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input id="paypal" name="paymentMethod" type="radio"
                                                        class="custom-control-input" required value="Mandiri">
                                                    <label class="custom-control-label" for="paypal">Mandiri</label>
                                                </div>
                                            </div>


                                            <hr class="mb-4">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                                checkout</button>
                                        </form>
                                    </div>
                                </div>
                              </form>
      </div>
    </section><!-- End Resume Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>iPortfolio</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>