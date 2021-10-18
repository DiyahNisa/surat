<!DOCTYPE html>
<head>
    <title>Surat Izin Kerja</title>
    <meta charset="utf-8">
    <style>
		body {
		height: 842px;
		width: 595px;
		margin-left: auto;
		margin-right: auto;
		}
	</style>
</head>

<body>
    <div id=halaman>
        <font face="Times New Roman" color="black" size="4">
			<p align="center"> <u> <b> SURAT PERMOHONAN</b></u>
		</font>
		<br>

        <p style="text-align: justify;"> Dengan hormat, Saya yang bertanda tangan dibawah ini : </p>
        <table md-5>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 10%;">:</td>
                <td style="width: 65%;"> {{ $ijinKerja->nama }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">NIP</td>
                <td style="width: 10%;">:</td>
                <td style="width: 65%;">{{ $ijinKerja->nip }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jabatan</td>
                <td style="width: 10%;">:</td>
                <td style="width: 65%;"> {{ $ijinKerja->jabatan }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tanggal Izin</td>
                <td style="width: 10%;">:</td>
                <td style="width: 70%;"> {{ Carbon\carbon::parse($ijinKerja->tglIzin)->translatedFormat("d F Y") }}</td>
            </tr>
        </table>
            <p style="text-align: Justify;"> Bersama ini saya bermaksud untuk memberitahukan bahwa saya tidak dapat hadir mulai {{ Carbon\carbon::parse($ijinKerja->tglIzin)->translatedFormat("d F Y") }} hingga {{ Carbon\carbon::parse($ijinKerja->tglMasuk)->translatedFormat("d F Y") }}
                dikarenakan <b>{{ $ijinKerja->jenis_surat }}</b>.
            </p>
            <p style="text-align: Justify;"> Demikian surat ini saya buat. Atas perhatian dan pengertiannya saya sampaikan terima kasih.
            </p>

        <div style="width: 25%; text-align: justify; float: right;">Hormat Saya,</div><br><br><br><br>
        <div style="width: 35%; text-align: center; float: right;">{{ $ijinKerja->nama }}</div>

    </div>
</body>

</html>

