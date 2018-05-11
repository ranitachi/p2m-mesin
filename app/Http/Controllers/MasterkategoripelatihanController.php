<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterkategoripelatihan;
class MasterkategoripelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {  
        return view('pages.pelatihan.kategori.index');
    }
    public function data()
    {
        $kategori=Masterkategoripelatihan::orderBy('kategori')->get();
        return view('pages.pelatihan.kategori.data')
                ->with('kategori',$kategori);

    }
    public function show($id)
    {
        $det=array();
        if($id!=-1)
        {
            $det=Masterkategoripelatihan::find($id);
        }
        return view('pages.pelatihan.kategori.form')
            ->with('det',$det)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        
        $create = Masterkategoripelatihan::create($data);
        return response()->json([$create]);
        // return redirect('kategori')->with('status','Data Quisioner Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        
        $update = Masterkategoripelatihan::find($id)->update($data);
        return response()->json([$update]);
        // return redirect('kategori')->with('status','Data Quisioner Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Masterkategoripelatihan::find($id)->delete();
        return response()->json(['done']);
        // return redirect('kategori')->with('status','Data Quisioner Berhasil di Hapus');
    }

    public function detail($idkat)
    {
        return redirect('pelatihan')->with('idkat',$idkat);
    }
}
