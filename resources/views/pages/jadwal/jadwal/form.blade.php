@extends('layouts.master')
@section('title')
    <title>Form Jadwal Pelatihan :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

<div class="app-heading-container app-heading-bordered bottom">
    <ul class="breadcrumb">
        <li class="active"><a href="{{url('/utama')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>             
        <li class="active"><a href="#">Form Jadwal Pelatihan</a></li>             
      
    </ul>
</div>
<!-- END PAGE HEADING -->

<!-- START PAGE CONTAINER -->
<div class="container">
   
    <div class="row">
        
        <div class="col-md-12">
            
            <!-- START LATEST TRANSACTIONS -->
            <div class="container">
                       
                        
                                <!-- START LATEST TRANSACTIONS -->
                                <div class="block block-condensed">
                                    <div class="app-heading">                                        
                                        <div class="title">
                                            <h2>Form Jadwal Pelatihan</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            <a href="{{url('jadwal-pelatihan')}}" class="btn btn-xs btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;Data Jadwal Pelatihan</a>
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
                                        <form id="formJadwal" class="form-horizontal" method="POST" action="{{$id==-1 ? url('jadwal-pelatihan') : url('jadwal-pelatihan/'.$id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if ($id!=-1)
                                            {{ method_field('PATCH') }}
                                        @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Pelatihan</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="pelatihan_id" id="pelatihan_id">
                                                                <option value="0">-Jenis Pelatihan-</option>
                                                                @foreach ($pelatihan as $item)
                                                                    @if ($id!=-1)
                                                                        @if ($det->pelatihan_id==$item->id)
                                                                            <option value="{{$item->id}}__{{$item->kode}}" selected="selected">{{$item->nama}}</option>
                                                                        @else
                                                                            <option value="{{$item->id}}__{{$item->kode}}">{{$item->nama}}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{$item->id}}__{{$item->kode}}">{{$item->nama}}</option>
                                                                        
                                                                    @endif
                                                                @endforeach          
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kode Pelatihan</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="kode" id="kode" class="form-control" value="{{$id==-1 ? '' : $det->kode}}" placeholder="Kode Instruktur">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Angkatan</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="angkatan" id="angkatan" class="form-control" value="{{$id==-1 ? '' : $det->angkatan}}" placeholder="Angkatan">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Mulai</label>
                                                        <div class="col-md-4">
                                                            <div class="input-group bs-datepicker">
                                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="start_date" name="start_date" value="{{$id==-1 ? '' : ($det->start_date!='' ? date('d/m/Y',strtotime($det->start_date)) : '')}}">
                                                                <span class="input-group-addon">
                                                                    <span class="icon-calendar-full"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Selesai</label>
                                                        <div class="col-md-4">
                                                            <div class="input-group bs-datepicker">
                                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="end_date" name="end_date" value="{{$id==-1 ? '' : ($det->end_date!='' ? date('d/m/Y',strtotime($det->end_date)) : '')}}">
                                                                <span class="input-group-addon">
                                                                    <span class="icon-calendar-full"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Pelatihan</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="jenis" id="jenis">
                                                                <option value="0">-Pilih Jenis-</option>
                                                                <option value="In House">In House</option>
                                                                <option value="Public">Public</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">PIC Pelatihan</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="pic" id="pic">
                                                                <option value="0">-Pilih PIC-</option>
                                                                @foreach ($pegawai as $item)
                                                                    @if ($id!=-1)
                                                                        @if (strtok($det->pic,'-')==$item->id)
                                                                            <option value="{{$item->id}}-{{$item->nama}}" selected="selected">{{$item->nama}}</option>
                                                                        @else
                                                                            <option value="{{$item->id}}-{{$item->nama}}">{{$item->nama}}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{$item->id}}-{{$item->nama}}">{{$item->nama}}</option>
                                                                        
                                                                    @endif
                                                                @endforeach          
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Instruktur</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" multiple="multiple" name="instruktur_id[]" data-placeholder="Pilih Instruktur">
                                                                <option value="0">-Instruktur-</option>
                                                                @foreach ($instruktur as $item)
                                                                    @if ($id!=-1)
                                                                        @if (array_key_exists($item->id, $batchins))
                                                                            <option value="{{$item->id}}" selected="selected">{{$item->inisial}}-{{$item->nama}}</option>
                                                                        @else
                                                                            <option value="{{$item->id}}">{{$item->inisial}}-{{$item->nama}}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{$item->id}}">{{$item->inisial}}-{{$item->nama}}</option>
                                                                        
                                                                    @endif
                                                                @endforeach          
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lokasi Pelatihan</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="lokasi" class="form-control" value="{{$id==-1 ? '' : $det->lokasi}}" placeholder="Lokasi">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Status Pelatihan</label>
                                                        <div class="col-md-8">
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="flag" value="1" {{$id==-1 ? '' : ($det->flag=='1' ? 'checked="checked"' : '')}}> Aktif</label> 
                                                            </div>
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="flag" value="0" {{$id==-1 ? '' : ($det->flag=='0' ? 'checked="checked"' : '')}}> Tidak Aktif</label> 
                                                            </div>
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="flag" value="2" {{$id==-1 ? '' : ($det->flag=='2' ? 'checked="checked"' : '')}}> Sudah Terlaksana</label> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Keterangan</label>
                                                        <div class="col-md-8">
                                                            <textarea name="desc" class="form-control">{{$id==-1 ? '' : $det->desc}}</textarea>
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
        $('#pelatihan_id').change(function(){
            var id=($(this).val()).split('__');
            var kode=id[1];
            $('#kode').val(kode);
        });
        $('#btnSimpan').on('click',function(){
            
            var p_id=($('#pelatihan_id').val()).split('__');
            var pelatihan_id=p_id[0];
            var start_date=$('#start_date').val();
            var end_date=$('#end_date').val();
            if(pelatihan_id=='' || pelatihan_id==0)
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Jenis Pelatihan Belum Dipilih';
                pesanNoty(ps,'error');
                $('#pelatihan_id').focus();
            }
            else if(start_date=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Tanggal Awal Pelatihan Belum Diisi';
                pesanNoty(ps,'error');
                $('#start_date').focus();
            }
            else if(end_date=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Tanggal Akhir Pelarihan Belum Diisi';
                pesanNoty(ps,'error');
                $('#end_date').focus();
            }
            else
            {
                $('#modal-primary-header').text('Informasi');
                $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                $('#modal-primary').modal('show');
                $('#submit-primary').on('click',function(){
                    $('#formJadwal').submit();
                });
            }
        });
    });
</script>
@endsection
