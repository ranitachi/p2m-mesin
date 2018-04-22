@extends('layouts.master')
@section('title')
    <title>Data Kabupaten/Kota :: P2M Departemen Teknik Mesin FT-UI</title> 
@endsection
@section('konten')

                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li class="active"><a href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>                                                     
                            <li class="active"><a href="#">Data Kabupaten/Kota</a></li>                                                     
                          
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
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <h2>Data Kabupaten/Kota</h2>
                                                    <div class="col-md-6 pull-left">
                                                        Pilih Provinsi : 
                                                        <select class="s2-select-search form-control" name="provinsi" id="provinsi" onchange="loaddata(this.value)">
                                                            <option>-Provinsi-</option>
                                                            @foreach ($prop as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach          
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6"></div>
                                                    
                                                    <div class="col-md-12" id="data" style="margin-top:5px;"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pull-right" id="form"></div>
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
        loaddata(-1);
        form(-1);
        setTimeout(function(){
            $('div.alert-success').fadeOut();
        },3000);
        
        
    });
    function loaddata(idprop)
    {
        $('#data').load('{{url("kabupatenkota-data")}}/'+idprop,function(){
            $('#datatable').DataTable();
        });
    }
    function form(id)
    {
        $('#form').load('{{url("kabupatenkota")}}/'+id, function(){
            $('.s2-select-search').select2();
            $('#btnSimpan').one('click',function(){
                var kota=$('#name').val();
            
                if(kota=='')
                {
                    var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Nama Provinsi Masih Kosong';
                    pesanNoty(ps,'error');
                }
                else
                {
                    $('#modal-primary-header').text('Informasi');
                    $('#primary-body').html('<h1>Apakah Anda Yakin data yang diisi Sudah Benar ?</h1>');
                    $('#modal-primary').modal('show');
                    $('#submit-primary').one('click',function(){
                        
                        if(id==-1)
                        {
                            var t_url = '{{url("kabupatenkota")}}';
                        }
                        else
                            var t_url = '{{url("kabupatenkota")}}/'+id;
    
                        var t_method = 'POST';
                    
                        $.ajax({
                            url : t_url,
                            type : t_method,
                            dataType: 'json',
                            cache: false,
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            data: $('#formprovinsi').serialize()
                        }).done(function(data){
                            
                            // if(id==-1)
                            // {
                                var idprop=$('#provinsi_id').val();
                                loaddata(idprop);
                            // }
                            // else
                            //     loaddata(id);

                            form(-1);
                            if(id==-1)
                            {
                                var ps="Data Kabupaten/Kota Berhasil Disimpan";
                            }
                            else
                            {
                                var ps="Data Kabupaten/Kota Berhasil Di Edit";
                            }
                            $('#modal-primary').modal('hide');
                            $('#pesan').text(ps);
                            $('div.alert-success').show();
                            setTimeout(function(){
                                $('div.alert-success').fadeOut();
                                $('#pesan').text('');
                            },3000);

                        }).fail(function(data){
                           
                            var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Data Kabupaten/Kota Gagal Disimpan';
                            pesanNoty(ps,'error');
                        });
                    });
                }
            });
        });
    }

    function hapus(id,prov_id)
    {
        $('#danger-body').html('<h1>Apakah Anda Yakin data yang menghapus Data Ini ?</h1>');
        $('#modal-danger').modal('show');
        $('#submit-hapus').one('click',function(){
            $.ajax({
                    url: '{{url("kabupatenkota-hapus")}}/'+id,
                    dataType: 'json',
                    cache: false,
                }).done(function(data){
                    $('#modal-danger').modal('hide');
                    var txt = "Data Kabupaten/Kota Berhasil Di Hapus";
                    $('#pesan').text(txt);
                    $('div.alert-success').show();
                    setTimeout(function(){
                    $('div.alert-success').fadeOut();
                        $('#pesan').text('');
                    },3000);
                    loaddata(prov_id);
                }).fail(function(){
                    var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Data Kabupaten/Kota Gagal Dihapus';
                    pesanNoty(ps,'error');
                });
        });
    }
</script>
@endsection