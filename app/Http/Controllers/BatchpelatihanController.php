<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Batchpelatihan;
use App\Model\BatchIntruktur;
use App\Model\Masterpelatihan;
use App\Model\Masterinstruktur;
use App\Model\Masterpegawai;
class BatchpelatihanController extends Controller
{
    public function index()
    {  
        
        return view('pages.jadwal.jadwal.index');
    }
    public function data()
    {
        $jadwal=Batchpelatihan::all();
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
        return view('pages.jadwal.batch.index')
            ->with('id',$id)
            ->with('jadwal',$jadwal)
            ->with('pelatihan',$pelatihan)
            ->with('jenis',$jenis);
    }
}
