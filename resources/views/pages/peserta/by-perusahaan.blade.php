<div class="form-group">
    <label class="col-md-4 control-label">Alamat</label>
    <div class="col-md-8">
        <textarea name="perusahaan_alamat" class="form-control">{{$id==-1 ? '' : $det->alamat}}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Email</label>
    <div class="col-md-8">
        <input type="email" name="perusahaan_email" id="email" class="form-control" value="{{$id==-1 ? '' : $det->email}}" placeholder="Email">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Telp</label>
    <div class="col-md-8">
        <input type="text" name="perusahaan_telp" class="form-control" value="{{$id==-1 ? '' : $det->telp}}" placeholder="Telp">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Fax</label>
    <div class="col-md-8">
        <input type="text" name="perusahaan_fax" class="form-control" value="{{$id==-1 ? '' : $det->fax}}" placeholder="Fax">
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">Jenis Usaha</label>
    <div class="col-md-8">
        <input type="text" name="perusahaan_jenis_usaha" class="form-control" value="{{$id==-1 ? '' : $det->jenis_usaha}}" placeholder="Jenis Usaha">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Kontak Person (CP)</label>
    <div class="col-md-8">
        <input type="text" name="perusahaan_cp" class="form-control" value="{{$id==-1 ? '' : $det->cp}}" placeholder="Kontak Person">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Nomor CP</label>
    <div class="col-md-8">
        <input type="text" name="perusahaan_no_cp" class="form-control" value="{{$id==-1 ? '' : $det->no_cp}}" placeholder="Nomor CP">
    </div>
</div>
                                                    

<div class="form-group">
    <label class="col-md-4 control-label">Email CP</label>
    <div class="col-md-8">
        <input type="text" name="perusahaan_email_cp" class="form-control" value="{{$id==-1 ? '' : $det->email_cp}}" placeholder="Email CP">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Bagian CP</label>
    <div class="col-md-8">
        <input type="text" name="perusahaan_bagian_cp" class="form-control" value="{{$id==-1 ? '' : $det->bagian_cp}}" placeholder="Bagian CP">
    </div>
</div>
