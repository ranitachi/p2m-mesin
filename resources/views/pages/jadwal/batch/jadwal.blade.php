    <div class="row">
        <div class="col-md-6">
            <div class="app-heading app-heading-small">                                    
                <div class="title">
                    <h1 style="font-size:20px;">Jadwal Pelatihan</h1>
                </div>                                
            </div>
        </div>    
        <div class="col-md-6" style="padding-right:20px;">
            <a href="{{url('cetak-jadwal/'.$id)}}" target="_blank" class="btn btn-xs btn-primary pull-right" style="margin-top:20px;"><i class="fa fa-print"></i> Cetak Jadwal</a>    
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
                                <td class="text-center">{{($item[0]->materi_id == 0 ? '' : $item[0]->mmateri->kode)}}</td> 
                                <td class="text-center">
                                    @if ($item[0]->instruktur_id!=0)
                                        {{isset($item[0]->instruktur->nama) ? $item[0]->instruktur->inisial : ''}}
                                    @else
                                        {{isset($item[0]->pegawai->kode) ? $item[0]->pegawai->kode : ''}}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{url('batch-detail/'.$id.'/jadwal-add__'.$item[0]->idp)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="edit Data"><i class="fa fa-edit" ></i></a>    
                                    <a href="javascript:hapusjadwal({{$item[0]->id}},{{$id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a>    
                                </td>    
                            </tr> 
                            @foreach ($item as $idx=>$ii)
                                @if ($idx!=0)
                                    <tr>
                                           
                                        <td class="text-center">{{$ii->start_time}} - {{$ii->end_time}}</td> 
                                        <td class="text-center">{{getMinutes($ii->start_time,$ii->end_time)}}</td> 
                                        <td class="text-center">{{$ii->materi}}</td> 
                                        <td class="text-center">{{($ii->materi_id == 0 ? '' : $ii->mmateri->kode)}}</td> 
                                        <td class="text-center">
                                             @if ($ii->instruktur_id!=0)
                                                {{isset($ii->instruktur->nama) ? $ii->instruktur->inisial : ''}}
                                            @else
                                                {{isset($ii->pegawai->kode) ? $ii->pegawai->kode : ''}}</td>
                                            @endif
                                        <td class="text-center">
                                            <a href="{{url('batch-detail/'.$id.'/jadwal-add__'.$ii->idp)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="edit Data"><i class="fa fa-edit" ></i></a> 
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