<div class="app-heading app-heading-small">                                
    
            <div class="title">
                <h1 style="font-size:20px;">Berkas Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            <div class="row" style="padding:0px 30px;width:60%">
                <table class="table table-striped table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th style="width:40px;">No</th>
                            <th>Jenis Berkas</th>
                            <th>Unduh</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-left">Daftar Hadir Peserta</td>
                            <td class="text-center">
                                @if (count($jdwl)>6)
                                    <a href="javascript:pilihjadwal({{$id}})" target="" class="btn btn-xs btn-danger"><i class="fa fa-print"></i> Unduh</a>
                                @else
                                    <a href="{{url('absensi-peserta/'.$id)}}" target="_blank" class="btn btn-xs btn-danger"><i class="fa fa-print"></i> Unduh</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-left">Daftar Hadir Instruktur</td>
                            <td class="text-center">
                                <a href="{{url('absensi-instruktur/'.$id)}}" target="_blank" class="btn btn-xs btn-danger"><i class="fa fa-print"></i> Unduh</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-left">Buku Peserta</td>
                            <td class="text-center">
                                <a href="{{url('buku-peserta/'.$id)}}" target="_blank" class="btn btn-xs btn-danger"><i class="fa fa-print"></i> Unduh</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="text-left">Name Tag Peserta</td>
                            <td class="text-center">
                                <a href="{{url('name-tag/'.$id)}}" target="_blank" class="btn btn-xs btn-danger"><i class="fa fa-print"></i> Unduh</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="text-left">Unduh Form Quisioner</td>
                            <td class="text-center">
                                <a href="{{url('form-quisioner/'.$id)}}" target="_blank" class="btn btn-xs btn-danger"><i class="fa fa-print"></i> Unduh</a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="text-center">6</td>
                            <td class="text-left">Nama Meja Peserta</td>
                            <td class="text-center">
                                <a href="{{url('nama-meja/'.$id)}}" target="_blank" class="btn btn-xs btn-danger"><i class="fa fa-print"></i> Unduh</a>
                            </td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
    .app .table tr td
    {
        padding:5px 10px;
        font-size:12px !important;
    }
</style>
