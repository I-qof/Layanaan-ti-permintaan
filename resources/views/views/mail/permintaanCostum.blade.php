<!DOCTYPE html>
<html>

<head>
    <title>{{ $content['title'] }}</title>
</head>

<body>
    <h1>{{ $content['title'] }}</h1>

    <p>{{ $content['content'] }}</p>

    <h2>Detail permintaan:</h2>
    <ul>
        <li>Keluhan: <strong>{{ $mailData['alasan_permintaan'] }}</strong></li>
        <li>Nomor permintaan: <strong>{{ $mailData['no_aduan'] }}</strong></li>
        <li>Nomor HP: <strong>{{ $mailData['no_hp'] }}</strong></li>
        <li>Lokasi: <strong>{{ $mailData['lokasi'] }}</strong></li>
        {{-- <li>Email: <strong>{{ $mailData['email'] }}</strong></li> --}}
        <li>Email Atasan: <strong>{{ $mailData['email_atasan'] }}</strong></li>
    </ul>

    <p>{{ $content['footer'] }}</p>
    {!! $content['button'] !!}
    {{-- <button href="{{ URL::to('beli/' . $id) }}">Setuju</button>
    <button href="{{ URL::to('tidakBeli/' . $id) }}">Tidak setuju</button> --}}
    <p>Salam Hangat,</p>
    <p>Tim Layanan Komputer</p>
</body>

</html>
