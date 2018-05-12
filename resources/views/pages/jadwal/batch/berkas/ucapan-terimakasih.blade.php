<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">
        <div class="body" style="page-break-before: always;">
				        <table border="0" style="width:100%;margin:0 auto;border:1px solid #888;margin-right:30px;margin-bottom:20px;" cellpadding="0" cellspacing="0">
							<tr>
								<td style="width:100%;text-align:center;vertical-align:top">
									<img src="{{asset('img/WhatsApp Image 2018-05-04 at 15.36.20.jpeg')}}" style='height:100px;margin:10px auto;'>
								</td>
							
							</tr>
							<tr>
								<td colspan="2" style="text-align:center;background-color:yellow">
									<h4>Training / Pelatihan</h4>
									<h3>{{strtoupper($pelatihan->pelatihan->nama)}}</h3>
									<h3>Tanggal : {{tgl_indo2($pelatihan->start_date)}} s.d. {{tgl_indo2($pelatihan->end_date)}}</h3>
									<h1 style="font-size:140%">{{$instruktur->instruktur->nama}}</h1>
								</td>
								
							</tr>
							<tr>
								<td colspan="2" style="text-align:center;background-color:dodgerblue;color:white">
									
								</td>
								
							</tr>
						</table>
                        
        </div>
    </body>
</html>
<style type="text/css" media="print">
  @page { 
  	size: Legal landscape; 
  }
  @media print {
  html, body {
    width: 330mm;
    height: 210mm;
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