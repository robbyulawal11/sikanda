<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galery;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Galeri Produk";
        $path = $request->path();
        $path = explode("/", $path);
        $data = Galery::all();
        // dd($data);
        return view('dashboard/pages/GaleryManagement/show', compact('data', 'path', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = "Tambah Galeri";
        $path = $request->path();
        $path = explode("/", $path);
        return view('dashboard/pages/GaleryManagement/create', compact('path', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $galery = new Galery;
        $validator = $request->validate([
            'gambar' => 'required',
            'deskripsi' => 'required',
            'author' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $filename = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images/galeries'), $filename);
            $validator['gambar'] = $filename;
        }


        Galery::create($validator);
        return redirect('galery')->with('success', 'Data berhasil diinput');
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
    public function edit(Request $request, string $id)
    {
        $title = "Edit Galeri";
        $path = $request->path();
        $path = explode("/", $path);
        $galery = Galery::find($id);
        return view('dashboard.pages.GaleryManagement.edit', compact('galery', 'path', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Galery::find($id);

        $validator = $request->validate([
            'gambar' => 'nullable',
            'deskripsi' => 'required',
            'author' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            //menghapus gambar lama
            $imagePath = public_path('images/galeries/' . $gallery->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            //menyimpan gambar baru
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images/galeries/'), $fileName);
            $validator['gambar'] = $fileName;
        }

        $gallery->update($validator);
        return redirect('galery')->with('success', 'Data berhasil diinput');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galery = Galery::find($id);
        $imagePath = public_path('images/galeries/' . $galery->gambar);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        Galery::destroy($id);
        return redirect('galery')->with('success', 'Data berhasil dihapus');
    }
}
