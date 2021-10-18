<!DOCTYPE html>
<head>
    <title>Surat Lamar Pekeerjaan</title>
    <meta charset="utf-8">
    <style>

        #halaman{
            width: auto;
            height: auto;
            position: absolute;
            padding-top: 40px;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 80px;
        }

    </style>

</head>

<body>
    <div id=halaman>
        <div style="width: 30%; text-align: justify; float: right;">{{ $lamarKerja->tempatPembuatan}}, {{ Carbon\carbon::now()->isoFormat('D MMMM Y') }}</div><br>
        <p style="text-align: justify;"> Yth. Kepada <br>
             Bapak/ Ibu HRD {{ $lamarKerja->tujuan}} <br>
            di Tempat
        </p>
        <p style="text-align: Justify;"> Dengan hormat, yang bertanda tangan dibawah ini :</p>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> {{ $lamarKerja->nama }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat, tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $lamarKerja->tempatLahir }}, {{ Carbon\carbon::parse($lamarKerja->tglLahir)->translatedFormat("d F Y") }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jenis Kelamin</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> {{ $lamarKerja->jk }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pendidikan Terakhir</td>
                <td style="width: 10%;">:</td>
                <td style="width: 65%;"> {{ $lamarKerja->penTerakhir }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">No Telp/Hp</td>
                <td style="width: 10%;">:</td>
                <td style="width: 65%;"> {{ $lamarKerja->noHp }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Alamat</td>
                <td style="width: 10%;">:</td>
                <td style="width: 65%;"> {{ $lamarKerja->alamat }}</td>
            </tr>
        </table>

        <p style="text-align: Justify;"> Dengan surat lamaran ini saya mengajukan permohonan kerja diperusahaan yang Bapak/ Ibu pimpin
            untuk menempati posisi <b>{{ $lamarKerja->posisi}}</b>.
        </p>
        <p style="text-align: Justify;"> Sebagai bahan pertimbangan, saya telah melampirkan beberapa berkas sebagai berikut : <br>
            <p style="text-indent: 0.3in"> 1. Daftar Riwayat Hidup <br>
            <p style="text-indent: 0.3in">  2. Scan Kartu Tanda Penduduk <br>
            <p style="text-indent: 0.3in"> 3. Scan Ijazah Terakhir<br>
            <p style="text-indent: 0.3in"> 4. Scan Sertifikat
        </p>
        <p style="text-align: Justify;"> Demikian surat lamaran kerja yang saya buat, dengan lamaran ini saya berharap dapat diterima diperusahaan
            yang Bapak/Ibu pinpin. Terimakasih
        </p><br>

        <div style="width: 25%; text-align: justify; float: right;">Hormat Saya,</div><br><br><br><br>
        <div style="width: 35%; text-align: center; float: right;">{{ $lamarKerja->nama }}</div>

    </div>
</body>

</html>
