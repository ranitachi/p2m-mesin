<div class="app-heading app-heading-small">                                
    
            <div class="title">
                <h1 style="font-size:20px;">Daftar Instruktur Pelatihan</h1>
            </div>                                
        </div>
         <div class="block-content">
            <div class="row" style="padding:0px 30px;">
                <table class="table table-striped table-bordered" id="datatable" style="width:40%">
                    <thead>
                        <tr>
                            <th style="width:40px;">No</th>
                            <th>Nama Instruktur</th>
                           
                            <th style="width:100px;">#</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        @foreach ($instruktur as $key=>$item)
                            @php
                                $nama=$item->instruktur->nama;
                                if($item->instruktur->gelar_s3!='')
                                {
                                    $nama.=', '.$item->instruktur->gelar_s3.'.';
                                }
                                if($item->instruktur->gelar_s1!='')
                                {
                                    $nama.=', '.$item->instruktur->gelar_s1.'.';
                                }
                                if($item->instruktur->gelar_s2!='')
                                {
                                    $nama.=', '.$item->instruktur->gelar_s2.'.';
                                }
                                if($item->instruktur->gelar_lain!='')
                                {
                                    $nama.=', '.$item->instruktur->gelar_lain;
                                }
                            @endphp 
                            <tr>
                                <td class="text-center" style="width:80px;">{{(++$key)}}</td>    
                                <td class="text-left"><strong><a href="{{url('instruktur-detail/'.$item->id)}}">{{$nama}}</a></strong></td>    
                                <td class="text-center">
                                    <a href="{{url('cetak-ucapan/'.$item->id.'/'.$id)}}" target="_blank" class="btn btn-xs btn-info btn-rounded" data-toggle="tooltip" title="Cetak Sertifikat"><i class="fa fa-print" ></i> Cetak</a>    
                                </td>    
                            </tr>    
                        @endforeach                                       
                    </tbody>
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