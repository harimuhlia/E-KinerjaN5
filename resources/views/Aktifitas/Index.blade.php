@extends('Layout.App')
@section('title', 'Aktifitas')
@section('subtitle', 'Input Aktifitas')

@section('content')
<section class="section profile">
    <div class="row">
      <div class="col-xl-7">
        <head>
          <title>Laravel 8 FullCalendar Tutorial</title>
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
       </head>
       <body>
          <div class="container">
             <div id='calendar'></div>
          </div>
          <script>
             $(document).ready(function () {
                
             var SITEURL = "{{ url('/') }}";
               
             $.ajaxSetup({
                 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
               
             var calendar = $('#calendar').fullCalendar({
                                 editable: true,
                                 events: SITEURL + "/fullcalender",
                                 displayEventTime: false,
                                 editable: true,
                                 eventRender: function (event, element, view) {
                                     if (event.allDay === 'true') {
                                             event.allDay = true;
                                     } else {
                                             event.allDay = false;
                                     }
                                 },
                                 selectable: true,
                                 selectHelper: true,
                                 select: function (start, end, allDay) {
                                     var title = prompt('Event Title:');
                                     if (title) {
                                         var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                         var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                         $.ajax({
                                             url: SITEURL + "/fullcalenderAjax",
                                             data: {
                                                 title: title,
                                                 start: start,
                                                 end: end,
                                                 type: 'add'
                                             },
                                             type: "POST",
                                             success: function (data) {
                                                 displayMessage("Event Created Successfully");
               
                                                 calendar.fullCalendar('renderEvent',
                                                     {
                                                         id: data.id,
                                                         title: title,
                                                         start: start,
                                                         end: end,
                                                         allDay: allDay
                                                     },true);
               
                                                 calendar.fullCalendar('unselect');
                                             }
                                         });
                                     }
                                 },
                                 eventDrop: function (event, delta) {
                                     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
               
                                     $.ajax({
                                         url: SITEURL + '/fullcalenderAjax',
                                         data: {
                                             title: event.title,
                                             start: start,
                                             end: end,
                                             id: event.id,
                                             type: 'update'
                                         },
                                         type: "POST",
                                         success: function (response) {
                                             displayMessage("Event Updated Successfully");
                                         }
                                     });
                                 },
                                 eventClick: function (event) {
                                     var deleteMsg = confirm("Do you really want to delete?");
                                     if (deleteMsg) {
                                         $.ajax({
                                             type: "POST",
                                             url: SITEURL + '/fullcalenderAjax',
                                             data: {
                                                     id: event.id,
                                                     type: 'delete'
                                             },
                                             success: function (response) {
                                                 calendar.fullCalendar('removeEvents', event.id);
                                                 displayMessage("Event Deleted Successfully");
                                             }
                                         });
                                     }
                                 }
              
                             });
              
             });
              
             function displayMessage(message) {
                 toastr.success(message, 'Event');
             } 
               
          </script>
        <div class="alert alert-info bg-light border-0 alert-dismissible fade show" role="alert">
          <a href="#" class="badge bg-success">Backup Aktifitas Bulan Januari</a>
          <p><i class="bi bi-file-earmark-excel"></i> Backuplah Aktifitas Secara Berkala. Untuk Berjaga-jaga, dan Anda juga menyimpan Data Aktifitas Anda Sendiri. </p>
        </div>
       </body>

    </div>

  {{-- Batas Sidebar Utama Dan Tambahan --}}
      <div class="col-xl-5">

        <div class="card">
          <div class="card-body pt-">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#sidebar-utama">Utama</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sidebar-tambahan">Tambahan</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="sidebar-utama">
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
              
                        <div class="card">
                          <div class="card-body">
              
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                              </thead>
                              <span class="badge border-success border-1 text-info">Tanggal Hari Ini: 16 Sep 2021</span>
                              <tbody>
                                @foreach ($kategoris as $item)
                                <th scope="row">{{ $loop->iteration }}</th>
                                  <td>
                                      {{$item->nama_aktifitas}}
                                      <span class="badge border-success border-1 text-info">Waktu: 300 Menit</span>
                                  </td>
                                  <td>
                                    <!-- Basic Modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#laporUtama{{ $item->id }}">Lapor</button>
                        <div class="modal fade" id="laporUtama{{ $item->id }}" >
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-header">
                                      <h4>Input Aktifitas Utama</h4>
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->nama_aktifitas}}</h5>
                                      <!-- Multi Columns Form -->
                                      <form class="row g-3" action="#" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="kegiatan">Sasaran Kerja Pegawai</label>
                                            <select id="inputState" name="" class="form-select" required>
                                              <option selected>Ambil data dari tabel Sasaran Kerja Pegawai</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputZip" class="form-label">Hasil</label>
                                            <input type="text" class="form-control" name="" id="inputZip">
                                          </div>
                                        <div class="col-md-6">
                                          <label for="inputZip" class="form-label">Berkas</label>
                                          <select id="inputState" name="" class="form-select">
                                            <option selected>Choose...</option>
                                            <option>Laporan</option>
                                            <option>Dokumen</option>
                                            <option>File</option>
                                          </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputZip" class="form-label">Waktu Mulai</label>
                                            <input type="time" class="form-control" name="" id="inputZip">
                                          </div>
                                        <div class="col-md-6">
                                          <label for="inputZip" class="form-label">Waktu Selesai</label>
                                          <input type="time" class="form-control" name="" id="inputZip">
                                        </div>
                                        <div class="col-md-12">
                                          <label for="sasarankerja" class="form-label">Keterangan</label>
                                          <textarea name="" id="" class="form-control" style="height: 50px"></textarea>
                                        </div>
                                        <div class="col-12">
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Batal</button>
                                            <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Simpan</button>
                                        </div>
                                      </form>
                                      <!-- End Multi Columns Form -->
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Basic Modal-->
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
              
                          </div>
                        </div>
              
                      </div>
                    </div>
                  </section>
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="sidebar-tambahan">
                <section class="section">
                    <div class="row">
                      <div class="col-lg-12">
              
                        <div class="card">
                          <div class="card-body">
              
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $loop->iteration }}</th>
                                  <td>
                                      {{$item->nama_aktifitas}}
                                      <span class="badge border-success border-1 text-info">Waktu: 300 Menit</span>
                                  </td>
                                  <td>
                                                                        <!-- Basic Modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#laporTambahan{{ $item->id }}">Lapor</button>
                        <div class="modal fade" id="laporTambahan{{ $item->id }}" >
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-header">
                                      <h4>Input Aktifitas Utama</h4>
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->nama_aktifitas}}</h5>
                                      <!-- Multi Columns Form -->
                                      <form class="row g-3" action="#" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="kegiatan">Sasaran Kerja Pegawai</label>
                                            <select id="inputState" name="" class="form-select" required>
                                              <option selected>Ambil data dari tabel Sasaran Kerja Pegawai</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputZip" class="form-label">Hasil</label>
                                            <input type="text" class="form-control" name="" id="inputZip">
                                          </div>
                                        <div class="col-md-6">
                                          <label for="inputZip" class="form-label">Berkas</label>
                                          <select id="inputState" name="" class="form-select">
                                            <option selected>Choose...</option>
                                            <option>Laporan</option>
                                            <option>Dokumen</option>
                                            <option>File</option>
                                          </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputZip" class="form-label">Waktu Mulai</label>
                                            <input type="time" class="form-control" name="" id="inputZip">
                                          </div>
                                        <div class="col-md-6">
                                          <label for="inputZip" class="form-label">Waktu Selesai</label>
                                          <input type="time" class="form-control" name="" id="inputZip">
                                        </div>
                                        <div class="col-md-12">
                                          <label for="sasarankerja" class="form-label">Keterangan</label>
                                          <textarea name="" id="" class="form-control" style="height: 50px"></textarea>
                                        </div>
                                        <div class="col-12">
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Batal</button>
                                            <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Simpan</button>
                                        </div>
                                      </form>
                                      <!-- End Multi Columns Form -->
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Basic Modal-->
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
              
                          </div>
                        </div>
              
                      </div>
                    </div>
                  </section>
              </div>
              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
