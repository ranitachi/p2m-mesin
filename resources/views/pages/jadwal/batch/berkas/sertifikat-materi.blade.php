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
					<td style="width:100%;vertical-align:top;text-align:center;">
						<h1 style="font-size:18px !important;font-family:Arial, Helvetica, sans-serif;margin:0 auto;padding-top:10px;">PELATIHAN</h1>	
						<h1 style="font-size:24px !important;font-family:Arial, Helvetica, sans-serif;margin:0 auto;padding-top:10px;">{{strtoupper($pelatihan->pelatihan->nama)}}</h1>	
						<h1 style="font-size:20px !important;font-family:Arial, Helvetica, sans-serif;margin:0 auto;padding-top:10px;font-style:italic;border-bottom:2px solid #111;padding-bottom:20px;">{{strtoupper($pelatihan->pelatihan->judul_inggris)}}</h1>	
					</td>
				</tr>
				
			</table>
			<table border="0" style="width:100%;margin:0 auto;" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:50%;vertical-align:top;text-align:left;padding-top:5px;">
						<div>
						@php
							$x=1;
							$mat=array();
							foreach($materi as $idx=> $v)
							{
								$mat[$idx]=$v;
							}
						@endphp
						<ol>
						@for ($i=0;$i<10;$i++)
							<li style="font-size:15px !important;padding-bottom:15px;">
								{{$mat[$i]->materi}}<br>
								<i>{{$mat[$i]->materi_en}}</i>
							</li>
						@endfor
						</ol>
						</div>
					</td>
					<td style="width:50%;vertical-align:top;text-align:left;padding-top:5px;">
						<div>
							<ol start="10">
								@for ($j=10;$j<count($mat);$j++)
									<li style="font-size:15px !important;padding-bottom:15px;">
										{{$mat[$j]->materi}}<br>
										<i>{{$mat[$j]->materi_en}}</i>
									</li>
								@endfor
								</ol>	
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="border-top:2px solid #111;"></td>
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