@extends('Layout.App')
@section('title', 'Data Aktifitas')
@section('subtitle', 'Tabel Aktifitas')

@section('content')
@error('tupoksi', 'status')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabel Tahun</h5>
      {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}
                    <!-- Basic Modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i> Tambah Data</button>
                    <div class="modal fade" id="basicModal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Form Tambah Aktifitas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('aktifitas.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="tupoksi">Kategori</label>
                              <select name="kategori" id="" class="form-control">
                                  <option value="">Pilih Kategori...</option>
                                  <option value="utama">Utama</option>
                                  <option value="tambahan">Tambahan</option>
                              </select>
                              <label for="tupoksi">Nama Aktifitas</label>
                              <input id="status" class="form-control @error('status') is-invalid @enderror" type="text" name="nama_aktifitas" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Batal</button>
                            <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- End Basic Modal-->
      <!-- Table with stripped rows -->
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kategori</th>
            <th scope="col">Nama</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($kategoris as $tp)
            <td>{{ $loop->iteration }}</td>
            <td>
                <span class="text-uppercase">
                    {{$tp->kategori}}
                </span>
            </td>
            <td>{{ $tp->nama_aktifitas }}</td>
            <td>
               <!-- Modal Edit -->
               <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $tp->id }}"><i class="bi bi-pencil-square"></i></button>
               <div class="modal fade" id="editModal-{{ $tp->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Edit Aktifitas</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" enctype="multipart/form-data" action="{{ route('aktifitas.update', $tp->id )}}">
                      @method("PUT")
                      @csrf
                     <div class="modal-body">
                        <div class="form-group">
                            <label for="tupoksi">Kategori</label>
                            <select name="kategori" id="" class="form-control">
                                <option value="">Pilih Kategori...</option>
                                <option value="utama" {{$tp->kategori == 'utama' ? 'selected' : ''}}>Utama</option>
                                <option value="tambahan" {{$tp->kategori == 'tambahan' ? 'selected' : ''}}>Tambahan</option>
                            </select>
                            <label for="tupoksi">Nama Aktifitas</label>
                            <input id="status" value="{{ $tp->nama_aktifitas }}" class="form-control @error('status') is-invalid @enderror" type="text" name="nama_aktifitas" required>
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
               <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal-{{ $tp->id }}"><i class="bi bi-trash-fill"></i></button>
               <div class="modal fade" id="hapusModal-{{ $tp->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Hapus Aktifitas</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" action="{{ route('aktifitas.destroy', $tp->id) }}">
                      @method('DELETE')
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         Apakah yakin anda akan menghapus data Aktifitas <strong>{{ $tp->tupoksi }}</strong>
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