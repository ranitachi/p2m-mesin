<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Users;
use App\Model\Direktur;
use App\Model\Masterpegawai;
use App\Model\Masterinstruktur;
use Auth;
class Usercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user=Users::orderBy('name')->with('pegawai')->with('instruktur')->with('direktur')->get();
        $hakakses=akses();
        return view('pages.user.index')
            ->with('hakakses',$hakakses)
            ->with('user',$user);
    }
    public function show($id)
    {
        $det=array();
        $pegawai=Masterpegawai::where('flag',1)->get();
        $instruktur=Masterinstruktur::all();
        $direktur=Direktur::where('flag',1)->get();
        if($id!=-1)
        {
            $det=Users::find($id);
        }
        
        return view('pages.user.form')
            ->with('det',$det)
            ->with('pegawai',$pegawai)
            ->with('instruktur',$instruktur)
            ->with('direktur',$direktur)
            ->with('id',$id);
    }
    public function editprofil($id)
    {
        $det=array();
        $pegawai=Masterpegawai::where('flag',1)->get();
        $instruktur=Masterinstruktur::all();
        $direktur=Direktur::where('flag',1)->get();
        if($id!=-1)
        {
            $det=Users::find($id);
        }
        
        return view('pages.user.editprofil')
            ->with('det',$det)
            ->with('pegawai',$pegawai)
            ->with('instruktur',$instruktur)
            ->with('direktur',$direktur)
            ->with('id',$id);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        // if($data['tanggal_lahir']!='')
        // {
        //     list($tg,$bl,$th)=explode('/',$data['tanggal_lahir']);
        //     $data['tanggal_lahir']=$th.'-'.$bl.'-'.$tg;
        // }
        // dd($data);
        $pegawai_id=$direktur_id=$instruktur_id=0;
        if($data['karyawan_id']!=0)
        {
            $level=2;
            $pegawai_id=$data['karyawan_id'];
        }
        elseif($data['direktur_id']!=0)
        {
            $level=1;
            $direktur_id=$data['direktur_id'];
        }
        elseif($data['instruktur_id']!=0)
        {
            $level=3;
            $instruktur_id=$data['instruktur_id'];
        }
        
        if($data['password']=='')
            $pass=$data['username'];
        else
            $pass=$data['password'];

        if(isset($data['akses']))
        {
            $akses=implode(',',$data['akses']);
        }
        else
            $akses='';

        $us=new Users;
        $us->name=$data['username'];
        $us->email=$data['username'];
        $us->password=bcrypt($pass);
        $us->level=$level;
        $us->hakakses=$akses;
        $us->pegawai_id=$pegawai_id;
        $us->direktur_id=$direktur_id;
        $us->instrtuktur_id	=$instruktur_id;
        $us->created_at=date('Y-m-d H:i:s');
        $us->updated_at=date('Y-m-d H:i:s');
        $us->save();
        // $create = Masterpegawai::create($data);
        return redirect('user')->with('status','Data User Baru Berhasil di Simpan');


    }
    public function update(Request $request,$id)
    {
        $data=$request->all();
       
        $pegawai_id=$direktur_id=$instruktur_id=0;
        if($data['karyawan_id']!=0)
        {
            $level=2;
            $pegawai_id=$data['karyawan_id'];
        }
        elseif($data['direktur_id']!=0)
        {
            $level=1;
            $direktur_id=$data['direktur_id'];
        }
        elseif($data['instruktur_id']!=0)
        {
            $level=3;
            $instruktur_id=$data['instruktur_id'];
        }
        
        $us=Users::find($id);

        if($data['password']=='')
            $pass=$us->password;
        else
            $pass=bcrypt($data['password']);

        if(isset($data['akses']))
        {
            $akses=implode(',',$data['akses']);
        }
        else
            $akses='';

        $us->name=$data['username'];
        $us->email=$data['username'];
        $us->password=$pass;
        $us->level=$level;
        $us->hakakses=$akses;
        $us->pegawai_id=$pegawai_id;
        $us->direktur_id=$direktur_id;
        $us->instrtuktur_id	=$instruktur_id;
        $us->updated_at=date('Y-m-d H:i:s');
        $us->save();

        // return redirect('user')->with('status','Data User Berhasil di Edit');
        return redirect()->back()->with('status','Data User Berhasil di Edit');

    }

    public function destroy($id)
    {
        $peg=Users::find($id)->delete();
        return redirect('user')->with('status','Data User Berhasil di Hapus');
    }

    public function resetpassword($id)
    {
        $newpass=substr(sha1(md5(rand())),0,5);
        $user=Users::find($id);
        $user->password=bcrypt($newpass);
        $user->save();
        return redirect('user')->with('status','Password Sudah Di Reset,<br>Password Baru : '.$newpass);
    }
    public function performLogout(Request $request) {
        Auth::logout();
        return redirect('login');
    }
}
