@extends('layouts.main')

@section('title')
Permohonan Rekomendasi Hortikultura
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Permohonan Rekomendasi Hortikultura</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.beranda')}}">Home</a></li>
              <li class="breadcrumb-item active">Permohonan Rekomendasi Hortikultura</li>
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
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.hortikultura.update', $hortikultura->id) }}">
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
                                        <option value="{{ $d->id }}" {{ $hortikultura->produsen_id == $d->id ? 'selected' : '' }} data-select2-id="34">{{ $d->produsen }}</option>
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
                                        <option value="{{ $u->id }}" {{ $hortikultura->usaha_id == $u->id ? 'selected' : '' }} data-select2-id="34">{{ $u->namausaha }}</option>
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
                                                <option value="Sayuran" {{ $hortikultura->jenis_benih == "Sayuran" ? 'selected' : '' }} data-select2-id="34">Sayuran</option>
                                                <option value="Buah-buahan" {{ $hortikultura->jenis_benih == "Buah-buahan" ? 'selected' : '' }} data-select2-id="35">Buah-buahan</option>
                                                <option value="Tanaman Obat" {{ $hortikultura->jenis_benih == "Tanaman Obat" ? 'selected' : '' }} data-select2-id="35">Tanaman Obat</option>
                                                <option value="Tanaman Hias" {{ $hortikultura->jenis_benih == "Tanaman Hias" ? 'selected' : '' }} data-select2-id="35">Tanaman Hias</option>
                                            </select>
                                        </div>
                                        @if($hortikultura->status == "Survei Lapangan")
                                        <div class="form-group">
                                            <label for="nomor_surat">Nomor Surat</label>
                                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$hortikultura->nomor_surat}}"
                                                placeholder="Masukan Nomor Surat">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_akhir">Tanggal Akhir Masa Berlaku</label>
                                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{$hortikultura->tanggal_akhir}}"
                                                placeholder="Masukan Nomor Surat">
                                        </div>
                                        @elseif($hortikultura->status == "Selesai")
                                        <div class="form-group">
                                            <label for="nomor_surat">Nomor Surat</label>
                                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{$hortikultura->nomor_surat}}"
                                                placeholder="Masukan Nomor Surat">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_akhir">Tanggal Akhir Masa Berlaku</label>
                                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{$hortikultura->tanggal_akhir}}"
                                                placeholder="Masukan Nomor Surat">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control select2 select2-hidden-accessible"
                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" data-select2-id="3">--Pilih Status--
                                                </option>
                                                <option value="Menunggu Konfirmasi" {{ $hortikultura->status == "Menunggu Konfirmasi" ? 'selected' : '' }} data-select2-id="34">Menunggu Konfirmasi</option>
                                                <option value="Dikonfirmasi" {{ $hortikultura->status == "Dikonfirmasi" ? 'selected' : '' }} data-select2-id="34">Dikonfirmasi</option>
                                                <option value="Survei Lapangan" {{ $hortikultura->status == "Survei Lapangan" ? 'selected' : '' }} data-select2-id="35">Survei Lapangan</option>
                                                <option value="Selesai" {{ $hortikultura->status == "Selesai" ? 'selected' : '' }} data-select2-id="35">Selesai</option>
                                                <option value="Ditolak" {{ $hortikultura->status == "Ditolak" ? 'selected' : '' }} data-select2-id="35">Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_diterima">Tanggal Diterima</label>
                                            <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" value="{{$hortikultura->tanggal_diterima}}"
                                                placeholder="Masukan Nomor Surat">
                                        </div>
                                        <div class="form-group">
                                            <label for="persyaratan">File Persyaratan Dalam Bentuk PDF</label>
                                            <input type="file" class="form-control" id="persyaratan" name="persyaratan"
                                                placeholder="Masukan Foto Pimpinan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sarana/Prasarana</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                            <input class="form-check-input" name="sarana[]" value="Rencana Kerja Produksi Tahunan" {{ in_array('Rencana Kerja Produksi Tahunan', $hortikultura->sarana) ? 'checked' : '' }} type="checkbox">
                                            <label class="form-check-label">Rencana Kerja Produksi Tahunan</label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" name="sarana[]" value="Luas Tanah Diatas 5000 m" {{ in_array('Luas Tanah Diatas 5000 m', $hortikultura->sarana) ? 'checked' : '' }} type="checkbox">
                                            <label class="form-check-label">Luas Tanah Diatas 5000 m<sup>2</sup></label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" name="sarana[]" value="Jumlah Tenaga Kerja Lebih Dari 2 Orang" {{ in_array('Jumlah Tenaga Kerja Lebih Dari 2 Orang', $hortikultura->sarana) ? 'checked' : '' }} type="checkbox">
                                            <label class="form-check-label">Jumlah Tenaga Kerja Lebih Dari 2 Orang</label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" name="sarana[]" value="Adanya Alat Transportasi, Gudang/Tempat Penyimpanan Benih" {{ in_array('Adanya Alat Transportasi, Gudang/Tempat Penyimpanan Benih', $hortikultura->sarana) ? 'checked' : '' }} type="checkbox">
                                            <label class="form-check-label">Adanya Alat Transportasi, Gudang/Tempat Penyimpanan Benih</label>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('admin.hortikultura.index') }}"
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
