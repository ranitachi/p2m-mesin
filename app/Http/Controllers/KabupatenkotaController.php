<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Provinsi;
use App\Model\Kabupatenkota;
class KabupatenkotaController extends Controller
{
    public function index()
    {  
        $prop=Provinsi::all();
        return view('pages.wilayah.kota.index')->with('prop',$prop);
    }
    public function data($idprop)
    {
        if($idprop==-1)
            $kota=Kabupatenkota::orderBy('provinsi_id')->get();
        else
            $kota=Kabupatenkota::where('provinsi_id','=',$idprop)->orderBy('provinsi_id')->get();

        return view('pages.wilayah.kota.data')
                ->with('kota',$kota);

    }
    public function show($id)
    {
        $det=array();
        $prop=Provinsi::all();
        if($id!=-1)
        {
            $det=Kabupatenkota::find($id);
        }
        return view('pages.wilayah.kota.form')
            ->with('det',$det)
            ->with('prop',$prop)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        
        $create = Kabupatenkota::create($data);
        return response()->json([$create]);
        // return redirect('provinsi')->with('status','Data Quisioner Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        
        $update = Kabupatenkota::find($id)->update($data);
        return response()->json([$update]);
        // return redirect('provinsi')->with('status','Data Quisioner Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Kabupatenkota::find($id)->delete();
        return response()->json(['done']);
        // return redirect('provinsi')->with('status','Data Quisioner Berhasil di Hapus');
    }
    public function kabupatenkota($id)
    {
        if($id==-1)
        {
            $kota=Kabupatenkota::with('provinsi')->get();
        }
        else
        {
            $kota=Kabupatenkota::where('id','=',$id)->with('provinsi')->get();
        }
        return view('pages.wilayah.kabupatenkota')->with('kota',$kota);
    }
    public function byprovinsi($idprop)
    {
        $kota=Kabupatenkota::where('provinsi_id','=',$idprop)->with('provinsi')->get();
        return view('pages.wilayah.kabupatenkota')->with('kota',$kota);
    }
}
