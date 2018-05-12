<div class="table-responsive">
    <table class="table table-striped table-bordered datatable-extended">
        <thead>
            <tr>
                <th>No</th>
                <th>Level</th>
                <th>Akses</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Status</th>
                <th>#</th>
            </tr>
        </thead>                                    
        <tbody>
            @foreach ($user as $key=>$item)
            @php
                if($item->pegawai_id!=0)
                    $nama=$item->pegawai->nama;
                elseif($item->instruktur_id!=0)
                    $nama=$item->instruktur->nama;
                elseif($item->direktur_id!=0)
                    $nama=$item->direktur->nama;
                elseif($item->level==0)
                    $nama=$item->name;
                
                $akses=explode(',',$item->hakakses);
            @endphp
                <tr>
                    <td class="text-center">{{(++$key)}}</td>    
                    <td class="text-center">{!!$item->level==2 ? '<span class="label label-success">Karyawan</span>' : ($item->level==1 ? '<span class="label label-success">Direktur</span>' : ($item->level==3 ? '<span class="label label-success">Instruktur</span>' : 'Admin'))!!}</td>    
                    <td class="text-left">
                        @foreach ($akses as $it)
                            @if (array_key_exists($it,$hakakses))
                                {{$hakakses[$it]}}<br>
                            @endif
                        @endforeach
                    </td>    
                    <td class="text-left">{{$nama}}</td>    
                    <td class="text-left">{{$item->email}}</td>    
                    <td class="text-center">{!!$item->flag ==1 ? '<span class="label label-success">Aktif</span>':'<span class="label label-warning">Tidak Aktif</span>'!!}</td>    
                    <td class="text-center">
                        <a href="{{url('user/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                           
                        <a href="javascript:hapus({{$item->id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    

                        <a href="{{url('reset-password/'.$item->id)}}" class="btn btn-xs btn-success btn-rounded" data-toggle="tooltip" title="Reset Password"><i class="fa fa-key" ></i></a>    
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