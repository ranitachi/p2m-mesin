<div class="app-heading app-heading-small">                                
    
            <div class="title">
                <h1 style="font-size:20px;">Daftar Peserta Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            <form action="{{url('simpan-nomor-sertifikat')}}" method="POST" id="simpan-nomor-sertifikat">
                <div class="row" style="">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="batch_id" value="{{$id}}">
                    <div class="col-md-5"></div>
                    <div class="col-md-2" style="padding-top:6px;text-align:right">Input Nomor Sertifikat</div>
                    <div class="col-md-3">
                        <input type="text" name="nomor_sertifikat" id="nomor_sertifikat" class="form-control"  placeholder="Nomor Sertifikat" value="{{$n_ser}}">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-md btn-info" type="button" id="btnSimpanSetifikat"><i class="fa fa-save"></i>&nbsp;Simpan Data</button>
                    </div>
                </div>
            </form>
            <div class="row" style="padding:0px 30px;">
                <table class="table table-striped table-bordered" id="datatable" style="margin-top:10px;">
                    <thead>
                        <tr>
                            <th style="width:40px;">No</th>
                            <th>Nama Peserta</th>
                            <th>Asal Perusahaan</th>
                            <th>Jabatan</th>
                            <th style="width:100px;">#</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        @foreach ($dpeserta as $key=>$item)
                    
                            <tr>
                                <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                                <td class="text-left"><strong><a href="{{url('peserta-detail/'.$item->id)}}">{{$item->peserta->nama_lengkap}}</a></strong></td>    
                                <td class="text-left">{{isset($item->peserta->perusahaan->nama_perusahaan) ? $item->peserta->perusahaan->nama_perusahaan : 'PRIBADI'}}</td>    
                                <td class="text-center">{{$item->peserta->jabatan}}</td>    
                                <td class="text-center">
                                    <a href="javascript:cetaksertifikat({{$item->id}},{{$id}})" target="_blank" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Cetak Sertifikat"><i class="fa fa-print" ></i> Sertifikat</a>    
                                    {{-- <a href="{{url('cetak-sertifikat/'.$item->id.'/'.$id)}}" target="_blank" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Cetak Sertifikat"><i class="fa fa-print" ></i> Sertifikat</a>     --}}
                                    <a href="{{url('cetak-sertifikat-materi/'.$item->id.'/'.$id)}}" target="_blank" class="btn btn-xs btn-success btn-rounded" data-toggle="tooltip" title="Cetak Materi"><i class="fa fa-print" ></i> Materi</a>    
                                </td>    
                            </tr>    
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