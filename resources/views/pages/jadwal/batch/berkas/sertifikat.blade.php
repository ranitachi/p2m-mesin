<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">
        <div class="body" style="page-break-before: always;margin-left:30px;">
			<link rel="stylesheet" href="{{asset('css/font.arista.css')}}">
			<table border="0" style="width:100%;margin:0 auto;" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:150px;">
						<h1 style="font-size:40px !important;letter-spacing:25px;font-family:Arial, Helvetica, sans-serif;margin:0 auto;padding-top:50px;">SERTIFIKAT</h1>	
					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						<h1 style="font-size:25px !important;font-style:italic;font-family:Arial, Helvetica, sans-serif;">Certificate</h1>	
						<div style="font-size:18px !important;">No. : {{$sertifikat->nomor_sertifikat}}</div>
						<div style="font-size:17px !important;padding-top:5px;">Diberikan kepada :</div>
						<div style="font-size:15px !important;font-style:italic">This is to certify that</div>
					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						<h3 style=""><span style="font-size:35px !important;font-family:monotype !important;">{{$peserta->peserta->nama_lengkap}}</span></h3>	
						<hr style="width:50%;border-bottom:1px solid #111;">
					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						
						<div style="font-size:18px !important;">Yang telah memenuhi kriteria keberhasilan belajar pada :</div>
						<div style="font-size:15px !important;font-style:italic">Has completed all the requirements of the</div>
					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						<div style="font-size:20px !important;font-family:Arial, Helvetica, sans-serif;">PELATIHAN / TRAINING</div>	
						<div style="font-size:25px !important;font-family:Arial, Helvetica, sans-serif;padding-top:5px;">{{strtoupper($pelatihan->pelatihan->nama)}}</div>
						<div style="font-size:20px !important;font-style:italic">{{$pelatihan->pelatihan->judul_inggris}}</div>	
						<div style="font-size:18px !important;padding-top:5px;">{{gabungtgl($pelatihan->start_date,$pelatihan->end_date)}}</div>	
						<div style="font-size:18px !important;padding-top:5px;">Yang diselenggarakan oleh</div>	
						<div style="font-size:16px !important;padding-top:5px;font-style:italic">Held by</div>	
						<div style="font-size:18px !important;padding-top:5px;">P2M - Departemen Tkenik Mesin Fakultas Teknik Universitas Indonesia</div>	
						<div style="font-size:16px !important;padding-top:5px;font-style:italic">P2M - Mechanical Engineering Departement, Faculty of Engineering University of Indonesia</div>	
					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						<div style="font-size:17px !important;">Jakarta, {{tgl_indo(date('Y-m-d'))}}</div>
						<div style="font-size:17px !important;">P2M - Departemen Teknik Mesin FTUI</div>
						<div style="font-size:17px !important;">Direktur / <i>Director</i></div>
						<div style="font-size:18px !important;padding-top:45px;text-decoration:underline">{{$direktur->nama}}</div>
						<div style="font-size:14px !important;">NIP {{$direktur->nip}}<br>
						
						</div>

					</td>
				</tr>
			</table>
                        
        </div>
    </body>
</html>
<style type="text/css" media="print">
  @page {
    size: A4 landscape;
	margin:0px !important;
	padding:0px !important;
	
}
  @media print {
  html, body {
    height:100%;
  	width:100%;
	left: 0;
    top: 0;
    right: 0;
  }
  .body
  {
      height: 210mm;
  }
  /* ... the rest of the rules ... */
}
</style>
<style type="text/css">
*
{
	line-height: 22px;
	font-size : 15px;
	font-family: Arial, Helvetica, sans-serif;
}
table td div
{
    font-size : 15px !important;
}
table td
{
    /* padding:1px !important; */
    margin:1px !important;
}
.tabel th
{
    vertical-align: top;
	padding:10px 3px;
    font-size:17px;
}
.tabel td
{
	vertical-align: top;
	padding:15px 3px;
    font-size:17px;
}
.tabel th
{
	background: #ddd;
	vertical-align: middle !important;
}

h1,h2,h4,h5
{
	padding: 1px !important;
	margin: 2px !important;
}
h6,h3
{
	padding: 1px !important;
	margin: 1px !important;
}
div
{
	font-size: 12px !important;
	padding-top:0px;
	padding-bottom:0px;
	margin-top:-1px !important;
	margin-bottom:0px;
}
ol li 
{
	margin-top:3px !important;
	margin-bottom:0px !important;
}
</style>