<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterquesioner;
class MasterquesionerController extends Controller
{
    public function index()
    {
        $quisioner=Masterquesioner::orderBy('question')->get();
        return view('pages.quisioner.index')
            ->with('quisioner',$quisioner);
    }
    public function show($id)
    {
        $det=array();
        if($id!=-1)
        {
            $det=Masterquesioner::find($id);
        }
        return view('pages.quisioner.form')
            ->with('det',$det)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        
        $create = Masterquesioner::create($data);
        return redirect('quisioner')->with('status','Data Quisioner Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        
        $update = Masterquesioner::find($id)->update($data);
        return redirect('quisioner')->with('status','Data Quisioner Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Masterquesioner::find($id)->delete();
        return redirect('quisioner')->with('status','Data Quisioner Berhasil di Hapus');
    }
}
