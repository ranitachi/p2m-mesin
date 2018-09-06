<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">
    @php
        // $end = \Carbon\Carbon::parse($pelatihan->end_date);
        // $start = \Carbon\Carbon::parse($pelatihan->start_date);
        // $lama = $end->diffInDays($start);
        // $date=$pelatihan->start_date;
        // $end_date=$pelatihan->end_date;
                //echo "$date\n";
                //$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
        ksort($jadwal);
        // echo count($jadwal);
        $date = \Carbon\Carbon::parse(key($jadwal));
        end($jadwal);
        $key = key($jadwal);
        $end = \Carbon\Carbon::parse($key);
        $end_date=$end;
        // dd($jadwal_ins);
    @endphp
    {{-- @while (strtotime($date) <= strtotime($end_date)) --}}

    @foreach ($jw as $date=>$item)
        
    @if ($item->instruktur_id!=0)
        
    
    
        <div class="body" style="page-break-before: always;">
			<table border="0" style="width:80%;margin:0 auto;" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:20%;text-align:center;vertical-align:top">
                        <img src="{{asset('img/logo.jpeg')}}" style='height:120px;margin:0 auto;'>
                    </td>
					<td style="width:80%;vertical-align:top;text-align:center">
						<h2 style="font-size:20px !important;">Daftar Hadir Instruktur</h2>
						<h1 style="font-size:30px !important;font-weight:300;">{{$pelatihan->pelatihan->nama}}</h1>
                        <h3>Tanggal : {{tbt($pelatihan->start_date)}} s.d. {{tbt($pelatihan->end_date)}}</h3>
						
                    </td>
				</tr>
			</table>
		
            
              
                <table border="1" style="border:1px solid black !important;width:80%;margin:20px auto;"  cellpadding="4" cellspacing="0" class="tabel">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Instruktur</th>
                        <th>Tanda Tangan</th>
                    </tr>
                    @php
                        // dd($date->date);
                        $no=1;
                    @endphp
                    @foreach ($instruktur as $i => $ins)
                    @if (isset($jadwal_ins[strtok($date,' ')][$ins->instruktur_id]))
                    @php
                        
                        $nama=$ins->instruktur->nama;
                        if($ins->instruktur->gelar_s3!='')
                        {
                            $nama.=', '.$ins->instruktur->gelar_s3.'.';
                        }
                        if($ins->instruktur->gelar_s1!='')
                        {
                            $nama.=', '.$ins->instruktur->gelar_s1.'.';
                        }
                        if($ins->instruktur->gelar_s2!='')
                        {
                            $nama.=', '.$ins->instruktur->gelar_s2.'.';
                        }
                        if($ins->instruktur->gelar_lain!='')
                        {
                            $nama.=', '.$ins->instruktur->gelar_lain;
                        }
                    @endphp 
                    <tr>
                        <td style="text-align:center;width:70px;">{{$no}}</td>
                        <td style="text-align:center;width:250px;">{{tbt($date)}}</td>
                        <td>{{$nama}}</td>
                        <td></td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                    
                    @endif
                    @endforeach
                </table>
            </div>
            @php
                $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
            @endphp
        
     {{-- @endwhile --}}
            @endif
     @endforeach
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
	line-height: 20px;
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
.tabel th,
.tabel td
{
	vertical-align: top;
	padding:20px 3px;
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