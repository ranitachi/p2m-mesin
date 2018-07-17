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
                        <img src="{{asset('img/logo.jpeg')}}" style='height:120px;margin:0 auto;'>
                    </td>
					<td style="width:80%;vertical-align:top;text-align:center">
						<h2 style="font-size:20px !important;">P2M - Departemen Teknik Mesin, FTUI</h2>
						<h2 style="font-size:20px !important;">Jadwal Pelatihan</h2>
						<h1 style="font-size:30px !important;font-weight:300;">{{$pelatihan->pelatihan->nama}}</h1>
                        <h3>Tanggal : {{tbt($pelatihan->start_date)}} s.d. {{tbt($pelatihan->end_date)}}</h3>
						
                    </td>
                    
				</tr>
			</table>
		
        
              
                <table border="1" style="border:1px solid black !important;width:90%;margin:20px auto;"  cellpadding="4" cellspacing="0" class="tabel">
                  
                    <thead>
                        <tr>
                            <th style="width:40px;" class="text-center">Hari / Tanggal</th>
                            <th style="width:100px;" class="text-center">Waktu</th>
                            <th class="text-center">Menit</th>
                            <th class="text-center">Materi</th>
                            <th class="text-center">Kode Materi</th>
                            <th class="text-center">Instruktur</th>
                           
                        </tr>
                    </thead>                                    
                    <tbody>
                        @foreach ($skd as $key=>$item)
                    
                            <tr>
                                <td class="text-center" align="center" style="width:80px;vertical-align:middle" rowspan="{{count($item)}}">
                                    {{hari($item[0]->weekday)}}<br>
                                    {{date('d-m-Y',strtotime($key))}}
                                </td>    
                                <td class="text-center" align="center">{{$item[0]->start_time}} - {{$item[0]->end_time}}</td> 
                                <td class="text-center" align="center">{{getMinutes($item[0]->start_time,$item[0]->end_time)}}</td> 
                                <td class="text-center" align="center">{{$item[0]->materi}}</td> 
                                <td class="text-center" align="center">{{($item[0]->materi_id == 0 ? '' : $item[0]->mmateri->kode)}}</td> 
                                <td class="text-center" align="center">
                                    @if ($item[0]->instruktur_id!=0)
                                        {{isset($item[0]->instruktur->nama) ? $item[0]->instruktur->inisial : ''}}
                                    @else
                                        {{isset($item[0]->pegawai->kode) ? $item[0]->pegawai->kode : ''}}
                                    @endif
                                </td>
                               
                            </tr> 
                            @foreach ($item as $idx=>$ii)
                                @if ($idx!=0)
                                    <tr>
                                           
                                        <td class="text-center" align="center">{{$ii->start_time}} - {{$ii->end_time}}</td> 
                                        <td class="text-center" align="center">{{getMinutes($ii->start_time,$ii->end_time)}}</td> 
                                        <td class="text-center" align="center">{{$ii->materi}}</td> 
                                        <td class="text-center" align="center">{{($ii->materi_id == 0 ? '' : $ii->mmateri->kode)}}</td> 
                                        <td class="text-center" align="center">
                                             @if ($ii->instruktur_id!=0)
                                                {{isset($ii->instruktur->nama) ? $ii->instruktur->inisial : ''}}
                                            @else
                                                {{isset($ii->pegawai->kode) ? $ii->pegawai->kode : ''}}</td>
                                            @endif
                                       
                                    </tr> 
                                @endif
                            @endforeach   
                        @endforeach                                       
                    </tbody>
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