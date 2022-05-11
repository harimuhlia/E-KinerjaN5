@extends('Layout.App')
@section('title', 'Timeline')
@section('subtitle', 'Tabel Timeline')

@section('content')
@error('timeline', 'keterangan')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabel Timeline</h5>
      {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}
                    <!-- Basic Modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i> Tambah Data</button>
                    <div class="modal fade" id="basicModal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Form Tambah Timeline</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form enctype="multipart/form-data" action="{{ action('App\Http\Controllers\TimelineController@store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="judul">Judul</label>
                              <input id="judul" class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" required>
                              <br>
                              <label for="deskripsi">Deskripsi</label>
                              <textarea class="form-control" style="height: 100px" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" type="textarea" name="deskripsi" required></textarea>
                              <br>
                              <label for="gambar">Gambar</label>
                              <input id="gambar" class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar">
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
            <th scope="col">Judul Timeline</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Gambar Timeline</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($timeline as $tl)
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tl->judul }}</td>
            <td>{!! Str::limit("$tl->deskripsi", 80) !!}</td>
            <td>
              <img src="{{ Storage::url('public/gambartimeline/').$tl->gambar }}" class="rounded" alt="" style="width: 80px;">
          </td>
            <td>
               <!-- Modal Edit -->
               <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $tl->id }}"><i class="bi bi-pencil-square"></i></button>
               <div class="modal fade" id="editModal-{{ $tl->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Edit Timeline</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" enctype="multipart/form-data" action="{{ route('timeline.update', $tl->id )}}">
                      @method("PUT")
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         <label for="judul">Timeline</label>
                         <input id="judul" class="form-control" type="text" name="judul" value="{{ old('',$tl->judul) }}">
                         <br>
                         <label for="deskripsi">Deskripsi</label>
                         <textarea class="form-control" style="height: 100px" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" type="textarea" name="deskripsi" required>{{ old('deskripsi',$tl->deskripsi) }}</textarea>
                         <br>
                         <label for="gambar">Gambar Timeline</label>
                         <input id="gambar" class="form-control" type="file" name="gambar" value="{{ old('gambar',$tl->gambar) }}">
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
               <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal-{{ $tl->id }}"><i class="bi bi-trash-fill"></i></button>
               <div class="modal fade" id="hapusModal-{{ $tl->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Edit timeline</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" action="{{ route('timeline.destroy', $tl->id) }}">
                      @method('DELETE')
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         Apakah yakin anda akan menghapus data timeline <strong>{{ $tl->timeline }}</strong>
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