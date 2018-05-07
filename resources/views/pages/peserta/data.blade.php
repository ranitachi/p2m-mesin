
                    
<div class="table-responsive">
    <table class="table table-striped table-bordered datatable-extended">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Telp/HP</th>
                <th>Alamat</th>
                <th>Asal Perusahaan</th>
                <th>Jabatan</th>
                <th >Kamera</th>
                <th style="width:80px;">#</th>
            </tr>
        </thead>                                    
        <tbody>
            @foreach ($peserta as $key=>$item)
            @php
                $nama=$item->nama_lengkap;
            @endphp
                <tr>
                    <td class="text-center">{{(++$key)}}</td>    
                    <td class="text-left">{{$item->kode}}</td>    
                    <td class="text-left">{{$nama}}</td>    
                    <td class="text-left">{{$item->email}}</td>    
                    <td class="text-center">{{$item->hp}}</td>    
                    <td class="text-left">{{$item->alamat}}</td>    
                    <td class="text-left">{{isset($item->perusahaan->nama_perusahaan) ? $item->perusahaan->nama_perusahaan :'PRIBADI'}}</td>    
                    <td class="text-left">{{$item->jabatan}}</td>    
                    <td class="text-center"><a href="#" class="btn btn-xs btn-success btn-rounded" data-toggle="tooltip" title="Ambil Foto"><i class="fa fa-camera" ></i></a> </td>    
                    <td class="text-center">
                        

                        <a href="{{url('peserta/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                           
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
        font-size:11px !important;
    }
</style>