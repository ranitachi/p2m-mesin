<form id="formkkelurahan" class="form-horizontal" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if ($id!=-1)
        {{ method_field('PATCH') }}
    @endif
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="provinsi_id" value="{{$idprop}}">
                <input type="hidden" name="kabupatenkota_id" value="{{$idkota}}">
                <input type="hidden" name="kecamatan_id" value="{{$idkec}}">
               <div class="form-group">
                    <label class="col-md-12 control-label">Provinsi</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="{{$idprop==-1 ? '' : $kota->provinsi->name}}" placeholder="Provinsi">
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-12 control-label">Kabupaten/Kota</label>
                    <div class="col-md-12">
                        <input type="text"  class="form-control" value="{{$idkota==-1 ? '' : $kota->name}}" placeholder="Kabupaten/Kota">
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-12 control-label">Kecamatan</label>
                    <div class="col-md-12">
                        <input type="text"  class="form-control" value="{{$idkec==-1 ? '' : $kec->name}}" placeholder="Kabupaten/Kota">
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-12 control-label">Kecamatan</label>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" value="{{$id==-1 ? '' : $det->name}}" placeholder="Kecamatan">
                    </div>
                </div>
            </div>
        </div>

    </form>
