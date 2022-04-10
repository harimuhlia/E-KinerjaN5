@extends('Layout.App')
@section('title', 'Sasaran Kerja Pegawai')
@section('subtitle', 'Tabel SKP Utama')

@section('content')
@error('kegiatan', 'keterangan')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabel Sasaran Kerja Pegawai</h5>
      {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}
                    <!-- Basic Modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i> Tambah Sasaran Kerja Pegawai</button>
                    <a href="#" type="button" class="btn btn-success btn-sm"><i class="bi bi-file-earmark-excel"></i> Eksport Sasaran Kerja Pegawai</a>
                    <a href="#" type="button" class="btn btn-secondary btn-sm"><i class="bi bi-printer"></i> Cetak Sasaran Kerja Pegawai</a>
                    <div class="modal fade" id="basicModal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Tambah Sasaran Kerja Pegawai</h5>
                                  <!-- Multi Columns Form -->
                                  <form class="row g-3" action="{{ action('App\Http\Controllers\SkputamaController@store')}}" method="POST">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="kegiatan">Kegiatan</label>
                                        <input id="kegiatan" class="form-control @error('skpuifitas') is-invalid @enderror" type="text" name="kegiatan" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="tupoksi">Tupoksi</label>
                                        <input id="tupoksi" class="form-control @error('keterangan') is-invalid @enderror" type="text" name="tupoksi">
                                      </div>
                                      <div class="col-md-12">
                                        <label for="sasarankerja" class="form-label">Sasaran Kerja Pegawai</label>
                                        <textarea name="kegiatan" id="" class="form-control @error('skpuifitas') is-invalid @enderror" style="height: 50px" required></textarea>
                                      </div>
                                    <div class="col-md-4">
                                        <label for="inputZip" class="form-label">Output</label>
                                        <input type="text" class="form-control" name="" id="inputZip">
                                      </div>
                                    <div class="col-md-8">
                                        <label for="inputZip" class="form-label">Jenis File</label>
                                      <select id="inputState" name="" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Laporan</option>
                                        <option>Dokumen</option>
                                        <option>File</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputZip" class="form-label">Waktu</label>
                                        <input type="text" class="form-control" name="" id="inputZip">
                                      </div>
                                    <div class="col-md-8">
                                        <label for="inputZip" class="form-label">Jenis Waktu</label>
                                      <select id="inputState" name="" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Menit</option>
                                        <option>Jam</option>
                                        <option>Hari</option>
                                      </select>
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
      <!-- Table with stripped rows -->
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Sasaran Kerja Pegawai</th>
            <th scope="col">Target Output</th>
            <th scope="col">Waktu</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($skputama as $skpu)
            <td>{{ $loop->iteration }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
               <!-- Modal Edit -->
               <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $skpu->id }}"><i class="bi bi-pencil-square"></i></button>
               <div class="modal fade" id="editModal-{{ $skpu->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Edit SKP Utama</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" enctype="multipart/form-data" action="{{ route('inputskputama.update', $skpu->id )}}">
                      @method("PUT")
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         <label for="skpuifitas">skpuifitas</label>
                         <input id="skpuifitas" class="form-control" type="text" name="skpuifitas" value="{{ old('skpuifitas',$skpu->skpuifitas) }}">
                         <label for="keterangan">Keterangan</label>
                         <input id="keterangan" class="form-control" type="text" name="keterangan" value="{{ old('keterangan',$skpu->keterangan) }}">
                       </div>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Batal</button>
                       <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Update</button>
                     </form>
                     </div>
                   </div>
                 </div>
               </div>
               <!-- End Modal Edit-->

               <!-- Modal Hapus -->
               <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal-{{ $skpu->id }}"><i class="bi bi-trash-fill"></i></button>
               <div class="modal fade" id="hapusModal-{{ $skpu->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Edit skpuifitas</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" action="{{ route('inputskputama.destroy', $skpu->id) }}">
                      @method('DELETE')
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         Apakah yakin anda akan menghapus data skpuifitas <strong>{{ $skpu->skpuifitas }}</strong>
                       </div>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Batal</button>
                       <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> Hapus</button>
                     </form>
                     </div>
                   </div>
                 </div>
               </div>
               <!-- End Modal Hapus-->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
@endsection