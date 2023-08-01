@extends('layouts.main')

@section('title')
Permohonan Rekomendasi Benih Unggul
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Permohonan Rekomendasi Benih Unggul</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Permohonan Rekomendasi Benih Unggul</li>
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
                        <form method="post" enctype="multipart/form-data" action="{{ route('user.benihunggul.update', $benihunggul->id) }}">
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
                                        <option value="{{ $d->id }}" {{ $benihunggul->produsen_id == $d->id ? 'selected' : '' }} data-select2-id="34">{{ $d->produsen }}</option>
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
                                        <option value="{{ $u->id }}" {{ $benihunggul->usaha_id == $u->id ? 'selected' : '' }} data-select2-id="34">{{ $u->namausaha }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Jenis Benih</label>
                                            <select name="jenis_benih" class="form-control select2 select2-hidden-accessible"
                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" data-select2-id="3">--Pilih--
                                                </option>
                                                <option value="Padi Inbrida" {{ $benihunggul->jenis_benih == "Padi Inbrida" ? 'selected' : '' }} data-select2-id="34">Padi Inbrida</option>
                                                <option value="Padi Hibrida" {{ $benihunggul->jenis_benih == "Padi Hibrida" ? 'selected' : '' }} data-select2-id="34">Padi Hibrida</option>
                                                <option value="Jagung Komposit" {{ $benihunggul->jenis_benih == "Jagung Komposit" ? 'selected' : '' }} data-select2-id="35">Jagung Komposit</option>
                                                <option value="Jagung Hibrida" {{ $benihunggul->jenis_benih == "Jagung Hibrida" ? 'selected' : '' }} data-select2-id="35">Jagung Hibrida</option>
                                                <option value="Kedelai" {{ $benihunggul->jenis_benih == "Kedelai" ? 'selected' : '' }} data-select2-id="35">Kedelai</option>
                                                <option value="Kacang Tanah" {{ $benihunggul->jenis_benih == "Kacang Tanah" ? 'selected' : '' }} data-select2-id="35">Kacang Tanah</option>
                                                <option value="Porang Unggul" {{ $benihunggul->jenis_benih == "Porang Unggul" ? 'selected' : '' }} data-select2-id="35">Porang Unggul</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="persyaratan">File Persyaratan Dalam Bentuk PDF</label>
                                            <input type="file" class="form-control" id="persyaratan" name="persyaratan"
                                                placeholder="Masukan Persyaratan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sarana/Prasarana</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                        <input class="form-check-input" name="sarana[]" value="Rencana Kerja Produksi Tahunan" {{ in_array('Rencana Kerja Produksi Tahunan', $benihunggul->sarana) ? 'checked' : '' }} type="checkbox">
                                        <label class="form-check-label">Rencana Kerja Produksi Tahunan</label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" name="sarana[]" value="Luas Tanah Diatas 5000 m" {{ in_array('Luas Tanah Diatas 5000 m', $benihunggul->sarana) ? 'checked' : '' }} type="checkbox">
                                        <label class="form-check-label">Luas Tanah Diatas 5000 m<sup>2</sup></label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" name="sarana[]" value="Jumlah Tenaga Kerja Lebih Dari 2 Orang" {{ in_array('Jumlah Tenaga Kerja Lebih Dari 2 Orang', $benihunggul->sarana) ? 'checked' : '' }} type="checkbox">
                                        <label class="form-check-label">Jumlah Tenaga Kerja Lebih Dari 2 Orang</label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" name="sarana[]" value="Adanya Alat Transportasi, Gudang/Tempat Penyimpanan Benih" {{ in_array('Adanya Alat Transportasi, Gudang/Tempat Penyimpanan Benih', $benihunggul->sarana) ? 'checked' : '' }} type="checkbox">
                                        <label class="form-check-label">Adanya Alat Transportasi, Gudang/Tempat Penyimpanan Benih</label>
                                        </div>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('user.benihunggul.index') }}"
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
