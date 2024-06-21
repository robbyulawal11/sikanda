<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Kategori";
        $path = $request->path();
        $path = explode("/", $path);
        $data = Category::all();
        // dd($data);
        return view('dashboard/pages/Category/show', compact('data', 'title', 'path'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = "Edit Kategori";
        $path = $request->path();
        $path = explode("/", $path);
        return view('dashboard/pages/Category/create', compact('title', 'path'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'namaKategori' => 'required',
            'descKategori' => 'required'
        ]);

        Category::create($validator);
        return redirect('category')->with('success', 'Data berhasil diinput');
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
    public function edit(string $id, Request $request)
    {
        $title = "Edit Kategori";
        $path = $request->path();
        $path = explode("/", $path);
        $data = Category::find($id);
        return view('dashboard/pages/Category/edit', compact('data', 'title', 'path'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Category::find($id);

        $validator = $request->validate([
            'namaKategori' => 'required',
            'descKategori' => 'required'
        ]);

        $data->update($validator);
        return redirect('category')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect('category')->with('success', 'Data berhasil dihapus');
    }
}
