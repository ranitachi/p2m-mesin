    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <a href="javascript:form({{$idkec}},{{$kec->kabupatenkota_id}},{{$kota->provinsi_id}},-1)" class="btn btn-sm btn-primary  pull-right"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Data Kelurahan</a>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="datatable">
        <thead>
            <tr>
                <th style="width:40px;">No</th>
                <th>Provinsi</th>
                <th>Kabupaten/Kota</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th style="width:80px;">#</th>
            </tr>
        </thead>                                    
        <tbody>
            @foreach ($kel as $key=>$item)
                <tr>
                    <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                    <td class="text-left">{{$kota->provinsi->name}}</td>    
                    <td class="text-left">{{$kec->kabupatenkota->name}}</td>    
                    <td class="text-left">{{$kec->name}}</td>    
                    <td class="text-left">{{$item->name}}</td>    
                    <td class="text-center">
                        <a href="javascript:form({{$item->kecamatan_id}},{{$kota->id}},{{$kota->provinsi_id}},{{$item->id}})" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                           
                        <a href="javascript:hapus({{$item->id}},{{$item->kecamatan_id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                    </td>    
                </tr>    
            @endforeach                                       
        </tbody>
    </table>
                             
