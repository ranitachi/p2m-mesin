@extends('layouts.master')
@section('title')
    <title>Data Perusahaan :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/utama')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                     
                            <li class="active"><a href="{{url('perusahaan')}}"> Perusahaan</a></li>                                                     
                            <li class="active"><a href="#">Form {{$id==-1 ? 'Tambah' : 'Edit'}} Perusahaan</a></li>                                                     
                          
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
                                            <h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} Perusahaan</h2>
                                            <!-- <p>Quick information</p> -->
                                        </div>              
                                        <div class="heading-elements">
                                            <a href="{{url('perusahaan')}}" class="btn btn-xs btn-primary"><i class="fa fa fa-arrow-left"></i>&nbsp;Data Perusahaan</a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                    <form id="formPerusahaan" class="form-horizontal" method="POST" action="{{$id==-1 ? url('perusahaan') : url('perusahaan/'.$id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="url" value="{{ URL::previous() }}">
                                        @if ($id!=-1)
                                            {{ method_field('PATCH') }}
                                        @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kode</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="kode" id="kode" class="form-control" value="{{$id==-1 ? $kode : $det->kode}}" placeholder="Kode">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Perusahaan</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="{{$id==-1 ? '' : $det->nama_perusahaan}}" placeholder="Nama Perusahaan">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Pimpinan</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="pimpinan" id="pimpinan" class="form-control" value="{{$id==-1 ? '' : $det->pimpinan}}" placeholder="Nama Pimpinan">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-8">
                                                            <input type="email" name="email" id="email" class="form-control" value="{{$id==-1 ? '' : $det->email}}" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Telp</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="telp" class="form-control" value="{{$id==-1 ? '' : $det->telp}}" placeholder="Telp">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Fax</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="fax" class="form-control" value="{{$id==-1 ? '' : $det->fax}}" placeholder="Fax">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Usaha</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="jenis_usaha" class="form-control" value="{{$id==-1 ? '' : $det->jenis_usaha}}" placeholder="Jenis Usaha">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kontak Person (CP)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="cp" class="form-control" value="{{$id==-1 ? '' : $det->cp}}" placeholder="Kontak Person">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nomor CP</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="no_cp" class="form-control" value="{{$id==-1 ? '' : $det->no_cp}}" placeholder="Nomor CP">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email CP</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="email_cp" class="form-control" value="{{$id==-1 ? '' : $det->email_cp}}" placeholder="Email CP">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Bagian CP</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="bagian_cp" class="form-control" value="{{$id==-1 ? '' : $det->bagian_cp}}" placeholder="Bagian CP">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat</label>
                                                        <div class="col-md-8">
                                                            <textarea name="alamat" class="form-control">{{$id==-1 ? '' : $det->alamat}}</textarea>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="col-md-4 control-label">Kode Pos</label>
                                                        <div class="col-md-4">
                                                            <input type="text" name="kode_pos" class="form-control" value="{{$id==-1 ? '0' : $det->kode_pos}}" placeholder="Kode Pos">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Provinsi</label>
                                                        <div class="col-md-8">
                                                            <select class="s2-select-search form-control" name="provinsi" onchange="getwilayah(this.value,'kota')">
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
                                                            <select class="s2-select-search form-control" name="kabupaten_kota" onchange="getwilayah(this.value,'kecamatan')">
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
                                                            <select class="s2-select-search form-control" name="kecamatan" onchange="getwilayah(this.value,'kelurahan')">
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
                                                            <select class="s2-select-search form-control" name="kelurahan">
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
        $('#btnSimpan').on('click',function(){
            
            var nama=$('#nama_perusahaan').val();
            if(nama=='')
            {
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Nama Karyawan Harus Diisi';
                pesanNoty(ps,'error');
                $('#nama').focus();
            }
            
            else
            {
                $('#modal-primary-header').text('Informasi');
                $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                $('#modal-primary').modal('show');
                $('#submit-primary').on('click',function(){
                    $('#formPerusahaan').submit();
                });
            }
        });
    });
    function getwilayah(id,jenis)
    {
        if(jenis=='kota')
        {
            var url='{{url("by-provinsi")}}/'+id;
        }
        else if(jenis=='kecamatan')
        {
            var url='{{url("by-kota")}}/'+id;
        }
        else if(jenis=='kelurahan')
        {
            var url='{{url("by-kecamatan")}}/'+id;
        }
        $('#div_'+jenis).load(url,function(){
            $('.s2-select-search').select2();
        });
    }
</script>
@endsection