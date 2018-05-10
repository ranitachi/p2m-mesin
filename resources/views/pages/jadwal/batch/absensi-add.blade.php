<div class="block block-condensed">
                            
        <!-- START PAGE HEADING -->
        <div class="app-heading app-heading-small">                                
            <div class="title">
                <h1 style="font-size:20px;">Tambah Absensi Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            
               <form id="formAddAbsensi" class="form-horizontal" method="POST" action="{{$idjadwal==0 ? url('absensi-add/'.$id.'/-1')  : url('absensi-add/'.$id.'/'.$idjadwal) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                            <div class="col-md-5" style="margin-bottom:5px;">
                                <div class="form-group">
                                        <label class="col-md-5 control-label text-right">Pilih Tanggal</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" name="skedul__date" id="tanggal" value="{{ $idjadwal==0 ? $jadwal->end_date : ($detjadwal->tanggal!='' ? date('d/m/Y',strtotime($detjadwal->tanggal)) : '') }}">
                                                <span class="input-group-addon">
                                                    <span class="icon-calendar-full"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label text-right">Keterangan</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <textarea class="form-control" name="desc" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-7" style="margin-bottom:5px;">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:40px;">No</th>
                                            <th>Nama Peserta</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        @foreach ($dpeserta as $idx => $val)
                                            <tr>
                                                <td class="text-center">{{++$idx}}</td>
                                                <td class="text-left">{{$val->peserta->nama_lengkap}}</td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="radio" name="status[{{$val->participant_id}}]" value="hadir"> Hadir
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="status[{{$val->participant_id}}]" value="sakit"> Sakit
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="status[{{$val->participant_id}}]" value="izin"> Izin
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" name="status[{{$val->participant_id}}]" value="tidak hadir"> Tidak Hadir
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">                                                
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-sm btn-info" type="button" id="btnSimpanAbsensi"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                                </div>
                            </div>
                    </div>
                </form>
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
