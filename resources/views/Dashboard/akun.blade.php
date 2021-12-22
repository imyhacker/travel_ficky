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
                                <button type="button" class="btn btn-primary mb-3 btn-block" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Tambah Akun
                                </button>
                                <table class="table mt-3" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. Hp</th>
                                            <th>Bergabung Pada</th>
                                            <th>Opt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach($data_user as $ak)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$ak->name}}</td>
                                            <td>{{$ak->email}}</td>
                                            <td>{{$ak->no_hp}}</td>
                                            <td>{{$ak->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('hapus_akun', $ak->id)}}"
                                                    class="btn btn-sm btn-outline-danger">Hapus</a>
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
            <section class="section">
                <!-- MAIN OF CENTER CONTENT -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Data Admin</h4>
                            </div>
                            <div class="card-body">
                                <table class="table mt-3" id="table_admin">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Opt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach($data_admin as $ad)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$ad->name}}</td>
                                            <td>{{$ad->email}}</td>
                                            <td>
                                                <a href="{{route('hapus_akun', $ad->id)}}"
                                                    class="btn btn-sm btn-outline-danger">Hapus</a>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('tambah_akun')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nama</label>

                                <input type="text" name="name" class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Email</label>

                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Password</label>

                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Akses</label>
                                <select class="form-control" name="role">
                                    <option disabled selected value>== PILIH AKSES ==</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary btn-block" value="Tambah Akun">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <x-dcore.footer />
    </div>
</div>
<x-dcore.script />
