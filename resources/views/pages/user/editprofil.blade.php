@extends('layouts.master')
@section('title')
    <title>Data User :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')
    <div class="app-heading app-heading-bordered app-heading-page">
                        <div class="icon icon-lg">
                            <span class="icon-home"></span>
                        </div>
                        <div class="title">
                            <h1>P2M - Departemen Mesin </h1>
                            <p>Fakultas Teknik Universitas Indonesia</p>
                        </div>               
                        <!--
                        <div class="heading-elements">
                            <a href="#" class="btn btn-danger" id="page-like"><span class="app-spinner loading"></span> loading...</a>
                            <a href="https://themeforest.net/item/boooya-revolution-admin-template/17227946?ref=aqvatarius&license=regular&open_purchase_for_item_id=17227946" class="btn btn-success btn-icon-fixed"><span class="icon-text">$24</span> Purchase</a>
                        </div>
                        -->
                    </div>
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/utama')}}">Beranda</a></li>                                                     
                            <li class="active"><a href="{{url('user')}}"> User</a></li>                                                     
                            <li class="active"><a href="#">Form {{$id==-1 ? 'Tambah' : 'Edit'}} User</a></li>                                                     
                          
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
                                            <h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} User</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                    </div>
                                    @if(Session::has('status'))
                                        <div class="row">            
                                            <div class="col-md-12" style="padding:0 30px;">
                                                <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">
                                                    <div class="alert-icon">
                                                        <span class="icon-checkmark-circle"></span> 
                                                    </div>
                                                    <strong>Success!</strong> {!! Session::get('status') !!} 
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="block-content">
                                    <form id="formUser" class="form-horizontal" method="POST" action="{{$id==-1 ? url('user') : url('user/'.$id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if ($id!=-1)
                                            {{ method_field('PATCH') }}
                                        @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Username</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="username" id="username" class="form-control" value="{{$id==-1 ? '' : $det->email}}" placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Password</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="password" id="password" class="form-control" value="" placeholder="Biarkan Kosong Jika Tidak Ganti Password">
                                                        </div>
                                                    </div>
                                                            @php
                                                                $akses=akses();
                                                                $hak_akses=array();
                                                                if($id!=-1)
                                                                {
                                                                    if(!is_null($det->hakakses))
                                                                        $hak_akses=explode(',',$det->hakakses);
                                                                }
                                                            @endphp
                                                            @foreach ($akses as $key=>$item)
                                                                @if (in_array($key,$hak_akses))    
                                                                    <input type="hidden" name="akses[]" value="{{$key}}">
                                                                @endif
                                                            @endforeach
                                                    @if ($det->level==2)
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Karyawan</label>
                                                            <div class="col-md-8">
                                                                <select class="s2-select-search form-control" name="karyawan_id">
                                                                    <option value="0">- Pilih -</option>
                                                                    @foreach ($pegawai as $item)
                                                                        @if ($id!=-1)
                                                                            @php
                                                                                if ($det->pegawai_id==0)
                                                                                    break;
                                                                            @endphp
                                                                            @if ($det->pegawai_id==$item->id)
                                                                                <option value="{{$det->pegawai_id}}" selected="selected">{{$item->nama}}</option>
                                                                            @endif
                                                                        @else
                                                                            <option value="{{$item->id}}">{{$item->nama}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($det->level==1)
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Direktur</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="direktur_id">
                                                                <option value="0">- Pilih -</option>
                                                                @foreach ($direktur as $item)
                                                                    @if ($id!=-1)
                                                                        @php
                                                                            if ($det->direktur_id==0)
                                                                                break;
                                                                        @endphp
                                                                        @if ($det->direktur_id==$item->id)
                                                                            <option value="{{$det->direktur_id}}" selected="selected">{{$item->nama}}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if ($det->level==3)
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Instruktur</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="instruktur_id">
                                                                <option value="0">- Pilih -</option>
                                                                @foreach ($instruktur as $item)
                                                                    @if ($id!=-1)
                                                                        @php
                                                                            if ($det->instruktur_id==0)
                                                                                break;
                                                                        @endphp
                                                                        @if ($det->instruktur_id==$item->id)
                                                                            <option value="{{$det->instruktur_id}}" selected="selected">{{$item->nama}}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">                                                
                                                <div class="col-md-12 text-center">
                                                    <button class="btn btn-sm btn-info" type="button" id="btnSimpan"><i class="fa fa-save"></i>&nbsp;Simpan Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END LATEST TRANSACTIONS -->
                                
                            </div>
                        </div>
                        
                      
                    </div>
                
@endsection
@section('footscript')
<script type="text/javascript" src="{{asset('build/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/bootstrap-daterange/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/noty/jquery.noty.packaged.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/bootstrap-select/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/select2/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/multiselect/jquery.multi-select.js')}}"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $('div.alert-success').fadeOut();
        },3000);
        $('#btnSimpan').on('click',function(){
            var username=$('#username').val();
            if(username=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Username Belum Di Isi';
                pesanNoty(ps,'error');
                $('#username').focus();
            }
            
            else
            {
                $('#modal-primary-header').text('Informasi');
                $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                $('#modal-primary').modal('show');
                $('#submit-primary').on('click',function(){
                    $('#formUser').submit();
                });
            }
        });
    });
    
</script>
@endsection