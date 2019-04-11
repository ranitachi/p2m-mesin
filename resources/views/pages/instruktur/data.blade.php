
                    
<div class="table-responsive">
    <table class="table table-striped table-bordered datatable-extended">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Inisial</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Bidang Keahlian</th>
                <th>Afiliasi</th>
                <th>Email<br>Telp/HP<br>Alamat</th>
                <th>#</th>
            </tr>
        </thead>                                    
        <tbody>
            @foreach ($instruktur as $key=>$item)
            @php
                $nama=$item->nama;
                if($item->gelar_s3!='')
                {
                    $nama.=', '.$item->gelar_s3.'.';
                }
                if($item->gelar_s1!='')
                {
                    $nama.=', '.$item->gelar_s1.'.';
                }
                if($item->gelar_s2!='')
                {
                    $nama.=', '.$item->gelar_s2.'.';
                }
                if($item->gelar_lain!='')
                {
                    $nama.=', '.$item->gelar_lain;
                }
            @endphp
                <tr>
                    <td style="vertical-align:top;" class="text-center">{{(++$key)}}</td>    
                    <td style="vertical-align:top;" class="text-center">{{$item->inisial}}</td>    
                    <td style="vertical-align:top;" class="text-center">{{$item->nip==0 ? '':$item->nip}}</td>    
                    <td style="vertical-align:top;" class="text-left">
                        <div style="width:150px;">
                            <b>{{$nama}}</b>
                            <br>
                            <a href="{{url('riwayat-pelatihan-instruktur/'.$item->id)}}" target="_blank" class="btn btn-xs btn-primary">Riwayat Pelatihan</a>
                        </div>
                    </td>    
                    <td style="vertical-align:top;" class="text-left">{{$item->bidang_keahlian}}</td>    
                    <td style="vertical-align:top;" class="text-left">{{$item->afiliasi}}</td>    
                    <td style="vertical-align:top;" class="text-left">
                        @if ($item->email!='')
                            <i>Email</i>:<br><b>{{$item->email}}</b><br><br>
                        @endif
                        @if ($item->alamat!='')
                            <i>Alamat</i>:<br><b>{{$item->alamat}}</b><br><br>
                        @endif
                        @if ($item->hp!='')
                            <i>Telp/HP</i>:<br><b>{{$item->hp}}</b></td>    
                        @endif
                    
                    <td style="vertical-align:top;" class="text-center">
                        <div style="width:80px;">
                            <a href="{{url('instruktur/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                            
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
    }
</style>