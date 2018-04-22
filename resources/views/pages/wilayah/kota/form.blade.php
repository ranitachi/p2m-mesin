<h2>Form {{$id==-1 ? 'Tambah' : 'Edit'}} Kabupaten/Kota</h2>
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
                        <select class="s2-select-search form-control" name="provinsi_id" id="provinsi_id">
                            <option>-Provinsi-</option>
                            @foreach ($prop as $item)
                                @if ($id!=-1)
                                    @if ($det->provinsi_id==$item->id)
                                        <option value="{{$det->provinsi_id}}" selected="selected">{{$item->name}}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endif
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach          
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
               <div class="form-group">
                    <label class="col-md-12 control-label">Kabupaten/Kota</label>
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
