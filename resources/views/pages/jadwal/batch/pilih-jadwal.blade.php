<div class="row">
    <div class="col-sm-12">
        <h3><i class="fa fa-calendar"></i> Silahkan Pilih Jadwal Yang Akan Di Cetak</h3>
    </div>
</div>
<form action="{{url('pilih-jadwal-simpan/'.$id)}}" method="POST" id="form-pilih-jadwal" target="_blank">
    {{csrf_field()}}
<div class="row">
    <div class="col-sm-2">
        <div class="app-checkbox success inline"> 
            <label><input type="checkbox" id="pilihsemua"> Pilih Semua<span></span></label> 
        </div>
    </div>
    @foreach ($sch as $jd=>$item)
        <div class="col-sm-2">
            <div class="app-checkbox danger inline"> 
                <label><input type="checkbox" id="pilih_jadwal" name="jadwal[{{$jd}}]" value="{{$jd}}"> {{tgl_indo2($jd)}}<span></span></label> 
            </div>
        </div>
    @endforeach
</div>
</form>