@extends('layouts.master')
@section('title')
    <title>Data Quisioner :: P2M Departemen Teknik Mesin FT-UI</title> 
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
                            <li class="active"><a href="{{url('/')}}">Beranda</a></li>                                                     
                            <li class="active"><a href="{{url('quisioner')}}"> quisioner</a></li>                                                     
                            <li class="active"><a href="#">Form {{$id==-1 ? 'Tambah' : 'Edit'}} quisioner</a></li>                                                     
                          
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
                                            <h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} quisioner</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            <a href="{{url('quisioner')}}" class="btn btn-xs btn-primary"><i class="fa fa fa-arrow-left"></i>&nbsp;Data Quisioner</a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                    <form id="formquisioner" class="form-horizontal" method="POST" action="{{$id==-1 ? url('quisioner') : url('quisioner/'.$id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if ($id!=-1)
                                            {{ method_field('PATCH') }}
                                        @endif
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Status Aktif</label>
                                                        <div class="col-md-10">
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="flag" value="1" {{$id==-1 ? '' : ($det->flag==1 ? 'checked="checked"' : '')}}> Aktif</label> 
                                                            </div>
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="flag" value="0" {{$id==-1 ? '' : ($det->flag==0 ? 'checked="checked"' : '')}}> Non Aktif</label> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Kategori</label>
                                                        <div class="col-md-10">
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="kategori" value="pilihan" {{$id==-1 ? '' : ($det->kategori=='pilihan' ? 'checked="checked"' : '')}}> Pilihan</label> 
                                                            </div>
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="kategori" value="isian" {{$id==-1 ? '' : ($det->kategori=='isian' ? 'checked="checked"' : '')}}> Isian</label> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Pertanyaan</label>
                                                        <div class="col-md-10">
                                                            <textarea name="question" id="question">{{ $id!=-1 ? $det->question : '' }}</textarea> 
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
<script type="text/javascript" src="{{asset('build/js/vendor/noty/jquery.noty.packaged.js')}}"></script>
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function(){
        var options={
            toolbarGroups: [
				{"name":"basicstyles","groups":["basicstyles"]},
				{"name":"links","groups":["links"]},
				{"name":"paragraph","groups":["list","blocks"]},
				{"name":"document","groups":["mode"]},
				{"name":"insert","groups":["insert"]},
				{"name":"styles","groups":["styles"]},
				{"name":"about","groups":["about"]}
            ],
            height : 100
        };
        CKEDITOR.replace('question', options);
        $('#btnSimpan').on('click',function(){
            // var question=$('#question').val();
            var question=CKEDITOR.instances['question'].getData();
            if(question=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Pertanyaan Quisioner Masih Kosong';
                pesanNoty(ps,'error');
                $('#question').focus();
            }
            else
            {
                $('#modal-primary-header').text('Informasi');
                $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                $('#modal-primary').modal('show');
                $('#submit-primary').on('click',function(){
                    $('#formquisioner').submit();
                });
            }
        });
    });
    
</script>
@endsection