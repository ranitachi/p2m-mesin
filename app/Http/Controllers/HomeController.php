<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masterpeserta;
use App\Model\Masterperusahaan;
use App\Model\Masterpelatihan;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pelatihan=Masterpelatihan::where('flag','=','1')->get();
        $peserta=Masterpeserta::all();
        $perusahaan=Masterperusahaan::all();
        $user=User::all();
        return view('utama')
            ->with('pelatihan',$pelatihan)
            ->with('peserta',$peserta)
            ->with('perusahaan',$perusahaan)
            ->with('user',$user);
    }
    public function utama()
    {
        $pelatihan=Masterpelatihan::where('flag','=','1')->get();
        $peserta=Masterpeserta::all();
        $perusahaan=Masterperusahaan::all();
        $user=User::all();
        return view('utama')
            ->with('pelatihan',$pelatihan)
            ->with('peserta',$peserta)
            ->with('perusahaan',$perusahaan)
            ->with('user',$user);
    }
}
