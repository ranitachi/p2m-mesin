<button class="btn btn-xs btn-primary pull-right" onclick="cetak()">
    <i class="fa fa-print"></i>&nbsp;Cetak Hasil
</button>
<div id="cetak">
    
    <div class="" style="margin-bottom:0px;padding-bottom:0px;text-align:left;font-size:13px;font-weight:600">Hasil Evaluasi Staff Pengajar</div>
    <div class="" style="margin-bottom:0px;padding-bottom:0px;text-align:left;font-size:16px;color:red">{{$pelatihan->pelatihan->nama}}</div>
    <div class="" style="margin-bottom:0px;padding-bottom:0px;text-align:left;font-size:12px">{{tgl_indo2($pelatihan->start_date)}} s.d. {{tgl_indo2($pelatihan->end_date)}}</div>
    <table class="table table-bordered" style="margin-bottom:5px;width:100%">
        <thead>
            <tr>
                @php
                    $nama=$instruktur->instruktur->nama;
                    if($instruktur->instruktur->gelar_s3!='')
                    {
                        $nama.=', '.$instruktur->instruktur->gelar_s3.'.';
                    }
                    if($instruktur->instruktur->gelar_s1!='')
                    {
                        $nama.=', '.$instruktur->instruktur->gelar_s1.'.';
                    }
                    if($instruktur->instruktur->gelar_s2!='')
                    {
                        $nama.=', '.$instruktur->instruktur->gelar_s2.'.';
                    }
                    if($instruktur->instruktur->gelar_lain!='')
                    {
                        $nama.=', '.$instruktur->instruktur->gelar_lain;
                    }
                @endphp 
                <th style="text-align:left;">{{$nama}}</th>
            </tr>
            <tr>

            </tr>
        </thead>
    </table>
  <div style="padding:10px 10px 30px 10px;border:1px solid #ddd;"> 
    <table id="q-graph">
            <tbody>
                @foreach ($quisioner as $ii=>$item)
                    @if ($item->kategori=='pilihan')
                    @php
                        if(isset($n2[$item->id]))
                            $nilai=array_sum($n2[$item->id])/count($n2[$item->id]);
                        else
                            $nilai=0;
                            
                        $no=++$ii;
                        
                        $height=ceil($nilai*50);
                    @endphp
                        <tr class="qtr" style="left:{{(45 * ($no))}};">
                            <th scope="row">Q{{$no}}</th>
                        <td class="paid" style="height:{{$height}}px;width:40px;color:#000"><p>{{number_format($nilai,2)}}</p></td>
                        </tr>                            
                        
                    @endif
                @endforeach
                
            </tbody>
        </table>

        <div id="ticks">
            <div class="tick" style="height: 50px;"><p>5</p></div>
            <div class="tick" style="height: 50px;"><p>4</p></div>
            <div class="tick" style="height: 50px;"><p>3</p></div>
            <div class="tick" style="height: 50px;"><p>2</p></div>
            <div class="tick" style="height: 50px;"><p>1</p></div>
        </div>
  </div>
    {{-- <canvas id="chartjs_bar" height="100" style="border:1px solid #ddd;padding:10px;"></canvas> --}}
    <table  cellpadding="0" cellspacing="0" class="table table-bordered table-striped" style="margin-top:10px;width:100%">
        <tr>
            <th>No</th>
            <th>Evaluasi</th>
            <th>BS</th>
            <th>B</th>
            <th>C</th>
            <th>K</th>
            <th>AVG</th>
        </tr>
        @php
            $label=array();
            $avg=array();
            $allavg=array();
        @endphp
        @foreach ($quisioner as $ii=>$item)
            @if ($item->kategori=='pilihan')
            @php
                if(isset($n[$item->id]))
                {
                    // dd($n[$item->id]);
                    $bs=isset($n[$item->id]['BS']) ? count($n[$item->id]['BS']) : 0;
                    $b=isset($n[$item->id]['B']) ? count($n[$item->id]['B']) : 0;
                    $c=isset($n[$item->id]['C']) ? count($n[$item->id]['C']) : 0;
                    $k=isset($n[$item->id]['K'] )? count($n[$item->id]['K']) : 0;
                    // $bs=isset($n[$item->id]['BS']) ? ($n[$item->id]['BS']) : 0;
                    // $b=isset($n[$item->id]['B']) ? ($n[$item->id]['B']) : 0;
                    // $c=isset($n[$item->id]['C']) ? ($n[$item->id]['C']) : 0;
                    // $k=isset($n[$item->id]['K'] )? ($n[$item->id]['K']) : 0;
                    $rata2=array_sum($n2[$item->id])/count($n2[$item->id]);
                }
                else 
                {
                    $bs=$b=$c=$k=$rata2=0;
                }
            @endphp
                <tr>
                    <td style="text-align:center">{{++$ii}}</td>
                    <td style="text-align:left">{!!str_replace(array('<p>','</p>'),'',$item->question)!!}</td>
                    <td style="text-align:right">{{$bs}}</td>
                    <td style="text-align:right">{{$b}}</td>
                    <td style="text-align:right">{{$c}}</td>
                    <td style="text-align:right">{{$k}}</td>
                    <td style="text-align:right">{{number_format($rata2,2)}}</td>
                </tr>                            
                @php
                    $label[]=$item->id;
                    $avg[]=$rata2;
                @endphp
            @endif
        @endforeach
        @php
            $average=array_sum($avg)/(count($avg) == 0 ? 1 : count($avg));
            $lbl=json_encode($label);
        @endphp
        <tr>
            <td style="text-align:center"></td>
            <td style="text-align:right" colspan="5">
                Rata-Rata
            </td>
            <td style="text-align:right;font-weight:600;font-size:12px;">{{number_format($average,2)}}</td>
        </tr>
    </table>

