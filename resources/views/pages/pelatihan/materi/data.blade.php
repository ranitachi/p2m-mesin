
    <table class="table table-striped table-bordered" id="datatable">
        <thead>
            <tr>
                <th style="width:40px;">No</th>
                <th>Kode Materi</th>
                <th>Materi</th>
                <th>Materi (Inggris)</th>
                <th>Nama Pelatihan</th>
                <th style="width:80px;">#</th>
            </tr>
        </thead>                                    
        <tbody>
            @foreach ($materi as $key=>$item)
                <tr>
                    <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                    <td class="text-left">{{$item->kode}}</td>    
                    <td class="text-left">{{$item->materi}}</td>    
                    <td class="text-left">{{$item->materi_en}}</td>    
                    <td class="text-left">{{$item->pelatihan->nama}}</td>    
                    <td class="text-center">
                        <a href="{{url('materi-form/'.$idpel.'/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                           
                        <a href="javascript:hapus({{$item->id}},{{$item->pelatihan_id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                    </td>    
                </tr>    
            @endforeach                                       
        </tbody>
    </table>
                             
<style>
    .app .table tr td
    {
        padding:5px 10px;
        font-size:11px !important;
    }
</style>