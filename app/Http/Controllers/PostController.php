<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function posts(){
        $get_category = Category::all();
        $all_posts = post::all();
        
        return view('post.post_all',compact('get_category','all_posts'));
    }

    public function add_post(Request $request){
        $request->validate([
            'post_name' => 'required|string',
            'post_descripiton'=> 'required|string',
            'post_catego'=>'required|numeric',
            'post_image' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/webp,image/avif'
        ],[
            'post_name.required' => 'Please enter a title for your post',
            'post_descripiton.required' => 'Please enter a description for your post',
            'post_catego.required' => 'Please select a category',
            'post_image.required' => 'Oops! You forgot to add an image'
        ]);

        //store the image
        $image_post = time().'.'.$request->post_image->extension();
        $request->post_image->move(public_path('post_img'),$image_post);

        $user_id = Auth::user()->id;
        post::create([
            'post_title' => $request->post_name,
            'post_description' => $request->post_descripiton,
            'image' => 'post_img/'.$image_post,
            'user_id' => $user_id,
            'category' => $request->post_catego
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function update_post(Request $request){
          // Validation rules for the incoming data
          $validator = \Validator::make($request->all(), [
                'update_postnam' => 'nullable|string',
                'update_postdesc' => 'nullable|string',
                'updatepost_catId' => 'nullable|string',
                'updatepost_image' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/webp,image/avif',
            ]);

        $find_upid = post::find($request->update_id);

        //if new image has in the request
        if($request->hasFile('updatepost_image')){
            //delete previous image
            if(File::exists(public_path($find_upid->image))){
                File::delete(public_path($find_upid->image));
            }
            //store new image
            $new_upimg = time().'.'. $request->updatepost_image->extension();
            $request->updatepost_image->move(public_path('post_img'),$new_upimg);

            $find_upid->image = 'post_img/'.$new_upimg;
        }

        //update other info
        $find_upid->post_title = $request->update_postnam;
        $find_upid->post_description = $request->update_postdesc;
        $find_upid->category = $request->updatepost_catId;
        $find_upid->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function delete_post(Request $request){
        $delete_post = post::find($request->delt_id);

        if( $delete_post->image){
            $path_img = public_path($delete_post->image);
            unlink($delete_post->image);
        }
        $delete_post->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function singleshow_post($id){
        $seen_id = post::find($id);
        return view('post.show_post',compact('seen_id'));
    }

}