<script>
            //var color = Chart.helpers.color;
    //         var barChartData = {
    //             labels: {{$lbl}},
    //             datasets: [{
    //                 label: 'Dataset 1',
    //                 backgroundColor: "lightblue",
    //                 borderColor: '#0000ff',
    //                 borderWidth: 0.5,
    //                 data: [
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor(), 
    //                     randomScalingFactor()
    //                 ]
    //             }]

    //         };
    // var ctx_bar = document.getElementById("chartjs_bar").getContext("2d");
    //             window.myBar = new Chart(ctx_bar, {
    //                 type: 'bar',
    //                 data: barChartData,
    //                 options: {
    //                     responsive: true,
    //                     legend: {
    //                         position: 'top',
    //                     },
    //                 }
    //             });

    // function randomScalingFactor()
    // {
    //     return (Math.random() > 0.5 ? 1.0 : 0.5) * Math.round(Math.random() * 5);
    // }
</script>
<style>
    /* $color--paid: #7fdbff;
    $color--sent: #39cccc; */
.table th
{
    border:1px solid #bbb;
    padding:3px;
}
.table td
{
    font-size:11px;
    border:1px solid #ccc;
    padding:3px;
}

#q-graph {
  display: block; /* fixes layout wonkiness in FF1.5 */
  position: relative; 
  width: 100%; 
  height: 250px;
  margin: 1.1em 0 0 20px; 
  padding: 10;
  background: transparent;
  font-size: 11px;
  
}

#q-graph caption {
  caption-side: top; 
  width: 600px;
  text-transform: uppercase;
  letter-spacing: .5px;
  top: -40px;
  position: relative; 
  z-index: 10;
  font-weight: bold;
}

#q-graph tr, #q-graph th, #q-graph td { 
  position: absolute;
  bottom: 0; 
  width: 70px; 
  z-index: 2;
  margin: 0; 
  padding: 0;
  text-align: center;
}

#q-graph td {
  transition: all .3s ease;
  
  &:hover {
    background-color: desaturate(#85144b, 100);
    opacity: .9;
    color: white;
  }
}
  
#q-graph thead tr {
  left: 100%; 
  top: 50%; 
  bottom: auto;
  margin: -2.5em 0 0 5em;}
#q-graph thead th {
  width: 7.5em; 
  height: auto; 
  padding: 0.5em 1em;
}
#q-graph thead th.sent {
  top: 0; 
  left: 0; 
  line-height: 2;
}
#q-graph thead th.paid {
  top: 2.75em; 
  line-height: 2;
  left: 0; 
}

#q-graph tbody tr {
  height: 240px;
  padding-top: 2px;
  border-right: 1px dotted #C4C4C4; 
  color: #AAA;
  width:60px;
}
#q-graph #q1 {
  left: 0;
}
#q-graph #q2 {left: 150px;}
#q-graph #q3 {left: 300px;}
#q-graph #q4 {left: 450px; border-right: none;}
#q-graph tbody th {bottom: -1.75em; vertical-align: top;
font-weight: normal; color: #333;}
#q-graph .bar {
  width: 60px; 
  border: 1px solid; 
  border-bottom: none; 
  color: #000;
}
#q-graph .bar p {
  margin: 5px 0 0; 
  padding: 0;
  opacity: .4;
}
#q-graph .sent {
  left: 13px; 
  background-color: #39cccc;
  border-color: transparent;
}
#q-graph .paid {
  left: 10px; 
  background-color: #7fdbff;
  border-color: transparent;
}


#ticks {
  position: relative; 
  top: -250px; 
  left: 60px;
  width: 90%; 
  height: 250px; 
  padding-right:20px;
  z-index: 1;
  margin-bottom: -250px;
  font-size: 10px;
  font-family: "fira-sans-2", Verdana, sans-serif;
}

#ticks .tick {
  position: relative; 
  border-bottom: 1px dotted #C4C4C4; 
  width: 100%;
}

#ticks .tick p {
  position: absolute; 
  left: -5em; 
  top: -0.8em; 
  margin: 0 0 0 0.5em;
}
</style>
</div>

<script>
    function cetak()
    {
        var divToPrint=document.getElementById('cetak');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        // $('#cetak').printThis();
    }
</script>
