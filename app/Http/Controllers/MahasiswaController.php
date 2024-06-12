<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ['nama' => 'shinta', 'foto' => 'Foto Sinta.jpeg'];
        $mahasiswa = Mahasiswa::get();
        return view('mahasiswa.index', compact(['data', 'mahasiswa']));
    }

    /**
     * Story a newly created resource in storage
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate(
            [
                'nim' => 'required|unique:mahasiswa|max:255',
                'nama' => '',
                'prodi_id' => '',
                'no_hp' => '',
                'alamat' => '',
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'Nim sudah ada',
                'nim.max' => 'Nim maksimal 255 karakter',
            ]
            );
            $validateData['foto'] = $validateData['nim'] . '.jpg';
            $validateData['password'] = Hash::make($validateData['nim']);
            Mahasiswa::create($validateData);
            return redirect('/mahasiswa');
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
        //
        $data = ['nama' => 'shinta', 'foto' => 'oto Sinta.jpeg'];
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact(['data', 'mahasiswa', 'prodi']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate(
            [
                'nim' => 'required|max::255',
                'nama' => '',
                'prodi_id' => '',
                'no_hp' => '',
                'alamat' => '',
            ],
            [
                'nim.required' => 'NIM harus diisi',
                'nim.max' => 'NIM maksimal 255 karakter',
            ]
            );
            $validateData['foto'] = $validateData['nim'] . '.jpg';
            $validateData['password'] = Hash::make($validateData['nim']);
            Mahasiswa::where('nim', $id)->update($validateData);
            return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}
