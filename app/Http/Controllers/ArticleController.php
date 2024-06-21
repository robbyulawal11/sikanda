<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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
        $article = Article::all();
        $paginateArticles = Article::orderBy('updated_at', 'desc')->paginate(10); // Fetch 10 articles per page

        return view('dashboard.pages.Article.show', ['article' => $article], compact('title', 'path', 'paginateArticles'));
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

        $paginateArticles = Article::orderBy('updated_at', 'desc')->paginate(10); // Fetch 10 articles per page
    
        // Pass the articles to the view
        return view('landing-page.pages.Article.article', [
            'paginateArticles' => $paginateArticles,
            'path' => $path
        ]);
    }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');

        // Perform search query
        $searchArticles = Article::where('title', 'LIKE', "%$query%")
                            ->orWhere('body', 'LIKE', "%$query%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        return view('landing-page.pages.Article.search', compact('searchArticles', 'query'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required|string|max:255',
            'body' => 'required|min:50'
        ], 
        [
            'title.required' => 'The title field is required.',
            'author.required' => 'The author field is required.',
            'body.required' => 'The body field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image must not be greater than 2048 kilobytes.',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/articles'), $filename);
            $data['image'] = $filename;
        }

        Article::create($data);


        // // Update article details
        // $article->title = $request->title;
        // $article->author = $request->author;
        // $article->body = $request->body;

        // // Handle image deletion if requested
        // if ($request->input('delete_image') == "1") {
        //     // Delete existing image from storage and clear image attribute
        //     if ($article->image && $article->image !== "1") {
        //         Storage::delete('public/images/articles/' . $article->image);
        //         $article->image = null;
        //     }
        // }

        // // Handle image update
        // if ($request->hasFile('image')) {
        //     // Upload new image
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('public/images/articles', $imageName);
        //     $article->image = $imageName;

        //     // Delete previous image if exists
        //     if ($article->image && $article->image !== "1") {
        //         Storage::delete('public/images/articles/' . $article->image);
        //     }
        // }

        // $article->save();
        return redirect('article')->with('success', 'Article created successfully.');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        return redirect('article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $imagePath = public_path('images/articles/' . $article->image);
        // cek file gambar, jika ada delete
        if (!empty($article->image) && is_file($imagePath) && file_exists($imagePath)) {
            unlink($imagePath);
        }

        //menghapus data
        $article->delete();

        return redirect('article');
    }
    
    // public function deleteImage(Request $request)
    // {
    //     $article = Article::findOrFail($request->article_id);
    
    //     if ($article->image && $article->image !== "1") {
    //         Storage::delete('public/images/articles/' . $article->image);
    //         $article->image = null;
    //         $article->save();
    //     }
    
    //     return redirect('article');
    // }
}
