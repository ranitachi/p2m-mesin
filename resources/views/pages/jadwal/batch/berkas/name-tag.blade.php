<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()" style="padding:0px !important;margin:0px !important;">
        <div class="body" style="page-break-before: always;">
				
				@foreach ($peserta as $idx=>$item)
					
                        <table border="0" style="width:360px;height:230px;margin:0 auto;border:1px solid #888;margin-right:5px;margin-bottom:60px;float:left" cellpadding="0" cellspacing="0">
							<tr>
								<td style="width:20%;text-align:right;vertical-align:top">
									<img src="{{asset('img/logo.jpeg')}}" style='height:55px;margin:11px auto 0px auto;'>
								</td>
								<td style="width:80%;vertical-align:top;text-align:left;">
									<h2 style="font-size:16px !important;font-family:arial;letter-spacing:0.2px;">P2M-DEPARTEMEN TEKNIK MESIN
									<br>
									FAKULTAS TEKNIK<br>
									UNIVERSITAS INDONESIA	
									</h2>	
								</td>
								
							</tr>
							<tr>
								<td colspan="2" style="text-align:center;background-color:yellow">
									<h4>Training / Pelatihan</h4>
									<div style="margin-bottom:-5px;float:left;width:100%;font-weight:bold">{{strtoupper($pelatihan->pelatihan->nama)}}</div>
									<div style="margin-bottom:10px;float:left;width:100%;font-weight:bold">Tanggal : {{tgl_indo2($pelatihan->start_date)}} s.d. {{tgl_indo2($pelatihan->end_date)}}</div>
									<h1 style="font-size:140%;font-family:Arial, Helvetica, sans-serif;{{(strlen($item->peserta->nama_lengkap) >=28 ? 'letter-spacing:-2px;font-size:120% !important;' : '')}}">{{strtoupper($item->peserta->nama_lengkap)}}</h1>
								</td>
								
							</tr>
							<tr>
								<td colspan="2" style="text-align:center;background-color:dodgerblue;color:white">
									<h3>
									@if (isset($item->peserta->perusahaan->nama_perusahaan))
										{{($item->peserta->perusahaan->nama_perusahaan)}}
									@else
										{{($item->peserta->jabatan=='' ? '&nbsp;':$item->peserta->jabatan)}}
									@endif	
									</h3>
								</td>
								
							</tr>
						</table>
                        
				@endforeach 
        </div>
    </body>
</html>
<style type="text/css" media="print">
  @page { 
  	size: A4; 
  }
  @media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
  .body
  {
      	height: 100%;
	  	padding:0px !important;
		margin:0px !important;
  }
  .pisah {page-break-before: always;border:0px !important;}
  /* ... the rest of the rules ... */
}
</style>
<style type="text/css">
*
{
	line-height: 22px;
	font-size : 15px;

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
	padding: 3px !important;
	margin: 3px !important;
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
.ellipses {
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
</style>