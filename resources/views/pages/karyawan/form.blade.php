@extends('layouts.master')
@section('title')
    <title>Data Karyawan :: P2M Departemen Teknik Mesin FT-UI</title> 
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
                            <li class="active"><a href="{{url('karyawan')}}"> Karyawan</a></li>                                                     
                            <li class="active"><a href="#">Form {{$id==-1 ? 'Tambah' : 'Edit'}} Karyawan</a></li>                                                     
                          
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
                                            <h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} Karyawan</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            <a href="{{url('karyawan')}}" class="btn btn-xs btn-primary"><i class="fa fa fa-arrow-left"></i>&nbsp;Data Karyawan</a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                    <form id="formKaryawan" class="form-horizontal" method="POST" action="{{$id==-1 ? url('karyawan') : url('karyawan/'.$id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if ($id!=-1)
                                            {{ method_field('PATCH') }}
                                        @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kode Inisial</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="kode" id="kode" class="form-control" value="{{$id==-1 ? '' : $det->kode}}" placeholder="Kode Inisial">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="nama" id="nama" class="form-control" value="{{$id==-1 ? '' : $det->nama}}" placeholder="Nama Karyawan">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-8">
                                                            <input type="email" name="email" id="email" class="form-control" value="{{$id==-1 ? '' : $det->email}}" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Telp/HP</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="hp" class="form-control" value="{{$id==-1 ? '' : $det->hp}}" placeholder="Telp/HP">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Kelamin</label>
                                                        <div class="col-md-8">
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="gender" value="Pria" {{$id==-1 ? '' : ($det->gender=='Pria' ? 'checked="checked"' : '')}}> Pria</label> 
                                                            </div>
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="gender" value="Wanita" {{$id==-1 ? '' : ($det->gender=='Wanita' ? 'checked="checked"' : '')}}> Wanita</label> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Agama</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="agama">
                                                                <option value="">- Pilih -</option>
                                                                @foreach ($agama as $item)
                                                                    @if ($id!=-1)
                                                                        @if ($det->agama==$item)
                                                                            <option value="{{$item}}" selected="selected">{{$item}}</option>
                                                                        @else
                                                                            <option value="{{$item}}">{{$item}}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{$item}}">{{$item}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tempat Lahir</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="tempat_lahir" class="form-control" value="{{$id==-1 ? '' : $det->tempat_lahir}}" placeholder="Tempat Lahir">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Lahir</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group bs-datepicker">
                                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" name="tanggal_lahir" value="{{$id==-1 ? '' : date('d/m/Y',strtotime($det->tanggal_lahir))}}">
                                                                <span class="input-group-addon">
                                                                    <span class="icon-calendar-full"></span>
                                                                </span>
                                                            </div>
                                                            {{-- <input type="email" name="tanggal_lahir" class="form-control" value="{{$id==-1 ? '' : date('d-m-Y',strtotime($det->tanggal_lahir))}}" placeholder="dd-mm-yyyy"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat</label>
                                                        <div class="col-md-8">
                                                            <textarea name="alamat" class="form-control">{{$id==-1 ? '' : $det->alamat}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Status Aktif</label>
                                                        <div class="col-md-8">
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="flag" value="1" {{$id==-1 ? '' : ($det->flag==1 ? 'checked="checked"' : '')}}> Aktif</label> 
                                                            </div>
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="flag" value="0" {{$id==-1 ? '' : ($det->flag==0 ? 'checked="checked"' : '')}}> Non Aktif</label> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
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
<script>
    $(document).ready(function(){
        $('#btnSimpan').on('click',function(){
            var kode=$('#kode').val();
            var nama=$('#nama').val();
            var email=$('#email').val();
            if(kode=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Kode NIP Harus Diisi,<br>Jika Tidak Ada Isi Dengan 0';
                pesanNoty(ps,'error');
                $('#kode').focus();
            }
            else if(nama=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Nama Karyawan Harus Diisi';
                pesanNoty(ps,'error');
                $('#nama').focus();
            }
            else if(email=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Email Karyawan Harus Diisi';
                pesanNoty(ps,'error');
                $('#email').focus();
            }
            else
            {
                $('#modal-primary-header').text('Informasi');
                $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                $('#modal-primary').modal('show');
                $('#submit-primary').on('click',function(){
                    $('#formKaryawan').submit();
                });
            }
        });
    });
    
</script>
@endsection