<?php

namespace App\Http\Controllers\Admin;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Console\View\Components\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::orderBy('nisn', 'desc')->get();
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        $spp = Spp::orderBy('tahun', 'asc')->get();
        return view('pages.admin.siswa.index', ['siswa' => $siswa, 'kelas' => $kelas, 'spp' => $spp]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->password = $request->password;
        $siswa->id_kelas = $request->kelas;
        $siswa->no_telp = $request->no_telp;
        $siswa->alamat = $request->alamat;
        $siswa->id_spp = $request->spp;
        $siswa = $siswa->save(); //  update  

        return redirect('/data-siswa');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('pages.admin.Siswa.siswa-edit', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'spp' => $spp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        $siswa->save(); //  update  
        return redirect('/data-siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('/data-siswa');
    }
    
}
