<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Provinsi;
use App\Model\Kecamatan;
use App\Model\Kabupatenkota;
class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {  
        $prop=Provinsi::all();
        return view('pages.wilayah.kecamatan.index')->with('prop',$prop);
    }
    public function data($idkota)
    {
        $kec=Kecamatan::where('kabupatenkota_id','=',$idkota)->orderBy('kabupatenkota_id')->get();
        $kota=Kabupatenkota::where('id','=',$idkota)->with('provinsi')->get()->first();
        return view('pages.wilayah.kecamatan.data')
                ->with('kota',$kota)
                ->with('idkota',$idkota)
                ->with('kec',$kec);

    }
    public function show($idkota,$idprop,$id)
    {
        $det=array();
        $kota=Kabupatenkota::where('id','=',$idkota)->with('provinsi')->get()->first();
        if($id!=-1)
        {
            $det=Kecamatan::where('id','=',$id)->with('kabupatenkota')->get()->first();
        }
        return view('pages.wilayah.kecamatan.form')
            ->with('det',$det)
            ->with('kota',$kota)
            ->with('idkota',$idkota)
            ->with('idprop',$idprop)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        
        $create = Kecamatan::create($data);
        return response()->json([$create]);
        // return redirect('provinsi')->with('status','Data Quisioner Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        
        $update = Kecamatan::find($id)->update($data);
        return response()->json([$update]);
        // return redirect('provinsi')->with('status','Data Quisioner Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Kecamatan::find($id)->delete();
        return response()->json(['done']);
        // return redirect('provinsi')->with('status','Data Quisioner Berhasil di Hapus');
    }
    public function bykota($idkota)
    {
        $kec=Kecamatan::where('kabupatenkota_id','=',$idkota)->with('kabupatenkota')->get();
        return view('pages.wilayah.kecamatan')->with('kecamatan',$kec);
    }
}
