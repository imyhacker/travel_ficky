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
                                <h4>Budget vs Sales</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('up_jadwal')}}" method="POST">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tujuan</label>
                                            <select name="dari" class="form-control">
                                                <option disabled selected value>-- Dari --</option>
                                                @foreach($data as $d)
                                                <option value="{{$d->destinasi}}">{{$d->destinasi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label>Tarif (Rp)</label>
                                            <input type="number" name="tarif" class="form-control" placeholder="Tarif Per Orang">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Pukul</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name="jam"  class="form-control">
                                                    <option disabled selected value>-- Jam --</option>

                                                        @for($i = 1; $i <= 24; $i++) <option>{{$i}}</option>
                                                            @endfor
                                                    </select>
                                                    <p class="text-sm">Jam</p>

                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name="menit" class="form-control">
                                                    <option disabled selected value>-- Menit --</option>

                                                        @for($i = 1; $i <= 60; $i++) <option>{{$i}}</option>
                                                            @endfor
                                                    </select>
                                                    <p class="text-sm">Menit</p>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name="area"  class="form-control">
                                                    <option disabled selected value>-- Area --</option>

                                                        <option>WITA</option>
                                                        <option>WIB</option>
                                                        <option>WIT</option>
                                                    </select>
                                                    <p class="text-sm">Area</p>
                                                </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Kirim Data">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Jadwal</th>
                                    <th>Dari</th>
                                    <th>Tujuan</th>
                                    <th>Tarif</th>
                                    <th>Estimasi</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($jadwal as $jd)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$jd->slug_jadwal}}</td>
                                    <td>{{$jd->dari}}</td>
                                    <td>{{$jd->tujuan}}</td>
                                    <td>Rp. {{number_format($jd->tarif)}} / Orang</td>
                                    <td>{{$jd->jam}}:{{$jd->menit}} {{$jd->area}}</td>
                                    <td>
                                        <a href="" class="btn btn-outline-danger">Hapus </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- END OF CENTER CONTENT -->


            </section>
        </div>
        <x-dcore.footer />
    </div>
</div>
<x-dcore.script />
