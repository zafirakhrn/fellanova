<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Kategori;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

class HomeController extends Controller
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
    public function index()
    {
        $product = Product::inRandomOrder()->paginate(10);
        $users = User::all();
        $rolesCount = Role::count();
        
        return view('home', compact('product', 'users', 'rolesCount'));
    }
}
