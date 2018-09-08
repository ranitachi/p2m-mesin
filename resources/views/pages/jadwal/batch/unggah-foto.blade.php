<div class="app-heading app-heading-small">                                
    
            <div class="title">
                <h1 style="font-size:20px;">Unggah Foto Kegiatan</h1>
            </div>                                
        </div>
         <div class="block-content">
            <div class="row" style="padding:0px 30px;width:100%">
                <form action="{{url('unggah-foto/'.$id)}}" method="post">
                    {{csrf_field()}}
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Unggah Foto Baru</th>
                            <th>#</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        
                        <tr>
                            <td class="text-center" style="width:50%">
                                <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="filepath">
                                </div>
                                
                            </td>
                            <td style="width:50%">
                                <img id="holder" name="foto" style="margin-top:15px;max-height:100px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left" colspan="2">Judul Foto<br>
                                <input id="" class="form-control" type="text" name="title">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right">
                                <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
                <div class="row">
                @if ($fotokegiatan->count()!=0)
                    @foreach ($fotokegiatan as $item)
                        <div class="col-sm-3 text-center">
                            @if ($item->file_path!='')
                                {{$item->title}}<br>
                                <img src="{{asset($item->file_path)}}" style="height:150px;max-width:150px;">
                                <br>
                                <button class="btn btn-xs btn-danger" onclick="hapusfoto({{$id}},{{$item->id}})"><i class="fa fa-trash"></i></button>
                            @endif
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
    <style>
    .app .table tr td,
    .app .table tr th
    {
        padding:5px 10px;
        font-size:12px !important;
        border:0px !important
    }
</style>
<script>
function hapusfoto(id,idfoto)
{
    $('#modal-primary-header').text('Peringatan');
    $('#primary-body').html('<h1>Apakah Anda Yakin Ingin Menghapus Foto Ini ?</h1>');
    $('#modal-primary').modal('show');
    $('#submit-primary').one('click',function(){
        // $('#formAddPeserta').submit();
        location.href='{{url("hapus-foto")}}/'+id+'/'+idfoto;
    });
}
</script>