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
    // Function to create Blogs  
    public function createBlog(Request $req){

       $req->validate([
            'blog_title' => 'required|max:50',
            'blog_body' => 'required|max:255',
            'blog_image' => 'required',
        ]);

        try {

            if($req->hasFile('blog_image')){
                $image = $req->file('blog_image');
                $filename = $image->getClientOriginalName();

                Storage::disk('public')->put('imgs',$filename,$image);
            }
            Blog::create([
                'title' => $req->blog_title,
                'body' => $req->blog_body,
                'image' => $filename,
                'user_id' => Auth::user()->id,
                'category_id' => $req->blog_category,
                'published_at' => Carbon::now()
            ]);

            return redirect()->route('home');

        } catch (\Exception $e) {
            return $e->getMessage();
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
            'blog_title' => 'required|max:50',
            'blog_body' => 'required|max:255',
            'blog_image' => 'required',
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
