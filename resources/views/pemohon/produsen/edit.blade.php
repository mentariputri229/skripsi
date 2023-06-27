@extends('layouts.main')

@section('title')
Edit Produsen
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Produsen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.beranda')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Produsen</li>
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
                        <h3>Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('user.produsen.update', $produsen->id) }}">
                            <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="produsen">Produsen</label>
                                    <input type="text" class="form-control" id="produsen" name="produsen" value="{{ $produsen->produsen }}"
                                        placeholder="Masukan Produsen" required>
                                </div>
                                <div class="form-group">
                                    <label for="namapimpinan">Nama Pimpinan</label>
                                    <input type="text" class="form-control" id="namapimpinan" name="namapimpinan" value="{{ $produsen->namapimpinan }}"
                                        placeholder="Masukan Nama Pimpinan" required>
                                </div>
                                <div class="form-group ">
                                    <label>Jenis Kelamin Pimpinan</label>
                                    <select name="jk" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih--
                                        </option>
                                        <option value="Laki-laki" {{ $produsen->jk == "Laki-laki" ? 'selected' : '' }} data-select2-id="34">Laki-laki</option>
                                        <option value="Perempuan" {{ $produsen->jk == "Perempuan" ? 'selected' : '' }} data-select2-id="35">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nohp">Nomor HP</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $produsen->nohp }}"
                                        placeholder="Masukan Nomor HP" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $produsen->alamat }}"
                                        placeholder="Masukan Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="photo">photo Pimpinan</label>
                                    <input type="file" class="form-control" id="photo" name="photo"
                                        placeholder="Masukan Foto Pimpinan">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('user.produsen.index') }}"
                                        class="btn btn btn-danger">Kembali</a>
                                </td>
                                <button type="submit" class="btn btn-primary">Edit Data</button>
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
