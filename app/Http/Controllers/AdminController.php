<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Category;
use App\Models\first_sidebar;
use App\Models\second_sidebar;
use Illuminate\Http\Request;
use App\Models\SelectCategoryModel;

class AdminController extends Controller
{
    public function admin_home(){
        $get_all_categos =  Category::all();
        return view('admin.index',compact('get_all_categos'));
    }

    //post status related
    public function accept_post($id){
        $take_id = post::find($id)->update([
            'status' =>'active'
        ]);
        
        return redirect()->back();
    }

    public function undo_post($id){
        $take_id = post::find($id)->update([
            'status' =>'pending'
        ]);
        
        return redirect()->back();
    }

    //post tranding related
    public function tranding_do($id){
        $do_trand = post::find($id)->update([
            'trending' => 1
        ]);
        return redirect()->back();
    }

    public function tranding_die($id){
        $do_trand = post::find($id)->update([
            'trending' => 0
        ]);
        return redirect()->back();
    }

    //Select Category for First Carousel
    public function sltcat_fstcarosel(Request $request){
        $request->validate([
            'get_admin_sltid' => 'numeric'
        ],[
            'get_admin_sltid.required' => 'Please Select A Category'
        ]);

        $found_catId = SelectCategoryModel::where('id',1)->update([
            'select_Cat' => $request->get_admin_sltid
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    //Select Category for 1st sidebar
    public function sltcat_firstsidebar(Request $request){
        $request->validate([
            'get_admin_chooseid' => 'required|numeric'
        ],[
            'get_admin_chooseid.required' => 'Please Select A Category'
        ]);

        $found_sidebarOnecatId = first_sidebar::where('id',1)->update([
            'sidebar_one' => $request->get_admin_chooseid
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    //Select Category for 2nd sidebar
    public function sltcat_secondsidebar(Request $request){
        $request->validate([
            'get_adminsecond_chooseid' => 'required|numeric'
        ],[
            'get_adminsecond_chooseid.required' => 'Please Select A Category'
        ]);

        $found_sidebarTwocatId = second_sidebar::where('id',1)->update([
            'sidebar_two' => $request->get_adminsecond_chooseid
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }


}
