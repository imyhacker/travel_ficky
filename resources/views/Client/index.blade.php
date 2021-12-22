<x-Main.head />
  <main id="main">

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container table-responsive">

        <div class="section-title">
          <h2>Jadwal</h2>
          <p>Jadwal Pemberangkatan Travel Kami</p>
        </div>

          <table class="table" id="table_id">
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
                                               <option value="Indramayu">Indramayu</option>
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
<x-Main.footer />