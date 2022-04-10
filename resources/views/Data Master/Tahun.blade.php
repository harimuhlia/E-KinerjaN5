@extends('Layout.App')
@section('title', 'Data Tahun')
@section('subtitle', 'Tabel Tahun')

@section('content')
@error('tahun')
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
                            <h5 class="modal-title">Form Tambah Tahun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ action('App\Http\Controllers\TahunController@store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="tahun">Tambah Tahun</label>
                              <input id="tahun" class="form-control @error('tahun') is-invalid @enderror" type="text" name="tahun" required>
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
            <th scope="col">Tahun</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($tahun as $th)
            <td>{{ $loop->iteration }}</td>
            <td>{{ $th->tahun }}</td>
            <td>
               <!-- Modal Edit -->
               <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $th->id }}"><i class="bi bi-pencil-square"></i></button>
               <div class="modal fade" id="editModal-{{ $th->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Edit Tahun</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" enctype="multipart/form-data" action="{{ route('tahun.update', $th->id )}}">
                      @method("PUT")
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         <label for="tahun">Edit Tahun</label>
                         <input id="tahun" class="form-control" type="text" name="tahun" value="{{ old('tahun',$th->tahun) }}">
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
               <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal-{{ $th->id }}"><i class="bi bi-trash-fill"></i></button>
               <div class="modal fade" id="hapusModal-{{ $th->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Edit Tahun</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" action="{{ route('tahun.destroy', $th->id) }}">
                      @method('DELETE')
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         Apakah yakin anda akan menghapus data Tahun <strong>{{ $th->tahun }}</strong>
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