<div class="block block-condensed">
                            
        <!-- START PAGE HEADING -->
        <div class="app-heading app-heading-small">                                
            <div class="title">
                <h1 style="font-size:20px;">Information Pelatihan</h1>
            </div>                                
        </div>
        <!-- END PAGE HEADING -->
        <div class="block-content">
            <div class="row">
                <div class="col-md-2">Kategori Pelatihan</div>
                <div class="col-md-10">: &nbsp;<b>{{$pelatihan->kategori->kategori}}</b></div>
            </div>
            <div class="row">
                <div class="col-md-2">Jenis Pelatihan</div>
                <div class="col-md-10">: &nbsp;<b>{{$pelatihan->nama}}</b></div>
            </div>
            <div class="row">
                <div class="col-md-2">Jadwal Pelatihan</div>
                <div class="col-md-10">: &nbsp;<b>{{date('d-m-Y',strtotime($jadwal->start_date))}} s.d. {{date('d-m-Y',strtotime($jadwal->end_date))}}</b></div>
            </div>
            <div class="row">
                <div class="col-md-2">Lokasi Pelatihan</div>
                <div class="col-md-10">: &nbsp;<b>{{$jadwal->lokasi}}</b></div>
            </div>
            <div class="row">
                <div class="col-md-2">Status</div>
                <div class="col-md-10">: &nbsp;<b>{!!$jadwal->flag==1 ? '<span class="label label-info">Aktif</span>' : ($jadwal->flag==2 ? '<span class="label label-primary">Sudah Terlaksana</span>' : '<span class="label label-warning">Tidak Aktif</span>')!!}</b></div>
            </div>
            <hr style="border-bottom:1px solid #ddd">
            <small>&copy; P2M Departemen Mesin - Fakultas Teknik Universitas Indonesia.</small>
        </div>
    </div>
<style>
    .row
    {
        margin-bottom:5px;
    }
</style>