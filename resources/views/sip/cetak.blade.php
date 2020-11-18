<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cetak</title>
</head>
<body>
    @foreach ($data as $item)
    <h1><center>SURAT IZIN PRAKTIK</center></h1>
    <p><center>&nbsp;&nbsp;Nomor : {{$item->nomor_sip}}</center></p>
        <br>     
        <div
        style="margin-left: 30px"
        >
            <p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$item->nama}}</p>        
            <p>Tempat Tanggal Lahir : {{$item->ttl}}</p>        
            <p>Alamat Rumah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$item->alamat_rumah}}</p>        
            <p>Alamat Praktik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$item->alamat_praktik}}</p>        
            <p>Nomor Rekomendasi &nbsp;&nbsp;: {{$item->no_rekomendasi}}</p>        
            <p>Untuk Praktik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$item->untuk_praktik}}</p>
            <p>Berlaku Hingga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$item->masa_berlaku_dari}} - {{$item->masa_berlaku_sampai}}</p>
            
            <br><br>
            <div style="display:inline; margin-left: 100px">
                <img  src="{{ public_path("/storage/berkas/$item->rapi") }}"
                style="width: 180px; height: 180px; margin-left:100px;" />
            </div>
            <div style="display:inline-block">
                <p>
                    <span style="margin-left: 50px"> Kudus, {{ date("d M Y")}} </span>
                <br>
                    Ka. Kepala Dinas Kesehatan Kudus
                </p>
                <br><br><br>
                <p>
                    <span style="margin-left: 30px; text-decoration:underline">Joko Dwi Putranto SH.,MM</span> 
                <br>
                <span style="margin-left: 30px;"> NIP. 1900816 199292 1 001 </span>
                </p>
            </div>
        </div>
    @endforeach
</body>
</html>