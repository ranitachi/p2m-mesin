<h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} Provinsi</h2>
<form id="formprovinsi" class="form-horizontal" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if ($id!=-1)
        {{ method_field('PATCH') }}
    @endif
        <div class="row">
            <div class="col-md-12">
                
               <div class="form-group">
                    <label class="col-md-12 control-label">Provinsi</label>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" value="{{$id==-1 ? '' : $det->name}}" placeholder="Provinsi">
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
