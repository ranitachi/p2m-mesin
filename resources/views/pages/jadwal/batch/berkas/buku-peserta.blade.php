<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">
        <link rel="stylesheet" href="{{asset('css/font.arista.css')}}">
    @php
        $end = \Carbon\Carbon::parse($pelatihan->end_date);
        $start = \Carbon\Carbon::parse($pelatihan->start_date);
        $lama = ($end->diffInDays($start) + 1);
        
        $end_date=$pelatihan->end_date;
                //echo "$date\n";
                //$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
    @endphp
    
   
        <div class="body" style="page-break-before: always;">
			<table border="0" style="width:90%;margin:0 auto;" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:20%;text-align:left;vertical-align:top">
                        <img src="{{asset('img/logo.jpeg')}}" style='height:120px;margin:0 20px 0 0;'>
                    </td>
					<td style="width:80%;vertical-align:top;text-align:left">
						<h2 style="font-size:20px !important;">P2M - DEPARTEMEN TEKNIK MESIN</h2>
						<h2 style="font-size:20px !important;">FAKULTAS TEKNIK UNIVERSITAS INDONESIA</h2>
                        <h3 style="padding-left:5px !important;">Jalan Salemba Raya 4, Jakarta 10430</h3>
                        <h3 style="padding-left:5px !important;">Telp. 021-3149720, Fax. 021-3144660</h3>
						
                    </td>
                    
				</tr>
			</table>
		
        
              
                <table border="1" style="border:1px solid black !important;width:90%;margin:20px auto;"  cellpadding="4" cellspacing="0" class="tabel">
                   
                   @foreach ($peserta as $i => $v)
                       
                        <tr style="height:87.5mm !important">
                            <td style="text-align:center;width:30%">
                                @if ($v->peserta->foto!=null)
                                    <img src="{{asset($v->peserta->foto)}}" style="width:80%">
                                @endif
                            </td>
                            <td style="text-align:left;width:70%;padding:10px 20px;">
                                <div style="margin-bottom:-10px;float:left;width:100%"><h2 style="font-size:20px;padding-left:0px !important;">{{$v->peserta->nama_lengkap}}</h2></div>
                                <div style="float:left;width:100%"><h3>{{$v->peserta->jabatan}}</h3></div>
                                <br><br>
                                @if (isset($v->peserta->perusahaan->nama_perusahaan))
                                    
                                    <div style="font-family:monotype;text-decoration:underline;font-style:italic;padding-top:15px;">
                                        Alamat Perusahaan:
                                    </div>
                                    <div>
                                        <h2 style="padding-left:30px !important;margin-left:0px !important;">{{$v->peserta->perusahaan->nama_perusahaan}}</h2>
                                        <div style="padding-left:30px !important;">{{$v->peserta->perusahaan->alamat}}</div>
                                        <div style="padding-left:30px !important;">Telp : {{$v->peserta->perusahaan->telp}}</div>
                                        <div style="padding-left:30px !important;">Fax : {{$v->peserta->perusahaan->fax}}</div>
                                    </div>
                                @endif
                                <div style="font-family:monotype;text-decoration:underline;font-style:italic;padding-top:15px;">
                                    Alamat Rumah:
                                </div>
                                <div>
                                        <h2 style="padding-left:30px !important;margin-left:0px !important;">{{$v->peserta->alamat}}</h2>
                                        <div style="padding-left:30px !important;">{{$v->peserta->perusahaan->alamat}}</div>
                                        <div style="padding-left:30px !important;">Telp : {{$v->peserta->telp}}</div>
                                        <div style="padding-left:30px !important;">Email : {{$v->peserta->email}}</div>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                    
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