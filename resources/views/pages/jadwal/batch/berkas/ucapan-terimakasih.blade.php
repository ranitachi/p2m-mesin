<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()" style="padding:0px !important;margin:0px !important;">
        <div class="body" style="page-break-before: always;border:4px double darkblue;margin:5px 0px;">
			<link rel="stylesheet" href="{{asset('css/font.arista.css')}}">
			<table border="0" style="width:100%;margin:0 auto;" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:100%;text-align:center;vertical-align:top">
                        <img src="{{asset('img/logo.jpeg')}}" style='height:100px;margin:10px auto 0px;'>
					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						<div style="font-size:30px !important;letter-spacing:3px;font-family:copperplate;color:darkblue;float:left;width:100%;margin-bottom:5px;">P2M - Departemen Teknik Mesin</div>	
						<div style="font-size:30px !important;letter-spacing:3px;font-family:copperplate;color:darkblue;float:left;width:100%">Fakultas Tekik Universitas Indonesia</div>	
					</td>
				</tr>

				<tr>
					<td style="padding-top:5px;text-align:center">
						<div style="width:80%;vertical-align:top;text-align:center;background:darkblue;margin:10px auto 0 auto !important;">
							<div style="color:white;font-size:30px !important;padding:5px 0;font-family:copperplate">Ucapan Terima Kasih</div>
						</div>
					</td>
				</tr>
			
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						@php
							$nama=$instruktur->instruktur->nama;
							$s1=$s2=$s3=$lain='';
							if($instruktur->instruktur->gelar_s3!='')
							{
								$s3=$instruktur->instruktur->gelar_s3;
							}
							if($instruktur->instruktur->gelar_s1!='')
							{
								$s1=$instruktur->instruktur->gelar_s1;
							}
							if($instruktur->instruktur->gelar_s2!='')
							{
								$s2=$instruktur->instruktur->gelar_s2;
							}
							if($instruktur->instruktur->gelar_lain!='')
							{
								$lain=$instruktur->instruktur->gelar_lain;
							}
							$gelar=gelar($nama,$s1,$s2,$s3,$lain);
						@endphp
						<div style="font-size:20px !important;font-family:copperplate">Disampaikan Kepada :</div>
						<div style="font-size:40px !important;padding:15px 0px;letter-spacing:5px;font-family:Georgia;font-weight:500">{{$gelar}}</div>
						<div style="border-top:2px solid #888;width:80%;margin:0 auto;">&nbsp;</div>
					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;">
						<div style="font-size:18px !important;font-family:copperplate;">Atas Partisipanya Sebagai</div>	
						<div style="font-size:20px !important;font-family:copperplate;">STAF PENGAJAR</div>	
						<div style="width:80%;vertical-align:top;text-align:center;background:darkblue;margin:5px auto !important;">
							<div style="color:white;font-size:30px !important;padding:5px 0;font-family:monospace">{{strtoupper($pelatihan->pelatihan->nama)}}</div>
							<div style="color:white;font-size:15px !important;padding:0 0 10px;font-family:fantasy">Tanggal, {{gabungtgl($pelatihan->start_date,$pelatihan->end_date,'s/d')}}</div>
						</div>
					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						<div style="font-size:15px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-bottom:-3px;">Dilaksanakan oleh</div>
						<div style="font-size:15px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-bottom:-3px;">P2M - Departemen Teknik Mesin</div>
						<div style="font-size:15px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-bottom:-3px;">Fakultas Teknik Universitas Indonesia</div>
						<div style="font-size:15px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-bottom:-3px;">Jl. Salemba Raya 4</div>
						<div style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;width:80%;margin:0 auto;font-size:15px !important;padding-bottom:4px;border-bottom:2px solid #888">Jakarta - 10430<br>
						
						</div>

					</td>
				</tr>
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center;padding-top:5px;">
						<div style="font-size:15px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-bottom:-3px">Jakarta, {{tgl_indo(date('Y-m-d'))}}</div>
						<div style="font-size:15px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-bottom:-3px">P2M - Departemen Teknik Mesin</div>
						<div style="font-size:15px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-bottom:-3px">Fakultas Teknik Universitas Indonesia</div>
						<div style="font-size:16px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;padding-top:70px;text-decoration:underline">{{$direktur->nama}}</div>
						<div style="font-size:14px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-bottom:-3px">Direktur<br>
						
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
      /* width: 297mm; */
    /* height: 210mm; */
	height:100%;
  	width:100%;
	left: 0;
    top: 0;
    right: 0;
	
  }
  .body
  {
      height: 99%;
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