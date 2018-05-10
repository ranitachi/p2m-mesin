<div class="app-heading app-heading-small">                                
    
            <div class="title">
                <h1 style="font-size:20px;">Daftar Peserta Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            <div class="row" style="padding:0px 30px;">
                <table class="table table-striped table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th style="width:40px;">No</th>
                            <th>Nama Peserta</th>
                            <th>Asal Perusahaan</th>
                            <th>Nilai Pre Test</th>
                            <th>Nilai Post Test </th>
                            <th style="width:100px;">#</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        <form id="simpan-nilai">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @foreach ($dpeserta as $key=>$item)
                            @php
                                $nilai_post=$nilai_pre=0;
                                if(isset($n_tes[$item->participant_id]['pre']))
                                    $nilai_pre=$n_tes[$item->participant_id]['pre'];

                                if(isset($n_tes[$item->participant_id]['post']))
                                    $nilai_post=$n_tes[$item->participant_id]['post'];
                            @endphp
                            <tr>
                                <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                                <td class="text-left"><strong><a href="{{url('peserta-detail/'.$item->id)}}">{{$item->peserta->nama_lengkap}}</a></strong></td>    
                                <td class="text-left">{{isset($item->peserta->perusahaan->nama_perusahaan) ? $item->peserta->perusahaan->nama_perusahaan : 'PRIBADI'}}</td>    
                                <td class="text-left">
                                    <input type="text" class="form-action" style="width:90px;" name="nilai_pre_test[{{$item->participant_id}}]" value="{{$nilai_pre}}">
                                </td>    
                                <td class="text-left">
                                    <input type="text" class="form-action" style="width:90px;" name="nilai_post_test[{{$item->participant_id}}]" value="{{$nilai_post}}">
                                </td>    
                                <td class="text-center">
                                    <a href="javascript:simpan({{$item->participant_id}},{{$id}})" class="btn btn-xs btn-success" data-toggle="tooltip" title="Simpan Nilai"><i class="fa fa-save"></i></a> 
                                </td>    
                            </tr>    
                        @endforeach   
                        </form>                                    
                    </tbody>
                    <thead>
                        <tr>
                            <th colspan="6" class="text-right">
                                <a href="javascript:simpan(-1,{{$id}})" class="btn btn-xs btn-info"><i class="fa fa-save"></i> Simpan Semua</a> 
                            </th>    
                        </tr>
                    </thead>
                </table>
                <hr style="border-bottom:1px solid #ddd">
                <small>&copy; P2M Departemen Mesin - Fakultas Teknik Universitas Indonesia.</small>
            </div>
         </div>

                             
<style>
    .app .table tr td
    {
        padding:5px 10px;
        font-size:11px !important;
    }
</style>
@section('footscript')
    <script type="text/javascript" src="{{asset('build/js/vendor/noty/jquery.noty.packaged.js')}}"></script>
    <script>
        function simpan(idpeserta,idbatch)
        {
            $.ajax({
                url : '{{url("simpan-nilai")}}/'+idpeserta+'/'+idbatch,
                type:'POST',
                dataType:'json',
                data : $('#simpan-nilai').serialize(),
                cache: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            }).done(function(data){
                var ps='<h3><i class="fa fa-check"></i>&nbsp;&nbsp;Success</h3>Input Nilai Tes Berhasil Disimpan';
                pesanNoty(ps,'success');
               
                setTimeout(function(){
                    location.href='{{url("batch-detail")}}/'+idbatch+'/test';
                },1000);
            }).fail(function(data){
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Input Nilai Tes Gagal Disimpan';
                pesanNoty(ps,'error');
            });
        }
    </script>
@endsection