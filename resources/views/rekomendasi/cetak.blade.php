<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @foreach ($data as $item)
    <h1><center>SURAT REKOMENDASI</center></h1>
    <p><center>&nbsp;&nbsp;Nomor : {{$item->no_rekomendasi}}</center></p>
        <br>     
        <div
        style="margin-left: 30px"
        >
            <p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$item->nama}}</p>        
            <p>Ttl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$item->ttl}}</p>        
            <p>Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$item->jabatan}}</p>        
            <p>Alamat Praktik : {{$item->alamat_praktik}}</p><br><br>
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