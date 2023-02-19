<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class CategoriesController extends Controller
{
    public function createCategoriesView(){
        try{

            $categories = Category::all();

            return view('partials.create-categories-view',compact('categories'));
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function saveCategorie(Request $request){

        $request->validate([
            'category_name' => 'required|max:30',
        ]);

        try{
            Category::create([
                'category_name' => $request->category_name
            ]);

            return redirect()->back()->with('success', 'Inserted Successfuly.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function updateCategorieById($id,Request $request){
        $request->validate([
            'category_name' => 'required|max:30',
        ]);

        try{
            $id = Crypt::decrypt($id);

            Category::find($id)->update([
                'category_name' => $request->category_name
            ]);

            return redirect()->back()->with('success', 'Updated Successfuly.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred.');
        }
    }

    public function deleteCategorieById($id){
        try{
            $id = Crypt::decrypt($id);

            Category::find($id)->delete();

            return redirect()->back()->with('success', 'Deleted Successfuly.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred.');
        } 
    }
}
