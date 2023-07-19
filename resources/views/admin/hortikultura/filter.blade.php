@extends('layouts.main')

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
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
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
                            <h3>Cetak</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('report.rekomendasihortikulturacetak') }}" target="_blank">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="start">Masukan Tanggal Awal</label>
                                        <input type="date" class="form-control col-md-6" id="start" name="start"
                                            placeholder="Masukan Tahun" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end">Masukan Tanggal Akhir</label>
                                        <input type="date" class="form-control col-md-6" id="end" name="end"
                                            placeholder="Masukan Tahun" required>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <td>
                                        <a type="button" href="{{ route('admin.hortikultura.index') }}"
                                            class="btn btn btn-danger">Kembali</a>
                                    </td>
                                    <button type="submit" class="btn btn-primary">Cetak Data</button>
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>



<!-- Main content -->


@endsection
