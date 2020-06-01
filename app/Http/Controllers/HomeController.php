<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Homepage
     *
     * @return View
     */
    public function page()
    {
        return view('pages.home');
    }
    
    public function siswaHome()
    {
        $siswa = Siswa::find(Auth::guard('web-siswa')->user()->id);
        return view('pages.siswa.home', compact('siswa'));
    }
    
    public function datasiswa(Request $request)
    {
        $request->flash('status', 'Sukses menambah raport!');
        $siswas = Siswa::with('raports')->get();
        return view('pages.datasiswa', ['siswas' => $siswas]);
    }
    
    public function logout()
    {
        Auth::logout();
        Auth::guard('web-siswa')->logout();
        return redirect('/');
    }

    public function showSiswa($id)
    {
        $siswa = Siswa::find($id);
        return view('pages.show-siswa', ['siswa' => $siswa]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'raport' => 'required|file',
        ]);
        $filename = $request->file('raport')->getClientOriginalName();
        $path = $request->file('raport')->storeAs(
            'raports/'.$request->get('nis'), $filename, 'public'
        );

        $siswa = Siswa::whereNis($request->nis)->first();
        $created = $siswa->raports()->create([
            'file_name' => $filename,
            'file_location' => $path,
        ]);
        return redirect()->route('datasiswa')->with('status', 'Sukses menambah raport!');
    }

    public function download(Request $request)
    {
        return Storage::disk('public')->download($request->file_location);
    }
    
    public function tambahSiswa()
    {
        return view('pages.tambah-siswa');
    }
    
    public function tambahSiswaPost(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis|max:255',
            'name' => 'required',
            'password' => 'required',
        ]);
        $siswa = Siswa::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('datasiswa')->with('status', 'Sukses menambah data siswa!');
    }

    public function hapusSiswa()
    {
        return view('pages.hapus-siswa');
    }

    public function hapusSiswaConfirm(Request $request)
    {
        $siswa = Siswa::where('nis',$request->nis)->firstOrFail();
        return view('pages.hapus-siswa-confirm', ['siswa' => $siswa]);
    }
    
    public function hapusSiswaPost(Request $request)
    {
        // $request->validate([
        //     'nis' => 'required',
        // ]);
        $siswa = Siswa::where('nis',$request->nis)->delete();
        if($siswa > 0){
            return redirect()->route('datasiswa')->with('status', 'Sukses menghapus data siswa!');
        } else {
            return redirect()->back()->withErrors(['Gagal mengahapus data siswa!']);
        }
    }
    
}
