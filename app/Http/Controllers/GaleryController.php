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
        $galery->gambar = $validator["gambar"];
        $galery->deskripsi = $validator["deskripsi"];
        $galery->author = $validator["author"];
        $galery->save();
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
        $data = Galery::find($id);
        return view('dashboard.pages.GaleryManagement.edit', compact('data', 'path', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Galery::find($id);

        $validator = $request->validate([
            'gambar' => 'required',
            'deskripsi' => 'required',
            'author' => 'required'
        ]);

        $galery->gambar = $validator["gambar"];
        $galery->deskripsi = $validator["deskripsi"];
        $galery->author = $validator["author"];
        $galery->save();
        return redirect('galery')->with('success', 'Data berhasil diinput');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Galery::destroy($id);
        return redirect('galery')->with('success', 'Data berhasil dihapus');
    }
}
