
                    
<div class="table-responsive">
    <table class="table table-striped table-bordered datatable-extended">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Lengkap</th>
                <th>Email<br>Telp/HP</th>
                <th>Alamat</th>
                <th>Asal Perusahaan<br>Jabatan</th>
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
                    <td style="vertical-align:top;" class="text-center">{{(++$key)}}</td>    
                    <td style="vertical-align:top;" class="text-left">{{$item->kode}}</td>    
                    <td style="vertical-align:top;" class="text-left">
                        <div style="width:200px;">
                        <b>{{$nama}}</b>
                        <br>
                        <a href="{{url('riwayat-pelatihan/'.$item->id)}}" target="_blank" class="btn btn-xs btn-primary">Riwayat Pelatihan</a>
                        </div>
                    </td>    
                    <td style="vertical-align:top;" class="text-left">
                        <i>Email</i>:<br><b>{{$item->email}}</b><br><br>
                        <i>Telp/HP</i>:<br><b>{{$item->hp}}</b>
                    </td>    
                    <td style="vertical-align:top;" class="text-left">{{$item->alamat}}</td>    
                    <td style="vertical-align:top;" class="text-left">{{isset($item->perusahaan->nama_perusahaan) ? $item->perusahaan->nama_perusahaan :'PRIBADI'}}<br><br><i>Jabatan</i> :<br>{{$item->jabatan}}</td>    
                    <td style="vertical-align:top;" class="text-center"><a href="javascript:ambilfoto({{$item->id}})" class="btn btn-xs btn-success btn-rounded" data-toggle="tooltip" title="Ambil Foto"><i class="fa fa-camera" ></i></a></td>    
                    <td style="vertical-align:top;" class="text-center" >
                        
                        <div style="width:80px;">
                            <a href="{{url('peserta/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                            <a href="javascript:hapus({{$item->id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                        </div>
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