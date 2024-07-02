<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Artikel";
        $path = $request->path();
        $path = explode("/", $path);

        if ($request->ajax()) {
            $data = Article::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    $editUrl = route('article.edit', $row->id);
                    $deleteUrl = route('article.destroy', $row->id);
                    return "<a href='{$editUrl}' class='btn btn-success'><i class='bi bi-pencil-square fs-3 ms-1'></i></a>
                            <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal{$row->id}'>
                                <i class='bi bi-trash fs-3 ms-1'></i>
                            </button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        $user = Auth::user(); // Get the authenticated user
        // Check user role and fetch articles accordingly
        if (Auth::user()->role == 'admin') {
            $paginateArticles = Article::orderBy('date_article', 'desc')->paginate(10); // Fetch 10 articles per page
        } elseif (Auth::user()->role == 'Penjual') {
            $paginateArticles = collect(); // Empty collection for 'penjual' role
        } else {
            $paginateArticles = Article::where('user_id', Auth::user()->id)
            ->orderBy('date_article', 'desc')->paginate(10); // Fetch articles created by the copywriter
        }

        return view('dashboard.pages.Article.show', compact('title', 'path', 'paginateArticles'));

    }

    public function showArticle($id)
    {
        $showArticle = Article::findOrFail($id); // Fetch article by ID
        $articleslatestfive = Article::orderBy('date_article', 'desc')->take(5)->get();


        return view('landing-page.pages.Article.show', compact('showArticle', 'articleslatestfive'));
    }

    public function paginateArticles(Request $request)
    {
        // Fetch the latest 5 articles sorted by ID in descending order
        $path = $request->path();
        $path = explode("/", $path);
        $article = Article::all();
        $profile = Profile::all();
        $articleslatestfive = Article::orderBy('date_article', 'desc')->take(5)->get();

        $paginateArticles = Article::orderBy('date_article', 'desc')->paginate(5); // Fetch 10 articles per page

        // Pass the articles to the view
        return view('landing-page.pages.Article.article', [
            'paginateArticles' => $paginateArticles,
            'path' => $path,
            'articleslatestfive' => $articleslatestfive,
            'profile' => $profile,
        ]);
    }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');
        $profile = Profile::all();

        // Perform search query
        $searchArticles = Article::where('title', 'LIKE', "%$query%")
                            ->orWhere('body', 'LIKE', "%$query%")
                            ->orWhere('author', 'LIKE', "%$query%")
                            ->orderBy('date_article', 'desc')
                            ->paginate(5);

        $countArticles = Article::where('title', 'LIKE', "%$query%")
                            ->orWhere('body', 'LIKE', "%$query%")
                            ->orWhere('author', 'LIKE', "%$query%")
                            ->count();

        return view('landing-page.pages.Article.search', compact('searchArticles', 'query', 'countArticles', 'profile'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = "Tambah Artikel";
        $parts = $request->path();
        $path = explode("/", $parts);
        return view('dashboard.pages.Article.create', compact('title', 'path'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required|string|max:255',
            'body' => 'required|min:50',
            'user_id' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/articles'), $filename);
            $data['image'] = $filename;
        }

        Article::create($data);

        return redirect('admin/article')->with('success', 'Artikel Berhasil Disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showArticle = Article::findOrFail($id); // Fetch article by ID
        $profile = Profile::all();
        return view('landing-page.pages.Article.show', compact('showArticle', 'profile'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Article $article)
    {
        $title = "Edit Artikel";
        $parts = $request->path();
        $path = explode("/", $parts);
        return view('dashboard.pages.Article.edit', ['article' => $article], compact('title', 'path'))->with('success', 'Artikel Berhasil Disimpan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required|string',
            'slug' => 'nullable|string',
            'body' => 'required',
            'id_user' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            //menghapus gambar lama
            $imagePath = public_path('images/articles/' . $article->image);
            if (!empty($article->image) && is_file($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            //menyimpan gambar baru
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/articles/'), $fileName);
            $data['image'] = $fileName;
        }

        //mengupdate data
        $article->update($data);

        return redirect('admin/article')->with('success', 'Artikel Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id); // Find the article by ID or fail if not found

        $imagePath = public_path('images/articles/' . $article->image);
        // cek file gambar, jika ada delete
        if (!empty($article->image) && is_file($imagePath) && file_exists($imagePath)) {
            unlink($imagePath);
        }

        // //menghapus data
        $article->delete();
        return redirect('admin/article')->with('success', 'Artikel Berhasil Dihapus');
    }
}
