
<h2>Kategori Pelatihan</h2>

    <table class="table table-striped table-bordered" id="datatable">
        <thead>
            <tr>
                <th style="width:40px;">No</th>
                <th>Kategori</th>
                <th style="width:40px;">Status</th>
                <th style="width:80px;">#</th>
            </tr>
        </thead>                                    
        <tbody>
            @foreach ($kategori as $key=>$item)
                <tr>
                    <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                    <td class="text-left"><a href="{{url('pelatihan-detail/'.$item->id)}}">{{$item->kategori}}</a></td>   
                    <td class="text-center">{!!$item->flag ==1 ? '<span class="label label-success">Aktif</span>':'<span class="label label-warning">Tidak Aktif</span>'!!}</td>   
                    <td class="text-center">
                        <a href="javascript:form({{$item->id}})" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                           
                        <a href="javascript:hapus({{$item->id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                    </td>    
                </tr>    
            @endforeach                                       
        </tbody>
    </table>
                             
