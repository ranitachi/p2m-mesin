<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterpeserta;
use App\Model\Masterpesertadata;
use App\Model\BatchParticipant;
use App\Model\BatchIntruktur;
use App\Model\Batchpelatihan;
use App\Model\Masterperusahaan;
use App\Model\Masterpelatihan;
use App\Model\Provinsi;
use App\Model\Kabupatenkota;
use App\Model\Kecamatan;
use App\Model\Kelurahan;
use Excel;
class MasterpesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        $peserta=Masterpeserta::orderBy('kode')->get();
        return view('pages.peserta.index')
            ->with('peserta',$peserta);
    }
    public function show($id)
    {
        $det=$data=array();
        $kd=Masterpeserta::max('kode');
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
        $kode=date('Ymd').$kdd;
        $agama=array('Islam','Katolik','Protestan','Budha','Hindu','Konghucu','Lainnya');
        $perusahaan=Masterperusahaan::all();
        $prop=Provinsi::all();
        $kota=array();
        $kec=array();
        $kel=array();
        if($id!=-1)
        {
            $det=Masterpeserta::where('id','=',$id)->with('perusahaan')->get()->first();
            $data=Masterpesertadata::where('peserta_id','=',$id)->get();
            $prop=Provinsi::all();
            $kota=Kabupatenkota::where('provinsi_id','=',$det->provinsi)->get();
            $kec=Kecamatan::where('kabupatenkota_id','=',$det->kabupaten_kota)->get();
            $kel=Kelurahan::where('kecamatan_id','=',$det->kecamatan)->get();
            $kode=$det->kode;
        }
        return view('pages.peserta.form')
            ->with('det',$det)
            ->with('kode',$kode)
            ->with('data',$data)
            ->with('agama',$agama)
            ->with('perusahaan',$perusahaan)
            ->with('prop',$prop)
            ->with('kota',$kota)
            ->with('kec',$kec)
            ->with('kel',$kel)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        
        foreach($data as $k => $v)
        {
            $tbl=strtok($k,'_');
            $kolom=str_replace($tbl.'_','',$k);
            if($tbl=='peserta')
            {
                $peserta[$kolom]=$v;
            }
            else if($tbl=='data')
            {
                $pesertadata[$kolom]=$v;
            }
            else if($tbl=='perusahaan')
            {
                $perusahaan[$kolom]=$v;
            }
        }
        $peserta['flag']=1;
        if($peserta['tanggal_lahir']!='')
        {
            list($tg,$bl,$th)=explode('/',$peserta['tanggal_lahir']);
            $peserta['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        }
        // echo '<pre>';
        // print_r($peserta);
        // print_r($pesertadata);
        // print_r($perusahaan);
        // echo '</pre>';
        $create = Masterpeserta::create($peserta);
        $peserta_id=$create->id;
        foreach ($pesertadata as $key => $value) {
            foreach($value as $k => $v)
            {
                $pdata=new Masterpesertadata;
                $pdata->peserta_id=$peserta_id;
                $pdata->pendidikan_terakhir=str_replace("'","",$k);
                $pdata->gelar_pendidikan=$v;
                $pdata->created_at=date('Y-m-d H:i:s');
                $pdata->updated_at=date('Y-m-d H:i:s');
                $pdata->save();
            }
        }
        if(isset($request->peserta_perusahaan_id))
        {
            if($request->peserta_perusahaan_id!=-2)
            {

                $pers=Masterperusahaan::find($request->peserta_perusahaan_id);
                if($pers->count()!=0)
                {
                    $pers->update($perusahaan);
                }
            }
        }
        return redirect('peserta')->with('status','Data Peserta Baru Berhasil di Simpan');
    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
        
        foreach($data as $k => $v)
        {
            $tbl=strtok($k,'_');
            $kolom=str_replace($tbl.'_','',$k);
            if($tbl=='peserta')
            {
                $peserta[$kolom]=$v;
            }
            else if($tbl=='data')
            {
                $pesertadata[$kolom]=$v;
            }
            else if($tbl=='perusahaan')
            {
                $perusahaan[$kolom]=$v;
            }
        }
        $peserta['flag']=1;
        if($peserta['tanggal_lahir']!='')
        {
            list($tg,$bl,$th)=explode('/',$peserta['tanggal_lahir']);
            $peserta['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        }
        // echo '<pre>';
        // print_r($peserta);
        // print_r($pesertadata);
        // print_r($perusahaan);
        // echo '</pre>';
        $update = Masterpeserta::find($id)->update($peserta);
        Masterpesertadata::where('peserta_id','=',$id)->forceDelete();
        foreach ($pesertadata as $key => $value) {
            foreach($value as $k => $v)
            {
                $pdata=new Masterpesertadata;
                $pdata->peserta_id=$id;
                $pdata->pendidikan_terakhir=str_replace("'","",$k);
                $pdata->gelar_pendidikan=$v;
                $pdata->created_at=date('Y-m-d H:i:s');
                $pdata->updated_at=date('Y-m-d H:i:s');
                $pdata->save();
            }
        }
        if(isset($request->peserta_perusahaan_id))
        {
            if($request->peserta_perusahaan_id!=-2)
            {
                $pers=Masterperusahaan::find($request->peserta_perusahaan_id)->update($perusahaan);
            }
        }
        // return redirect('peserta')->with('status','Data Peserta Baru Berhasil di Simpan');
        return redirect('peserta')->with('status','Data Peserta Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Masterpeserta::find($id)->delete();
        return redirect('peserta')->with('status','Data Peserta Berhasil di Hapus');
    }

    public function byperusahaan($idper)
    {
        $det=Masterperusahaan::find($idper);
        return view('pages.peserta.by-perusahaan')
            ->with('id',$idper)
            ->with('det',$det);
    }

    public function foto($id)
    {
        $pes=Masterpeserta::find($id);
        return view('pages.peserta.foto')
            ->with('id',$id)
            ->with('det',$pes);
    }
    public function fotosimpan(Request $request)
    {

        $id=$request->id;
        $pes=Masterpeserta::find($id);
        $encoded_data = $request->mydata;
        $binary_data = base64_decode( $encoded_data );

        $name=str_slug($pes->nama_lengkap,'-').'.jpg';
        $path = public_path('files/foto');
        $result = file_put_contents( $path.'/'.$name, $binary_data );
        if (!$result) 
            die("Could not save image!  Check file permissions.");
        else
        {
            $pes->foto=url('/').'/files/foto/'.$name;
            $pes->save();
        }
        
        // echo '<pre>';
        // print_r($request->all());
        // print_r($name);
        // echo '</pre>';
        return redirect('peserta')->with('status','Foto Peserta Berhasil di Simpan');
    }

    public function import()
    {
        // $perusahaan=Masterperusahaan::with('provinsi')->with('kabupatenkota')->with('kecamatan')->with('kelurahan')->orderBy('kode')->get();
        return view('pages.peserta.import');
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
            $kd=Masterpeserta::max('kode');
            if(is_null($kd))
            {
                $kdb=1;
            }
            else
            {
                $kdb=((int)substr($kd,-4) + 1);
                // $kdd=$kdb;
                // $kdd=$kdb;
            }
            
            // dd($results);
            $n=1;
			foreach($results as $k=>$v)
			{
                // $kdb=((int)substr($kd,-4) + 1);
                if($kdb<10)
                    $kdd='000'.$kdb;
                elseif($kdb>=10 && $kdb<100)
                    $kdd='00'.$kdb;
                elseif($kdb>=100 && $kdb<1000)
                    $kdd='0'.$kdb;
                else
                    $kdd=$kdb;

                $bln=($v->bulan==null ? date('n') : getBulanReverseFull($v->bulan));
                $thn=($v->tahun==null ? date('Y') : $v->tahun);

                $bln = ($bln<10 ? '0'.$bln : $bln);

                $kode=$thn.$bln.date('d').$kdd;

                $peserta=new Masterpeserta;
                $peserta->kode=$kode;
                $peserta->nama_lengkap=$v->nama_peserta;
                $peserta->email=$v->email;
                $peserta->telp=$v->telp_peserta;
                $peserta->hp=$v->hp;
                $peserta->flag=1;
                $peserta->created_at=date('Y-m-d');
                $peserta->updated_at=date('Y-m-d');
                $peserta->save();

                $n++;
                $kdb++;
            }
        });
        return redirect('peserta')->with('status','Import Data Peserta Berhasil');
    }

    public function format_excel()
	{
		$file= public_path(). "/files/form-peserta.xlsx";
		$headers = array(
	       'Content-Type: application/excel',
	    );
	    return response()->download($file, 'form-peserta.xlsx', $headers);
    }

    public function riwayat_pelatihan($id)
    {
        $peserta=Masterpeserta::find($id);
        $participant=BatchParticipant::where('participant_id',$id)->pluck('batch_id');
        $batchpelatihan=Batchpelatihan::whereIn('id',$participant)->get();
        $batch=$batch_id=$batch_pelatihan_id=array();
        foreach($batchpelatihan as $item)
        {
            $batch[$item->pelatihan_id]=$item;
            $batch_id[]=$item->pelatihan_id;
            $batch_pelatihan_id[]=$item->id;
        }
        $pelatihan=Masterpelatihan::whereIn('id',$batch_id)->get();
        $instruktur=BatchIntruktur::whereIn('batch_pelatihan_id',$batch_pelatihan_id)->with('instruktur')->get();
        // return $pelatihan;
        // return $instruktur;
        return view('pages.peserta.riwayat')
            ->with('pelatihan',$pelatihan)
            ->with('instruktur',$instruktur)
            ->with('batch',$batch)
            ->with('peserta',$peserta);
    }
}
