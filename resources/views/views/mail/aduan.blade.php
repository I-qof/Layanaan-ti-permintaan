<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Aduan Komputer</title>
</head>
<body>
    <h1>Notifikasi Aduan Komputer</h1>

    <p>Sistem kami telah menerima aduan terkait masalah komputer dengan detail sebagai berikut:</p>

    <h2>Detail Aduan:</h2>
    <ul>
        <li>Keluhan: <strong>{{ $mailData['keluhan'] }}</strong></li>
        <li>Nomor Aduan: <strong>{{ $mailData['no_aduan'] }}</strong></li>
        <li>Nomor HP: <strong>{{ $mailData['no_hp'] }}</strong></li>
        <li>Lokasi: <strong>{{ $mailData['lokasi'] }}</strong></li>
        <li>Email: <strong>{{ $mailData['email'] }}</strong></li>
        <li>Email Atasan: <strong>{{ $mailData['email_atasan'] }}</strong></li>
    </ul>

    <p>Kami akan segera menindaklanjuti aduan ini. Terima kasih atas laporannya.</p>

    <p>Regards,</p>
    <p>Tim Layanan Komputer</p>
</body>
</html>
