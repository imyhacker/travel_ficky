<x-dcore.head />
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <x-dcore.nav />
        <x-dcore.sidebar />
        <div class="main-content">
            <section class="section">

                <!-- MAIN OF CENTER CONTENT -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pesan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($data as $d)
                                    <div class="col-md-12 mt-3">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$d->dari}}-{{$d->tujuan}}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Rp. {{number_format($d->tarif)}} | Berangkat : {{$d->jam}}:{{$d->menit}} {{$d->area}}</h6>
                                                
                                                <a href="/home/tiket/cari/{{$d->slug_jadwal}}/{{$penumpang}}/pesan" class="btn btn-outline-success btn-block">Pesan Sekarang!</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END OF CENTER CONTENT -->


            </section>
        </div>
        <x-dcore.footer />
    </div>
</div>
<x-dcore.script />
