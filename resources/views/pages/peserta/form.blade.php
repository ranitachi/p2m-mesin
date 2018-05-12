@extends('layouts.master')
@section('title')
    <title>Data Peserta :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')
  
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/utama')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                     
                            <li class="active"><a href="{{url('peserta')}}"> Peserta</a></li>                                                     
                            <li class="active"><a href="#">Form {{$id==-1 ? 'Tambah' : 'Edit'}} Peserta</a></li>                                                     
                          
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
                                            <h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} Peserta</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            <a href="{{url('peserta')}}" class="btn btn-xs btn-primary"><i class="fa fa fa-arrow-left"></i>&nbsp;Data Peserta</a>
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
                                    <form id="formPeserta" class="form-horizontal" method="POST" action="{{$id==-1 ? url('peserta') : url('peserta/'.$id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if ($id!=-1)
                                            {{ method_field('PATCH') }}
                                        @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kode Peserta</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="peserta_kode" id="kode" class="form-control" value="{{$kode}}" placeholder="Kode Peserta">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Lengkap</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="peserta_nama_lengkap" id="nama" class="form-control" value="{{$id==-1 ? '' : $det->nama_lengkap}}" placeholder="Nama Lengkap (Dengan Gelar)">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Untuk Sertifikat</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="peserta_nama_sertifikat" id="nama_sertifikat" class="form-control" value="{{$id==-1 ? '' : $det->nama_sertifikat}}" placeholder="Nama Untuk Sertifikat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Telp/HP</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="peserta_hp" class="form-control" value="{{$id==-1 ? '' : $det->hp}}" placeholder="Telp/HP">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Kelamin</label>
                                                        <div class="col-md-8">
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="peserta_gender" value="Pria" {{$id==-1 ? '' : ($det->gender=='Pria' ? 'checked="checked"' : '')}}> Pria</label> 
                                                            </div>
                                                            <div class="app-radio primary inline"> 
                                                                <label><input type="radio" name="peserta_gender" value="Wanita" {{$id==-1 ? '' : ($det->gender=='Wanita' ? 'checked="checked"' : '')}}> Wanita</label> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Agama</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="peserta_agama">
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
                                                            <input type="text" name="peserta_tempat_lahir" class="form-control" value="{{$id==-1 ? '' : $det->tempat_lahir}}" placeholder="Tempat Lahir">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Lahir</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group bs-datepicker">
                                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" name="peserta_tanggal_lahir" value="{{$id==-1 ? '' : ($det->tanggal_lahir!='' ? date('d/m/Y',strtotime($det->tanggal_lahir)) : '')}}">
                                                                <span class="input-group-addon">
                                                                    <span class="icon-calendar-full"></span>
                                                                </span>
                                                            </div>
                                                            {{-- <input type="email" name="tanggal_lahir" class="form-control" value="{{$id==-1 ? '' : date('d-m-Y',strtotime($det->tanggal_lahir))}}" placeholder="dd-mm-yyyy"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-8">
                                                            <input type="email" name="peserta_email" id="email" class="form-control" value="{{$id==-1 ? '' : $det->email}}" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat</label>
                                                        <div class="col-md-8">
                                                            <textarea name="peserta_alamat" class="form-control">{{$id==-1 ? '' : $det->alamat}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kode Pos</label>
                                                        <div class="col-md-4">
                                                            <input type="text" name="peserta_kode_pos" class="form-control" value="{{$id==-1 ? '' : $det->kode_pos}}" placeholder="Kode Pos">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Provinsi</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="peserta_provinsi" onchange="getwilayah(this.value,'kota')">
                                                                <option value="0">-Provinsi-</option>
                                                                @foreach ($prop as $item)
                                                                    @if ($id!=-1)
                                                                        @if ($det->provinsi==$item->id)
                                                                            <option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
                                                                        @else
                                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                        
                                                                    @endif
                                                                @endforeach          
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kabupaten/Kota</label>
                                                        <div class="col-md-8" id="div_kota">
                                                            <select class="s2-select-search form-control" name="peserta_kabupaten_kota" onchange="getwilayah(this.value,'kecamatan')">
                                                                <option value="0">-Pilih-</option>
                                                                @if ($id!=-1)
                                                                    @foreach ($kota as $item)    
                                                                        @if ($det->kabupaten_kota==$item->id)
                                                                            <option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
                                                                        @else
                                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                                        @endif       
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kecamatan</label>
                                                        <div class="col-md-8" id="div_kecamatan">
                                                            <select class="s2-select-search form-control" name="peserta_kecamatan" onchange="getwilayah(this.value,'kelurahan')">
                                                                <option value="0">-Pilih-</option>
                                                                @if ($id!=-1)
                                                                    @foreach ($kec as $item)    
                                                                        @if ($det->kecamatan==$item->id)
                                                                            <option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
                                                                        @else
                                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                                        @endif       
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kelurahan</label>
                                                        <div class="col-md-8" id="div_kelurahan">
                                                            <select class="s2-select-search form-control" name="peserta_kelurahan">
                                                                <option value="0">-Pilih-</option>
                                                                @if ($id!=-1)
                                                                    @foreach ($kel as $item)    
                                                                        @if ($det->kelurahan==$item->id)
                                                                            <option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
                                                                        @else
                                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                                        @endif       
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Gelar S1</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="data_gelar['s1']" id="gelar_s1" class="form-control" value="{{$id==-1 ? '' : $det->s1}}" placeholder="Gelar S1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Gelar S2</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="data_gelar['s2']" id="gelar_s2" class="form-control" value="{{$id==-1 ? '' : $det->s2}}" placeholder="Gelar S2">
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="col-md-4 control-label">Gelar S3</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="data_gelar['s3']" id="gelar_s3" class="form-control" value="{{$id==-1 ? '' : $det->s3}}" placeholder="Gelar S3">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Sarjana Muda</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="data_gelar['d3']" id="gelar_lain" class="form-control" value="{{$id==-1 ? '' : $det->d3}}" placeholder="Sarjana Muda">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">SMA/SMK/Sederajat</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="data_gelar['sma']" id="sma" class="form-control" value="{{$id==-1 ? '' : $det->sma}}" placeholder="SMA/SMK/Sederajat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Bidang Engineering</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="data_bidang['engineering']" id="sma" class="form-control" value="{{$id==-1 ? '' : $det->engineering}}" placeholder="ex : Mesin, Sipil, Elektro, Dll">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Bidang Non Engineering</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="data_bidang['nonengineering']" id="sma" class="form-control" value="{{$id==-1 ? '' : $det->nonengineering}}" placeholder="ex : Ekonomi, dll">
                                                        </div>
                                                    </div>
                                                    @if ($id!=-1 && $det->perusahaan_id==-2)
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Asal Perusahaan</label>
                                                            <div class="col-md-8">
                                                                <select class="s2-select-search form-control" name="peserta_perusahaan_id" id="perusahaan" onchange="getperusahaan(this.value)">
                                                                    <option value="-2">-PRIBADI-</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @else

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Asal Perusahaan</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="peserta_perusahaan_id" id="perusahaan" onchange="getperusahaan(this.value)">
                                                                <option value="">-Perusahaan-</option>
                                                                <option value="-1">-Tambah Perusahaan Baru-</option>
                                                                <option value="-2">-PRIBADI-</option>
                                                                @foreach ($perusahaan as $item)
                                                                    @if ($id!=-1)
                                                                        @if ($det->perusahaan_id==$item->id)
                                                                            <option value="{{$item->id}}" selected="selected">{{$item->nama_perusahaan}}</option>
                                                                        @else
                                                                            <option value="{{$item->id}}">{{$item->nama_perusahaan}}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{$item->id}}">{{$item->nama_perusahaan}}</option>
                                                                        
                                                                    @endif
                                                                @endforeach    

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="div_jabatan">
                                                        <label class="col-md-4 control-label">Jabatan Terakhir</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="peserta_jabatan" class="form-control" value="{{$id==-1 ? '' : $det->jabatan}}" placeholder="Jabatan Terakhir">
                                                        </div>
                                                    </div>
                                                    <div id="detail">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Alamat</label>
                                                            <div class="col-md-8">
                                                                <textarea name="perusahaan_alamat" class="form-control">{{$id==-1 ? '' : $det->perusahaan->alamat}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Email</label>
                                                            <div class="col-md-8">
                                                                <input type="email" name="perusahaan_email" id="email" class="form-control" value="{{$id==-1 ? '' : $det->email}}" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Telp</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="perusahaan_telp" class="form-control" value="{{$id==-1 ? '' : $det->perusahaan->telp}}" placeholder="Telp">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Fax</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="perusahaan_fax" class="form-control" value="{{$id==-1 ? '' : $det->perusahaan->fax}}" placeholder="Fax">
                                                            </div>
                                                        </div>
                                                        
                                                    
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Jenis Usaha</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="perusahaan_jenis_usaha" class="form-control" value="{{$id==-1 ? '' : $det->perusahaan->jenis_usaha}}" placeholder="Jenis Usaha">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Kontak Person (CP)</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="perusahaan_cp" class="form-control" value="{{$id==-1 ? '' : $det->perusahaan->cp}}" placeholder="Kontak Person">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Nomor CP</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="perusahaan_no_cp" class="form-control" value="{{$id==-1 ? '' : $det->perusahaan->no_cp}}" placeholder="Nomor CP">
                                                            </div>
                                                        </div>
                                                    
                                                        
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Email CP</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="perusahaan_email_cp" class="form-control" value="{{$id==-1 ? '' : $det->perusahaan->email_cp}}" placeholder="Email CP">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Bagian CP</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="perusahaan_bagian_cp" class="form-control" value="{{$id==-1 ? '' : $det->perusahaan->bagian_cp}}" placeholder="Bagian CP">
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                    </div>
                                                            <div class="form-group" style="margin-top:10px;">
                                                                <label class="col-md-4 control-label">Keterangan Lain </label>
                                                                <div class="col-md-8">
                                                                    <textarea name="peserta_desc" class="form-control">{{$id==-1 ? '' : $det->perusahaan->desc}}</textarea>
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
            var nama=$('#nama').val();
            var perusahaan=$('#perusahaan').val();
            var nama_sertifikat=$('#nama_sertifikat').val();
            if(nama=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Nama Peserta Harus Diisi';
                pesanNoty(ps,'error');
                $('#nama').focus();
            }
            else if(nama_sertifikat=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Nama Untuk Sertifikat Harus Di isi';
                pesanNoty(ps,'error');
                $('#email').focus();
            }
            else if(perusahaan=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Asal Perusahaan Harus Dipilih';
                pesanNoty(ps,'error');
                $('#email').focus();
            }
            else
            {
                $('#modal-primary-header').text('Informasi');
                $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                $('#modal-primary').modal('show');
                $('#submit-primary').on('click',function(){
                    $('#formPeserta').submit();
                });
            }
        });
    });
    function getperusahaan(id)
    {
        if(id==-1)
        {
            location.href='{{url("perusahaan/-1")}}';
        }
        else if(id==-2)
        {
            $('#detail').hide();
            $('#div_jabatan').hide();
        }
        else
        {

            $('#detail').load('{{url("by-perusahaan")}}/'+id, function(){
                $('.s2-select-search').select2();
            });
        }
    }
</script>
@endsection