<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
	</head>
	<body onLoad="window.print()" style="padding:0px !important;margin:0px !important;">
        <link rel="stylesheet" href="{{asset('css/font.arista.css')}}">
        <div class="body" style="page-break-before: always;">
				@php
					$x=0;
				@endphp
				@foreach ($peserta as $idx=>$item)
					
                        <table border="0" style="width:100%;height:32%;margin-left:0px !important;border:3px solid #888;;margin-right:0px;margin-bottom:17px;margin-top:0px;" cellpadding="0" cellspacing="0">
							<tr>
								<td style="text-align:center;vertical-align:middle;height:70% !important;border-bottom:3px solid lightblue;">
                                    <div style="font-size:{{strlen($item->peserta->nama_lengkap)>=30 ? '80px !important;letter-spacing:-5px;' : '100px !important'}} ;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif !important;white-space: nowrap;font-weight:600">{{strtoupper($item->peserta->nama_lengkap)}}</div>
								</td>
							</tr>
							<tr>
								<td style="text-align:center;height:30% !important;vertical-align:middle">
									@if (isset($item->peserta->perusahaan->nama_perusahaan))
									
										<h3 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size:25px">{{strtoupper($item->peserta->perusahaan->nama_perusahaan)}}</h3>
									@else
										<h3 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size:25px">{{$item->peserta->jabatan=='' ? '&nbsp;':strtoupper($item->peserta->jabatan)}}</h3>
									@endif
								</td>
								
							</tr>
							
						</table>
                        @php
							$x++;
							if($x==3)
							{
								echo '<div class="pisah"></div>';
								$x=0;
							}
						@endphp
				@endforeach 
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
      height: 99%;
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
	/* font-size: 12px !important;
	padding-top:0px;
	padding-bottom:0px;
	margin-top:-1px !important;
	margin-bottom:0px; */
}
ol li 
{
	margin-top:3px !important;
	margin-bottom:0px !important;
}
</style>