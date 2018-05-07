<div class="block block-condensed">
                            
        <!-- START PAGE HEADING -->
        <div class="app-heading app-heading-small">                                
            <div class="title">
                <h1 style="font-size:20px;">Tambah Jadwal Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            
                <form id="formAddJadwal" class="form-horizontal" method="POST" action="{{$idjadwal==0 ? url('jadwal-add/'.$id.'/-1')  : url('jadwal-add/'.$id.'/'.$idjadwal) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                            <div class="col-md-6" style="margin-bottom:5px;">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label text-right">Pilih Tanggal</label>
                                        <div class="col-md-4">
                                            {{-- <select class="s2-select-search form-control" name="skedul__tanggal" id="tanggal">
                                                <option value="">- Pilih -</option>
                                                @php
                                                    $date=createDateRange($jadwal->start_date,$jadwal->end_date,'Y-m-d');
                                                @endphp
                                                @foreach ($date as $item)
                                                    <option value="{{$item}}">{{date('d-m-Y',strtotime($item))}}</option>
                                                @endforeach
                                            </select> --}}
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" name="skedul__date" id="tanggal" value="{{ $idjadwal==0 ? '' : ($detjadwal->tanggal!='' ? date('d/m/Y',strtotime($detjadwal->tanggal)) : '') }}">
                                                <span class="input-group-addon">
                                                    <span class="icon-calendar-full"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label text-right">Waktu Mulai</label>
                                        <div class="col-md-4">
                                            <input type="text" name="detail__start_time" id="start_time" class="form-control"  placeholder="00:00" value="{{$idjadwal==0 ? '' : $detjadwal->start_time}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label text-right">Waktu Selesai</label>
                                        <div class="col-md-4">
                                            <input type="text" name="detail__end_time" id="end_time" class="form-control" value="{{$idjadwal==0 ? '' : $detjadwal->end_time}}" placeholder="00:00">
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                        <label class="col-md-4 control-label text-right">Materi</label>
                                        <div class="col-md-8">
                                            <select class="s2-select-search form-control" name="detail__materi_id" id="materi_id" onchange="getmateri(this.value)">
                                                <option value="0">- Pilih -</option>
                                                @foreach ($materi as $item)
                                                    @if ($idjadwal!=0)
                                                        @if ($detjadwal->materi_id==$item->id)
                                                            <option value="{{$item->id}}" selected="selected">{{$item->kode}} - {{$item->materi}}</option>
                                                        @else
                                                            <option value="{{$item->id}}">{{$item->kode}} - {{$item->materi}}</option>    
                                                        @endif
                                                    @else
                                                        <option value="{{$item->id}}">{{$item->kode}} - {{$item->materi}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-4 control-label text-right">Keterangan Materi</label>
                                        <div class="col-md-8" id="div_materi">
                                            <input type="text" name="detail__materi" id="materi" class="form-control" value="{{$idjadwal==0 ? '' : $detjadwal->materi}}"  placeholder="Keterangan Materi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label text-right">Staf</label>
                                        <div class="col-md-8">
                                            <select class="s2-select-search form-control" name="detail__staf_id" id="staf">
                                                <option value="0">- Pilih -</option>
                                                @foreach ($pegawai as $item)
                                                    @if ($idjadwal!=0)
                                                        @if ($detjadwal->staf_id==$item->id)
                                                            <option value="{{$item->id}}" selected="selected">{{$item->kode}} - {{$item->nama}}</option>
                                                        @else
                                                            <option value="{{$item->id}}">{{$item->kode}} - {{$item->nama}}</option>    
                                                        @endif
                                                    @else
                                                        <option value="{{$item->id}}">{{$item->kode}} - {{$item->nama}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                            </div>
                            <div class="form-group">                                                
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-sm btn-info" type="button" id="btnSimpanJadwal"><i class="fa fa-save"></i>&nbsp;Simpan</button>
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
