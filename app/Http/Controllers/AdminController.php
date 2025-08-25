<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $categories = Category::all();
        return view('admin.category',compact('categories'));
    }
    public function category_add(Request $request){

        $category = Category::create([
            'category_name'=>$request->input('category_name')
        ]);
       
        return redirect()->back()->with('success', 'Category added successfully!');

    }
    public function categoryEdit($id){
        $editCategory = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.category_edit', compact('editCategory', 'categories'));
    }
    public function categoryUpdate(Request $request, $id){
        $category = Category::findOrFail($id);
        Category::where('id',$id)
                ->update([
                    'category_name'=>$request->input('category_name')
                ]);

        return redirect()->route('category.view')->with('success', 'Category updated successfully!');

    }
    public function categoryDelete(Request $request, $id){
        $category = Category::findOrFail($id);
        Category::where('id',$id)
                ->delete();

        return redirect()->route('category.view')->with('success', 'Category deleted successfully!');

    }
}
