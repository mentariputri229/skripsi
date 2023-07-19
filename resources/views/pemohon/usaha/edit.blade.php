@extends('layouts.main')

@section('title')
Edit Usaha
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Usaha</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Usaha</li>
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
                        <form method="post" enctype="multipart/form-data" action="{{ route('user.usaha.update', $usaha->id) }}">
                            <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="namausaha">Nama Usaha</label>
                                    <input type="text" class="form-control" id="namausaha" name="namausaha" value="{{ $usaha->namausaha }}"
                                        placeholder="Masukan Nama Usaha" required>
                                </div>
                                <div class="form-group">
                                    <label for="namapimpinan">Nama Pimpinan</label>
                                    <input type="text" class="form-control" id="namapimpinan" name="namapimpinan" value="{{ $usaha->namapimpinan }}"
                                        placeholder="Masukan Nama Pimpinan" required>
                                </div>
                                <div class="form-group ">
                                    <label>Bentuk Usaha</label>
                                    <select name="bentukusaha" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih--
                                        </option>
                                        <option value="PT" {{ $usaha->bentukusaha == "PT" ? 'selected' : '' }} data-select2-id="34">PT</option>
                                        <option value="CV" {{ $usaha->bentukusaha == "CV" ? 'selected' : '' }} data-select2-id="35">CV</option>
                                        <option value="Kelompok" {{ $usaha->bentukusaha == "Kelompok" ? 'selected' : '' }} data-select2-id="35">Kelompok</option>
                                        <option value="Perseorangan" {{ $usaha->bentukusaha == "Perseorangan" ? 'selected' : '' }} data-select2-id="35">Perseorangan</option>
                                        <option value="Dinas" {{ $usaha->bentukusaha == "Dinas" ? 'selected' : '' }} data-select2-id="35">Dinas</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Komoditas</label>
                                    <select name="komoditas" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih--
                                        </option>
                                        <option value="Pangan" {{ $usaha->komoditas == "Pangan" ? 'selected' : '' }} data-select2-id="34">Pangan</option>
                                        <option value="Hortikultura" {{ $usaha->komoditas == "Hortikultura" ? 'selected' : '' }} data-select2-id="35">Hortikultura</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Jenis Usaha</label>
                                    <select name="jenisusaha" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih--
                                        </option>
                                        <option value="Produsen" {{ $usaha->jenisusaha == "Produsen" ? 'selected' : '' }} data-select2-id="34">Produsen</option>
                                        <option value="Pengedar" {{ $usaha->jenisusaha == "Pengedar" ? 'selected' : '' }} data-select2-id="35">Pengedar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $usaha->alamat }}"
                                        placeholder="Masukan Alamat" required>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('admin.produsen.index') }}"
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
