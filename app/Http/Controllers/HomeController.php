<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
          * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function customer()
    {
        return view('pages.customer');
    }

    public function category()
    {
        return view('pages.category');
    }

    public function product()
    {
        return view('pages.product');
    }
}
