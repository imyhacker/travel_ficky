<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iPortfolio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>{{config('app.name')}}</h1>
      <p>Jasa <span class="typed" data-typed-items="Travel, Trip"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container table-responsive">

        <div class="section-title">
          <h2>Jadwal</h2>
          <p>Jadwal Pemberangkatan Travel Kami</p>
        </div>

          <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                        <th>Pukul</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($jadwal as $jd)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$jd->dari}}</td>
                            <td>{{$jd->tujuan}}</td>
                            <td>{{$jd->jam}}:{{$jd->menit}} {{$jd->area}}</td>
                        </tr>
                    @endforeach
                </tbody>
          </table>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Pesan Tiket</h2>
          <p>Pesan Tiket Mudah, Murah Dan Cepat Disini!</p>
        </div>
        <form action="{{route('cari_tiket')}}" method="post">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label>Tujuan</label>
                                            <select name="dari" id="" class="form-control">
                                                <option disabled selected value>-- Dari --</option>
                                                @foreach($data as $d)
                                                <option value="{{$d->destinasi}}">{{$d->destinasi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">

                                            <label>Tujuan</label>
                                            <select name="tujuan" id="" class="form-control">
                                                <option disabled selected value>-- Tujuan --</option>

                                                @foreach($data as $t)
                                                <option value="{{$t->destinasi}}">{{$t->destinasi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">

                                            <label>Tanggal Pemberangkatan</label>
                                            <input type="text" value="{{date('d-m-Y', strtotime("+1 day"))}}"
                                                class="form-control" disabled name="tanggal">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">

                                            <label>Tujuan</label>
                                            <select name="penumpang" id="" class="form-control">
                                                <option disabled selected value>-- Banyaknya Penumpang --</option>

                                                @for($i = 1; $i <= 10; $i++) <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Cari Data">
                                        </div>
                                    </div>
                                </div>
                                </form>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Cari Pesananmu</h2>
          <p>Cari Nomor Resi / Invoicemu Disini!</p>
        </div>
    <form action="{{route('cari_resi')}}" method="GET">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Cari Nomor Resi / Invoice" name="resi">
            <small>No Resi / Invoice ada dalam PDF yang telah di download.</small>
        </div>
        <div class="form-group mt-3">
            <input type="submit" class="btn btn-outline-success btn-block" value="Cari Resi!">
        </div>
        </form>
      </div>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Hubungi Kami Jika Ada Pertanyaan Atau Saran.</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>


        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>2021</span></strong>
      </div>
      <div class="credits">
        
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