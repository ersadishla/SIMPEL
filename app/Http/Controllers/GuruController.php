<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Siswa;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $data['guru'] = Guru::where('id',$request->session()->get('user'))->first();
    	return view('guru.dashboard', $data);
    }

    public function daftarSiswa(Request $request)
    {
        $data['guru'] = Guru::where('id',$request->session()->get('user'))->first();
        $data['siswa'] = Siswa::where('id_guru',$request->session()->get('user'))->get();
        $data['count'] = 1;
    	return view('guru.daftar_siswa', $data);
    }

    public function absensiSiswa(Request $request)
    {
        $data['guru'] = Guru::where('id',$request->session()->get('user'))->first();
        $data['siswa'] = Siswa::where('id_guru',$request->session()->get('user'))->get();
        $data['count'] = 0;
    	return view('guru.absensi', $data);
    }

    public function formLaporan(Request $request)
    {
        $data['guru'] = Guru::where('id',$request->session()->get('user'))->first();
    	return view('guru.form_laporan', $data);
    }

    public function daftarLaporan(Request $request)
    {
        $data['guru'] = Guru::where('id',$request->session()->get('user'))->first();
    	return view('guru.daftar_laporan', $data);
    }

    public function formNilai(Request $request)
    {
        $data['guru'] = Guru::where('id',$request->session()->get('user'))->first();
    	return view('guru.form_nilai', $data);
    }

    public function cekGuru(Request $request)
    {
        $tabelGuru = Guru::where('email',$request->input('login-email'))->first();
        if($tabelGuru!=null){
            $request->session()->put('user', $tabelGuru->id);
            return redirect('/guru');
        }else{
            return redirect()->back();
        }
    }
}
