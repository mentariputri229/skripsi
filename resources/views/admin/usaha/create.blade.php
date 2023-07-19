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
              <li class="breadcrumb-item"><a href="{{route('admin.beranda')}}">Home</a></li>
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
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.usaha.store') }}">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group ">
                                    <label>Pilih User</label>
                                    <select name="user_id" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih User--
                                        </option>
                                        @foreach ($data as $d)
                                        <option value="{{ $d->id }}" data-select2-id="34">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="namausaha">Nama Usaha</label>
                                    <input type="text" class="form-control" id="namausaha" name="namausaha"
                                        placeholder="Masukan Nama Usaha" required>
                                </div>
                                <div class="form-group ">
                                    <label>Bentuk Usaha</label>
                                    <select name="bentukusaha" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih--
                                        </option>
                                        <option value="PT" data-select2-id="34">PT</option>
                                        <option value="CV" data-select2-id="35">CV</option>
                                        <option value="Kelompok" data-select2-id="35">Kelompok</option>
                                        <option value="Perseorangan" data-select2-id="35">Perseorangan</option>
                                        <option value="Dinas" data-select2-id="35">Dinas</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Komoditas</label>
                                    <select name="komoditas" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih--
                                        </option>
                                        <option value="Pangan" data-select2-id="34">Pangan</option>
                                        <option value="Hortikultura" data-select2-id="35">Hortikultura</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Jenis Usaha</label>
                                    <select name="jenisusaha" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih--
                                        </option>
                                        <option value="Produsen" data-select2-id="34">Produsen</option>
                                        <option value="Pengedar" data-select2-id="35">Pengedar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Masukan Alamat" required>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('admin.user.index') }}"
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
