@extends('Layout.App')
@section('title', 'Validasi')
@section('subtitle', 'Validasi Data')

@section('content')
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="{{ asset('Template') }}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <br>
            <h5>Hari Muhlia</h5>
            <h6>NUPTK: 01234567890123</h6>
            <p class="text-primary text-center">Pengelola Website</p>
            <div class="row">
                <div class="col">
                    <a href="#" class="badge bg-success"> 1 | 30-11-2021</a>
                </div>
                <div class="col">
                    <a href="#" class="badge bg-success"> 5 | 31-11-2021</a>
                </div>
              </div>
              <br>
              <a href="#" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#validasi">5 Aktifitas Lainnya</a>
              <div class="modal fade" id="validasi" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Validasi Aktifitas Utama</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" enctype="multipart/form-data" action="">
                     @method("PUT")
                     @csrf
                    <div class="modal-body">
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Sasaran Kerja Pegawai</th>
                            <th scope="col">Laporan</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, voluptates!</td>
                            <td>2 Laporan</td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i> Terima</button>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i> Tolak</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Tutup</button>
                      {{-- <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Update</button> --}}
                    </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
@endsection