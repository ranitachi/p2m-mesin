<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterpelatihan;
use App\Model\Masterkategoripelatihan;
class MasterpelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {  
        $kategori=Masterkategoripelatihan::all();
        return view('pages.pelatihan.index')->with('kategori',$kategori);
    }
    public function data($idkat)
    {
        if($idkat!=-1)
            $pelatihan=Masterpelatihan::where('flag','=','1')->where('kategori_id','=',$idkat)->with('kategori')->orderBy('kode','asc')->get();
        else
            $pelatihan=Masterpelatihan::where('flag','=','1')->with('kategori')->orderBy('kategori_id','asc')->orderBy('kode','asc')->get();
        
        return view('pages.pelatihan.data')
                ->with('idkat',$idkat)
                ->with('pelatihan',$pelatihan);

    }
    public function show($idkat,$id)
    {
        $det=array();
        if($idkat==-1)
            $kategori=Masterkategoripelatihan::orderBy('kategori_id','asc')->orderBy('kode','asc')->get();
        else
            $kategori=Masterkategoripelatihan::where('id','=',$idkat)->orderBy('kode','asc')->get();

        if($id!=-1)
        {
            $det=Masterpelatihan::where('id','=',$id)->with('kategori')->get()->first();
        }
        return view('pages.pelatihan.form')
            ->with('det',$det)
            ->with('kategori',$kategori)
            ->with('idkat',$idkat)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $data['biaya_pelatihan']=str_replace(',','',$request->biaya_pelatihan);
        $create = Masterpelatihan::create($data);
        // return response()->json([$create]);
        return redirect('pelatihan')->with('status','Data Pelatihan Baru Berhasil di Simpan')->with('idkat',$request->kategori_id);


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        $data['biaya_pelatihan']=str_replace(',','',$request->biaya_pelatihan);
        $update = Masterpelatihan::find($id)->update($data);
        // return response()->json([$update]);
        return redirect('pelatihan')->with('status','Data Pelatihan Berhasil di Edit')->with('idkat',$request->kategori_id);

    }

    public function destroy($id)
    {
        $peg=Masterpelatihan::find($id)->delete();
        return response()->json(['done']);
        // return redirect('pelatihan')->with('status','Data Pelatihan Berhasil di Hapus');
    }
}
