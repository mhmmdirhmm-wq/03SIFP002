<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\MimeTypes;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'list of mahasiswa',
            'data' => Mahasiswa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nim' =>'required|unique:mahasiswa,nim',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_mahasiswa' => 'required',
            'alamat' => 'required'
        ]);



        // upload file
        if ($request->hasFile('image')){
            $validate['image']=$request->file('image')->store('mahasiswa','public');
        }

        $mahasiswa = Mahasiswa::create($validate);

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa created',
            'data' => $mahasiswa,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if(!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $mahasiswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if(!$mahasiswa){
            return response()->json([
                'success' => false,
                'message' => 'Mahaiswa not found',
            ], 404);
        }

       $validate =$request->validate([
        'nim' => 'nullable|unique:mahasiswa,nim,' . $id,
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'nama_mahasiswa' => 'nullable',
        'alamat' => 'nullable',
       ]);

        //jika upload gambar baru
        if($request->hasFile('image')){
            //hapus gambar lama
            if ($mahasiswa->image){
                Storage::disk('public')->delete($mahasiswa->image);
            }
            $validate['image'] = $request->file('image')->store('mahasiswa','public'());
        }

        $mahasiswa->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa updated',
            'data' => $mahasiswa
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if(!$mahasiswa){
            return response()->json([
                'success' => false,
                'message' => 'Mahaiswa not found',
            ], 404);
        }
        if ($mahasiswa->image && Storage::disk('public')->exists($mahasiswa->image)){
            Storage::disk('public')->delete($mahasiswa->image);
        }


        $mahasiswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa deleted'
        ]);
    }
}
