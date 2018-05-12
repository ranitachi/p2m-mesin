@extends('layouts.master')
@section('title')
    <title>Detail Batch Pelatihan :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

<div class="app-heading-container app-heading-bordered bottom">
    <ul class="breadcrumb">
        <li class="active"><a href="{{url('/utama')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>             
        <li class="active"><a href="#">Detail Batch Pelatihan</a></li>             
      
    </ul>
</div>


<div class="container">
   
    <div class="row">
        
        <div class="col-md-12">
            
            <!-- START LATEST TRANSACTIONS -->
            
            <div class="row" style="padding-left:15px !important;padding-right:15px !important;">
                       <div class="col-md-12" >
                           <h1 style="margin-bottom:0px;">Pelatihan : {{$pelatihan->nama}}</h1>
                           <h3>Angkatan : {{$jadwal->angkatan}}</h3>
                       </div>
                   </div>
            <div style="padding-left:15px !important;padding-right:15px !important;">
                <div class="app-navigation-horizontal">
                    
                    <nav >
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
                                    <li class="{{$jenis=='jadwal-add' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/jadwal-add__0')}}">Tambah Jadwal</a></li>
                                </ul>
                            </li>
                            <li class="{{strpos($jenis,'absensi')!==false ? 'active' : ''}}">
                                <a href="#"><span class="icon-user-plus"></span> Absensi </a>                
                                <ul>
                                    <li class="{{$jenis=='absensi' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/absensi')}}">Daftar Absensi</a></li>
                                    <li class="{{$jenis=='absensi-add' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/absensi-add__0')}}">Tambah Absensi</a></li>
                                </ul>
                            </li>
                            <li class="{{strpos($jenis,'unduh')!==false ? 'active' : (strpos($jenis,'sertifikat')!==false ? 'active' : (strpos($jenis,'ucapan-terimakasih')!==false ? 'active' : ''))}}">
                                <a href="#"><span class="icon-user-plus"></span> Berkas Pelatihan</a>                
                                <ul>
                                    <li class="{{$jenis=='unduh' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/unduh-berkas')}}">Unduh & Unggah Berkas</a></li>
                                    <li class="{{$jenis=='sertifikat' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/sertifikat')}}">Sertifikat</a></li>
                                    <li class="{{$jenis=='ucapan-terimakasih' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/ucapan-terimakasih')}}">Ucapan Terima Kasih</a></li>
                                </ul>
                            </li>
                            <li class="{{strpos($jenis,'test')!==false ? 'active' : ''}}">
                                <a href="#"><span class="icon-user-plus"></span> Pre Test & Post Test</a>                
                                <ul>
                                    <li class="{{$jenis=='test' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/test')}}">Nilai Pre Test & Post Test</a></li>
                                </ul>
                            </li>
                            <li class="{{strpos($jenis,'quisioner')!==false ? 'active' : ''}}">
                                <a href="#"><span class="icon-user-plus"></span> Quisioner</a>                
                                <ul>
                                    <li class="{{$jenis=='quisioner' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/quisioner')}}">Form Quisioner</a></li>
                                    <li class="{{$jenis=='quisioner-hasil' ? 'active' : ''}}"><a href="{{url('batch-detail/'.$id.'/quisioner-hasil')}}">Hasil Quisioner</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="container" style="">
                <div class="block block-condensed">
                        @if(Session::has('success'))
                            <div class="row" style="margin-top:10px;">            
                                <div class="col-md-12" style="padding:0 30px;">
                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">
                                        <div class="alert-icon">
                                            <span class="icon-checkmark-circle"></span> 
                                        </div>
                                        <strong>Success!</strong> {{ Session::get('success') }} 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="row" style="margin-top:10px;">            
                                <div class="col-md-12" style="padding:0 30px;">
                                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">
                                        <div class="alert-icon">
                                            <span class="fa fa-exclamation-triangle"></span> 
                                        </div>
                                        <strong>Fail!</strong> {{ Session::get('fail') }} 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    
                @if ($jenis=='index')
                    @include('pages.jadwal.batch.info')
                @elseif($jenis=='peserta')
                    @include('pages.jadwal.batch.peserta')    
                @elseif($jenis=='peserta-add')
                    @include('pages.jadwal.batch.peserta-add')    
                @elseif($jenis=='jadwal')
                    @include('pages.jadwal.batch.jadwal')    
                @elseif($jenis=='jadwal-add')
                    @include('pages.jadwal.batch.jadwal-add')    
                @elseif($jenis=='absensi')
                    @include('pages.jadwal.batch.absensi')    
                @elseif($jenis=='absensi-add')
                    @include('pages.jadwal.batch.absensi-add')    
                @elseif($jenis=='unduh-berkas')
                    @include('pages.jadwal.batch.unduh-berkas')    
                @elseif($jenis=='test')
                    @include('pages.jadwal.batch.test')    
                @else
                    @include('pages.jadwal.batch.'.$jenis)    
                @endif                                               
                        
                </div>                          
            </div>                          
                            
                            
                            
          
        </div>
    </div>  
