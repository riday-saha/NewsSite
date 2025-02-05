@extends('front.template')


@section('content')
    <!-- whats new section  -->
    <div id="whats_new" class="bg-custom custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="whats-cons bg-white p-5">
                        
                        <img src="{{asset($get_details_post->image)}}" alt="" style="width: 100%; margin-bottom:20px">
                        <h3>{{$get_details_post->post_title}}</h3>
                        <p style="text-align: justify;font-size:20px;line-height:40px">{{$get_details_post->post_description}}</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <!-- socail follower showing  -->
                    <div class="test bg-white">
                        <div class="row pt-4 pb-4">
                            <div class="col-6">
                                <div class="facebook d-flex">
                                    <a href=""><img src="{{asset('img/icon-fb.png')}}" alt=""></a>
                                    <div class="fb-cont">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="facebook d-flex">
                                    <a href=""><img src="{{asset('img/icon-ins.png')}}" alt=""></a>
                                    <div class="fb-cont">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="facebook d-flex mt-2">
                                    <a href=""><img src="{{asset('img/icon-tw.png')}}" alt=""></a>
                                    <div class="fb-cont">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="facebook d-flex mt-2">
                                    <a href=""><img src="{{asset(('img/icon-yo.png'))}}" alt=""></a>
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
                                    {{-- <button class="mpc-btn btn btn-primary">Vogue</button> --}}
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
                                            <h6 class="more-rhead"><a href="">{{Str::words($mst_other_posted->post_title,5,'..')}}</a></h6>
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

@endsection