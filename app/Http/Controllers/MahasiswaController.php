<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nim' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'nama_mahasiswa' => 'required',
            'alamat' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('mahasiswa', 'public');
            $validate['image'] = $path;
        }

        Mahasiswa::create($validate);

        return redirect()->route('mahasiswa.index')
            ->with('Berhasil', 'Data Mahasiswa berhasil ditambahkan!');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'nama_mahasiswa' => 'required',
            'alamat' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($mahasiswa->image && Storage::exists('public/' . $mahasiswa->image)) {
                Storage::delete('public/' . $mahasiswa->image);
            }
            $path = $request->file('image')->store('mahasiswa', 'public');
            $request->merge(['image' => $path]);
        }

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('Berhasil', 'Data Mahasiswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($mahasiswa->image && Storage::exists('public/' . $mahasiswa->image)) {
            Storage::delete('public/' . $mahasiswa->image);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('Berhasil', 'Data Mahasiswa berhasil dihapus');
    }
}