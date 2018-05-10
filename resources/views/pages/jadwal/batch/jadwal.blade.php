<div class="app-heading app-heading-small">                                
           
            <div class="title">
                <h1 style="font-size:20px;">Jadwal Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            
            <div class="row" style="padding:0px 30px;">
                <table class="table table-striped table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th style="width:40px;" class="text-center">Hari / Tanggal</th>
                            <th style="width:100px;" class="text-center">Waktu</th>
                            <th class="text-center">Menit</th>
                            <th class="text-center">Materi</th>
                            <th class="text-center">Kode Materi</th>
                            <th class="text-center">Instruktur</th>
                            <th class="text-center" style="width:100px;">#</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        @foreach ($skd as $key=>$item)
                    
                            <tr>
                                <td class="text-center" style="width:80px;" rowspan="{{count($item)}}">
                                    {{hari($item[0]->weekday)}}<br>
                                    {{date('d-m-Y',strtotime($key))}}
                                </td>    
                                <td class="text-center">{{$item[0]->start_time}} - {{$item[0]->end_time}}</td> 
                                <td class="text-center">{{getMinutes($item[0]->start_time,$item[0]->end_time)}}</td> 
                                <td class="text-center">{{$item[0]->materi}}</td> 
                                <td class="text-center">{{($item[0]->materi == 0 ? '' : $item[0]->materi->kode)}}</td> 
                                <td class="text-center">{{isset($item[0]->pegawai->kode) ? $item[0]->pegawai->kode : ''}}</td>
                                <td class="text-center">
                                    <a href="{{url('batch-detail/'.$id.'/jadwal-add__'.$item[0]->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="edit Data"><i class="fa fa-edit" ></i></a>    
                                    <a href="javascript:hapusjadwal({{$item[0]->id}},{{$id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                                </td>    
                            </tr> 
                            @foreach ($item as $idx=>$ii)
                                @if ($idx!=0)
                                    <tr>
                                           
                                        <td class="text-center">{{$ii->start_time}} - {{$ii->end_time}}</td> 
                                        <td class="text-center">{{getMinutes($ii->start_time,$ii->end_time)}}</td> 
                                        <td class="text-center">{{$ii->materi}}</td> 
                                        <td class="text-center">{{($ii->materi == 0 ? '' : $ii->materi->kode)}}</td> 
                                        <td class="text-center">{{isset($ii->pegawai->kode) ? $ii->pegawai->kode : ''}}</td>
                                        <td class="text-center">
                                            <a href="{{url('batch-detail/'.$id.'/jadwal-add__'.$ii->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="edit Data"><i class="fa fa-edit" ></i></a> 
                                            <a href="javascript:hapusjadwal({{$ii->id}},{{$id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                                        </td>    
                                    </tr> 
                                @endif
                            @endforeach   
                        @endforeach                                       
                    </tbody>
                </table>
                <hr style="border-bottom:1px solid #ddd">
                <small>&copy; P2M Departemen Mesin - Fakultas Teknik Universitas Indonesia.</small>
            </div>
         </div>

                             
<style>
    .app .table tr td
    {
        padding:5px 10px;
        font-size:11px !important;
    }
</style>