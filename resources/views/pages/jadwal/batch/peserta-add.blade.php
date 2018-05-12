<div class="block block-condensed">
                            
        <!-- START PAGE HEADING -->
        <div class="app-heading app-heading-small">                                
            <div class="title">
                <h1 style="font-size:20px;">Tambah Peserta Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            
                <form id="formAddPeserta" class="form-horizontal" method="POST" action="{{$id==-1 ? url('peserta-add') : url('peserta-add/'.$id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                    @for ($i = 0; $i < 10; $i++) 
                            <div class="col-md-6" style="margin-bottom:5px;">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label text-right">Pilih Peserta</label>
                                        <div class="col-md-8">
                                            <select class="s2-select-search form-control" name="peserta_id[{{$i}}]">
                                                <option value="">- Pilih -</option>
                                                @foreach ($peserta as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_lengkap}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                    @endfor
                            <div class="form-group">                                                
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-sm btn-info" type="button" id="btnSimpanPeserta"><i class="fa fa-save"></i>&nbsp;Simpan</button>
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
