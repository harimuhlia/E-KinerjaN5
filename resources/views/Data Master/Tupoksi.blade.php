@extends('Layout.App')
@section('title', 'Data Tupoksi')
@section('subtitle', 'Tabel Tupoksi')

@section('content')
@error('tupoksi', 'status')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabel Tupoksi</h5>
      {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}
                    <!-- Basic Modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i> Tambah Data</button>
                    <div class="modal fade" id="basicModal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Form Tambah Tupoksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ action('App\Http\Controllers\TupoksiController@store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="tupoksi">Tupoksi</label>
                              <input id="tupoksi" class="form-control @error('tupoksi') is-invalid @enderror" type="text" name="tupoksi" required>
                              <label for="tupoksi">Status</label>
                              <input id="status" class="form-control @error('status') is-invalid @enderror" type="text" name="status" required>
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
            <th scope="col">Tupoksi</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($tupoksi as $tp)
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tp->tupoksi }}</td>
            <td>{{ $tp->status }}</td>
            <td>
               <!-- Modal Edit -->
               <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $tp->id }}"><i class="bi bi-pencil-square"></i></button>
               <div class="modal fade" id="editModal-{{ $tp->id }}" tabindex="-1">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Form Edit Tupoksi</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" enctype="multipart/form-data" action="{{ route('tupoksi.update', $tp->id )}}">
                      @method("PUT")
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         <label for="tupoksi">Tupoksi</label>
                         <input id="tupoksi" class="form-control" type="text" name="tupoksi" value="{{ old('tupoksi',$tp->tupoksi) }}">
                         <label for="status">Status</label>
                         <input id="status" class="form-control" type="text" name="status" value="{{ old('status',$tp->status) }}">
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
                       <h5 class="modal-title">Form Edit Tupoksi</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form method="POST" action="{{ route('tupoksi.destroy', $tp->id) }}">
                      @method('DELETE')
                      @csrf
                     <div class="modal-body">
                       <div class="form-group">
                         Apakah yakin anda akan menghapus data Tupoksi <strong>{{ $tp->tupoksi }}</strong>
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