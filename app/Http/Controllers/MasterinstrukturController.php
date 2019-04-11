<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterinstruktur;
use App\Model\Batchpelatihan;
use App\Model\BatchIntruktur;
use App\Model\Masterpelatihan;
class MasterinstrukturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $instruktur=Masterinstruktur::orderBy('nama')->get();
        return view('pages.instruktur.index')
            ->with('instruktur',$instruktur);
    }
    public function show($id)
    {
        $det=array();
        $agama=array('Islam','Katolik','Protestan','Budha','Hindu','Konghucu','Lainnya');
        if($id!=-1)
        {
            $det=Masterinstruktur::find($id);
        }
        return view('pages.instruktur.form')
            ->with('det',$det)
            ->with('agama',$agama)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        if($data['tanggal_lahir']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['tanggal_lahir']);
            $data['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        }
        
        $create = Masterinstruktur::create($data);
        return redirect('instruktur')->with('status','Data Instruktur Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        if($data['tanggal_lahir']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['tanggal_lahir']);
            $data['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        }
        
        $update = Masterinstruktur::find($id)->update($data);
        return redirect('instruktur')->with('status','Data Instruktur Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Masterinstruktur::find($id)->delete();
        return redirect('instruktur')->with('status','Data Instruktur Berhasil di Hapus');
    }

    public function riwayat_pelatihan($id)
    {
        $instruktur=Masterinstruktur::find($id);
        $participant=BatchIntruktur::where('instruktur_id',$id)->pluck('batch_pelatihan_id');
        $batchpelatihan=Batchpelatihan::whereIn('id',$participant)->get();
        $batch=$batch_id=$batch_pelatihan_id=array();
        foreach($batchpelatihan as $item)
        {
            $batch[$item->pelatihan_id]=$item;
            $batch_id[]=$item->pelatihan_id;
            $batch_pelatihan_id[]=$item->id;
        }
        $pelatihan=Masterpelatihan::whereIn('id',$batch_id)->get();
        // return $batchpelatihan;
        return view('pages.instruktur.riwayat')
            ->with('pelatihan',$pelatihan)
            ->with('instruktur',$instruktur)
            ->with('batch',$batch);
    }
}
