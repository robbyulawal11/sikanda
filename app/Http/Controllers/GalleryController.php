<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
// use App\Models\Category;

class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Galeri Produk";
        $path = $request->path();
        $path = explode("/", $path);

        $user = Auth::user(); // Get the authenticated user
        // Check user role and fetch galeri accordingly
        if ($user->role == 'admin') {
            $data = Gallery::orderBy('updated_at', 'desc')->paginate(10);
        } elseif ($user->role == 'Penjual') {
            $data = Gallery::where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(10); // Fetch articles created by the penjual
        } else {
            $data = collect(); // Empty collection for 'Copywriter' role
        }

        // dd($data);
        return view('dashboard/pages/GalleryManagement/show', compact('data', 'path', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = "Tambah Galeri";
        $path = $request->path();
        $path = explode("/", $path);
        // $kategori = Category::all();
        return view('dashboard/pages/GalleryManagement/create', compact('path', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gallery = new Gallery;

        $validator = $request->validate([
            'gambar' => 'required',
            'deskripsi' => 'required',
            'author' => 'nullable',
            'user_id' => 'nullable'
        ]);

        if ($request->hasFile('gambar')) {
            $filename = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images/galeries'), $filename);
            $validator['gambar'] = $filename;
        }

        Gallery::create($validator);
        return redirect('admin/gallery')->with('success', 'Data galeri berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function paginateGalleries(Request $request)
    {
        // Fetch the latest 5 articles sorted by ID in descending order
        $path = $request->path();
        $path = explode("/", $path);
        $gallery = Gallery::all();

        $paginateGalleries = Gallery::orderBy('updated_at', 'desc')->paginate(10); // Fetch 10 articles per page

        // Pass the articles to the view
        return view('landing-page.pages.Gallery.galleries', [
            'paginateGalleries' => $paginateGalleries,
            'path' => $path
        ]);
    }

    public function show(string $id)
    {
        $showGallery = Gallery::findOrFail($id); // Fetch article by ID

        return view('landing-page.pages.Gallery.show', compact('showGallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $title = "Edit Galeri";
        $path = $request->path();
        $path = explode("/", $path);
        $gallery = Gallery::find($id);
        return view('dashboard.pages.galleryManagement.edit', compact('gallery', 'path', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::find($id);

        $validator = $request->validate([
            'gambar' => 'nullable',
            'deskripsi' => 'required',
            'author' => 'nullable',
            'user_id' => 'nullable'
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
        return redirect('admin/gallery')->with('success', 'Data galeri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);
        $imagePath = public_path('images/galeries/' . $gallery->gambar);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        Gallery::destroy($id);
        return redirect('admin/gallery')->with('success', 'Data galeri berhasil dihapus');
    }
}
