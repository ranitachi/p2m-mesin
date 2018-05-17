<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">
    @foreach ($instruktur as $item)
        @if (isset($skedul[$item->instruktur_id]))
            @foreach ($skedul[$item->instruktur_id] as $it)
            
    
            <div class="body" style="page-break-before: always;width:90%;margin:0 auto">
                <table border="0" style="width:100%;margin:0 auto;" cellpadding="0" cellspacing="0">
                    <tr>
                        
                        <td style="width:80%;vertical-align:top;text-align:center" colspan="3">
                            <h2 style="font-size:20px !important;">Evaluasi Pelatihan</h2>
                        </td>
                        
                    </tr>
                    <tr>			
                        <td style="width:15%;vertical-align:top;text-align:left">Program Pelatihan</td>
                        <td style="width:1%;vertical-align:top;text-align:center">:</td>
                        <td style="width:60%;vertical-align:top;text-align:left"><b>{{$pelatihan->pelatihan->nama}}</b></td>
                    </tr>
                    <tr>			
                        <td style="width:15%;vertical-align:top;text-align:left">Pemateri/Instruktur</td>
                        <td style="width:1%;vertical-align:top;text-align:center">:</td>
                        @php
                        // if($item->instruktur_id!=0)
                        // {
                            $nama=$it->instruktur->nama;
                            if($it->instruktur->gelar_s3!='')
                            {
                                $nama.=', '.$it->instruktur->gelar_s3.'.';
                            }
                            if($it->instruktur->gelar_s1!='')
                            {
                                $nama.=', '.$it->instruktur->gelar_s1.'.';
                            }
                            if($it->instruktur->gelar_s2!='')
                            {
                                $nama.=', '.$it->instruktur->gelar_s2.'.';
                            }
                            if($it->instruktur->gelar_lain!='')
                            {
                                $nama.=', '.$it->instruktur->gelar_lain;
                            }
                        // }
                        // else
                        // {
                        //     $nama='';
                        // }
                        @endphp 
                        <td style="width:60%;vertical-align:top;text-align:left"><b>{{$nama}}</b></td>
                    </tr>
                    <tr>			
                        <td style="width:15%;vertical-align:top;text-align:left">Hari/Tanggal</td>
                        <td style="width:1%;vertical-align:top;text-align:center">:</td>
                        <td style="width:60%;vertical-align:top;text-align:left"><b>{{tgl_indo($it->skedul->date)}}</b></td>
                    </tr>
                </table>
            
            
                
                    <table border="1" style="border:1px solid black !important;width:100%;margin:20px auto;"  cellpadding="4" cellspacing="0" class="tabel">
                        <tr>
                            <th>No</th>
                            <th>Evaluasi</th>
                            <th>Baik Sekali</th>
                            <th>Baik</th>
                            <th>Cukup</th>
                            <th>Kurang</th>
                        </tr>
                        @foreach ($quisioner as $ii=>$item)
                            @if ($item->kategori=='pilihan')
                                <tr>
                                    <td style="text-align:center">{{++$ii}}</td>
                                    <td style="text-align:left">{!!str_replace(array('<p>','</p>'),'',$item->question)!!}</td>
                                    <td style="text-align:center">&nbsp;</td>
                                    <td style="text-align:center">&nbsp;</td>
                                    <td style="text-align:center">&nbsp;</td>
                                    <td style="text-align:center">&nbsp;</td>
                                </tr>                            
                            @else
                                <tr>
                                    <td style="text-align:center">{{++$ii}}</td>
                                    <td style="text-align:left" colspan="5">
                                        {!!str_replace(array('<p>','</p>'),'',$item->question)!!}
                                        <div style="text-align:center">
                                            ................................................................................................................................................................................
                                            ................................................................................................................................................................................
                                            ................................................................................................................................................................................
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        
                    </table>
                    
                    <b>*** Mohon Diberi Tanda Silang [X] pada kotak yang dianggap sesuai dengan jawaban anda dan kumpulkan</b>
                </div>
                
                @endforeach
            @else
                <div class="body" style="page-break-before: always;width:90%;margin:0 auto">
                <table border="0" style="width:100%;margin:0 auto;" cellpadding="0" cellspacing="0">
                    <tr>
                        
                        <td style="width:80%;vertical-align:top;text-align:center" colspan="3">
                            <h2 style="font-size:20px !important;">Evaluasi Pelatihan</h2>
                        </td>
                        
                    </tr>
                    <tr>			
                        <td style="width:15%;vertical-align:top;text-align:left">Program Pelatihan</td>
                        <td style="width:1%;vertical-align:top;text-align:center">:</td>
                        <td style="width:60%;vertical-align:top;text-align:left"><b>______________________________________________</b></td>
                    </tr>
                    <tr>			
                        <td style="width:15%;vertical-align:top;text-align:left">Pemateri/Instruktur</td>
                        <td style="width:1%;vertical-align:top;text-align:center">:</td>
                        <td style="width:60%;vertical-align:top;text-align:left"><b>______________________________________________</b></td>
                    </tr>
                    <tr>			
                        <td style="width:15%;vertical-align:top;text-align:left">Hari/Tanggal</td>
                        <td style="width:1%;vertical-align:top;text-align:center">:</td>
                        <td style="width:60%;vertical-align:top;text-align:left"><b>______________________________________________</b></td>
                    </tr>
                </table>
            
            
                
                    <table border="1" style="border:1px solid black !important;width:100%;margin:20px auto;"  cellpadding="4" cellspacing="0" class="tabel">
                        <tr>
                            <th>No</th>
                            <th>Evaluasi</th>
                            <th>Baik Sekali</th>
                            <th>Baik</th>
                            <th>Cukup</th>
                            <th>Kurang</th>
                        </tr>
                        @foreach ($quisioner as $ii=>$item)
                            @if ($item->kategori=='pilihan')
                                <tr>
                                    <td style="text-align:center">{{++$ii}}</td>
                                    <td style="text-align:left">{!!str_replace(array('<p>','</p>'),'',$item->question)!!}</td>
                                    <td style="text-align:center">&nbsp;</td>
                                    <td style="text-align:center">&nbsp;</td>
                                    <td style="text-align:center">&nbsp;</td>
                                    <td style="text-align:center">&nbsp;</td>
                                </tr>                            
                            @else
                                <tr>
                                    <td style="text-align:center">{{++$ii}}</td>
                                    <td style="text-align:left" colspan="5">
                                        {!!str_replace(array('<p>','</p>'),'',$item->question)!!}
                                        <div style="text-align:center">
                                            ................................................................................................................................................................................
                                            ................................................................................................................................................................................
                                            ................................................................................................................................................................................
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        
                    </table>
                    
                    <b>*** Mohon Diberi Tanda Silang [X] pada kotak yang dianggap sesuai dengan jawaban anda dan kumpulkan</b>
                </div>
                @php
                    break;
                @endphp
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
	line-height: 22px;
	font-size : 13px;
}
table td div
{
    font-size : 13px !important;
}
table td
{
    /* padding:1px !important; */
    margin:1px !important;
}
.tabel th
{
    vertical-align: top;
	padding:8px 3px;
    font-size:17px;
}
.tabel td
{
	vertical-align: top;
	padding:8px 3px;
    font-size:16px;
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