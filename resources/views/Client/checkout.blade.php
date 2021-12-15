<x-Main.head />

    <main id="main">

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container table-responsive">

                <div class="section-title">
                    <h2>Checkout</h2>
                    <p>Checkout Pembayaran</p>
                </div>
                @if(Auth::check())
                <form action="/cari_tiket/{{$jadwal->slug_jadwal}}/{{$penumpang}}/pesan/checkout" method="POST">
                    @csrf
                @else
                @endif
                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Pesananmu</h6>
                                        <small class="text-muted">{{$jadwal->dari}}-{{$jadwal->tujuan}} : Rp.
                                            {{number_format($jadwal->tarif)}},-</small><br>
                                        <small class="text-muted">Penumpang : {{$penumpang}}</small>

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
                                        <input type="text" class="form-control"
                                            required @if(Auth::check()) placeholder="Nama Lengkap" name="nama" value="{{Auth::user()->name}}" @else readonly placeholder="Login Dulu" @endif>

                                    </div>

                                </div>


                                <div class="mb-3">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" @if(Auth::check()) placeholder="email@gmail.com" value="{{Auth::user()->email}}" name="email" @else readonly placeholder="Login Dulu" @endif>
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="address">Dari</label>
                                    <input type="text" class="form-control" id="address" placeholder="Dari" required
                                        value="{{$jadwal->dari}}" readonly name="dari">

                                </div>

                                <div class="mb-3">
                                    <label for="address2">Tujuan <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="address" placeholder="Tujuan" required
                                        value="{{$jadwal->tujuan}}" readonly name="tujuan">

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
                                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                            required value="BRI">
                                        <label class="custom-control-label" for="debit">BRI</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="paypal" name="paymentMethod" type="radio"
                                            class="custom-control-input" required value="Mandiri">
                                        <label class="custom-control-label" for="paypal">Mandiri</label>
                                    </div>
                                </div>


                                <hr class="mb-4">
                                @if(Auth::check())
                                <button class="btn btn-primary btn-sm btn-block" type="submit">Continue to
                                    checkout</button>
                                @else
                                <button class="btn btn-danger btn-sm btn-block" type="Button">Login Terlebih Dahulu</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </section><!-- End Resume Section -->

    </main><!-- End #main -->
    <x-Main.footer />