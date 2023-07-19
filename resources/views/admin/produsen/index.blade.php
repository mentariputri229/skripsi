@extends('layouts.main')
@section('title')
Produsen
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Produsen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.beranda')}}">Home</a></li>
              <li class="breadcrumb-item active">Produsen </li>
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
                            <a href="{{ route('admin.produsen.create') }}" class="btn  btn-primary">
                                <span><i class="feather icon-plus"></i> Tambah Data Produsen</span>
                            </a>
                            <a type="button" href="{{ route('report.produsenAll') }}" class="btn  btn-primary float-right" target="_blank">Cetak
                            </a>
                        </td>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Produsen</th>
                                    <th>Nama Pimpinan</th>
                                    <th>Jenis Kelamin Pimpinan</th>
                                    <th>Nomor HP</th>
                                    <th>NPWP</th>
                                    <th>Foto Pimpinan</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-left">
                                @foreach ($data as $d )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->produsen }}</td>
                                    <td>{{ $d->namapimpinan }}</td>
                                    <td>{{ $d->jk }}</td>
                                    <td>{{ $d->nohp }}</td>
                                    <td>{{ $d->npwp }}</td>
                                    <td><a class="btn btn-info" href="{{ asset('img/fotoprodusen/'.$d->photo   ) }}" target="_blank">Lihat Foto</a></td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info text-white" href="{{ route('admin.produsen.edit', $d->id) }}">
                                            <i class="fas fa-edit"></i>
                                          </a>
                                        <button data-target="#modaldelete" data-toggle="modal" type="button"
                                            class="delete btn btn-sm bg-danger"
                                            data-link="{{ route('admin.produsen.destroy',$d->id) }}">
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
