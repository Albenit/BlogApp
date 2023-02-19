<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        try{
            $blogs = Blog::where('user_id',Auth::user()->id)->get();

            return view('home',compact('blogs'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred.');
        }

    }
}