<br>
{{-- Batas Tampil Hasil Inputan --}}
  <div class="col-xl-12">

    <div class="card">
      <div class="card-body pt-">
        <!-- Bordered Tabs -->
        <ul class="nav nav-tabs nav-tabs-bordered">

          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#kegiatan-utama">Utama</button>
          </li>

          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kegiatan-tambahan">Tambahan</button>
          </li>

        </ul>
        <div class="tab-content pt-2">

          <div class="tab-pane fade show active profile-overview" id="kegiatan-utama">
            <section class="section">
    {{-- Tampil Hasil Inputan Utama --}}
    <div class="modal-header">
      <h5 class="modal-title">Kegiatan Utama</h5>
    </div>
    <table class="table datatable">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Waktu</th>
          <th scope="col">Sasaran Kerja Pegawai</th>
          <th scope="col">Laporan</th>
          <th scope="col">Waktu</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>10-01-2022</td>
          <td>07.00 - 11.00</td>
          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, voluptates!</td>
          <td>2 Laporan</td>
          <td>60 Menit</td>
        </tr>
      </tbody>
    </table>
  </section>
</div>
    <div class="tab-pane fade profile-edit pt-3" id="kegiatan-tambahan">
    <section class="section">
    {{-- Tampil Hasil Inputan Tambahan --}}
    <div class="modal-header">
      <h5 class="modal-title">Kegiatan Tambahan</h5>
    </div>
    <table class="table datatable">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Waktu</th>
          <th scope="col">Sasaran Kerja Pegawai</th>
          <th scope="col">Laporan</th>
          <th scope="col">Waktu</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>10-01-2022</td>
          <td>07.00 - 11.00</td>
          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, voluptates!</td>
          <td>2 Laporan</td>
          <td>60 Menit</td>
        </tr>
      </tbody>
    </table>
  </section>
          </div>
          </div>
        </div>
    <!-- End Bordered Tabs -->
      </div>
    </div>
  </div>
@endsection