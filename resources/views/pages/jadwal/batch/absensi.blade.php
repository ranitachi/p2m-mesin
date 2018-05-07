<div class="app-heading app-heading-small">                                
           
            <div class="title">
                <h1 style="font-size:20px;">Daftar Absensi Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            <div class="row" style="padding:0px 30px;">
                <div class="col-md-6">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th style="width:40px;">No</th>
                                <th>Tanggal</th>
                                <th>Hari</th>
                                <th>Keterangan</th>
                                <th style="width:100px;">#</th>
                            </tr>
                        </thead>                                    
                        <tbody>
                        @php
                            $no=0;
                        @endphp
                        @foreach ($absen as $idx => $val)
                            <tr>
                                <td class="text-center">{{++$no}}</td>
                                <td class="text-center"><a href="javascript:detabsensi({{$val[0]->absensi_id}},{{$id}})">{{date('d-m-Y',strtotime($val[0]->skedul->date))}}</a></td>
                                <td class="text-left">{{hari($val[0]->skedul->weekday)}}</td>
                                <td class="text-center">{{$val[0]->skedul->desc}}</td>
                                <td class="text-center">
                                    <a href="javascript:detabsensi({{$val[0]->absensi_id}},{{$id}})" class="btn btn-xs btn-primary btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-eye" ></i></a> 
                                    {{-- <a href="{{url('batch-detail/'.$id.'/absensi-add__'.$val[0]->absensi_id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="edit Data"><i class="fa fa-edit" ></i></a>     --}}
                                    <a href="javascript:hapusabsensi({{$val[0]->absensi_id}},{{$id}})" class="btn btn-xs btn-danger btn-rounded" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash" ></i></a> 
                                </td>
                            </tr>
                        @endforeach                                     
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5 pull-right">
                    <div id="detabsen"></div>
                </div>
                <div class="col-md-12">
                    <hr style="border-bottom:1px solid #ddd">
                    <small>&copy; P2M Departemen Mesin - Fakultas Teknik Universitas Indonesia.</small>
                </div>
            </div>
         </div>

                             
<style>
    .app .table tr td
    {
        padding:5px 10px;
        font-size:11px !important;
    }
</style>