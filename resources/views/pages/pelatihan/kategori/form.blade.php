<h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} Kategori Pelatihan</h2>
<form id="formkategori" class="form-horizontal" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if ($id!=-1)
        {{ method_field('PATCH') }}
    @endif
        <div class="row">
            <div class="col-md-12">
                
               <div class="form-group">
                    <label class="col-md-12 control-label">Kode</label>
                    <div class="col-md-12">
                        <input type="text" name="kode" class="form-control" value="{{$id==-1 ? '' : $det->kode}}" placeholder="Kode" id="kode">
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-12 control-label">Kategori</label>
                    <div class="col-md-12">
                        <input type="text" name="kategori" class="form-control" value="{{$id==-1 ? '' : $det->kategori}}" placeholder="Kategori" id="kategori">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 control-label">Keterangan</label>
                    <div class="col-md-12">
                        <textarea name="desc" class="form-control">{{$id==-1 ? '' : $det->desc}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 control-label">Status Aktif</label>
                    <div class="col-md-12">
                        <div class="inline"> 
                            <label><input type="radio" name="flag" value="1" {{$id==-1 ? '' : ($det->flag==1 ? 'checked="checked"' : '')}}> Aktif</label> 
                            &nbsp;&nbsp;&nbsp;
                            <label><input type="radio" name="flag" value="0" {{$id==-1 ? '' : ($det->flag==0 ? 'checked="checked"' : '')}}> Non Aktif</label> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">            
            <div class="col-md-12 text-right">
                <button class="btn btn-sm btn-info" type="button" id="btnSimpan"><i class="fa fa-save"></i>&nbsp;Simpan Data</button>
            </div>
        </div>
    </form>
