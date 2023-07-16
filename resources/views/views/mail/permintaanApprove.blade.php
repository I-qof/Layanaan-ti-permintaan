<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi permintaan Komputer</title>
</head>
<body>
    <h1>Notifikasi permintaan Komputer</h1>

    <p>Sistem kami telah menerima permintaan terkait masalah komputer dengan detail sebagai berikut:</p>

    <h2>Detail permintaan:</h2>
    <ul>
        <li>Keluhan: <strong>{{ $mailData['alasan_permintaan'] }}</strong></li>
        <li>Nomor permintaan: <strong>{{ $mailData['no_aduan'] }}</strong></li>
        <li>Nomor HP: <strong>{{ $mailData['no_hp'] }}</strong></li>
        <li>Lokasi: <strong>{{ $mailData['lokasi'] }}</strong></li>
        {{-- <li>Email: <strong>{{ $mailData['email'] }}</strong></li> --}}
        <li>Email Atasan: <strong>{{ $mailData['email_atasan'] }}</strong></li>
    </ul>

    <p>Silahkan cek dan lakukan persetujuan pada permintaan ini</p>
    <a href="{{ route('permintaan') }}">Klik disini</a>

    <p>Salam Hangat,</p>
    <p>Tim Layanan Komputer</p>
</body>
</html>
