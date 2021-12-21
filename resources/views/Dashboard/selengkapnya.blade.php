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
                  <h4>Selengkapnya</h4>
                </div>
                <div class="card-body">
                <table  class="table table-bordered">
            <tr>
                <th>Nama Pemesan</th>
                <td>{{$selengkapnya->nama}}</td>
            </tr>
            <tr>
                <th>Email Pemesan</th>
                <td>{{$selengkapnya->email}}</td>
            </tr>
            <tr>
                <th>Dari</th>
                <td>{{$selengkapnya->dari}}</td>
            </tr>
            <tr>
                <th>Tujuan</th>
                <td>{{$selengkapnya->tujuan}}</td>
            </tr>
            <tr>
                <th>Jumlah Penumpang</th>
                <td>x{{$selengkapnya->penumpang}}</td>
            </tr>
            <tr>
                <th>Pembayaran</th>
                <td>{{$selengkapnya->payment}}</td>
            </tr>
            <tr>
                <th>No. Rekening</th>
                <td>{{$selengkapnya->rekening}}</td>
            </tr>
            <tr>
                <th>Total Yang Harus Di Bayarkan</th>
                <td>Rp. {{number_format($selengkapnya->total_dibayar)}},-</td>
            </tr>
            <tr>
                <th>Kode Pembayaran</th>
                <td>{{$selengkapnya->kode_pembayaran}}</td>
            </tr>
            <tr>
                <th>Status Dibayar</th>
                <td>@if($selengkapnya->status_dibayar == 0 && $selengkapnya->status_pembatalan == 0) Belum Dibayar @else Sudah Di Bayar @endif</td>
            </tr>
            <tr>
                <th>Status Pembatalan</th>
                <td>@if($selengkapnya->status_pembatalan == 0) Jadi Berangkat @else Di Batalkan @endif</td>
            </tr>
            <tr>
                <th>Alamat Jemput</th>
                <td>{{$selengkapnya->alamat_jemput}}</td>
            </tr>
            
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