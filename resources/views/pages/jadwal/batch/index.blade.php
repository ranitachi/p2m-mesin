@extends('layouts.master')
@section('title')
    <title>Detail Batch Pelatihan :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

<div class="app-heading-container app-heading-bordered bottom">
    <ul class="breadcrumb">
        <li class="active"><a href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>             
        <li class="active"><a href="#">Detail Batch Pelatihan</a></li>             
      
    </ul>
</div>

<div class="container">
   
    <div class="row">
        
        <div class="col-md-12">
            
            <!-- START LATEST TRANSACTIONS -->
            
            <div class="app-navigation-horizontal">
                <nav>
                    <ul>
                        <li class="{{$jenis=='index' ? 'active' : ''}}">
                            <a href="#"><span class="icon-laptop-phone"></span>Pelatihan</a>
                            <ul>
                                <li class="{{$jenis=='index' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/index')}}">Informasi</a></li>
                            </ul>
                        </li>
                        <li class="{{strpos($jenis,'peserta')!==false ? 'active' : ''}}">
                            <a href="#"><span class="icon-archive2"></span> Peserta</a>                
                            <ul>
                                <li class="{{$jenis=='peserta' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/peserta')}}">Daftar Peserta</a></li>
                                <li class="{{$jenis=='peserta-add' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/peserta-add')}}">Tambah Peserta</a></li>
                            </ul>
                        </li>
                        <li class="{{strpos($jenis,'jadwal')!==false ? 'active' : ''}}">
                            <a href="#"><span class="icon-user-plus"></span> Jadwal Pelatihan </a>                
                            <ul>
                                <li class="{{$jenis=='jadwal' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/jadwal')}}">Daftar Jadwal</a></li>
                                <li class="{{$jenis=='jadwal-add' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/jadwal-add')}}">Tambah Jadwal</a></li>
                            </ul>
                        </li>
                        <li class="{{strpos($jenis,'absensi')!==false ? 'active' : ''}}">
                            <a href="#"><span class="icon-user-plus"></span> Absensi </a>                
                            <ul>
                                <li class="{{$jenis=='absensi' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/absensi')}}">Daftar Absensi</a></li>
                                <li class="{{$jenis=='absensi-add' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/absensi-add')}}">Tambah Absensi</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="container" style="padding-left:0px !important;padding-right:0px !important;">
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
               
                @if ($jenis=='index')
                    @include('pages.jadwal.batch.info')
                @else
                    
                @endif                                               
                        
            </div>                          
                            
                            
                            
          
        </div>
    </div>  
</div>
@endsection
@section('footscript')
<script type="text/javascript" src="{{asset('build/js/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/noty/jquery.noty.packaged.js')}}"></script>
<script>
    $(document).ready(function(){
        //loaddata();
        setTimeout(function(){
            $('div.alert-success').fadeOut();
        },3000);
    });
    function loaddata(idkat)
    {
        $('#data').load('{{url("jadwal-pelatihan-data")}}',function(){
            $('#datatable').DataTable( {
                "fixedColumns": true
                } );
        });
    }
    function hapus(id)
    {
        $('#danger-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-danger').modal('show');
        $('#submit-hapus').on('click',function(){
            location.href='{{url("jadwal-pelatihan-hapus")}}/'+id;
        });
    }
</script>
@endsection
