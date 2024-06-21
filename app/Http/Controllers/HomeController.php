<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class HomeController extends Controller
{
    public function home (){
        $catalog = Catalog::all();
        return view('landing-page.pages.Home.home', ['catalog' => $catalog]);
    }

    public function detail_catalog (){
        $catalog = Catalog::all();
        return view('landing-page.pages.Catalog.detail-catalog', ['catalog' => $catalog]);
    }
}
