<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Catalog;
use App\Models\Profile;

class HomeController extends Controller
{
    public function home (){
        $catalog = Catalog::all();
        $articleslatesttwo = Article::orderBy('id', 'desc')->take(2)->get();

        return view('landing-page.pages.Home.home', ['catalog' => $catalog, 'articleslatesttwo' => $articleslatesttwo]);
    }

    public function detail_catalog (){
        $catalog = Catalog::all();
        return view('landing-page.pages.Catalog.detail-catalog', ['catalog' => $catalog]);
    }

    public function about (){
        $profile = Profile::all();
        return view('landing-page.pages.Profile.about', ['profile' => $profile]);
    }

    public function visimisi (){
        $profile = Profile::all();
        return view('landing-page.pages.Profile.visimisi', ['profile' => $profile]);
    }

    public function sejarah (){
        $profile = Profile::all();
        return view('landing-page.pages.Profile.sejarah', ['profile' => $profile]);
    }

    public function geografis (){
        $profile = Profile::all();
        return view('landing-page.pages.Profile.geografis', ['profile' => $profile]);
    }

    public function demografis (){
        $profile = Profile::all();
        return view('landing-page.pages.Profile.demografis', ['profile' => $profile]);
    }
}