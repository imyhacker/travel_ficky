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
                  <h4>Daftar Pemesan Tiket</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table" id="table_id">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tujuan</th>
                                <th>Semua (Rp)</th>
                                <th>Kode Pembayaran</th>
                                <th>Status Dibayar</th>
                                <th>Status Pembatalan</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($data as $pms)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$pms->nama}}</td>
                                <td>{{$pms->tujuan}}</td>
                                <td>Rp. {{number_format($pms->total_dibayar)}},-</td>
                              
                                <td>{{$pms->kode_pembayaran}}</td>
                                <td>@if($pms->status_dibayar == 0 && $pms->status_pembatalan == 0) Belum Dibayar @else Sudah Di Bayar @endif</td>
                                <td>@if($pms->status_pembatalan == 0) Jadi Berangkat @else Di Batalkan @endif</td>
                               
                                <th>
                                @if($pms->status_pembatalan == 0) 
                                <a href="{{route('success', $pms->kode_pembayaran)}}" class="btn btn-outline-success btn-sm"><i class="fas fa-check"></i></a>
                                    <a href="{{route('hapus_pembayaran', $pms->kode_pembayaran)}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    <a href="{{route('reset_pembayaran', $pms->kode_pembayaran)}}" class="btn btn-outline-warning btn-sm"><i class="fas fa-spinner"></i></a>
                                    <a href="{{route('selengkapnya', $pms->kode_pembayaran)}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></a>
                                @else 
                                <a href="#" class="btn btn-outline-success btn-sm disabled"><i class="fas fa-check"></i></a>
                                    <a href="#" class="btn btn-outline-danger btn-sm disabled"><i class="fas fa-trash"></i></a>
                                    <a href="#" class="btn btn-outline-warning btn-sm disabled"><i class="fas fa-spinner"></i></a>

                                @endif
                                   
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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