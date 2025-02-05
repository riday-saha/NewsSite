@extends('front.template')
@section('title')
    Home | News
@endsection

@section('content')
    <!-- banner carousel  -->
    <div id="banner-caro" class="bg-custom custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="carosel-one">
                        <div class="owl-carousel bancaro-one owl-theme">
                            {{-- first carousel in hero section  --}}
                            @foreach ($first_carosel as $first_carosels)
                            <div class="item benner-onec">
                                <img class="slider-img" src="{{asset($first_carosels->image)}}" alt="">
                                <div class="slider-content">
                                    <button class="btn btn-success slider-button">{{$first_carosels->categury->category_name}}</button>
                                    <h4 class="slide-head sideinleft"><a href="{{route('news.details',$first_carosels->id)}}">{{$first_carosels->post_title}}</a></h4>
                                    <p class="slider-para">by {{$first_carosels->user->name}} - {{$first_carosels->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-12">
                            <div class="post-sp">
                                {{-- first sidebar post  --}}
                                <img src="{{asset($sidebar_once->image)}}" class="sp-img" alt="">
                                <div class="post-link">
                                    <button class="sp-bt btn btn-primary">{{$sidebar_once->categury->category_name}}</button>
                                    <h6 class="sp-head"><a href="{{route('news.details',$sidebar_once->id)}}">{{$sidebar_once->post_title}}</a></h6>
                                    <p class="sp-para">by {{$sidebar_once->user->name}} - {{$sidebar_once->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-12">
                            <div class="post-sp ">
                                {{-- second sidebar post  --}}
                                <img src="{{asset($sidebar_twos->image)}}" class="sp-img" alt="">
                                <div class="post-link">
                                    <button class="sp-bt btn btn-success">{{$sidebar_twos->categury->category_name}}</button>
                                    <h6 class="sp-head"><a href="{{route('news.details',$sidebar_twos->id)}}">{{$sidebar_twos->post_title}}</a></h6>
                                    <p class="sp-para">by {{$sidebar_twos->user->name}} - {{$sidebar_twos->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- divider -->
    <div id="divider" class="bg-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-divider"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- whats new section  -->
    <div id="whats_new" class="bg-custom custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="whats-cons bg-white p-5">
                        <div class="whats-menu  justify-content-between pb-4">
                            <div class="row">
                                <div class="col-lg-12 col-xl-4">
                                    <div class="wats-title">
                                        <h3>Whats New</h3>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-8">
                                    <ul class="nav wats-nav">
                                        @foreach ($new_category as $new_categories)
                                        <li class="nav-item">
                                            <a class="nav-link nw_catego" href="" data-right="{{$new_categories->id}}">{{$new_categories->category_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- content of whats new section  -->
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <div id="whats-content">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="filter-content" id="d-lifestyle">
                                    <!-- Lifestyle content -->
                                    <div class="row" id="gourav">
                                        
                                    </div>
                                    <div id="pagination" class="mt-4"></div>

                                </div>
                                <!-- Add similar sections for Sports, Technology, etc. -->
                            </div>
                        </div>
                        
                    </div>
                    <div class="whats-add">
                        <img class="w-100 mt-4" src="img/header_card.png" alt="">
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <!-- socail follower showing  -->
                    <div class="test bg-white">
                        <div class="row pt-4 pb-4">
                            <div class="col-6">
                                <div class="facebook d-flex">
                                    <a href=""><img src="img/icon-fb.png" alt=""></a>
                                    <div class="fb-cont">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="facebook d-flex">
                                    <a href=""><img src="img/icon-ins.png" alt=""></a>
                                    <div class="fb-cont">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="facebook d-flex mt-2">
                                    <a href=""><img src="img/icon-tw.png" alt=""></a>
                                    <div class="fb-cont">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="facebook d-flex mt-2">
                                    <a href=""><img src="img/icon-yo.png" alt=""></a>
                                    <div class="fb-cont">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- most recent news section  -->
                    <div class="test-one bg-white">
                        <div class="most-recent">
                            <h5 class="mp-head mb-3">Most Recent</h5>
                            <div class="mp-fcont">
                                <img class="mp-img" src="{{asset($mst_first_post->image)}}" alt="">
                                <div class="mp-cont">
                                    <h6 class="mpc-hd"><a href="{{route('news.details',$mst_first_post->id)}}">{{$mst_first_post->post_title}}</a></h6>
                                    <p class="mpc-time">{{$mst_first_post->user->name}} | {{$mst_first_post->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            <!-- more recent news  -->
                             <div class="row">
                                @foreach ($mst_other_post->slice(1) as $mst_other_posted)
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="more-recent mt-3 d-flex"> 
                                        <img src="{{asset($mst_other_posted->image)}}" alt="" class="">
                                        <div class="more-rcont ms-3">
                                            <h6 class="more-rhead"><a href="{{route('news.details',$mst_other_posted->id)}}">{{Str::words($mst_other_posted->post_title,5,'..')}}</a></h6>
                                            <p class="more-rtime">{{$mst_other_posted->user->name}} | {{$mst_other_posted->created_at->diffForHumans()}}</p>
                                        </div>  
                                    </div>  
                                </div>
                                 @endforeach
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- most popular section  -->
    <div id="most-popular" class="bg-custom custom-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="add-img">
                        <img src="img/body_card2.png" alt="">
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="mst-pop bg-white">
                        <h5 class="mst-pophead">Most Popular</h5>
                        <div class="most-pslide">
                            <div class="owl-carousel owl-theme most-pups">
                                @foreach ($popularPost as $popularPosts)
                                <div class="item most-ptwo">
                                    <img src="{{asset($popularPosts->image)}}" alt="" style="height: 200px">
                                    <h6 class=""><a href="{{route('news.details',$popularPosts->id)}}">{{$popularPosts->post_title}}</a></h6>
                                    <p class="">{{$popularPosts->user->name}} | {{$popularPosts->created_at->diffForHumans()}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tranding news section  -->
    <div id="tranding-news" class="custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tranding">
                        <h4>Trending News</h4>
                        <div class="owl-carousel owl-theme trendy-news">
                            @foreach ($tranding as $trandings)
                            <div class="item trendycaro">
                                <img src="{{asset($trandings->image)}}" alt="" style="height: 320px">
                                <div class="trendycaro-cont">
                                    <h6 class=""><a href="{{route('news.details',$trandings->id)}}">{{$trandings->post_title}}</a></h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="trendy-time">{{$trandings->user->name}} | {{$popularPosts->created_at->diffForHumans()}}</p>
                                        </div>
                                        <div class="col-6">
                                            <a href="" class="trendy-play"><i class="fa-regular fa-circle-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Carousel  -->
    <div id="youtube-video" class="bg-custom custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme youtube-vdo">
                        @foreach ($showing_videos as $showing_video)
                        <div class="item">
                            <iframe id="video0" 
                                    src="{{$showing_video->youtube}}" 
                                    frameborder="0" 
                                    allow="autoplay; encrypted-media" 
                                    allowfullscreen>
                            </iframe>
                            {{-- <p>{{$showing_video->youtube}}</p> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
                </div> 
            </div>
        </div>
    </div>

    <!-- last week post  -->
    <div id="last-week" class="custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="lastwk-carosel">
                        <div class="owl-carousel owl-theme lastwk-post">
                            @foreach ($thiswkposts as $thiswkpost)
                            <div class="item lwk-pst">
                                <img src="{{asset($thiswkpost->image)}}" alt="" style="height: 200px">
                                <h6 class=""><a href="{{route('news.details',$thiswkpost->id)}}">{{$thiswkpost->post_title}}</a></h6>
                                <p class="">{{$thiswkpost->user->name}} | {{$thiswkpost->created_at->diffForHumans()}}</p>
                            </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@include('front.front_js')
