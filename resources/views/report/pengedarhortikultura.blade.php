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
            border: 1px solid transparent;
        }

        th {
            text-align: left;
        }

        td {
            text-align: left;
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
            <h3 style="text-align:center; text-decoration: underline;">REKOMENDASI SEBAGAI PENGEDAR BENIH HORTIKULTURA</h3>
            <h3 style="text-align:center; line-height:0.01;">Nomor : {{$data->nomor_surat}}</h3>
            <br>
            <p style="text-align: justify;">Berdasarkan Pasal 9 ayat (1) dan (2) pada Peraturan Menteri Pertanian Nomor 12/PERMENTAN/TP.020/4/2018, tentang Produksi, Sertifikasi dan Peredaran Benih Tanaman, setelah dilakukan penilaian terhadap persyaratan kelayakan teknis, maka permohonan dibawah ini :</p>
            <table >
                <tr >
                    <td width="180px" style="height:20px">Nama produsen</td>
                    <td width= "15px">:</td>
                    <td text-align="left">{{ $data->produsen->produsen }}</td>
                </tr>
                <tr >
                    <td width="180px" style="height:20px">Nama pimpinan</td>
                    <td width= "15px">:</td>
                    <td text-align="left">{{ $data->produsen->namapimpinan }}</td>
                </tr>
                <tr >
                    <td width="180px" style="height:20px">Alamat lokasi Usaha</td>
                    <td width= "15px">:</td>
                    <td text-align="left">{{ $data->usaha->alamat }}</td>
                </tr>
                <tr >
                    <td width="180px" style="height:20px">Alamat pimpinan</td>
                    <td width= "15px">:</td>
                    <td text-align="left">{{ $data->produsen->alamat }}</td>
                </tr>
                <tr >
                    <td width="180px" style="height:20px">Bentuk usaha</td>
                    <td width= "15px">:</td>
                    <td text-align="left">{{ $data->usaha->bentukusaha }}</td>
                </tr>
                <tr >
                    <td width="180px" style="height:20px">Jenis benih yang diusahakan</td>
                    <td width= "15px">:</td>
                    <td text-align="left">{{ $data->jenis_benih }}</td>
                </tr>
        </table>
        <br>
        <p style="text-align: justify;">Dinyatakan layak dan diberikan rekomendasi sebagai pengedar benih Hortikultura, Penetapan Rekomendasi Sebagai Pengedar Benih Tanaman Pangan Berlaku selama yang bersangkutan masih aktif mengedarkan/memperdagangkan benih Hortikultura tanaman pangan dan bersedia dilakukan peninjauan ulang minimal 1(satu) kali dalam setahun.</p>

            <br>
            <div style="float: left; margin-left: 20%; margin-top: 15px;">
                {!! QrCode::size(100)->generate($url) !!}
            </div>
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
