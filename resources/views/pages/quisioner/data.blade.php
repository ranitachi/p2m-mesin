                  <div class="table-responsive">
    <table class="table table-striped table-bordered" id="datatable">
        <thead>
            <tr>
                <th style="width:40px;">No</th>
                <th>Pertanyaan</th>
                <th style="width:80px;">Kategori</th>
                <th style="width:80px;">status</th>
                <th style="width:80px;">#</th>
            </tr>
        </thead>                                    
        <tbody>
            @foreach ($quisioner as $key=>$item)
                <tr>
                    <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                    <td class="text-left">{{substr(strip_tags($item->question),0,80)}} ..</td>    
                    <td class="text-center">{!!$item->kategori =='pilihan' ? '<span class="label label-info">Pilihan</span>':($item->kategori=='' ? '' : '<span class="label label-success">Isian</span>')!!}</td>    
                    <td class="text-center">{!!$item->flag ==1 ? '<span class="label label-success">Aktif</span>':'<span class="label label-warning">Tidak Aktif</span>'!!}</td>    
                    <td class="text-center">
                        <a href="{{url('quisioner/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                           
                        <a href="javascript:hapus({{$item->id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                    </td>    
                </tr>    
            @endforeach                                       
        </tbody>
    </table>
</div>
                                    
<style>
    .app .table tr td
    {
        padding:5px 10px;
    }
</style>