<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Managemen Pengguna";
        $path = $request->path();
        $path = explode("/", $path);
        $user = User::where('id', '!=', 1)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        return view('dashboard.pages.UserManagement.show', ['user'=> $user], compact( 'path', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = "Buat Data Pengguna";
        $path = $request->path();
        $path = explode("/", $path);
        return view('dashboard.pages.UserManagement.create', compact('title', 'path'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
            'wa' => 'required',
            'alamat' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $filename = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/users'), $filename);
            $data['image'] = $filename;
        }

        User::create($data);

        return redirect('admin/user')->with('success', 'Data User berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        $title = "Edit Data User";
        $path = $request->path();
        $path = explode("/", $path);
        return view('dashboard.pages.UserManagement.edit', ['user' => $user], compact('title', 'path'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'wa' => 'required',
            'alamat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            // Pertahankan password yang sudah ada jika tidak ada password baru yang diberikan
            $data['password'] = $user->password;
        }
        
        if ($request->hasFile('image')) {
            //menghapus gambar lama
            $imagePath = public_path('images/users/' . $user->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            //menyimpan gambar baru
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/users/'), $fileName);
            $data['image'] = $fileName;
        }

        //mengupdate data
        $user->update($data);

        return redirect('admin/user')->with('success', 'Data User berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $imagePath = public_path('images/users/' . $user->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        //menhapus data
        $user->delete();

        return redirect('admin/user')->with('success', 'Data User berhasil dihapus');
    }

    public function checkEmail(Request $request)
{
    $emailExists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $emailExists]);
}

    public function settingProfile(Request $request, User $user){
        $title = "Ubah Data Pengguna";
        $path = $request->path();
        $path = explode("/", $path);
        $user = User::where('id', '!=', 1)->get();
        return view('dashboard.pages.UserManagement.setting-user', compact('title', 'path'));
    }

    public function updateSetting(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'wa' => 'required',
            'alamat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            // Pertahankan password yang sudah ada jika tidak ada password baru yang diberikan
            $data['password'] = $user->password;
        }

        if ($request->hasFile('image')) {
            //menghapus gambar lama
            $imagePath = public_path('images/users/' . $user->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            //menyimpan gambar baru
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/users/'), $fileName);
            $data['image'] = $fileName;
        }

        //mengupdate data
        $user->update($data);

        return redirect()->route('setting.profile')->with('success', 'Data User berhasil dirubah');
    }
}
