<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Halaman Utama</li>
      <li class="nav-item">
        <a class="nav-link " href="{{ route('DashboardAdmin') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link " href="{{ route('DashboardPengguna') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard Pengguna</span>
        </a>
      </li> --}}
      <!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Datamaster-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Datamaster-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('timeline.index') }}">
              <i class="bi bi-circle"></i><span>Time Line</span>
            </a>
          </li>
          <li>
            <a href="{{ route('tahun.index') }}">
              <i class="bi bi-circle"></i><span>Data Tahun</span>
            </a>
          </li>
            <a href="{{ route('tupoksi.index') }}">
              <i class="bi bi-circle"></i><span>Data Tupoksi</span>
            </a>
          </li>
          <li>
            <a href="{{ route('aktifitas.index') }}">
              <i class="bi bi-circle"></i><span>Data Aktifitas</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('managekegiatan.index') }}">
          <i class="bi bi-people-fill"></i>
          <span>Management Kegiatan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#SKP-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-arrow-right"></i><span>Input Sasaran Kerja</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="SKP-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('inputskputama.index') }}">
              <i class="bi bi-circle"></i><span>Utama</span>
            </a>
          </li>
          <li>
            <a href="{{ route('inputskptambahan.index') }}">
              <i class="bi bi-circle"></i><span>Tambahan</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-chat"></i>
          <span>Input Preview Perilaku</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('inputaktifitas.index') }}">
          <i class="bi bi-pencil-square"></i>
          <span>Input Aktifitas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('validasiguru.index') }}">
          <i class="bi bi-check-square"></i>
          <span>Validasi Aktifitas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-question-circle-fill"></i>
          <span>Bantuan</span>
        </a>
      </li>

      <li class="nav-heading">Halaman Akun</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
    </ul>

  </aside>