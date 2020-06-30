<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\category;

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
        $categories = category::all()->where('parent_id',0);
        session()->put('category', $categories);
        $users = User::all()->where('status',1);
        return view('home',compact('users'));
    }

    



}
