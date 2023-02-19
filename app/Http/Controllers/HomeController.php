<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        try{

            $search_blog = $request->search_blog;
            if(isset($request->blog_category)){
                $blogs = Blog::where('user_id',Auth::user()->id)->where('title','LIKE','%'.$search_blog.'%')->where('category_id',$request->blog_category)->get();
            }else{
                $blogs = Blog::where('user_id',Auth::user()->id)->where('title','LIKE','%'.$search_blog.'%')->get();
            }

            $categories = Category::all();

            return view('home',compact('blogs','search_blog','categories'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred.');
        }

    }
}
