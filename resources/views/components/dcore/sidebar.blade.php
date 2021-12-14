<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{url('home')}}">Andi's Travel</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
           
            @can('isAdmin')
            <li class="dropdown">
              <a href="/home/tujuan" class="nav-link"><i class="fas fa-paper-plane"></i> <span>Jurusan</span></a>
            </li>
            <li class="dropdown">
              <a href="{{route('jadwal')}}" class="nav-link"><i class="far fa-file-alt"></i> <span>Jadwal</span></a>
            </li>
                     
            <li class="dropdown">
              <a href="/home/tiket" class="nav-link"><i class="fas fa-ticket-alt"></i> <span>Pesen Tiket</span></a>
            </li>
            <li class="dropdown">
              <a href="{{route('pemesan')}}" class="nav-link"><i class="fas fa-user"></i> <span>Daftar Pesanan</span></a>
            </li>
            @elsecan('isUser')
                       
            <li class="dropdown">
              <a href="/home/tiket" class="nav-link"><i class="fas fa-ticket-alt"></i> <span>Pesen Tiket</span></a>
            </li>
            <li class="dropdown">
              <a href="{{route('cek_pesananmu')}}" class="nav-link"><i class="fas fa-user"></i> <span>Daftar Pesananmu</span></a>
            </li>
            @endcan
          </ul>
       
        </aside>
      </div>
