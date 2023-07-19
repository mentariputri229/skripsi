@extends('layouts.main')

@section('title')
Rekomendasi Pengedar Hortikultura
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rekomendasi Pengedar Hortikultura</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Rekomendasi Pengedar Hortikultura</li>
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
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.pengedarhortikultura.update', $pengedarhortikultura->id) }}">
                            <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="form-group ">
                                    <label>Pilih Produsen</label>
                                    <select name="produsen_id" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih Produsen--
                                        </option>
                                        @foreach ($data as $d)
                                        <option value="{{ $d->id }}" {{ $pengedarhortikultura->produsen_id == $d->id ? 'selected' : '' }} data-select2-id="34">{{ $d->produsen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Pilih Usaha</label>
                                    <select name="usaha_id" class="form-control select2 select2-hidden-accessible"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="3">--Pilih Usaha--
                                        </option>
                                        @foreach ($usaha as $u)
                                        <option value="{{ $u->id }}" data-select2-id="34">{{ $u->namausaha }}</option>
                                        <option value="{{ $u->id }}" {{ $pengedarhortikultura->usaha_id == $u->id ? 'selected' : '' }} data-select2-id="34">{{ $u->namausaha }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="asal_benih">Asal Benih</label>
                                            <input type="text" class="form-control" id="asal_benih" name="asal_benih" value="{{$pengedarhortikultura->asal_benih}}"
                                                placeholder="Masukan Asal Benih">
                                            </div>
                                            <div class="form-group">
                                            <label for="jenis_benih">Jenis Benih</label>
                                            <input type="text" class="form-control" id="jenis_benih" name="jenis_benih" value="{{$pengedarhortikultura->jenis_benih}}"
                                                placeholder="Masukan Jenis Benih">
                                            </div>
                                            <div class="form-group">
                                                <label for="nomor_surat">Nomor Surat</label>
                                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$pengedarhortikultura->nomor_surat}}"
                                                    placeholder="Masukan Nomor Surat">
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control select2 select2-hidden-accessible"
                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" data-select2-id="3">--Pilih Status--
                                                </option>
                                                <option value="Menunggu Konfirmasi" {{ $pengedarhortikultura->status == "Menunggu Konfirmasi" ? 'selected' : '' }} data-select2-id="34">Menunggu Konfirmasi</option>
                                                <option value="Dikonfirmasi" {{ $pengedarhortikultura->status == "Dikonfirmasi" ? 'selected' : '' }} data-select2-id="34">Dikonfirmasi</option>
                                                <option value="Survei Lapangan" {{ $pengedarhortikultura->status == "Survei Lapangan" ? 'selected' : '' }} data-select2-id="35">Survei Lapangan</option>
                                                <option value="Selesai" {{ $pengedarhortikultura->status == "Selesai" ? 'selected' : '' }} data-select2-id="35">Selesai</option>
                                                <option value="Ditolak" {{ $pengedarhortikultura->status == "Ditolak" ? 'selected' : '' }} data-select2-id="35">Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="produksi">Jumlah produksi (Ton/Tahun)</label>
                                            <input type="number" class="form-control" id="produksi" name="produksi" value="{{$pengedarhortikultura->produksi}}"
                                                placeholder="Masukan Jumlah Produksi">
                                        </div>
                                        <div class="form-group">
                                            <label for="persyaratan">File Persyaratan Dalam Bentuk PDF</label>
                                            <input type="file" class="form-control" id="persyaratan" name="persyaratan"
                                                placeholder="Masukan Persyaratan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('user.pengedarhortikultura.index') }}"
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
