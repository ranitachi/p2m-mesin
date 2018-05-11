@extends('layouts.master')
@section('title')
    <title>Data Materi :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/utama')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                     
                            <li class="active"><a href="#">Data Materi</a></li>                                                     
                          
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
                                                    <h2>Data Materi</h2>
                                                    <div class="col-md-6 pull-left">
                                                       @php
                                                            if(Session::has('idpel')){

                                                                $idpelatihan= Session::get('idpel');
                                                            }
                                                            else {
                                                                $idpelatihan='';
                                                            }
                                                       
                                                       @endphp
                                                        <select class="s2-select-search form-control" name="materi" id="materi" onchange="loaddata(this.value)">
                                                            <option value="">-Pilih Pelatihan-</option>
                                                            @foreach ($pelatihan as $item)
                                                                @if ($idpelatihan!='')
                                                                    @if ($idpelatihan==$item->id)   
                                                                        <option value="{{$idpelatihan}}" selected="selected">{{$item->kode}}-{{$item->nama}}</option>
                                                                    @else
                                                                        <option value="{{$item->id}}">{{$item->kode}}-{{$item->nama}}</option>
                                                                    @endif
                                                                @else
                                                                    <option value="{{$item->id}}">{{$item->kode}}-{{$item->nama}}</option>
                                                                @endif
                                                            @endforeach          
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 pull-right">
                                                        <div class="heading-elements">
                                                           <a href="javascript:tambahdata()" class="btn btn-sm btn-primary  pull-right"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data Materi</a>
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                    <div class="col-md-12" id="data" style="margin-top:5px;">
                                                        <div class="text-center">
                                                            <h1>Silahkan Pilh Pelatihan Terlebih Dahulu</h1>
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
        
        var idpel="{{ Session::get('idpel') }}";
        if(idpel!='')
        {
            loaddata(idpel);
        }
        //loaddata(-1);
        //form(-1);
        setTimeout(function(){
            $('div.alert-success').fadeOut();
        },3000);
        
        
    });
    function tambahdata()
    {
        var idpel=$('#materi').val();
        if(idpel=='')
        {
            var url='{{url("materi-form/-1/-1")}}';
        }
        else
        {
            var url='{{url("materi-form")}}/'+idpel+'/-1';
        }
        location.href=url;
    }
    function loaddata(idpel)
    {
        $('#data').load('{{url("materi-data")}}/'+idpel,function(){
            $('#datatable').DataTable();
        });
    }
    

    function hapus(id,idpel)
    {
        $('#danger-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-danger').modal('show');
        $('#submit-hapus').one('click',function(){
            $.ajax({
                    url: '{{url("materi-hapus")}}/'+id,
                    dataType: 'json',
                    cache: false,
                }).done(function(data){
                    $('#modal-danger').modal('hide');
                    var txt = "Data Materi Berhasil Di Hapus";
                    $('#pesan').text(txt);
                    $('div.alert-success').show();
                    setTimeout(function(){
                    $('div.alert-success').fadeOut();
                        $('#pesan').text('');
                    },3000);
                    loaddata(idpel);
                }).fail(function(){
                    var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Data Materi Gagal Dihapus';
                    pesanNoty(ps,'error');
                });
        });
    }
</script>
@endsection