<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $all_category = Category::all();
        return view('admin.category',compact('all_category'));
    }

    public function add_category(Request $request){
        $request->validate([
            'catgo_name' => 'required|string|max:255'
        ],[
            'catgo_name.required' => 'Please provide a category name',
            'catgo_name.string' => 'category name should be string'
        ]);

        Category::create([
            'category_name' => $request->catgo_name
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function updated_category(Request $request){

        $request->validate([
            'updated_ctname' => 'string'
        ]);

        $find_id = Category::find($request->updated_ctid);
        $find_id->category_name = $request->updated_ctname;
        $find_id->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function deleted_category(Request $request){
        $get_catId =  Category::find($request->dlt_ctid);

        $get_catId->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
