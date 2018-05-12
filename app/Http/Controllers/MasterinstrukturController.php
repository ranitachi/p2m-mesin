<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterinstruktur;
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
}
