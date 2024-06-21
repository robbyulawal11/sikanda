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
            'tentang' => 'nullable',
            'sejarah' => 'nullable',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'demografi' => 'nullable',
            'geografi' => 'nullable',

        ]);

        $data->update($validator);
        return redirect('profile/1/edit')->with('success', 'Data berhasil diinput');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
