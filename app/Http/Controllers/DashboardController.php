<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Catalog;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = "Dasbor";
        $path = $request->path();
        $path = explode("/", $path);
        $user = Auth::user();

        // Get the count of users with the role 'penjual'
        $penjualCount = User::where('role', 'penjual')->count();

        // Get the count of users with the role 'copywriter'
        $copyWriterCount = User::where('role', 'copywriter')->count();

        // Calculate the count of others
        $otherCount = User::whereNotIn('role', ['penjual', 'copywriter'])->count();

        // Count users, articles, galleries, and catalogs
        $countUser = User::count();
        $countArticles = Article::count();
        $countGalleries = Gallery::count();
        $countCatalogs = Catalog::count();

        // Prepare data for chart
        $chartData = [
            'labels' => ['Artikel', 'Galeri', 'Katalog'],
            'data' => [$countArticles, $countGalleries, $countCatalogs],
        ];

        // $chartPenjual = [
        //     'labels' => ['Artikel', 'Galeri', 'Katalog'],
        //     'data' => [$countArticles, $countGalleries, $countCatalogs],
        // ];

        $chartUser = [
            'labels' => ['Penjual', 'Penulis Artikel', 'Lainnya'],
            'data' => [$penjualCount, $copyWriterCount, $otherCount],
        ];

        // Statistic box
        // if (Auth::user()->role == 'Penjual') {
        //     $boxgallery = Gallery::where('user_id', Auth::user()->id);
        //     $boxcatalog = Catalog::where('user_id', Auth::user()->id);
        //     $boxarticle = 0;
        // } else {
        //     $boxgallery = 0;
        //     $boxcatalog = 0;
        //     $boxarticle = Article::where('user_id', Auth::user()->id);

        // }


        $newCustomersThisMonth = User::whereMonth('created_at', date('m'))->count(); // Fetch the count of new customers this month
        $todayHeroes = User::whereDate('created_at', date('Y-m-d'))->count(); // Fetch the data for today's heroes
        $remainingHeroesCount = 1;   // Calculate the count of remaining heroes

        return view('dashboard.pages.Dashboard.dashboard', compact('path', 'title', 'user', 'penjualCount', 'copyWriterCount', 'countUser','newCustomersThisMonth', 'todayHeroes', 'remainingHeroesCount', 'otherCount', 'chartData', 'chartUser'));
    }
}
