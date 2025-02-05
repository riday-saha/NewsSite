<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\first_sidebar;
use App\Models\second_sidebar;
use Illuminate\Support\Carbon;
use App\Models\SelectCategoryModel;

class VisitController extends Controller
{
    public function site_index(){
        $admin_category = SelectCategoryModel::select('select_Cat');
        $new_category = Category::all();
        //first carosel
        $first_carosel = post::where('category',$admin_category)->where('status','active')->orderBy('id', 'desc')->take(6)->get();

        //sidebar one
        $one_side = first_sidebar::select('sidebar_one');
        $sidebar_once = post::where('category',$one_side)->where('status','active')->latest('id')->first();
        //sidebar two
        $two_side = second_sidebar::select('sidebar_two');
        $sidebar_twos = post::where('category',$two_side)->where('status','active')->latest('id')->first();

        //show recent post in Most Recent Post section
        $mst_recent = post::with('user')->where('status','active')->orderBy('id', 'desc')->take(5)->get();
        $mst_first_post = $mst_recent->first();
        $mst_other_post = $mst_recent->slice(1);

        //show Most Popular posts
        $popularPost = post::with('user')->where('status','active')->orderBy('views','desc')->get();

        //trending news showing
        $tranding = post::with('user')->where('status','active')->where('status', 'active')
        ->where('trending', 1)->orderBy('id', 'desc')->get();

        //video section
        $showing_videos = video::orderBy('id','desc')->get();

        //this week all the posts
        $thiswkposts = post::with('user')->where('status','active')->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->get();

        //show popular posts in the Footer section
        $popularFooter = post::with('user')->where('status','active')->orderBy('views','desc')->take(3)->get();
        return view('front.home',compact('first_carosel','new_category','sidebar_once','sidebar_twos','mst_first_post','mst_other_post','popularPost','tranding','showing_videos','thiswkposts','popularFooter'));
    }

    public function whats_category(Request $request){
        $got_catego = $request->get_category;
        $show_posts = post::where('category',$got_catego)->where('status','active')->with('categury')->get();
        $first_post = post::with('user')->where('category',$got_catego)->where('status','active')->first();
        return response()->json([
            'status' => 'success',
            'first_post' => $first_post,
            'data' => $show_posts,
            // 'links' => $show_posts->links()->render()
        ]);
    }

    // public function pagination(Request $request){
    //     $got_catego = $request->get_category;
    //     $show_posts = post::where('category',$got_catego)->with('categury')->paginate(2);
    //     $first_post = post::with('user')->where('category',$got_catego)->first();
    //     return response()->json([
    //         'status' => 'success',
    //         'first_post' => $first_post,
    //         'data' => $show_posts->items(),
    //         'links' => $show_posts->links()->render()
    //     ]);
    // }

    

    public function news_details($id){
        $get_details_post = post::find($id);
        $get_details_post->increment('views');

        //show popular posts in the Footer section
        $popularFooter = post::with('user')->where('status','active')->orderBy('views','desc')->get();

        //show recent post in Most Recent Post section
        $mst_recent = post::with('user')->where('status','active')->orderBy('id', 'desc')->take(5)->get();
        $mst_first_post = $mst_recent->first();
        $mst_other_post = $mst_recent->slice(1);

        //show popular posts in the Footer section
        $popularFooter = post::with('user')->where('status','active')->orderBy('views','desc')->take(3)->get();
        return view('front.details_post',compact('get_details_post','mst_first_post','mst_other_post','popularFooter','popularFooter'));
    }

    //show public posts in footer
    public function visited_views(){
        $popularFooter = post::with('user')->where('status','active')->orderBy('views','desc')->take(3)->get();
        
        return view('front.template',compact('popularFooter'));
    }

  


    public function about(){
        //show popular posts in the Footer section
        $popularFooter = post::with('user')->where('status','active')->orderBy('views','desc')->take(3)->get();
        return view('front.about',compact('popularFooter'));
    }

    public function contact_page(){
        //show popular posts in the Footer section
        $popularFooter = post::with('user')->where('status','active')->orderBy('views','desc')->take(3)->get();
        return view('front.contact',compact('popularFooter'));
    }
}


