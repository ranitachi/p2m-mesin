<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Materi;
use App\Model\Masterkategoripelatihan;
use App\Model\Masterpelatihan;
class MateriController extends Controller
{
    public function getmateri($id)
    {
        $materi=Materi::find($id);
        echo '<input type="text" name="detail__materi" id="materi" class="form-control" value="'.$materi->materi.'" placeholder="Keterangan Materi">';
    }
    
    public function index()
    {  
        $pelatihan=Masterpelatihan::all();
        return view('pages.pelatihan.materi.index')
                ->with('pelatihan',$pelatihan);
    }
    public function data($idpel)
    {
        $materi=Materi::where('pelatihan_id',$idpel)->with('pelatihan')->orderBy('pelatihan_id','materi')->get();
        return view('pages.pelatihan.materi.data')
                ->with('idpel',$idpel)
                ->with('materi',$materi);

    }
    public function show($idpel,$id)
    {
        $det=array();
        $pelatihan=Masterpelatihan::all();
        if($id!=-1)
        {
            $det=Materi::find($id);
        }
        return view('pages.pelatihan.materi.form')
            ->with('det',$det)
            ->with('idpel',$idpel)
            ->with('id',$id)
            ->with('pelatihan',$pelatihan);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $create = Materi::create($data);
        // return response()->json([$create]);
        $idpel=$request->pelatihan_id;
        return redirect('materi')->with('status','Data Materi Baru Berhasil di Simpan')->with('idpel',$idpel);


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        $idpel=$request->pelatihan_id;
        $update = Materi::find($id)->update($data);
        // return response()->json([$update]);
        return redirect('materi')->with('status','Data Materi Berhasil di Edit')->with('idpel',$idpel);

    }

    public function destroy($id)
    {
        $peg=Materi::find($id)->delete();
        return response()->json(['done']);
        // return redirect('kategori')->with('status','Data Quisioner Berhasil di Hapus');
    }
}
