<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterperusahaan;
use App\Model\Provinsi;
use App\Model\Kabupatenkota;
use App\Model\Kecamatan;
use App\Model\Kelurahan;
use App\Model\Masterperusahaan as Perusahaan;
use Excel;
class MasterperusahaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $perusahaan=Masterperusahaan::with('provinsi')->with('kabupatenkota')->with('kecamatan')->with('kelurahan')->orderBy('kode')->get();
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

    public function cetak(Request $request)
    {
        // dd($request->perusahaan_id);
        $perusahaan=Masterperusahaan::all();
        $per=array();
        foreach($perusahaan as $k=>$v)
        {
            $per[$v->id]=$v;
        }
        if($request->perusahaan_id!='')
        {    
            $d=explode(',',$request->perusahaan_id);
            return view('pages.perusahaan.cetak-label',compact('d','per'));
        }
        else
            return redirect('perusahaan')->with('status','Anda Belum Memilih Perusahaan yang akan di cetak');
    }

    public function format_excel()
	{
		$file= public_path(). "/files/form-isian.xlsx";
		$headers = array(
	       'Content-Type: application/excel',
	    );
	    return response()->download($file, 'form-isian.xlsx', $headers);
    }
    public function import()
    {
        // $perusahaan=Masterperusahaan::with('provinsi')->with('kabupatenkota')->with('kecamatan')->with('kelurahan')->orderBy('kode')->get();
        return view('pages.perusahaan.import');
    }
    public function UploadFile(Request $request)
	{
		$file = $request->file('import');
		
		$read=$file->getRealPath();
		// echo $read;
		$results=array();
		// $vendor_id=$request->input('vendor_id');
		Excel::load($read, function($reader) {
			// use Request;
			$data=array();
			$i=0;
			
			// ->all() is a wrapper for ->get() and will work the same
			$results = $reader->all();
            $max=Perusahaan::count();
            // dd($results);
            $n=1;
			foreach($results as $k=>$v)
			{
                $maxid=$max+$n;
                if($maxid<10)
                    $id='P-0000'.$maxid;
                elseif($maxid>=10 && $maxid<100)
                    $id='P-000'.$maxid;
                elseif($maxid>=100 && $maxid<1000)
                    $id='P-00'.$maxid;
                elseif($maxid>=1000 && $maxid<10000)
                    $id='P-0'.$maxid;
                else
                    $id='P-'.$maxid;

                $prsh=new Perusahaan;
                $prsh->kode=$id;
                $prsh->nama_perusahaan=$v->nama_perusahaan;
                $prsh->pimpinan=$v->nama_pimpinan;
                $prsh->email=$v->email;
                $prsh->telp=$v->telp;
                $prsh->fax=$v->fax;
                $prsh->jenis_usaha=$v->jenis_usaha;
                $prsh->cp=$v->kontak_person_cp;
                $prsh->no_cp=$v->nomor_cp;
                $prsh->email_cp=$v->email_cp;
                $prsh->bagian_cp=$v->bagian_cp;
                $prsh->alamat=$v->alamat;
                $prsh->kode_pos=$v->kode_pos;
                $prsh->save();

                $n++;
            }
        });
        return redirect('perusahaan')->with('status','Import Data Perusahaan Berhasil');
    }
}
