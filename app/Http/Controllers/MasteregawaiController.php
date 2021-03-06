<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterpegawai;
class MasteregawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pegawai=Masterpegawai::orderBy('nama')->get();
        return view('pages.karyawan.index')
            ->with('pegawai',$pegawai);
    }
    public function show($id)
    {
        $det=array();
        $agama=array('Islam','Katolik','Protestan','Budha','Hindu','Konghucu','Lainnya');
        if($id!=-1)
        {
            $det=Masterpegawai::find($id);
        }
        return view('pages.karyawan.form')
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
        
        $create = Masterpegawai::create($data);
        return redirect('karyawan')->with('status','Data Karyawan Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        if($data['tanggal_lahir']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['tanggal_lahir']);
            $data['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        }
        
        $update = Masterpegawai::find($id)->update($data);
        return redirect('karyawan')->with('status','Data Karyawan Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Masterpegawai::find($id)->delete();
        return redirect('karyawan')->with('status','Data Karyawan Berhasil di Hapus');
    }
}
