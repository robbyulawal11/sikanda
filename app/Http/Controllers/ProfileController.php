<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Profil Sukabumi";
        $path = $request->path();
        $path = explode("/", $path);
        $data = Profile::all();
        // dd($data);
        return  view("dashboard/pages/ProfileManagement/show", compact('title', 'data', 'path'));
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
        //
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
        $title = "Profil Sukabumi";
        $path = $request->path();
        $path = explode("/", $path);
        $data = Profile::find($id);
        return view('dashboard.pages.ProfileManagement.edit', compact('data', 'path', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Profile::find($id);

        $validator = $request->validate([
            'gambarHero' => 'nullable|image|mimes:jpg|max:2048',
            'gambarAbout' => 'nullable',
            'gambarStrukturOrganisasi' => 'nullable',
            'videoYoutube' => 'nullable',
            'linkInstagram' => 'nullable',
            'linkFacebook' => 'nullable',
            'linkTwitter' => 'nullable',
            'alamatDeskanasda' => 'nullable',
            'emailDeskranasda' => 'nullable',
            'noTeleponDeskranasda' => 'nullable',
            'alamatPetaDeskranasda'=> 'nullable',
            'tentang' => 'nullable',
            'sejarah' => 'nullable',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'demografi' => 'nullable',
            'geografi' => 'nullable',

        ]);

        if ($request->hasFile('gambarHero')) {
            //menghapus gambar lama
            $imagePath = public_path('images/profiles/' . $data->gambarHero);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            //menyimpan gambar baru
            $name="hero";
            $fileName = $name.".".$request->gambarHero->extension();
            $request->gambarHero->move(public_path('images/profiles/'), $fileName);
            $validator['gambarHero'] = $fileName;
        }

        if ($request->hasFile('gambarAbout')) {
            //menghapus gambar lama
            $imagePath = public_path('images/profiles/' . $data->gambarAbout);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            //menyimpan gambar baru
            $fileName = time().'.'.$request->gambarAbout->extension();
            $request->gambarAbout->move(public_path('images/profiles/'), $fileName);
            $validator['gambarAbout'] = $fileName;
        }

        if ($request->hasFile('gambarStrukturOrganisasi')) {
            //menghapus gambarStrukturOrganisasi lama
            $imagePath = public_path('images/profiles/' . $data->gambarStrukturOrganisasi);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            //menyimpan gambarStrukturOrganisasi baru
            $fileName = time().'.'.$request->gambarStrukturOrganisasi->extension();
            $request->gambarStrukturOrganisasi->move(public_path('images/profiles/'), $fileName);
            $validator['gambarStrukturOrganisasi'] = $fileName;
        }

        $data->update($validator);
        return redirect('admin/profile/1/edit')->with('success', 'Data profil berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
