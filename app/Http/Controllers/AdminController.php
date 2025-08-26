<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
    public function product(){
        $categories = Category::all();
        return view('admin.product',compact('categories'));
    }
    public function productStore(Request $request){
        // dd($request->file('image'));
        $img = $request->file('image');
        $imgName = time().'.'.$img->getClientOriginalExtension();
        $request->image->move('product',$imgName);

        $product = Product::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'category'=>$request->input('category'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'discount_price'=>$request->input('discount_price'),
            'image'=>$imgName
        ]);
       return response()->json([
        'status'=>'success',
        'message'=>'Product saved successfully'
       ]);
    }
}