</div>
@endsection
@section('footscript')
<script type="text/javascript" src="{{asset('build/js/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/noty/jquery.noty.packaged.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/bootstrap-select/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/select2/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/multiselect/jquery.multi-select.js')}}"></script>
<script>
    $(document).ready(function(){
        //loaddata();
        $('#tanggal').datetimepicker({  
                 minDate:'{{$jadwal->start_date}}',
                 maxDate:'{{$jadwal->end_date}}',
                 format:'DD/MM/YYYY',
                 disabledDates: [new Date()]
        });
        setTimeout(function(){
            $('div.alert-success').fadeOut();
            $('div.alert-danger').fadeOut();
        },3000);

        $('#btnSimpanAbsensi').on('click',function(){
            var tanggal=$('#tanggal').val();
            if(tanggal=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Tanggal Jadwal Belum Dipilih';
                pesanNoty(ps,'error');
            }
            else
            {
                $('#modal-primary-header').text('Informasi');
                    $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                    $('#modal-primary').modal('show');
                    $('#submit-primary').one('click',function(){
                        $('#formAddAbsensi').submit();
                    });
            }
        });
        $('#btnSimpanPeserta').on('click',function(){
            $('#modal-primary-header').text('Informasi');
                $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                $('#modal-primary').modal('show');
                $('#submit-primary').one('click',function(){
                    $('#formAddPeserta').submit();
                });
        });

        $("input#start_time").mask('99:99');
        $("input#end_time").mask('99:99');
        $('#btnSimpanJadwal').on('click',function(){
            var tanggal=$('#tanggal').val();
            var start_time=$('#start_time').val();
            var end_time=$('#end_time').val();
            var materi=$('#materi').val();
            var staf=$('#staf').val();
            if(tanggal=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Tanggal Jadwal Belum Dipilih';
                pesanNoty(ps,'error');
            }
            else if(start_time=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Waktu Mulai Belum Dipilih';
                pesanNoty(ps,'error');
            }
            else if(end_time=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Waktu Selesai Belum Dipilih';
                pesanNoty(ps,'error');
            }
            else if(materi=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Materi Belum Diisi';
                pesanNoty(ps,'error');
            }
            else if(staf=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Staf Belum Dipilih';
                pesanNoty(ps,'error');
            }
            else
            {
                $('#modal-primary-header').text('Informasi');
                    $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                    $('#modal-primary').modal('show');
                    $('#submit-primary').one('click',function(){
                        $('#formAddJadwal').submit();
                    });
            }
        });
    });
    function getmateri(val)
    {
        if(val!=0)
        {
            $('#div_materi').load('{{url("getmateri")}}/'+val);
        }
    }
    function loaddata(idkat)
    {
        $('#data').load('{{url("jadwal-pelatihan-data")}}',function(){
            $('#datatable').DataTable( {
                "fixedColumns": true
                } );
        });
    }
    function hapuspeserta(id,idbatch)
    {
        $('#danger-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-danger').modal('show');
        $('#submit-hapus').one('click',function(){
            location.href='{{url("peserta-hapus")}}/'+id+'/'+idbatch;
        });
    }
    function hapusjadwal(id,idbatch)
    {
        $('#danger-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-danger').modal('show');
        $('#submit-hapus').one('click',function(){
            location.href='{{url("jadwal-hapus")}}/'+id+'/'+idbatch;
        });
    }
    function hapusabsensi(id,idbatch)
    {
        $('#danger-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-danger').modal('show');
        $('#submit-hapus').one('click',function(){
            location.href='{{url("absensi-hapus")}}/'+id+'/'+idbatch;
        });
    }

    function detabsensi(idabsensi,idbatch)
    {
        $('#detabsen').load('{{url("absensi-detail")}}/'+idabsensi);
    }
</script>
@endsection
<style>
    .app .block > .app-heading
    {
        margin-top:5px;
    }
</style>