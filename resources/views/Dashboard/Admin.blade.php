@extends('Layout.App')
@section('title', 'Dasboard')

@section('content')
<div class="row">

        <!-- Batas Awal Card Utama -->
  
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">
  
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
  
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
  
              <div class="card-body">
                <h5 class="card-title">Data Pendidik <span>| Today</span></h5>
  
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>145</h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
  
                  </div>
                </div>
              </div>
  
            </div>
          </div>
          <!-- End Sales Card -->
  
          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">
  
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
  
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
  
              <div class="card-body">
                <h5 class="card-title">Data Tendik <span>| This Month</span></h5>
  
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>$3,264</h6>
                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
  
                  </div>
                </div>
              </div>
  
            </div>
          </div>
          <!-- End Revenue Card -->
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Data Lainnya <span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>145</h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- End Sales Card -->

      <!-- Batas Akhir Card Utama -->
  {{-- Batas Awal Timeline --}}
  <div class="card">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      @forelse ($timeline as $tl)
      
      @empty
          
      @endforelse
      <h5 class="card-title">Pengumuman Terbaru <span>| Hari Ini: @php echo date('d F, Y'); @endphp </span></h5>
      @foreach ($timeline as $tl)
      <div class="activity">
        <!-- Batas Awal activity item-->
        <div class="activity-item d-flex">
          <div class="activite-label">{{$tl->created_at->diffForhumans()}}</div>
          <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
          <div class="activity-content">
            <img src="{{ Storage::url('public/gambartimeline/').$tl->gambar }}" class="rounded" alt="" style="width: 500px;">
            <br>
            <br>
            {{$tl->deskripsi}}
          </div>
        </div>
        @endforeach
        <!-- Batas Akhir activity item-->
      </div>

    </div>
  </div>

  {{-- Batas Akhir Timeline --}}

  </div>
@endsection