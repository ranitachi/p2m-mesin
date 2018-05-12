<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">
        <div class="body" style="page-break-before: always;">
			<table border="0" style="width:90%;margin:0 auto;" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:20%;text-align:right;vertical-align:top">
                        <img src="{{asset('img/WhatsApp Image 2018-05-04 at 15.36.20.jpeg')}}" style='height:120px;margin:0 auto;'>
                    </td>
					<td style="width:80%;vertical-align:top;text-align:center">
						<h2 style="font-size:20px !important;">P2M - Departemen Teknik Mesin, FTUI</h2>
						<h2 style="font-size:20px !important;">Daftar Hadir Peserta</h2>
						<h1 style="font-size:30px !important;font-weight:300;">{{$pelatihan->pelatihan->nama}}</h1>
                        <h3>Tanggal : {{tbt($pelatihan->start_date)}} s.d. {{tbt($pelatihan->end_date)}}</h3>
						
                    </td>
                    
				</tr>
            </table>
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
      height: 297mm;
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
</style>