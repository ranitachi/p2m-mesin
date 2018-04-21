
                    <!-- START APP HEADER -->
                    
                    <!-- END APP HEADER  -->
                    
                    <!-- START PAGE HEADING -->
                    
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable-extended">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Telp/HP</th>
                                                        <th>Status</th>
                                                        <th>#</th>
                                                    </tr>
                                                </thead>                                    
                                                <tbody>
                                                    @foreach ($pegawai as $key=>$item)
                                                        <tr>
                                                            <td class="text-center">{{(++$key)}}</td>    
                                                            <td class="text-center">{{$item->kode}}</td>    
                                                            <td class="text-left">{{$item->nama}}</td>    
                                                            <td class="text-left">{{$item->email}}</td>    
                                                            <td class="text-center">{{$item->hp}}</td>    
                                                            <td class="text-center">{!!$item->flag ==1 ? '<span class="label label-success">Aktif</span>':'<span class="label label-warning">Tidak Aktif</span>'!!}</td>    
                                                            <td class="text-center">
                                                                <a href="{{url('karyawan/'.$item->id)}}" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Edit Data"><i class="fa fa-edit" ></i></a> 
                                                                   
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