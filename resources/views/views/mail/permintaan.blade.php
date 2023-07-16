<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Permintaan Komputer</title>
</head>
<body>
    <h1>Notifikasi Permintaan Komputer</h1>

    <p>Sistem kami telah menerima Permintaan terkait masalah komputer dengan detail sebagai berikut:</p>

    <h2>Detail Permintaan:</h2>
    <ul>
        <li>Keluhan: <strong>{{ $mailData['alasan_permintaan'] }}</strong></li>
        <li>Nomor Permintaan: <strong>{{ $mailData['no_aduan'] }}</strong></li>
        <li>Nomor HP: <strong>{{ $mailData['no_hp'] }}</strong></li>
        <li>Lokasi: <strong>{{ $mailData['lokasi'] }}</strong></li>
        {{-- <li>Email: <strong>{{ $mailData['email'] }}</strong></li> --}}
        <li>Email Atasan: <strong>{{ $mailData['email_atasan'] }}</strong></li>
    </ul>

    <p>Kami akan segera menindaklanjuti Permintaan ini. Terima kasih atas laporannya.</p>

    <p>Salam Hangat,</p>
    <p>Tim Layanan Komputer</p>
</body>
</html>
