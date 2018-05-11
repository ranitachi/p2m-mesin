<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Direktur;
class DirekturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $direktur=Direktur::orderBy('nama')->get();
        return view('pages.direktur.index')
            ->with('direktur',$direktur);
    }
    public function show($id)
    {
        $det=array();
        $agama=array('Islam','Katolik','Protestan','Budha','Hindu','Konghucu','Lainnya');
        if($id!=-1)
        {
            $det=Direktur::find($id);
        }
        return view('pages.direktur.form')
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
        
        $create = Direktur::create($data);
        return redirect('direktur')->with('status','Data Direktur Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        if($data['tanggal_lahir']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['tanggal_lahir']);
            $data['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        }
        
        $update = Direktur::find($id)->update($data);
        return redirect('direktur')->with('status','Data Direktur Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Direktur::find($id)->delete();
        return redirect('direktur')->with('status','Data Direktur Berhasil di Hapus');
    }
}
