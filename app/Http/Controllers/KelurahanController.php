<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Provinsi;
use App\Model\Kecamatan;
use App\Model\Kabupatenkota;
use App\Model\Kelurahan;
class KelurahanController extends Controller
{
    public function index()
    {  
        $prop=Provinsi::all();
        return view('pages.wilayah.kelurahan.index')->with('prop',$prop);
    }
    public function data($idkec)
    {
        $kel=Kelurahan::where('kecamatan_id','=',$idkec)->orderBy('kecamatan_id')->get();
        $kec=Kecamatan::where('id','=',$idkec)->orderBy('kabupatenkota_id')->get()->first();
        $kota=Kabupatenkota::where('id','=',$kec->kabupatenkota_id)->with('provinsi')->get()->first();
        return view('pages.wilayah.kelurahan.data')
                ->with('kel',$kel)
                ->with('kota',$kota)
                ->with('idkec',$idkec)
                ->with('kec',$kec);

    }
    public function show($idkec,$idkota,$idprop,$id)
    {
        $det=array();
        $kota=Kabupatenkota::where('id','=',$idkota)->with('provinsi')->get()->first();
        $kec=Kecamatan::where('id','=',$idkec)->with('kabupatenkota')->get()->first();
        if($id!=-1)
        {
            $det=Kelurahan::where('id','=',$id)->with('kecamatan')->get()->first();
        }
        return view('pages.wilayah.kelurahan.form')
            ->with('det',$det)
            ->with('kota',$kota)
            ->with('kec',$kec)
            ->with('idkec',$idkec)
            ->with('idkota',$idkota)
            ->with('idprop',$idprop)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        
        $create = Kelurahan::create($data);
        return response()->json([$create]);
        // return redirect('provinsi')->with('status','Data Quisioner Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        
        $update = Kelurahan::find($id)->update($data);
        return response()->json([$update]);
        // return redirect('provinsi')->with('status','Data Quisioner Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Kelurahan::find($id)->delete();
        return response()->json(['done']);
        // return redirect('provinsi')->with('status','Data Quisioner Berhasil di Hapus');
    }
    public function bykecamatan($idkec)
    {
        $kel=Kelurahan::where('kecamatan_id','=',$idkec)->with('kecamatan')->get();
        return view('pages.wilayah.kelurahan')->with('kelurahan',$kel);
    }
}
