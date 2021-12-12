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
                                <h4>TUJUAN dan ASAL</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <form action="/home/tujuan/add_tujuan" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Masukan Tujuan</label>
                                                <input type="text" class="form-control" name="destinasi"
                                                    placeholder="Masukan Tujuan">
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-success btn-block"
                                                    value="Tambah data">
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table" id="table_id">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Daerah</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                               @foreach($data as $dst)
                                <tr>
                                  <td>{{$no++}}</td>
                                  <td>{{$dst->destinasi}}</td>
                                  <td>
                                    <a href="" class="btn btn-outline-danger">Hapus</a>
                                  </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                                  </div>
                        </div>
                    </div>
                    <form>
                </div>

                <!-- END OF CENTER CONTENT -->


            </section>
        </div>
        <x-dcore.footer />
    </div>
</div>
<x-dcore.script />
