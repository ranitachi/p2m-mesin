<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterperusahaan;
use App\Model\Provinsi;
use App\Model\Kabupatenkota;
use App\Model\Kecamatan;
use App\Model\Kelurahan;
class MasterperusahaanController extends Controller
{
    public function index()
    {
        $perusahaan=Masterperusahaan::with('provinsi')->with('kabupatenkota')->with('kecamatan')->with('kelurahan')->orderBy('nama_perusahaan')->get();
        return view('pages.perusahaan.index')
            ->with('perusahaan',$perusahaan);
    }
    public function show($id)
    {
        $det=array();
         $kd=Masterperusahaan::max('kode');
        if(is_null($kd))
        {
            $kdd='0001';
        }
        else
        {
            $kdb=((int)substr($kd,-4) + 1);
            if($kdb<10)
                $kdd='000'.$kdb;
            elseif($kdb>=10 && $kdb<100)
                $kdd='00'.$kdb;
            elseif($kdb>=100 && $kdb<1000)
                $kdd='0'.$kdb;
            else
                $kdd=$kdb;
            // $kdd=$kdb;
        }
        $kode='P'.$kdd;

        $prop=Provinsi::all();
        $kota=array();
        $kec=array();
        $kel=array();
        if($id!=-1)
        {
            $det=Masterperusahaan::find($id);
            $prop=Provinsi::all();
            $kota=Kabupatenkota::where('provinsi_id','=',$det->provinsi)->get();
            $kec=Kecamatan::where('kabupatenkota_id','=',$det->kabupaten_kota)->get();
            $kel=Kelurahan::where('kecamatan_id','=',$det->kecamatan)->get();
            $kode=$det->kode;
        }
        return view('pages.perusahaan.form')
            ->with('det',$det)
            ->with('prop',$prop)
            ->with('kode',$kode)
            ->with('kota',$kota)
            ->with('kec',$kec)
            ->with('kel',$kel)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        
        $create = Masterperusahaan::create($data);
        $url=$request->url;
        return redirect($url)->with('status','Data Perusahaan Baru Berhasil di Simpan');
        // return redirect()->back();

    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        
        $update = Masterperusahaan::find($id)->update($data);
        return redirect('perusahaan')->with('status','Data Perusahaan Berhasil di Edit');

    }

    public function destroy($id)
    {
        $per=Masterperusahaan::find($id)->delete();
        return redirect('perusahaan')->with('status','Data Perusahaan Berhasil di Hapus');
    }
}
