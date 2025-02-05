<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporterController extends Controller
{
    public function reporter_home(){
        return view('reporter.home');
    }

    public function reported_speech(){
        $reporter_id = Auth::user()->id;
        $get_category = Category::all();
        $all_posts = post::where('user_id',$reporter_id)->get();
        
        return view('reporter.reporter_post',compact('get_category','all_posts'));

    }

    public function youtube_video(){
        $all_videos = video::all();
        return view('reporter.video');
    }

    public function addyoutube_video(Request $request){
        $request->validate([
            'video_name' => 'nullable|string|max:70',
            'new_video' => 'required|string'
        ]);

        video::create([
            'utube_title' => $request->video_name,
            'youtube' => $request->new_video
        ]);

        return redirect()->back();
    }

    public function all_video(){
        $get_allvdo = video::all();
        return view('reporter.all_video',compact('get_allvdo'));
    }

    public function update_video(Request $request ,$id){
        $find_thisId = video::find($id);
        return view('reporter.update_video',compact('find_thisId'));
    }

    public function updated_video(Request $request, $id){
        $request->validate([
            'upvideo_name' =>'string',
            'upnew_video' => 'string'
        ]);

        $get_upid = video::find($id);

        $get_upid->utube_title = $request->upvideo_name;
        $get_upid->youtube = $request->upnew_video;
        $get_upid->save();

        return redirect()->route('all.video');
    }

    public function deleted_video($id){
        $find_vdodltId = video::find($id);
        $find_vdodltId->delete();
        return redirect()->back();
    }
}
