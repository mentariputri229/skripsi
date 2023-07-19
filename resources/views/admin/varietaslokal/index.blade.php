@extends('layouts.main')
@section('title')
Rekomendasi Varietas Lokal
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rekomendasi Varietas Lokal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Rekomendasi Varietas Lokal </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <td>
                            {{-- <a href="{{ route('user.varietaslokal.create') }}" class="btn  btn-primary">
                                <span><i class="feather icon-plus"></i> Buat Permohonan</span>
                            </a> --}}
                            <a type="button" href="{{ route('report.rekomendasilokalfilter') }}" class="btn  btn-primary float-right" target="_blank">Cetak
                            </a>
                        </td>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Usaha</th>
                                    <th>Alamat Usaha</th>
                                    <th>Nama Produsen</th>
                                    <th>Pemimpin Produsen</th>
                                    <th>Kontak Pemimpin Produsen</th>
                                    <th>Alamat Produsen</th>
                                    <th>Jenis Benih</th>
                                    <th>Kelas benih</th>
                                    <th>Persyaratan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-left">
                                @foreach ($data as $d )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->usaha->namausaha }}</td>
                                    <td>{{ $d->usaha->alamat }}</td>
                                    <td>{{ $d->produsen->produsen }}</td>
                                    <td>{{ $d->produsen->namapimpinan }}</td>
                                    <td>{{ $d->produsen->nohp }}</td>
                                    <td>{{ $d->produsen->alamat }}</td>
                                    <td>{{ $d->jenis_benih }}</td>
                                    <td>@if($d->kelas_benih == null)
                                        belum ditentukan
                                        @else
                                        {{ $d->kelas_benih }}
                                    @endif</td>
                                    <td><a class="btn btn-info" href="{{ asset('img/rekomendasivarietaslokal/'.$d->persyaratan   ) }}" target="_blank">Lihat Persyaratan</a></td>
                                    <td>{{ $d->status }}</td>
                                    <td>
                                        @if ($d->status == 'Selesai')
                                        <a class="btn btn-sm btn-success text-white" href="{{ route('report.sertifikatlokal', $d->id) }}">
                                            <i class="fas fa-print"></i>
                                          </a>
                                        @endif
                                        <a class="btn btn-sm btn-info text-white" href="{{ route('admin.varietaslokal.edit', $d->id) }}">
                                            <i class="fas fa-edit"></i>
                                          </a>
                                        <button data-target="#modaldelete" data-toggle="modal" type="button"
                                            class="delete btn btn-sm bg-danger"
                                            data-link="{{ route('admin.varietaslokal.destroy',$d->id) }}">
                                            <i class="fas fa-times"></i>
                                        </button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
      </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [""]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

<script>
    $('.delete').on('click', function(){
    var link = $(this).data('link');
    $('#formDelete').attr('action',link)
    });
</script>
@endsection
