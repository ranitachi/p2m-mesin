@extends('layouts.master')
@section('title')
    <title>Data Kecamatan :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                     
                            <li class="active"><a href="#">Data Kecamatan</a></li>                                                     
                          
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                    
                    <!-- START PAGE CONTAINER -->
                    <div class="container">
                       
                        <div class="row">
                            
                            <div class="col-md-12">
                                
                                <!-- START LATEST TRANSACTIONS -->
                                <div class="block block-condensed">
                                    <div class="block-content">
                                        
                                        <div class="row" style="padding-top:20px;">
                                                <div class="col-md-12">
                                                    <div class="alert alert-success alert-icon-block alert-dismissible collapse" role="alert">
                                                        <div class="alert-icon">
                                                            <span class="icon-checkmark-circle"></span> 
                                                        </div>
                                                        <strong>Success!</strong> <span id="pesan"></span>
                                                            @if(Session::has('status'))
                                                                {{ Session::get('status') }} 
                                                            @endif
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                                    </div>
                                                </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <h2>Data Kecamatan</h2>
                                                    <div class="col-md-6 pull-left">
                                                        Pilih Provinsi : 
                                                        <select class="s2-select-search form-control" name="provinsi" id="provinsi" onchange="getwilayah(this.value,'kota')">
                                                            <option>-Provinsi-</option>
                                                            @foreach ($prop as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach          
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                         Pilih Kabupaten/Kota : 
                                                        <div id="div_kota">
                                                            <select class="s2-select-search form-control" name="provinsi" id="provinsi">
                                                                <option>-Pilih-</option>          
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12" id="data" style="margin-top:5px;">
                                                        <div class="text-center">
                                                            <h1>Silahkan Pilh Provinsi dan Kabupaten/Kota Terlebih Dahulu</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- END LATEST TRANSACTIONS -->
                                
                            </div>
                        </div>
                        
                      
                    </div>
@endsection
@section('footscript')
<style>
    .app .table tr td
    {
        padding:5px 10px;
    }
</style>
<script type="text/javascript" src="{{asset('build/js/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/noty/jquery.noty.packaged.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/bootstrap-select/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/select2/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('build/js/vendor/multiselect/jquery.multi-select.js')}}"></script>
<script>
    $(document).ready(function(){
        // $('div.alert-success').show();
        //loaddata(-1);
        //form(-1);
        setTimeout(function(){
            $('div.alert-success').fadeOut();
        },3000);
        
        
    });
    function getwilayah(id,jenis)
    {
        if(jenis=='kota')
        {
            var url='{{url("by-provinsi")}}/'+id;
            $('#div_'+jenis).load(url,function(){
                $('.s2-select-search').select2();
            });
        }
        else if(jenis=='kecamatan')
        {
            var url='{{url("by-kota")}}/'+id;
            loaddata(id);
        }
        
        
    }
    function loaddata(idkota)
    {
        $('#data').load('{{url("kecamatan-data")}}/'+idkota,function(){
            $('#datatable').DataTable();
        });
    }
    function form(idkota,idprop,id)
    {
        $('#modal-primary-header').text('Form '+(id==-1 ? 'Tambah' : 'Edit')+' Kecamatan');
        $('#primary-body').load('{{url("kecamatan-form")}}/'+idkota+'/'+idprop+'/'+id);
        $('#modal-primary').modal('show');
        $('#submit-primary').one('click',function(){
            // formkecamatan
            if(id==-1)
            {
                var t_url = '{{url("kecamatan")}}';
            }
            else
                var t_url = '{{url("kecamatan")}}/'+id;
    
            var t_method = 'POST';
                    
            $.ajax({
                url : t_url,
                type : t_method,
                dataType: 'json',
                cache: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: $('#formkecamatan').serialize()
            }).done(function(data){
                
                loaddata(idkota);
                
                if(id==-1)
                {
                    var ps="Data Kecamatan Berhasil Disimpan";
                }
                else
                {
                    var ps="Data Kecamatan Berhasil Di Edit";
                }
                $('#modal-primary').modal('hide');
                $('#pesan').text(ps);
                $('div.alert-success').show();
                setTimeout(function(){
                    $('div.alert-success').fadeOut();
                    $('#pesan').text('');
                },3000);

            }).fail(function(data){
                           
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Data Kecamatan Gagal Disimpan';
                pesanNoty(ps,'error');
            });
        })
    }

    function hapus(id,idkota)
    {
        $('#danger-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-danger').modal('show');
        $('#submit-hapus').one('click',function(){
            $.ajax({
                    url: '{{url("kecamatan-hapus")}}/'+id,
                    dataType: 'json',
                    cache: false,
                }).done(function(data){
                    $('#modal-danger').modal('hide');
                    var txt = "Data Kecamatan Berhasil Di Hapus";
                    $('#pesan').text(txt);
                    $('div.alert-success').show();
                    setTimeout(function(){
                    $('div.alert-success').fadeOut();
                        $('#pesan').text('');
                    },3000);
                    loaddata(idkota);
                }).fail(function(){
                    var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Data Kecamatan Gagal Dihapus';
                    pesanNoty(ps,'error');
                });
        });
    }
</script>
@endsection