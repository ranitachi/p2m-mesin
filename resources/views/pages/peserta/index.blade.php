@extends('layouts.master')
@section('title')
    <title>Data Peserta :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')
    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                   
                            <li class="active"><a href="#">Data Peserta</a></li>                                                     
                          
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
                                            <h2>Data Peserta</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            <a href="{{url('peserta/-1')}}" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data</a>
                                            <a href="{{url('peserta-import')}}" class="btn btn-xs btn-success"><i class="fa fa-file-excel-o"></i>&nbsp;Import Excel</a>
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
                                        @include('pages.peserta.data')
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
    
    
    function ambilfoto(id)
    {
        $('#idpeserta').val(id);
        Webcam.set({
            width: 320,
            height: 240,
            dest_width: 320,
            dest_height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90,
            force_flash: false
        });
        Webcam.attach( '#my_camera' );

        $('#modal-camera-header').text('Ambil Foto');
        $('#modal-camera').modal('show');
        $('#submit-camera').text('Simpan');
        $('#submit-camera').one('click',function(){
                $('#myform').submit();
        });
        $('#no-btn').one('click',function(){
            Webcam.reset();
            $('#modal-camera').modal('hide');
        });
        
    }
    function hapus(id)
    {
        $('#modal-primary-header').text('Informasi');
        $('#primary-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-primary').modal('show');
        $('#submit-primary').on('click',function(){
            location.href='{{url("peserta-hapus")}}/'+id;
        });
    }
    function take_snapshot() {
            Webcam.snap( function(data_uri) {
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                document.getElementById('mydata').value = raw_image_data;
                document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
            });
    }
</script>
@endsection
 <div class="modal fade" id="modal-camera" tabindex="-1" role="dialog" aria-labelledby="modal-primary-header">     
                <div class="modal-dialog modal-primary" role="document">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                    <div class="modal-content">
                        <div class="modal-header">                        
                            <h4 class="modal-title" id="modal-camera-header"></h4>
                        </div>
                        <div class="modal-body" id="camera-body">
                        <form id="myform" action="{{url('foto-simpan')}}" method="post">
                            <input type="hidden" name="id" id="idpeserta">
                            <input id="mydata" type="hidden" name="mydata" value=""/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <center>
                                <div id="my_camera" style="width:320px; height:240px;"></div>
                                <div id="my_result"></div>
                                <a href="javascript:void(take_snapshot())" class="btn btn-xs btn-info" style="margin-top:5px;"><i class="fa fa-camera"></i> Ambil Foto</a>
                            </center>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" id="no-btn">Tidak</button>
                            <button type="button" class="btn btn-primary" id="submit-camera">Ya</button>
                        </div>
                    </div>
                </div>            
            </div>