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
                            <th style="width:100px;">Instruktur</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        @foreach ($dpeserta as $key=>$item)
                    
                            <tr>
                                <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                                <td class="text-left">
                                    <div style="width:130px;">
                                        <strong><a href="{{url('peserta-detail/'.$item->id)}}">{{$item->peserta->nama_lengkap}}</a></strong>
                                    </div>
                                </td>    
                                <td class="text-left">
                                    <div style="width:150px;">
                                        {{isset($item->peserta->perusahaan->nama_perusahaan) ? $item->peserta->perusahaan->nama_perusahaan : 'PRIBADI'}}
                                    </div>
                                </td>     
                                <td class="text-center">
                                @php
                                    $idx=0;
                                @endphp
                                @foreach ($instruktur as $itm)
                                    @if (isset($skedul[$itm->instruktur_id]))
                                        @foreach ($skedul[$itm->instruktur_id] as $idx_it=>$it)
                                            @if (isset($ds[$item->participant_id][$itm->instruktur_id]))
                                                <a href="javascript:input_quisioner({{$item->participant_id}},{{$id}},'{{$it->skedul->date}}',{{$itm->instruktur_id}})" class="btn btn-xs btn-primary btn-rounded" data-toggle="tooltip" title=" Quisioner {{$itm->instruktur->nama}} Tgl : {{date('d/m/Y',strtotime($idx_it))}}"><i class="fa fa-check" ></i> ( {{date('d/m/Y',strtotime($idx_it))}} ) - {{$itm->instruktur->inisial}}</a>    
                                            @else
                                                <a href="javascript:input_quisioner({{$item->participant_id}},{{$id}},'{{$it->skedul->date}}',{{$itm->instruktur_id}})" class="btn btn-xs btn-{{$key%2==0 ? 'info' : 'success'}} btn-rounded" data-toggle="tooltip" title=" Quisioner {{$itm->instruktur->nama}} Tgl : {{date('d/m/Y',strtotime($idx_it))}}"><i class="fa fa-file-o" ></i> ( {{date('d/m/Y',strtotime($idx_it))}} ) - {{$itm->instruktur->inisial}}</a>    
                                            @endif
                                        @endforeach
                                    @endif
                                    @php
                                        $idx++;
                                    @endphp
                                @endforeach
                                
                                </td>    
                            </tr>    
                        @endforeach                                       
                    </tbody>
                </table>
                <hr style="border-bottom:1px solid #ddd">
                <small>&copy; P2M Departemen Mesin - Fakultas Teknik Universitas Indonesia.</small>
            </div>
         </div>

@section('footscript')
<script type="text/javascript" src="{{asset('build/js/vendor/noty/jquery.noty.packaged.js')}}"></script>
<script>
    function input_quisioner(iduser,idbatch,date,instruktur_id)
    {
        $('h4.modal-title').text('Form Quisioner');
        $('#modal-large').modal('show');
        $('#submit-primary').one('click',function(){
            $.ajax({
                url : '{{url("simpan-quisioner")}}/'+iduser+'/'+idbatch+'/'+date+'/'+instruktur_id,
                type : 'POST',
                dataType : 'JSON',
                data : $('#form-quisioner').serialize(),
                cache: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            }).done(function(data){
                var ps='<h3><i class="fa fa-check"></i>&nbsp;&nbsp;Success</h3>Input Quisioner Berhasil Disimpan';
                pesanNoty(ps,'success');
                $('#modal-large').modal('hide');
                setTimeout(function(){
                    location.href='{{url("batch-detail")}}/'+idbatch+'/quisioner';
                },500);
            }).fail(function(data){
                var ps='<h3><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Error</h3>Input Quisioner Gagal Disimpan';
                pesanNoty(ps,'error');
            });
        });
    }
</script>    
@endsection                     
<style>
    .app .table tr td
    {
        padding:5px 10px;
        font-size:11px !important;
    }

</style>
            <div class="modal fade" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-primary-header">     
                <div class="modal-dialog modal-lg modal-primary" role="document">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                    <div class="modal-content">
                        <div class="modal-header">                        
                            <h4 class="modal-title" id="modal-primary-header"></h4>
                        </div>
                        <div class="modal-body" id="primary-body">
                            <form id="form-quisioner">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <table  cellpadding="3" cellspacing="3" class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Evaluasi</th>
                                        <th>Baik Sekali</th>
                                        <th>Baik</th>
                                        <th>Cukup</th>
                                        <th>Kurang</th>
                                    </tr>
                                    @foreach ($quisioner as $ii=>$item)
                                        @if ($item->kategori=='pilihan')
                                            <tr>
                                                <td style="text-align:center">{{++$ii}}</td>
                                                <td style="text-align:left">{!!str_replace(array('<p>','</p>'),'',$item->question)!!}</td>
                                                <td style="text-align:center"><input type="radio" name="pilihan[{{$ii}}]" value="BS"></td>
                                                <td style="text-align:center"><input type="radio" name="pilihan[{{$ii}}]" value="B"></td>
                                                <td style="text-align:center"><input type="radio" name="pilihan[{{$ii}}]" value="C"></td>
                                                <td style="text-align:center"><input type="radio" name="pilihan[{{$ii}}]" value="K"></td>
                                            </tr>                            
                                        @else
                                            <tr>
                                                <td style="text-align:center">{{++$ii}}</td>
                                                <td style="text-align:left" colspan="5">
                                                    <textarea name="usulan[{{$ii}}]" style="width:100%;" placeholder="Usulan"></textarea>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="submit-primary">Simpan</button>
                        </div>
                    </div>
                </div>            
            </div>
        