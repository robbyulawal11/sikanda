<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        // $paginateArticles = Article::orderBy('updated_at', 'desc')->paginate(10); // Fetch 10 articles per page 

        $user = Auth::user(); // Get the authenticated user
        // Check user role and fetch articles accordingly
        if (Auth::user()->role == 'admin') {
            $paginateArticles = Article::orderBy('updated_at', 'desc')->paginate(10);
        } elseif (Auth::user()->role == 'Penjual') {
            $paginateArticles = collect(); // Empty collection for 'penjual' role
        } else {
            $paginateArticles = Article::where('user_id', Auth::user()->id)
            ->orderBy('updated_at', 'desc')->paginate(10); // Fetch articles created by the copywriter
        }

        return view('dashboard.pages.Article.show', compact('title', 'path', 'paginateArticles'));

    }
    
    public function showArticle($id)
    {
        $showArticle = Article::findOrFail($id); // Fetch article by ID

        return view('landing-page.pages.Article.show', compact('showArticle'));
    }

    public function paginateArticles(Request $request)
    {
        // Fetch the latest 5 articles sorted by ID in descending order
        $path = $request->path();
        $path = explode("/", $path);
        $article = Article::all();
        $articleslatestfive = Article::orderBy('id', 'desc')->take(5)->get();

        $paginateArticles = Article::orderBy('updated_at', 'desc')->paginate(10); // Fetch 10 articles per page
    
        // Pass the articles to the view
        return view('landing-page.pages.Article.article', [
            'paginateArticles' => $paginateArticles,
            'path' => $path,
            'articleslatestfive' => $articleslatestfive,
        ]);
    }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');

        // Perform search query
        $searchArticles = Article::where('title', 'LIKE', "%$query%")
                            ->orWhere('body', 'LIKE', "%$query%")
                            ->orWhere('author', 'LIKE', "%$query%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        $countArticles = Article::where('title', 'LIKE', "%$query%")
                            ->orWhere('body', 'LIKE', "%$query%")
                            ->orWhere('author', 'LIKE', "%$query%")
                            ->count();

        return view('landing-page.pages.Article.search', compact('searchArticles', 'query', 'countArticles'));
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

        $data['user_id'] = Auth::user()->id;


        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/articles'), $filename);
            $data['image'] = $filename;
        }

        Article::create($data);

        return redirect('admin/article')->with('success', 'Article created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showArticle = Article::findOrFail($id); // Fetch article by ID

        return view('landing-page.pages.Article.show', compact('showArticle'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Article $article)
    {
        $title = "Edit Artikel";
        $parts = $request->path();
        $path = explode("/", $parts);
        return view('dashboard.pages.Article.edit', ['article' => $article], compact('title', 'path'));
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

        return redirect('admin/article');
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
        return redirect('admin/article');
    }
    
}
