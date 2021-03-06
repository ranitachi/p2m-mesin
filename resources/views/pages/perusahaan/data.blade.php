
                    
<div class="table-responsive">
    <form id="cetak-label" action="{{url('cetak-label-perusahaan')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="perusahaan_id" id="perusahaan_id">
    <table class="table table-striped table-bordered datatable-extended">
        <thead>
            <tr>
                <th>#</th>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Perusahaan</th>
                <th>Pimpinan</th>
                <th>Alamat</th>
                <th>Telp/Fax</th>
                <th>Email</th>
                <th>CP</th>
                <th>#</th>
            </tr>
        </thead>                                    
        <tbody>
            
            @foreach ($perusahaan as $key=>$item)
                <tr>
                        <td class="text-center"><input type="checkbox" name="cetak[]" onclick="add_id({{$item->id}})" value="{{$item->id}}"></td>    
                        <td class="text-center">{{(++$key)}}</td>    
                        <td class="text-left">{{$item->kode}}</td>    
                        <td class="text-left">{{$item->nama_perusahaan}}</td>    
                        <td class="text-left">{{$item->pimpinan}}</td>    
                        <td class="text-left">{{$item->alamat}}</td>    
                        <td class="text-center">{{$item->telp}} <br> {{$item->fax}}</td>    
                        <td class="text-left">{{$item->email}}</td>    
                        <td class="text-left">{{$item->cp}}</td>    
                        <td class="text-center">
                            <a href="{{url('perusahaan/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                            
                            <a href="javascript:hapus({{$item->id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                        </td>    
                    </tr>    
                @endforeach                                       
            
        </tbody>
    </table>
    </form>
</div>
<style>
    .app .table tr td
    {
        padding:5px 10px;
        font-size:11px !important;
    }
</style>