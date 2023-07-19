<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h4,
        h2 {
            font-family: serif;
        }

        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }

        br {
            margin-bottom: 5px !important;
        }

        .judul {
            text-align: center;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 110px;
            padding: 0px;
        }

        .pemko {
            margin-top: -20px !important;
            width: 100%;
            height: 100%;
        }

        .logo {
            float: left;
            margin-right: 0px;
            width: 18%;
            padding: 0px;
            text-align: right;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 72%;
            padding-left: 0px;
            padding-right: 10%;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
            width: 100%;
        }

        .ttd {
            margin-left: 65%;
            text-align: center;
            text-transform: uppercase;
        }

        .text-right {
            text-align: right;
        }

        .isi {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="{{ asset('ART.png') }}">
        </div>
        <div class="headtext">
            <h4 style="margin:0px;">PEMERINTAH PROVINSI KALIMANTAN SELATAN</h4>
            <h3 style="margin:0px;">DINAS TANAMAN PANGAN DAN HORTIKULTURA </h3>
            <h4 style="margin:0px;">BALAI PENGAWASAN DAN SERTIFIKASI BENIH TANAMAN PANGAN DAN HORTIKULTURA KALIMANTAN SELATAN </h4>
            <p style="margin:0px;">Jl.P.Suryansyah ujung No.63 A 70711
            </p>
        </div>
        <br>
    </div>
    <div class="container">
        <hr style="margin-top:1px;">
        <div class="isi">
            <h3 style="text-align:center;">LAPORAN PERMOHONAN REKOMENDASI PRODUSEN VARIETAS LOKAL</h3>
            <br>
            <table id="myTable" class="table table-bordered table-striped dataTable no-footer text-center" role="grid"
                aria-describedby="myTable_info">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Usaha</th>
                        <th>Alamat Usaha</th>
                        <th>Nama Produsen</th>
                        <th>Pemimpin Produsen</th>
                        <th>Kontak Produsen</th>
                        <th>Alamat Produsen</th>
                        <th>Jenis Benih</th>
                        <th>Kelas benih</th>
                        <th>Status</th>
                        <th>Nomor Surat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)

                    <tr>
                        <td>{{$loop->iteration}}</td>
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
                        <td>{{ $d->status }}</td>
                        <td>@if($d->nomor_surat == null)
                            -
                            @else
                            {{ $d->nomor_surat }}
                        @endif</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <br>
            <br>
           <div class="ttd">
                <p style="margin:0px"> Banjarbaru, {{$now}}</p>
                <h6 style="margin:0px">Mengetahui</h6>
                <h5 style="margin:0px">Kepala Balai</h5>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">{{$ttdName}}</h5>
                <h5 style="margin:0px">NIP. 19681112 199903 1 007</h5>
            </div>
            <br>
            <br>
            <div class="text-right">
            <button id="btnPrint" class="btn btn-lg" style="width: 150px; height:40px; background-color:rgb(147, 147, 181); color:white;" onclick="PrintWindow()">Cetak</button>
            {{-- <input id="btnPrint" type="button" value="Print" onclick="PrintWindow()" /> --}}
        </div>
        </div>
    </div>
    <script type="text/javascript">
        function PrintWindow() {
            var btnPrint = document.getElementById("btnPrint");
            btnPrint.style.visibility = 'hidden';
            window.print()
            btnPrint.style.visibility = 'visible';
        }
    </script>
        </div>
    </div>
</body>

</html>
