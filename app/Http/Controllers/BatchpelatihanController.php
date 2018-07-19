<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Batchpelatihan;
use App\Model\BatchIntruktur;
use App\Model\BatchParticipant;
use App\Model\Masterpelatihan;
use App\Model\Masterinstruktur;
use App\Model\Masterpegawai;
use App\Model\Masterpeserta;
use App\Model\Skedulpelatihan;
use App\Skedulpelatihandetail;
use App\Model\Materi;
use App\Model\Absensipelatihan;
use App\Model\Masterquesioner;
use App\Model\Absensipelatihandetail;
use App\Model\Quisionerdata;
use App\Model\Nilaites;
use App\Model\NomorSertifikat;
use App\Model\Direktur;
use DB;
use Carbon;
class BatchpelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {  
        
        return view('pages.jadwal.jadwal.index');
    }
    public function data()
    {
        $jadwal=Batchpelatihan::orderBy('start_date','desc')->get();
        $batchinstrtuktur=BatchIntruktur::with('batch_pelatihan')->with('instruktur')->get();
        $b_ins=array();
        foreach($batchinstrtuktur as $k => $v)
        {
            $b_ins[$v->batch_pelatihan_id][$v->instruktur_id]=$v;
        }
        return view('pages.jadwal.jadwal.data')
                ->with('b_ins',$b_ins)
                ->with('jadwal',$jadwal);

    }
    public function show($id)
    {
        $det=$batchins=array();
        $pelatihan=Masterpelatihan::with('kategori')->get();
        $instruktur=Masterinstruktur::all();
        $pegawai=Masterpegawai::where('flag','=',1)->get();
        if($id!=-1)
        {
            $det=Batchpelatihan::where('id','=',$id)->with('pelatihan')->get()->first();
            $batchinstrtuktur=BatchIntruktur::where('batch_pelatihan_id','=',$id)->with('batch_pelatihan')->with('instruktur')->get();
            foreach($batchinstrtuktur as $k => $v)
            {
                $batchins[$v->instruktur_id]=$v;
            }
        }
        return view('pages.jadwal.jadwal.form')
            ->with('pelatihan',$pelatihan)
            ->with('pegawai',$pegawai)
            ->with('batchins',$batchins)
            ->with('instruktur',$instruktur)
            ->with('det',$det)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        if($data['start_date']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['start_date']);
            $data['start_date']=$th.'-'.$bl.'-'.$tg;
        }
        
        if($data['end_date']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['end_date']);
            $data['end_date']=$th.'-'.$bl.'-'.$tg;
        }
        $data['pelatihan_id']=strtok($request->pelatihan_id,'__');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $create = Batchpelatihan::create($data);
        $batch_id=$create->id;
        if(isset($request->instruktur_id))
        {
            foreach($request->instruktur_id as $idx => $val)
            {
                $b_ins=new BatchIntruktur;
                $b_ins->batch_pelatihan_id=$batch_id;
                $b_ins->instruktur_id=$val;
                $b_ins->save();
            }
        }


        // return response()->json([$create]);
        return redirect('jadwal-pelatihan')->with('status','Data Jadwal Pelatihan Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        if($data['start_date']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['start_date']);
            $data['start_date']=$th.'-'.$bl.'-'.$tg;
        }
        
        if($data['end_date']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['end_date']);
            $data['end_date']=$th.'-'.$bl.'-'.$tg;
        }
        $data['pelatihan_id']=strtok($request->pelatihan_id,'__');
        $update = Batchpelatihan::find($id)->update($data);
        BatchIntruktur::where('batch_pelatihan_id','=',$id)->forceDelete();
        if(isset($request->instruktur_id))
        {
            foreach($request->instruktur_id as $idx => $val)
            {
                $b_ins=new BatchIntruktur;
                $b_ins->batch_pelatihan_id=$id;
                $b_ins->instruktur_id=$val;
                $b_ins->save();
            }
        }
        // return response()->json([$update]);
        return redirect('jadwal-pelatihan')->with('status','Data Jadwal Pelatihan Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Batchpelatihan::find($id)->delete();
        // return response()->json(['done']);
        return redirect('jadwal-pelatihan')->with('status','Jadwal Pelatihan Berhasil di Hapus');
    }

    /* DETAIL */
    public function detail($id,$jenis)
    {
        $jadwal=Batchpelatihan::find($id);
        $pelatihan=Masterpelatihan::where('id','=',$jadwal->pelatihan_id)->with('kategori')->get()->first();
        $dpeserta=BatchParticipant::where('batch_id','=',$id)->with('peserta')->get();
        $instruktur=BatchIntruktur::where('batch_pelatihan_id','=',$id)->with('instruktur')->get();
        $peserta=Masterpeserta::all();
        $materi=Materi::where('pelatihan_id','=',$jadwal->pelatihan_id)->with('pelatihan')->get();
        $pegawai=Masterpegawai::all();
        $quisioner=Masterquesioner::where('flag',1)->orderBy('kategori','desc')->get();
        $jns=strtok($jenis,'__');

        $idjadwal=str_replace($jns.'__','',$jenis);
        $skedule=Skedulpelatihandetail::select('*','skedul_pelatihan_detail.id as idp')
            ->join('skedul_pelatihan','skedul_pelatihan.id','=','skedul_pelatihan_detail.skedul_id')
            ->where('skedul_pelatihan_detail.batch_id','=',$id)
            ->with('batch')
            ->with('mmateri')
            ->with('pegawai')
            ->orderBy('skedul_pelatihan.date', 'ASC')
            ->orderBy('skedul_pelatihan_detail.start_time','ASC')->get();
        
        // dd($skedule);

        $skd=array();
        $detjadwal=$d_jadwal=array();
        foreach($skedule as $k => $v)
        {
            $skd[$v->date][]=$v;
            $detjadwal[$v->idp]=$v;
        }
        
        $absensi=Absensipelatihandetail::with('absensi')->with('peserta')->with('skedul')->get();
        $absn=array();
        $nilai=array();
        foreach($absensi as $k =>$v)
        {
            $absn[$v->absensi_id][]=$v;
        }

        // if($idjadwal!='')
        // {
            if($idjadwal!=0)
            {
                $d_jadwal=$detjadwal[$idjadwal];
            }
        // }
        $skedul=Skedulpelatihandetail::where('batch_id',$id)->with('instruktur')->with('pegawai')->with('materi')->with('skedul')->get();
        $sch=array();
        foreach($skedul as $k=>$v)
        {
            $sch[$v->instruktur_id][strtok($v->skedul->date,' ')]=$v;
        }

        $dataquisioner=Quisionerdata::where('batch_id',$id)->get();
        $ds=array();
        foreach($dataquisioner as $k => $v)
        {
            $ds[$v->peserta_id][$v->instruktur_id]=$v;
        }
        $q_data=Quisionerdata::where('batch_id',$id)->get();
        $q_d=array();
        foreach($q_data as $k => $v)
        {
            if($v->nilai=='BS')
                $nilai[$v->instruktur_id][$v->quisioner_id][$v->nilai]=4;
            elseif($v->nilai=='B')
                $nilai[$v->instruktur_id][$v->quisioner_id][$v->nilai]=3;
            elseif($v->nilai=='C')
                $nilai[$v->instruktur_id][$v->quisioner_id][$v->nilai]=2;
            elseif($v->nilai=='K')
                $nilai[$v->instruktur_id][$v->quisioner_id][$v->nilai]=1;
        }   

        $nilaites=Nilaites::where('batch_id',$id)->get();
        $n_tes=array();
        foreach($nilaites as $kn => $vn)
        {
            $n_tes[$vn->peserta_id][$vn->jenis_tes]=$vn->nilai;
        }

        $nomor=NomorSertifikat::where('batch_id',$id)->get();
        $n_ser='';
        if($nomor->count() !=0)
            $n_ser=$nomor[0]->nomor_sertifikat;

        return view('pages.jadwal.batch.index')
            ->with('id',$id)
            ->with('absen',$absn)
            ->with('n_tes',$n_tes)
            ->with('nilai',$nilai)
            ->with('ds',$ds)
            ->with('skd',$skd)
            ->with('skedul',$sch)
            ->with('pegawai',$pegawai)
            ->with('detjadwal',$d_jadwal)
            ->with('materi',$materi)
            ->with('jadwal',$jadwal)
            ->with('idjadwal',$idjadwal)
            ->with('peserta',$peserta)
            ->with('dpeserta',$dpeserta)
            ->with('pelatihan',$pelatihan)
            ->with('instruktur',$instruktur)
            ->with('quisioner',$quisioner)
            ->with('n_ser',$n_ser)
            ->with('jenis',$jns);
    }

    public function peserta_add(Request $request,$idbatch)
    {
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        $data=0;
        foreach($request->peserta_id as $k=>$v)
        {
            if($v!='')
            {
                $participant=new Batchparticipant;
                $participant->batch_id=$idbatch;
                $participant->participant_id=$v;
                $participant->active=1;
                $participant->created_at=date('Y-m-d H:i:s');
                $participant->updated_at=date('Y-m-d H:i:s');
                $participant->save();
                $data=1;
            }
        }
        if($data==1)
        {
            $ps='Data Peserta Pelatihan Berhasil Ditambahkan';
            $type='success';
        }
        else
        {
            $ps='Data Peserta Pelatihan Tidak Berhasil Ditambahkan';
            $type='fail';
        }
        return redirect('batch-detail/'.$idbatch.'/peserta')->with($type,$ps);
    }
    public function peserta_hapus($id,$idbatch)
    {
        $del=Batchparticipant::find($id)->delete();
        if($del)
        {
            $ps='Data Peserta Pelatihan Berhasil Dihapus';
            $type='success';
        }
        else
        {
            $ps='Data Peserta Pelatihan Tidak Berhasil Dihapus';
            $type='fail';
        }
        return redirect('batch-detail/'.$idbatch.'/peserta')->with($type,$ps);
    }
    public function jadwal_add_batch(Request $request, $idbatch, $id)
    {
        // dd($request->all());
        
        $cek=Skedulpelatihan::where('batch_id','=',$idbatch);
        // dd($cek);
        if($cek->get()->count()!=0)
        {
            // $cek->forceDelete();
            // Skedulpelatihandetail::where('batch_id',$idbatch)->forceDelete();
        }

        $start_time=$request->detail__start_time;
        $end_time=$request->detail__end_time;
        $materi_id=$request->detail__materi_id;
        $materi=$request->detail__materi;
        $instruktur=$request->detail__instruktur_id;
        $staf=$request->detail__staf_id;

        // foreach($request->all() as $k =>$v)
        // {
        //     $tbl=strtok($k,'__');
        //     // echo $tbl.'<br>';
        //     $kolom=str_replace($tbl.'__','',$k);
        //     if($tbl=='skedul')
        //     {
        //         $skedul[$kolom]=$v;
        //     }
        //     elseif($tbl=='detail')
        //     {
        //         // $detail[$kolom]=$v;
        //     }
        
            $sk=array();
            
            // if(isset($skedul['date']))
            // {
                // if(count($skedul['date'])!=0)
                // {
                    foreach($request->skedul__date as $ks=>$vs)
                    {
                        if(!is_null($vs))
                        {
                            list($tg,$bl,$th)=explode('/',$vs);
                            $sk['date']=$date=$th.'-'.$bl.'-'.$tg;
                            $timestamp = strtotime($date);
                            $day = date('D', $timestamp);
                            $sk['weekday']=$day;
                            $sk['batch_id']=$idbatch;
                            $skd=Skedulpelatihan::create($sk);
                            $skedul_id=$skd->id;
                            // echo '<pre>';
                            // print_r($sk);
                            // echo '</pre>';
                            foreach($start_time[$ks] as $ktm=>$vtm)
                            {
                                if(!is_null($vtm))
                                {
                                    $mat=Materi::find($materi_id[$ks][$ktm]);
                                    if(is_null($mat))
                                        $mtr=$materi[$ks][$ktm];
                                    else
                                        $mtr=$mat->materi;

                                    $detail['skedul_id']=$skedul_id;
                                    $detail['batch_id']=$idbatch;
                                    $detail['start_time']=$vtm;
                                    $detail['end_time']=$end_time[$ks][$ktm];
                                    $detail['materi_id']=$materi_id[$ks][$ktm];
                                    $detail['materi']=$mtr;
                                    $detail['staf_id']=$staf[$ks][$ktm];
                                    $detail['instruktur_id']=$instruktur[$ks][$ktm];

                                    // echo '<pre>';
                                    // print_r($detail);
                                    // echo '</pre>';
                                    $add=Skedulpelatihandetail::create($detail);
                                    if($add)
                                    {
                                        $ps='Data Jadwal Pelatihan Berhasil Ditambahkan';
                                        $type='success';
                                    }
                                    else
                                    {
                                        $ps='Data Jadwal Pelatihan Tidak Berhasil Ditambahkan';
                                        $type='fail';
                                    }
        

        
        
                                }
                            }
                            
                        }
                    }
                    return redirect('batch-detail/'.$idbatch.'/jadwal')->with($type,$ps);
                // }
            // }
        // }
        
        // dd($request->all());

    }
    public function jadwal_add(Request $request,$idbatch,$id)
    {
        $skedul=$detail=array();
        foreach($request->all() as $k =>$v)
        {
            $tbl=strtok($k,'__');
            $kolom=str_replace($tbl.'__','',$k);
            if($tbl=='skedul')
            {
                $skedul[$kolom]=$v;
            }
            elseif($tbl=='detail')
            {
                $detail[$kolom]=$v;
            }
        }
        if($skedul['date']!='')
        {
            list($tg,$bl,$th)=explode('/',$skedul['date']);
            $skedul['date']=$date=$th.'-'.$bl.'-'.$tg;
            $timestamp = strtotime($date);
            $day = date('D', $timestamp);
            $skedul['weekday']=$day;
        }
        $detail['batch_id']=$skedul['batch_id']=$idbatch;
    
        $cek=Skedulpelatihan::where('batch_id','=',$idbatch)->where('date','like',$date)->get();
        if($cek->count()==0)
        {
            $skd=Skedulpelatihan::create($skedul);
            $skedul_id=$skd->id;
        }
        else
        {
            $ck=$cek->first();
            if($id!=-1)
            {
                $ck->update($skedul);
            }
            $skedul_id=$ck->id;
        }

        $detail['skedul_id']=$skedul_id;
        if($id!=-1)
        {
            $edit=Skedulpelatihandetail::find($id)->update($detail);
            if($edit)
            {
                $ps='Data Jadwal Pelatihan Berhasil Di Edit';
                $type='success';
            }
            else
            {
                $ps='Data Jadwal Pelatihan Tidak Berhasil Di Edit';
                $type='fail';
            }
        }
        else
        {
            $add=Skedulpelatihandetail::create($detail);
            if($add)
            {
                $ps='Data Jadwal Pelatihan Berhasil Ditambahkan';
                $type='success';
            }
            else
            {
                $ps='Data Jadwal Pelatihan Tidak Berhasil Ditambahkan';
                $type='fail';
            }
        }

        
        return redirect('batch-detail/'.$idbatch.'/jadwal')->with($type,$ps);
        // echo '<pre>';
        // print_r($skedul);
        // print_r($detail);
        // echo '</pre>';
    }

    public function jadwal_hapus($id,$idbatch)
    {
        $del=Skedulpelatihandetail::find($id)->delete();
        if($del)
        {
            $ps='Jadwal Pelatihan Berhasil Dihapus';
            $type='success';
        }
        else
        {
            $ps='Jadwal Pelatihan Tidak Berhasil Dihapus';
            $type='fail';
        }
        return redirect('batch-detail/'.$idbatch.'/jadwal')->with($type,$ps);
    }
    public function absensi_detail($idabsensi)
    {
        $det_abs=Absensipelatihandetail::where('absensi_id','=',$idabsensi)->with('peserta')->get();
        echo '<h3>Data Kehadiran Peserta</h3>';
        echo '<h5>Tanggal : '.date('d-m-Y',strtotime($det_abs[0]->skedul->date)).'</h5>';
        echo '<table class="table table-striped table-bordered" id="">
                        <thead>
                            <tr>
                                <th style="width:40px;">No</th>
                                <th>Nama Peserta</th>
                                <th>Status</th>
                            </tr>
                        </thead>                                    
                        <tbody>';
            foreach($det_abs as $k => $v)
            {
                echo '<tr>';
                echo '<td>'.(++$k).'</td>';
                echo '<td>'.($v->peserta->nama_lengkap).'</td>';
                echo '<td>'.ucwords($v->status).'</td>';
                echo '</tr>';
            }
        echo '</tbody></table>';
    }
    public function absensi_add(Request $request,$idbatch,$id)
    {
        list($tg,$bl,$th)=explode('/',$request->skedul__date);
        $date=$th.'-'.$bl.'-'.$tg;
        // $date=date('Y-m-d',strtotime($request->skedul__date));
        // echo $date;
        $skedul=Skedulpelatihan::where('batch_id','=',$idbatch)->where('date','like',"%$date%")->first();
        //dd($skedul);
        $absensi['skedul_id']=$skedul->id;
        $absensi['batch_id']=$idbatch;
        $absensi['date']=$date;
        $absensi['desc']=$request->desc;
        $abs=Absensipelatihan::create($absensi);
        $abs_id=$abs->id;

        $det_abs=Absensipelatihandetail::where('absensi_id','=',$abs_id)->forceDelete();
        $simpan=0;
        foreach($request->status as $idpeserta => $status)
        {
            $abs_det=new Absensipelatihandetail;
            $abs_det->absensi_id=$abs_id;	
            $abs_det->peserta_id=$idpeserta;	
            $abs_det->skedul_id=$skedul->id;
            $abs_det->status=$status;
            $abs_det->save();
            $simpan=1;
        }	

            if($simpan==1)
            {
                $ps='Data Jadwal Pelatihan Berhasil Ditambahkan';
                $type='success';
            }
            else
            {
                $ps='Data Jadwal Pelatihan Tidak Berhasil Ditambahkan';
                $type='fail';
            }
            return redirect('batch-detail/'.$idbatch.'/absensi')->with($type,$ps);
    }

    public function absensi_hapus($id,$idbatch)
    {
        Absensipelatihandetail::where('absensi_id','=',$id)->delete();
        $del=Absensipelatihan::find($id)->delete();
        if($del)
        {
            $ps='Data Absensi Pelatihan Berhasil Dihapus';
            $type='success';
        }
        else
        {
            $ps='Data Absensi Pelatihan Tidak Berhasil Dihapus';
            $type='fail';
        }
        return redirect('batch-detail/'.$idbatch.'/absensi')->with($type,$ps);
    }

    public function absensi_instrktur($id)
    {
        $instruktur=BatchIntruktur::where('batch_pelatihan_id',$id)->with('instruktur')->get();
        $pelatihan=Batchpelatihan::find($id);
        return view('pages.jadwal.batch.berkas.absensi-instruktur')
            ->with('instruktur',$instruktur)
            ->with('pelatihan',$pelatihan)
            ->with('id',$id);
    }
    public function buku_peserta($id)
    {
        $peserta=BatchParticipant::where('batch_id',$id)->with('peserta')->get();
        $pelatihan=Batchpelatihan::find($id);
        return view('pages.jadwal.batch.berkas.buku-peserta')
            ->with('peserta',$peserta)
            ->with('pelatihan',$pelatihan)
            ->with('id',$id);
    }
    public function absensi_peserta($id)
    {
        $peserta=BatchParticipant::where('batch_id',$id)->with('peserta')->get();
        $pelatihan=Batchpelatihan::find($id);
        return view('pages.jadwal.batch.berkas.absensi-peserta')
            ->with('peserta',$peserta)
            ->with('pelatihan',$pelatihan)
            ->with('id',$id);
    }
    public function name_tag($id)
    {
        $peserta=BatchParticipant::where('batch_id',$id)->with('peserta')->get();
        $pelatihan=Batchpelatihan::find($id);
        return view('pages.jadwal.batch.berkas.name-tag')
            ->with('peserta',$peserta)
            ->with('pelatihan',$pelatihan)
            ->with('id',$id);
    }
    public function nama_meja($id)
    {
        $peserta=BatchParticipant::where('batch_id',$id)->with('peserta')->get();
        $pelatihan=Batchpelatihan::find($id);
        return view('pages.jadwal.batch.berkas.nama-meja')
            ->with('peserta',$peserta)
            ->with('pelatihan',$pelatihan)
            ->with('id',$id);
    }
    public function cetak_sertifikat($id,$idbatch)
    {
        $peserta=BatchParticipant::where('id',$id)->where('batch_id',$idbatch)->with('peserta')->first();
        $pelatihan=Batchpelatihan::where('id',$idbatch)->with('pelatihan')->first();
        $sertifikat=NomorSertifikat::where('batch_id',$idbatch)->first();
        $direktur=Direktur::where('flag',1)->first();
        // dd($peserta);
        return view('pages.jadwal.batch.berkas.sertifikat')
            ->with('peserta',$peserta)
            ->with('direktur',$direktur)
            ->with('pelatihan',$pelatihan)
            ->with('sertifikat',$sertifikat)
            ->with('idbatch',$idbatch)
            ->with('id',$id);
    }
    public function cetak_sertifikat_materi($id,$idbatch)
    {
        $peserta=BatchParticipant::where('id',$id)->where('batch_id',$idbatch)->with('peserta')->first();
        $pelatihan=Batchpelatihan::where('id',$idbatch)->with('pelatihan')->first();
        $sertifikat=NomorSertifikat::where('batch_id',$idbatch)->first();
        $direktur=Direktur::where('flag',1)->first();
        $materi=Materi::where('pelatihan_id',$pelatihan->pelatihan_id)->get();
        // dd($peserta);
        return view('pages.jadwal.batch.berkas.sertifikat-materi')
            ->with('peserta',$peserta)
            ->with('direktur',$direktur)
            ->with('pelatihan',$pelatihan)
            ->with('sertifikat',$sertifikat)
            ->with('materi',$materi)
            ->with('idbatch',$idbatch)
            ->with('id',$id);
    }
    
    public function cetak_jadwal($idbatch)
    {
        $jadwal=Skedulpelatihandetail::where('batch_id',$idbatch)->get();
        $pelatihan=Batchpelatihan::find($idbatch);
        $skedule=Skedulpelatihandetail::select('*','skedul_pelatihan_detail.id as idp')
            ->join('skedul_pelatihan','skedul_pelatihan.id','=','skedul_pelatihan_detail.skedul_id')
            ->where('skedul_pelatihan_detail.batch_id','=',$idbatch)
            ->with('batch')
            ->with('mmateri')
            ->with('pegawai')
            ->orderBy('skedul_pelatihan.date', 'ASC')
            ->orderBy('skedul_pelatihan_detail.start_time','ASC')->get();
        
        $skd=array();
        $detjadwal=$d_jadwal=array();
        foreach($skedule as $k => $v)
        {
            $skd[$v->date][]=$v;
            $detjadwal[$v->idp]=$v;
        }
        return view('pages.jadwal.batch.berkas.jadwal-cetak')
            ->with('pelatihan',$pelatihan)
            ->with('skd',$skd)
            ->with('id',$idbatch)
            ->with('idbatch',$idbatch);
    }
    public function cetak_ucapan($id,$idbatch)
    {
        $instruktur=BatchIntruktur::where('id',$id)->where('batch_pelatihan_id',$idbatch)->with('instruktur')->first();
        $pelatihan=Batchpelatihan::find($idbatch);
        $direktur=Direktur::where('flag',1)->first();
        return view('pages.jadwal.batch.berkas.ucapan-terimakasih')
            ->with('instruktur',$instruktur)
            ->with('pelatihan',$pelatihan)
            ->with('idbatch',$idbatch)
            ->with('direktur',$direktur)
            ->with('id',$id);
    }
    public function form_quisioner($idbatch)
    {
        $instruktur=BatchIntruktur::where('batch_pelatihan_id',$idbatch)->with('instruktur')->get();
        $pelatihan=Batchpelatihan::where('id',$idbatch)->with('pelatihan')->first();
        $quisioner=Masterquesioner::where('flag',1)->orderBy('kategori','desc')->get();
        $skedul=Skedulpelatihandetail::where('batch_id',$idbatch)->with('instruktur')->with('pegawai')->with('materi')->with('skedul')->get();
        $sch=array();
        foreach($skedul as $k=>$v)
        {
            if($v->instruktur_id!=0)
                $sch[$v->instruktur_id][strtok($v->skedul->date,' ')]=$v;
        }
        // dd($sch);
        return view('pages.jadwal.batch.berkas.form-quisioner')
            ->with('instruktur',$instruktur)
            ->with('pelatihan',$pelatihan)
            ->with('quisioner',$quisioner)
            ->with('skedul',$sch)
            ->with('idbatch',$idbatch);
    }

    public function simpan_quisioner(Request $request,$iduser,$idbatch,$date,$instruktur_id)
    {
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        $batch=Batchpelatihan::find($idbatch);
        $x=0;
        foreach($request->pilihan as $k => $v)
        {
            $simpan[$x]['quisioner_id']=$k;
            $simpan[$x]['peserta_id']=$iduser;
            $simpan[$x]['batch_id']=$idbatch;
            $simpan[$x]['pelatihan_id']=$batch->pelatihan_id;
            $simpan[$x]['instruktur_id']=$instruktur_id;
            $simpan[$x]['nilai']=$v;
            $simpan[$x]['created_at']=date('Y-m-d');
            $simpan[$x]['updated_at']=date('Y-m-d');
            $x++;
        }
        foreach($request->usulan as $kk => $vv)
        {
            $usulan['quisioner_id']=$kk;
            $usulan['peserta_id']=$iduser;
            $usulan['batch_id']=$idbatch;
            $usulan['pelatihan_id']=$batch->pelatihan_id;
            $usulan['instruktur_id']=$instruktur_id;
            $usulan['usulan']=$vv;
        }

        Quisionerdata::insert($simpan);
        $save=Quisionerdata::create($usulan);
        return response()->json([$save]);
    }

    function hasil_quisioner($instruktur_id,$batch_id)
    {
        $instruktur=BatchIntruktur::where('instruktur_id',$instruktur_id)->where('batch_pelatihan_id',$batch_id)->with('instruktur')->first();
        $pelatihan=Batchpelatihan::find($batch_id);
        $quisioner=Masterquesioner::where('flag',1)->orderBy('kategori','desc')->get();
        $skedul=Skedulpelatihandetail::where('batch_id',$batch_id)->where('instruktur_id',$instruktur_id)->with('instruktur')->with('pegawai')->with('materi')->with('skedul')->get();
        $nilai=array();
        $q_data=Quisionerdata::where('batch_id',$batch_id)->where('instruktur_id',$instruktur_id)->get();
        $q_d=array();
        foreach($q_data as $k => $v)
        {
            if($v->nilai=='BS')
                $nilai[$v->quisioner_id][$v->nilai]=4;
            elseif($v->nilai=='B')
                $nilai[$v->quisioner_id][$v->nilai]=3;
            elseif($v->nilai=='C')
                $nilai[$v->quisioner_id][$v->nilai]=2;
            elseif($v->nilai=='K')
                $nilai[$v->quisioner_id][$v->nilai]=1;
        }
        return view('pages.jadwal.batch.quisioner-grafik')
                ->with('instruktur_id',$instruktur_id)
                ->with('batch_id',$batch_id)
                ->with('instruktur',$instruktur)
                ->with('pelatihan',$pelatihan)
                ->with('n',$nilai)
                ->with('skedul',$skedul)
                ->with('quisioner',$quisioner);
    }

    public function simpan_nilai_test(Request $request,$idpeserta,$idbatch)
    {
        $pelatihan=Batchpelatihan::find($idbatch);
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        Nilaites::where('batch_id',$idbatch)->forceDelete();
        // foreach($n as $it)
        // {
        //     DB::table("nilaites")->forceDelete($it->id);
        // }

        foreach($request->nilai_pre_test as $k=>$v)
        {
            $participant_id=$k;
            $nilai_pre=$v;
            
            $n=new Nilaites;
            $n->peserta_id=$participant_id;
            $n->pelatihan_id=$pelatihan->pelatihan_id;
            $n->jenis_tes='pre';
            $n->batch_id=$idbatch;
            $n->nilai=$v;
            $n->created_at=date('Y-m-d H:i:s');
            $n->updated_at=date('Y-m-d H:i:s');
            $n->save();
        }
        foreach($request->nilai_post_test as $k=>$v)
        {
            $participant_id=$k;
            $nilai_pre=$v;
            
            $n=new Nilaites;
            $n->peserta_id=$participant_id;
            $n->pelatihan_id=$pelatihan->pelatihan_id;
            $n->jenis_tes='post';
            $n->batch_id=$idbatch;
            $n->nilai=$v;
            $n->created_at=date('Y-m-d H:i:s');
            $n->updated_at=date('Y-m-d H:i:s');
            $n->save();
        }
        return response()->json(['done']);
    }

    public function simpan_nomor_sertifikat(Request $request)
    {
        $batch_id=$request->batch_id;
        $nomor=$request->nomor_sertifikat;
        $cek=NomorSertifikat::where('batch_id',$batch_id)->get();

        $dir=Direktur::where('flag',1)->first();
        if($cek->count()!=0)
        {
            $ck=$cek->first();
            $ck->nomor_sertifikat=$nomor;
            $ck->save();
        }
        else
        {
            $ck=new NomorSertifikat;
            $ck->nomor_sertifikat=$nomor;
            $ck->batch_id=$batch_id;
            $ck->direktur_id=$dir->id;
            $ck->save();
        }
        return redirect('batch-detail/'.$batch_id.'/sertifikat')->with('status','Nomor Sertifikat Berhasil Di Simpan');
    }
}
