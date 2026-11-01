<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan semua data mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan data mahasiswa
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'alamat' => 'nullable',
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('Berhasil', 'Data Mahasiswa berhasil ditambahkan!');
    }

    // Menampilkan detail mahasiswa
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Mengupdate data mahasiswa
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'alamat' => 'nullable',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('Berhasil', 'Data Mahasiswa berhasil diperbarui');
    }

    // Menghapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('Berhasil', 'Data Mahasiswa berhasil dihapus');
    }
}