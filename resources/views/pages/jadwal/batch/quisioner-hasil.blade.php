<div class="app-heading app-heading-small">                                
    
            <div class="title">
                <h1 style="font-size:20px;">Daftar Peserta Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            <div class="row" style="">
                <div class="col-md-4">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th style="width:40px;">No</th>
                                <th>Nama Instruktur</th>
                                <th>Nilai</th>
                                <th style="width:100px;">#</th>
                            </tr>
                        </thead>                                    
                        <tbody>
                        @foreach ($instruktur as $ii=>$item)
                            @php
                                $avg=0;
                                $nama=$item->instruktur->nama;
                                if($item->instruktur->gelar_s3!='')
                                {
                                    $nama.=', '.$item->instruktur->gelar_s3.'.';
                                }
                                if($item->instruktur->gelar_s1!='')
                                {
                                    $nama.=', '.$item->instruktur->gelar_s1.'.';
                                }
                                if($item->instruktur->gelar_s2!='')
                                {
                                    $nama.=', '.$item->instruktur->gelar_s2.'.';
                                }
                                if($item->instruktur->gelar_lain!='')
                                {
                                    $nama.=', '.$item->instruktur->gelar_lain;
                                }

                                $n_avg=array();
                                
                                if(isset($nilai[$item->instruktur_id]))
                                {
                                    $n_tot=0;
                                    foreach($nilai[$item->instruktur_id] as $kk=>$vv)
                                    {
                                        $n_av=array();
                                        foreach($vv as $ik => $iv)
                                        {
                                            $n_av[]=$iv;    
                                        }
                                        $n_tot=array_sum($n_av)/count($n_av);
                                        $n_avg[]=$n_tot;
                                    }
                                }
                                else
                                    $n_tot=0;

                                $avg=array_sum($n_avg) / count($n_avg);

                            @endphp 
                            <tr>
                                <td class="text-center">{{++$ii}}</td>
                                <td class="text-left">{{$nama}}</td>
                                <td class="text-center">{{number_format($avg,2) }}</td>
                                <td class="text-center">
                                    <a href="javascript:hasilquisioner('{{$item->instruktur_id}}','{{$item->batch_pelatihan_id}}')" class="btn btn-xs btn-info"><i class="fa fa-bar-chart"></i> Hasil Quisioner</a>
                                </td>
                            </tr>
                        @endforeach                                 
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8">
                    
                    <div id="hasil"></div>
                </div>
                
                <hr style="border-bottom:1px solid #ddd;width:100%;">
                <small>&copy; P2M Departemen Mesin - Fakultas Teknik Universitas Indonesia.</small>
            </div>
         </div>

@section('footscript')
<script type="text/javascript" src="{{asset('build/js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<!-- END IMPORTANT SCRIPTS -->
<!-- THIS PAGE SCRIPTS -->        
<script type="text/javascript" src="{{asset('build/js/chartjs.js')}}"></script>       
<script>
    function hasilquisioner(instruktur_id,batch_id)
    {
        $('#hasil').load('{{url("hasil-quisioner")}}/'+instruktur_id+'/'+batch_id);
    }
</script>
@endsection
                             
<style>
    .app .table tr td
    {
        padding:5px 10px;
        font-size:11px !important;
    }
</style>