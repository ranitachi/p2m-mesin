<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Provinsi;
class ProvinsiController extends Controller
{

    public function index()
    {  
        return view('pages.wilayah.provinsi.index');
    }
    public function data()
    {
        $provinsi=Provinsi::orderBy('name')->get();
        return view('pages.wilayah.provinsi.data')
                ->with('provinsi',$provinsi);

    }
    public function show($id)
    {
        $det=array();
        if($id!=-1)
        {
            $det=Provinsi::find($id);
        }
        return view('pages.wilayah.provinsi.form')
            ->with('det',$det)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        
        $create = Provinsi::create($data);
        return response()->json([$create]);
        // return redirect('provinsi')->with('status','Data Quisioner Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        
        $update = Provinsi::find($id)->update($data);
        return response()->json([$update]);
        // return redirect('provinsi')->with('status','Data Quisioner Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Provinsi::find($id)->delete();
        return response()->json(['done']);
        // return redirect('provinsi')->with('status','Data Quisioner Berhasil di Hapus');
    }

        
    public function provinsi($id)
    {
        if($id==-1)
        {
            $prop=Provinsi::all();
        }
        else
        {
            $prop=Provinsi::find($id);
        }
        return view('pages.wilayah.provinsi')->with('prop',$prop);
    }
}
