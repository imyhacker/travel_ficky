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
                                <h4>Cari Tiket</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('cari')}}" method="post">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6">
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

                                            <label>Tanggal Pemberangkatan</label>
                                            <input type="text" value="{{date('d-m-Y', strtotime("+1 day"))}}"
                                                class="form-control" disabled name="tanggal">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label>Tujuan</label>
                                            <select name="penumpang" id="" class="form-control">
                                                <option disabled selected value>-- Banyaknya Penumpang --</option>

                                                @for($i = 1; $i <= 10; $i++) <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                            </select>
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

                </div>
                <!-- END OF CENTER CONTENT -->


            </section>
        </div>
        <x-dcore.footer />
    </div>
</div>
<x-dcore.script />w
