<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()" style="padding:0px !important;margin:0px !important;">
        <div class="body" style="page-break-before: always;">
				@php
					$x=0;
				@endphp
				@foreach ($d as $idx=>$item)
					@if ($item!='')
						
						@if ($x==0)
							<div style="height:99% !important;width:100%">
						@endif
							<table border="0" style="min-height:50mm;width:32%;height:29%;margin:0 auto;border:1px solid #888;margin-right:10px;margin-bottom:20px;float:left" cellpadding="0" cellspacing="0">
								<tr>
									<td style="vertical-align:top;padding:20px 20px 0 20px;">
										<h3 style="font-weight:500">{{$per[$item]->nama_perusahaan}}</h3>
										<h5 style="font-weight:500">{{$per[$item]->alamat}}</h5>
										<h5 style="font-weight:500">{{$per[$item]->kode_pos}}</h5>
										<h5><div style="padding-left:30px;font-weight:300">Up. {{$per[$item]->cp}}</div></h5>
										<h5><div style="padding-left:30px;font-weight:300">{{$per[$item]->bagian_cp}}</div></h5>
									</td>
								</tr>
							</table>
							@php
								$x++;
								if($x==9)
								{
									echo '</div>';
									echo '<div class="pisah"></div>';
									$x=0;
								}
							@endphp
					@endif
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
	/* line-height: 22px; */
	/* font-size : 15px; */

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
	padding: 3px !important;
	margin: 3px !important;
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
.ellipses {
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
</style>