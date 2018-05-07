
                    
<div class="table-responsive">
    <table class="table table-striped table-bordered datatable-extended">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Bidang Keahlian</th>
                <th>Afiliasi</th>
                <th>Email</th>
                <th>Telp/HP</th>
                <th>Alamat</th>
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
                    <td class="text-center">{{(++$key)}}</td>    
                    <td class="text-center">{{$item->nip==0 ? '':$item->nip}}</td>    
                    <td class="text-left">{{$nama}}</td>    
                    <td class="text-left">{{$item->bidang_keahlian}}</td>    
                    <td class="text-left">{{$item->afiliasi}}</td>    
                    <td class="text-left">{{$item->email}}</td>    
                    <td class="text-center">{{$item->hp}}</td>    
                    <td class="text-center">{{$item->alamat}}</td>    
                    <td class="text-center">
                        <a href="{{url('instruktur/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                           
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