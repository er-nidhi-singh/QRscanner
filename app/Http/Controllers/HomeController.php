<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $galleryCount = Gallery::count();
    
        return view('home');
    }

    public function clearCache(): View
    {
        Artisan::call('cache:clear');

        return view('clear-cache');
    }
}
