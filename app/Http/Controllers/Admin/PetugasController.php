<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::orderBy('name', 'asc')->get();
        return view('pages.admin.petugas.petugas', ['petugas' => $petugas]);
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
        $petugas = new User();
        $petugas->name = $request->nama;
        $petugas->username = $request->username;
        $petugas->level = $request->level;
        $petugas->email = $request->email;
        $petugas->password = $request->password;
        $petugas->save();
        return redirect('/data-petugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = User::find($id);
        return view('pages.admin.petugas.petugas-edit',[
            'petugas' => $petugas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::findOrFail($id);
        $petugas->update($request->all());
        $petugas->save(); //  update  
        return redirect('/data-petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();
        return redirect('/data-petugas');
    }
}
