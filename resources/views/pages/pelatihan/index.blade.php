@extends('layouts.master')
@section('title')
    <title>Data Pelatihan :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                     
                            <li class="active"><a href="#">Data Pelatihan</a></li>                                                     
                          
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
                                                    <h2>Data Pelatihan</h2>
                                                    <div class="col-md-6 pull-left">
                                                       @php
                                                            if(Session::has('idkat')){

                                                                $idkategori= Session::get('idkat');
                                                            }
                                                            else {
                                                                $idkategori='';
                                                            }
                                                       
                                                       @endphp
                                                        <select class="s2-select-search form-control" name="kategori" id="kategori" onchange="loaddata(this.value)">
                                                            <option value="">-Pilih Kategori Pelatihan-</option>
                                                            @foreach ($kategori as $item)
                                                                @if ($idkategori!='')
                                                                    @if ($idkategori==$item->id)   
                                                                        <option value="{{$idkategori}}" selected="selected">{{$item->kategori}}</option>
                                                                    @else
                                                                        <option value="{{$item->id}}">{{$item->kategori}}</option>
                                                                    @endif
                                                                @else
                                                                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                                                                @endif
                                                            @endforeach          
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 pull-right">
                                                        <div class="heading-elements">
                                                           <a href="javascript:tambahdata()" class="btn btn-sm btn-primary  pull-right"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data Pelatihan</a>
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                    <div class="col-md-12" id="data" style="margin-top:5px;">
                                                        <div class="text-center">
                                                            <h1>Silahkan Pilh Kategori Terlebih Dahulu</h1>
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
        var status="{{ Session::get('status') }}";
        if(status!='')
        {
            $('div.alert-success').show();
        }
        
        var idkat="{{ Session::get('idkat') }}";
        if(idkat!='')
        {
            loaddata(idkat);
        }
        //loaddata(-1);
        //form(-1);
        setTimeout(function(){
            $('div.alert-success').fadeOut();
        },3000);
        
        
    });
    function tambahdata()
    {
        var idkat=$('#kategori').val();
        if(idkat=='')
        {
            var url='{{url("pelatihan-form/-1/-1")}}';
        }
        else
        {
            var url='{{url("pelatihan-form")}}/'+idkat+'/-1';
        }
        location.href=url;
    }
    function loaddata(idkat)
    {
        $('#data').load('{{url("pelatihan-data")}}/'+idkat,function(){
            $('#datatable').DataTable();
        });
    }
    

    function hapus(id,idkat)
    {
        $('#danger-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-danger').modal('show');
        $('#submit-hapus').one('click',function(){
            $.ajax({
                    url: '{{url("pelatihan-hapus")}}/'+id,
                    dataType: 'json',
                    cache: false,
                }).done(function(data){
                    $('#modal-danger').modal('hide');
                    var txt = "Data Pelatihan Berhasil Di Hapus";
                    $('#pesan').text(txt);
                    $('div.alert-success').show();
                    setTimeout(function(){
                    $('div.alert-success').fadeOut();
                        $('#pesan').text('');
                    },3000);
                    loaddata(idkat);
                }).fail(function(){
                    var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Data Pelatihan Gagal Dihapus';
                    pesanNoty(ps,'error');
                });
        });
    }
</script>
@endsection