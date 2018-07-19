<div class="block block-condensed">
                            
        <!-- START PAGE HEADING -->
        <div class="app-heading app-heading-small">                                
            <div class="title">
                <h1 style="font-size:20px;">Tambah Jadwal Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            
                <form id="formAddJadwal" class="form-horizontal" method="POST" action="{{$idjadwal==0 ? url('jadwal-add-batch/'.$id.'/-1')  : url('jadwal-add-batch/'.$id.'/'.$idjadwal) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th style="width:40px;" class="text-center">Hari / Tanggal</th>
                                <th style="width:80px;" class="text-center">Waktu </th>
                               
                                <th class="text-center">Materi</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Instruktur</th>
                                <th class="text-center">PIC</th>
                                
                            </tr>
                        </thead> 
                        <tbody>
                        @for ($i = 0; $i < 5; $i++)
                            <tr>
                                <td class="text-center" style="vertical-align:top;text-align:center;width:120px;">
                                    <div class="input-group" style="width:150px;margin:0 auto">
                                        <input type="text" class="form-control" placeholder="{{ $idjadwal==0 ? '' : ($detjadwal->tanggal!='' ? date('d/m/Y',strtotime($detjadwal->tanggal)) : 'dd/mm/yyyy') }}" name="skedul__date[]" value="{{ $idjadwal==0 ? '' : ($detjadwal->tanggal!='' ? date('d/m/Y',strtotime($detjadwal->tanggal)) : '') }}" id="tanggal_batch">
                                        <span class="input-group-addon">
                                            <span class="icon-calendar-full"></span>
                                        </span>
                                    </div>
                                </td>
                                <td class="text-center" style="width:150px;">
                                    @for ($j = 0; $j < 10; $j++)
                                        <div style="width:150px;">
                                            <input type="text" name="detail__start_time[{{$i}}][{{$j}}]" class="form-control"  placeholder="00:00" value="{{$idjadwal==0 ? '' : $detjadwal->start_time}}" style="width:60px;margin:0 auto;float:left" id="start_time_batch"> 
                                            <div style="float:left;padding:8px 0 0 8px;;">s.d</div> 
                                            <input type="text" name="detail__end_time[{{$i}}][{{$j}}]" class="form-control" value="{{$idjadwal==0 ? '' : $detjadwal->end_time}}" placeholder="00:00" style="width:60px;margin:0 auto;float:right" id="end_time_batch">
                                        </div>
                                    @endfor
                                </td>
                                <td>
                                    @for ($j = 0; $j < 10; $j++)
                                        <select class="s2-select-search form-control" name="detail__materi_id[{{$i}}][{{$j}}]" onchange="getmateri(this.value)" style="width:150px !important;">
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
                                            
                                        @endfor
                                </td>
                                <td>
                                    
                                    @for ($j = 0; $j < 10; $j++)
                                    <input type="text" name="detail__materi[{{$i}}][{{$j}}]" class="form-control" value="{{$idjadwal==0 ? '' : $detjadwal->materi}}"  placeholder="Keterangan Materi" >
                                    @endfor
                                </td>
                                <td>
                                    @for ($j = 0; $j < 10; $j++)
                                        <select class="s2-select-search form-control" name="detail__instruktur_id[{{$i}}][{{$j}}]" >
                                                <option value="0">- Pilih -</option>
                                                @foreach ($instruktur as $item)
                                                    @if ($idjadwal!=0)
                                                        @if ($detjadwal->instruktur_id==$item->instruktur_id)
                                                            <option value="{{$item->instruktur_id}}" selected="selected">{{$item->instruktur->inisial}}-{{$item->instruktur->nama}}</option>
                                                        @else
                                                            <option value="{{$item->instruktur_id}}">{{$item->instruktur->inisial}}-{{$item->instruktur->nama}}</option>    
                                                        @endif
                                                    @else
                                                        <option value="{{$item->instruktur_id}}">{{$item->instruktur->inisial}}-{{$item->instruktur->nama}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @endfor
                                </td>
                                <td>
                                    @for ($j = 0; $j < 10; $j++)
                                        <select class="s2-select-search form-control" name="detail__staf_id[{{$i}}][{{$j}}]">
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
                                        @endfor
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                        <tr>
                            <td colspan="6">
                                <div class="form-group">                                                
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-sm btn-info pull-right" type="submit" id=""><i class="fa fa-save"></i>&nbsp;Simpan</button>
                                </div>
                            </div>
                            </td>
                        </tr>
                    </table>
                            
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
