<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterpeserta;
use App\Model\Masterperusahaan;
use App\Model\Provinsi;
use App\Model\Kabupatenkota;
use App\Model\Kecamatan;
use App\Model\Kelurahan;
class MasterpesertaController extends Controller
{
     public function index()
    {
        $peserta=Masterpeserta::orderBy('nama_lengkap')->get();
        return view('pages.peserta.index')
            ->with('peserta',$peserta);
    }
    public function show($id)
    {
        $det=array();
        $agama=array('Islam','Katolik','Protestan','Budha','Hindu','Konghucu','Lainnya');
        $perusahaan=Masterperusahaan::all();
        $prop=Provinsi::all();
        $kota=array();
        $kec=array();
        $kel=array();
        if($id!=-1)
        {
            $det=Masterpeserta::find($id);
            $prop=Provinsi::all();
            $kota=Kabupatenkota::where('provinsi_id','=',$det->provinsi)->get();
            $kec=Kecamatan::where('kabupatenkota_id','=',$det->kabupaten_kota)->get();
            $kel=Kelurahan::where('kecamatan_id','=',$det->kecamatan)->get();
        }
        return view('pages.peserta.form')
            ->with('det',$det)
            ->with('agama',$agama)
            ->with('perusahaan',$perusahaan)
            ->with('prop',$prop)
            ->with('kota',$kota)
            ->with('kec',$kec)
            ->with('kel',$kel)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        // if($data['tanggal_lahir']!='')
        // {
        //     list($tg,$bl,$th)=explode('/',$data['tanggal_lahir']);
        //     $data['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        // }
        
        // $create = Masterpeserta::create($data);
        // return redirect('peserta')->with('status','Data Peserta Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        if($data['tanggal_lahir']!='')
        {
            list($tg,$bl,$th)=explode('/',$data['tanggal_lahir']);
            $data['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        }
        
        $update = Masterpeserta::find($id)->update($data);
        return redirect('peserta')->with('status','Data Peserta Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Masterpeserta::find($id)->delete();
        return redirect('peserta')->with('status','Data Peserta Berhasil di Hapus');
    }

    public function byperusahaan($idper)
    {
        $det=Masterperusahaan::find($idper);
        return view('pages.peserta.by-perusahaan')
            ->with('id',$idper)
            ->with('det',$det);
    }
}
