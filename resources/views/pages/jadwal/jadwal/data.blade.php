
    <table class="table table-striped table-bordered" id="datatable">
        <thead>
            <tr>
                <th style="width:40px;">No</th>
                <th>Jenis Pelatihan</th>
                <th>Kode Pelatihan</th>
                <th>Jadwal Pelatihan</th>
                <th>Angkatan</th>
                <th>Lokasi Pelatihan</th>
                <th>Instruktur</th>
                <th>PIC</th>
                <th>status</th>
                <th style="width:100px;">#</th>
            </tr>
        </thead>                                    
        <tbody>
            @foreach ($jadwal as $key=>$item)
            @php
                $idpic=strtok($item->pic,'-');
                $pic=str_replace($idpic.'-','',$item->pic);
            @endphp
                <tr>
                    <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                    <td class="text-left"><strong><a href="{{url('batch-detail/'.$item->id)}}/index" target="_blank">{{isset($item->pelatihan->nama) ? $item->pelatihan->nama : 'n/a'}}</a></strong></td>    
                    <td class="text-left">{{$item->kode}}</td>    
                    <td class="text-left">
                        <i class="fa fa-clock-o" style="color:blue;"></i>&nbsp;{{date('d-m-Y',strtotime($item->start_date))}} <br>s.d.<br>
                        <i class="fa fa-clock-o" style="color:blue;"></i>&nbsp;{{date('d-m-Y',strtotime($item->end_date))}}
                    </td>    
                    <td class="text-center">{{$item->angkatan}}</td>    
                    <td class="text-center">{{$item->lokasi}}</td>    
                    <td class="text-left">
                    @if (isset($b_ins[$item->id]))
                        <ul>
                            @foreach ($b_ins[$item->id] as $ii)
                                @if (isset($ii->instruktur->nama))
                                    <li>{{$ii->instruktur->nama}}</li>  
                                @endif
                            @endforeach                        
                        </ul>
                    @endif    
                    </td>    
                    <td class="text-left">{{$pic}}</td>    
                    <td class="text-left">{!!$item->flag==1 ? '<span class="label label-info">Aktif</span>' : ($item->flag==2 ? '<span class="label label-primary">Sudah Terlaksana</span>' : '<span class="label label-warning">Tidak Aktif</span>')!!}</td>    
                    <td class="text-center">
                        <a href="{{url('batch-detail/'.$item->id)}}/index" target="_blank" class="btn btn-xs btn-primary btn-rounded" data-toggle="tooltip" title="Detail Jadwal"><i class="fa fa-eye" ></i></a> 
                        <a href="{{url('jadwal-pelatihan/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                           
                        <a href="javascript:hapus({{$item->id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
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