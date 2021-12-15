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
                  <h4>Semua Data Pengguna</h4>
                </div>
                <div class="card-body">
            <table class="table" id="table_id">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Bergabung Pada</th>
        <th>Opt</th>
    </tr>
</thead>
<tbody>
    @php $no = 1; @endphp
    @foreach($data as $ak)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$ak->name}}</td>
            <td>{{$ak->email}}</td>
            <td>{{$ak->created_at->diffForHumans()}}</td>
            <td>
                <a href="{{route('hapus_akun', $ak->id)}}" class="btn btn-sm btn-outline-danger">Hapus</a>
            </td>
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