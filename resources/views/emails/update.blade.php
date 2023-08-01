@if ($status == 'Selesai')
@component('mail::message')
Kepada Yth. {{$name}},


Pengajuan Produsen/Pengedar anda telah selesai silahkan cetak surat rekomendasi, berlaku 1 tahun dari tanggal {{Carbon\carbon::parse($tanggal_diterima)->translatedFormat('d-F-Y')}} - {{Carbon\carbon::parse($tanggal_akhir)->translatedFormat('d-F-Y')}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/', 'color' => 'primary'])
Klik Disini Untuk Kunjungi Website Kami
@endcomponent

TerimaKasih,<br>

@endcomponent

@else
@component('mail::message')
Kepada Yth. {{$name}},


Pengajuan Produsen/Pengedar anda sedang kami proses dengan status {{$status}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/', 'color' => 'primary'])
Klik Disini Untuk Kunjungi Website Kami
@endcomponent

TerimaKasih,<br>

@endcomponent
@endif
