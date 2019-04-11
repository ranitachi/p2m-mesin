@extends('layouts.master')
@section('title')
    <title>Data Riwayat Pelatihan Peserta :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')
    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/utama')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                   
                            <li class="active"><a href="#">Data Riwayat Pelatihan Instruktur</a></li>                                                     
                          
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                    
                    <!-- START PAGE CONTAINER -->
                    <div class="container">
                       
                        <div class="row">
                            
                            <div class="col-md-12">
                                
                                <!-- START LATEST TRANSACTIONS -->
                                <div class="block block-condensed">
                                    <div class="app-heading">                                        
                                        <div class="title">
                                            <h2>Data Instruktur</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            <a href="{{url('instruktur')}}" class="btn btn-xs btn-primary"><i class="fa fa-chevron-left"></i>&nbsp;Kembali Ke Data instruktur</a>
                                            
                                        </div>
                                    </div>
                                    @if(Session::has('status'))
                                        <div class="row">            
                                            <div class="col-md-12" style="padding:0 30px;">
                                                <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">
                                                    <div class="alert-icon">
                                                        <span class="icon-checkmark-circle"></span> 
                                                    </div>
                                                    <strong>Success!</strong> {{ Session::get('status') }} 
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="block-content">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Inisial Instruktur</label>
                                                        <div class="col-md-8">
                                                            <b>{{$instruktur->inisial}}</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Lengkap</label>
                                                        <div class="col-md-8">
                                                            <b>{{$instruktur->nama}}</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-8">
                                                            {{$instruktur->email}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Telp/HP</label>
                                                        <div class="col-md-8">
                                                            {{$instruktur->telp}} - {{$instruktur->hp}}
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="table-responsive" style="margin-top:20px;">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Pelatihan</th>
                                                        <th>Nama Pelatihan</th>
                                                        <th>Waktu</th>
                                                        <th>Lokasi</th>
                                                        
                                                    </tr>
                                                </thead> 
                                                <tbody>
                                                    @if ($pelatihan->count()!=0)
                                                        @php
                                                            $no=1;
                                                        @endphp
                                                        @foreach ($pelatihan as $item)
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$item->kode}}</td>
                                                                <td>{{$item->nama}}</td>
                                                                <td>{{tgl_indo2($batch[$item->id]->start_date)}} s.d. {{tgl_indo2($batch[$item->id]->end_date)}}</td>
                                                                <td>{{$batch[$item->id]->lokasi}}</td>
                                                                
                                                            </tr>
                                                            @php
                                                                $no++;
                                                            @endphp
                                                        @endforeach    
                                                    @else
                                                        <tr>
                                                            <td class="text-center" colspan="6">Data Riwayat Kosong</td>
                                                        </tr>
                                                    @endif
                                                    
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                                <!-- END LATEST TRANSACTIONS -->
                                
                            </div>
                        </div>
                        
                      
                    </div>
@endsection
@section('footscript')
<script type="text/javascript" src="{{asset('build/js/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/webcamjs-master/webcam.js')}}"></script>
<script>
    $(document).ready(function(){
        // $('div.alert-success').hide();
        setTimeout(function(){
            $('div.alert-success').fadeOut();
        },3000);
    });
    
   
</script>
@endsection
