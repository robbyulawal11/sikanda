<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Katalog Produk";
        $path = $request->path();
        $path = explode("/", $path);
        $catalog = Catalog::all();
        return view('dashboard.pages.Catalog.show', ['catalog' => $catalog], compact('path', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = "Tambah Produk";
        $parts = $request->path();
        $path = explode("/", $parts);
        return view('dashboard.pages.Catalog.create', compact('path', 'title'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'seller' => 'required',
            'harga' => 'numeric|required',
            'deskripsi' => 'nullable|string',
            'wa' => 'required',
            'ig' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $filename = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/catalogs'), $filename);
            $data['image'] = $filename;
        }

        Catalog::create($data);

        return redirect('admin/catalog');
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
    public function edit(Request $request, Catalog $catalog)
    {
        $title = "Edit Produk";
        $parts = $request->path();
        $path = explode("/", $parts);

        return view('dashboard.pages.Catalog.edit', ['catalog' => $catalog], compact('path', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog)
    {
        $data = $request->validate([
            'nama' => 'required',
            'seller' => 'required',
            'harga' => 'numeric|required',
            'deskripsi' => 'nullable|string',
            'wa' => 'nullable|string',
            'ig' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            //menghapus gambar lama
            $imagePath = public_path('images/catalogs/' . $catalog->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            //menyimpan gambar baru
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/catalogs/'), $fileName);
            $data['image'] = $fileName;
        }

        //mengupdate data
        $catalog->update($data);

        return redirect('admin/catalog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        $imagePath = public_path('images/catalogs/' . $catalog->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        //menhapus data
        $catalog->delete();

        return redirect('admin/catalog');
    }
}
