<div class="app-heading app-heading-small">                                
    
            <div class="title">
                <h1 style="font-size:20px;">Daftar Peserta Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            <div class="row" style="">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Instruktur</th>
                                <th>Kritik/Saran</th>
                                
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

                            @endphp 
                            <tr>
                                <td class="text-center"  style="width:90px;">{{++$ii}}</td>
                                <td class="text-left"  style="width:200px"><b>{{$nama}}</b></td>
                                <td class="text-left">
                                    @if (isset($kritik[$item->instruktur_id]))
                                        @foreach ($kritik[$item->instruktur_id] as $v)
                                            - {{$v->usulan}}<br>
                                        @endforeach
                                    @endif
                                </td>
                                
                            </tr>
                        @endforeach                                 
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1">&nbsp;</div>
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