@extends('layouts.master')
@section('title')
    <title>Data Karyawan :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')
    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/utama')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                    
                            <li class="active"><a href="#">Data Karyawan</a></li>                                                     
                          
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
                                            <h2>Data Karyawan</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            <a href="{{url('karyawan/-1')}}" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data</a>
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
                                        @include('pages.karyawan.data')
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
<script>
    $(document).ready(function(){
        // $('div.alert-success').hide();
        setTimeout(function(){
            $('div.alert-success').fadeOut();
        },3000);
    });

    function hapus(id)
    {
        $('#modal-primary-header').text('Informasi');
        $('#primary-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-primary').modal('show');
        $('#submit-primary').on('click',function(){
            location.href='{{url("karyawan-hapus")}}/'+id;
        });
    }
</script>
@endsection