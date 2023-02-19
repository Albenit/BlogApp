<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class BlogsController extends Controller
{

    public function createBlog(Request $req){
        $req->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:255',
            'image' =>  'required',
        ]);

        try {
            $image = $req->file('blog_image');
            $filename = $image->getClientOriginalName();

            Blog::create([
                'title' => $req->blog_title,
                'body' => $req->blog_body,
                'image' =>  Storage::disk('public')->put($filename, $image),
                'user_id' => Auth::user()->id,
                'category_id' => $req->blog_category,
                'published_at' => Carbon::now()
            ]);

            return redirect()->route('home');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function editBlogView($id){
        try{
            $id = Crypt::decrypt($id);

            $blog = Blog::find($id);

            return view('partials.edit-blog',compact('blog'));

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function editBlogById($id,Request $req){

        $req->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:255',
            'image' =>  'required',
        ]);

        try{
            $id = Crypt::decrypt($id);

            $blog = Blog::find($id);

            $image = $req->file('blog_image');
            $filename = $image->getClientOriginalName();

            $blog->update([
                'title' => $req->blog_title,
                'body' => $req->blog_body,
                'image' =>  Storage::disk('local')->putFileAs('images', $image, $filename),
                'user_id' => Auth::user()->id,
                'category_id' => $req->blog_category,
                'published_at' => Carbon::now()
            ]);

            return redirect()->route('home');

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function deleteBlogById($id){
        try{
            $id = Crypt::decrypt($id);

            Blog::find($id)->delete();

            return redirect()->route('home');

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

}
