<x-dcore.head />
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <x-dcore.nav />
      <x-dcore.sidebar />
      <div class="main-content">
        <section class="section">
          @can('isAdmin')
        <x-dcore.card :dibayar="$dibayar" :dbelum="$dbelum" :semua="$semua"/>
          @else
          <x-dcore.card2 :udibayar="$udibayar" :ubelom="$ubelom" :usemua="$usemua"/>
          @endcan
        <!-- MAIN OF CENTER CONTENT -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Selamat Datang Di Aplikasi Travel Kami</h4>
                </div>
                <div class="card-body">
                  <h4> Selamat Datang {{Auth::user()->name}}</h4>
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