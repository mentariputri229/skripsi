@extends('layouts.main')

@section('title')
Tambah Usaha
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Usaha</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Usaha</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3>Tambah</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('user.usaha.store') }}">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
                                <div class="form-group">
                                    <label for="namausaha">Nama Usaha</label>
                                    <input type="text" class="form-control" id="namausaha" name="namausaha"
                                        placeholder="Masukan Nama Usaha" required>
                                </div>
                                <div class="form-group">
                                    <label for="namapimpinan">Nama Pimpinan</label>
                                    <input type="text" class="form-control" id="namapimpinan" name="namapimpinan"
                                        placeholder="Masukan Nama Pimpinan" required>
                                </div>
                                <div class="form-group ">
                                    <label>Jenis Kelamin Pimpinan</label>
                                    <select name="jk" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih--
                                        </option>
                                        <option value="Laki-laki" data-select2-id="34">Laki-laki</option>
                                        <option value="Perempuan" data-select2-id="35">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nohp">Nomor HP</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp"
                                        placeholder="Masukan Nomor HP" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Masukan Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="photo">photo Pimpinan</label>
                                    <input type="file" class="form-control" id="photo" name="photo"
                                        placeholder="Masukan Foto Pimpinan" required>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('user.usaha.index') }}"
                                        class="btn btn btn-danger">Kembali</a>
                                </td>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
@endsection
