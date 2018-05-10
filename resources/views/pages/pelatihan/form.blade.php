@extends('layouts.master')
@section('title')
    <title>Form Pelatihan :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                     
                            <li class="active"><a href="{{url('pelatihan')}}">Pelatihan</a></li>                                                     
                            <li class="active"><a href="#">Form Pelatihan</a></li>                                                     
                          
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
                                            <h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} Pelatihan</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>  
                                        <div class="heading-elements">
                                            <a href="{{url('pelatihan')}}" class="btn btn-sm btn-primary  pull-right"><i class="fa fa-arrow-left"></i>&nbsp; Data Pelatihan</a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                       
                                        <form id="formpelatihan" class="form-horizontal" method="POST" action="{{$id==-1 ? url('pelatihan') : url('pelatihan/'.$id) }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            @if ($id!=-1)
                                                {{ method_field('PATCH') }}
                                            @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="kategori_id" value="{{$idkat}}">
                                                
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Kategori</label>
                                                            <div class="col-md-8">
                                                                <select class="s2-select-search form-control" name="kategori_id" id="kategori_id" >
                                                                    <option>-Pelatihan-</option>
                                                                    @foreach ($kategori as $item)
                                                                        @if ($idkat!=-1)
                                                                            @if ($idkat==$item->id)
                                                                                <option value="{{$item->id}}" selected="selected">{{$item->kategori}}</option>
                                                                            @else
                                                                                <option value="{{$item->id}}">{{$item->kategori}}</option>
                                                                            @endif
                                                                        @else
                                                                            <option value="{{$item->id}}">{{$item->kategori}}</option>
                                                                        @endif
                                                                    @endforeach          
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Kode Pelatihan</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="kode" id="kode" class="form-control" value="{{$id==-1 ? '' : $det->kode}}" placeholder="Kode Pelatihan">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Nama Pelatihan</label>
                                                            <div class="col-md-8">
                                                                <textarea name="nama" id="name" class="form-control" placeholder="Nama Pelatihan">{{$id==-1 ? '' : $det->nama}}</textarea>
                                                              
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Biaya Pelatihan</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="biaya_pelatihan" id="biaya_pelatihan" class="form-control" value="{{$id==-1 ? '' : number_format($det->biaya_pelatihan,0,'.',',')}}" placeholder="Biaya Pelatihan">
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
                                                    <div class="col-md-6">
                                                       
                                                    </div> 
                                                    <div class="form-group">                                                
                                                        <div class="col-md-6 text-right">
                                                            <button class="btn btn-sm btn-info" type="button" id="btnSimpan"><i class="fa fa-save"></i>&nbsp;Simpan Data</button>
                                                        </div>
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
<script type="text/javascript" src="{{asset('build/js/vendor/noty/jquery.noty.packaged.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/bootstrap-select/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/select2/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/multiselect/jquery.multi-select.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#biaya_pelatihan').autoNumeric('init',{mDec:0});
        $('#btnSimpan').on('click',function(){
            var kode=$('#kode').val();
            var nama=$('#nama').val();
            var biaya=$('#biaya_pelatihan').val();
            if(kode=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Kode Pelatihan Harus Diisi,<br>Jika Tidak Ada Isi Dengan 0';
                pesanNoty(ps,'error');
                $('#kode').focus();
            }
            else if(nama=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Nama Pelatihan Harus Diisi';
                pesanNoty(ps,'error');
                $('#nama').focus();
            }
            else if(biaya=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Biaya Pelatihan Harus Diisi';
                pesanNoty(ps,'error');
                $('#biaya_pelatihan').focus();
            }
            else
            {
                $('#modal-primary-header').text('Informasi');
                $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                $('#modal-primary').modal('show');
                $('#submit-primary').on('click',function(){
                    $('#formpelatihan').submit();
                });
            }
        });
    });
</script>
@endsection
