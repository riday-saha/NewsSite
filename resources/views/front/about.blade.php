@extends('front.template')

@section('title')
    About | News
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/aboutnews.css')}}">
@endsection

@section('content')
    <!-- our mission  -->
    <div id="our-mission" class="custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mission">
                        <h3 class="miss-head">Our Mission</h3>
                        <p>
                            Consectetur adipiscing elit, sued do eiusmod tempor ididunt udfgt labore et dolore magna aliqua. Quis ipsum suspendisces gravida. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. <br>
                            Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan.
                        </p>
                    </div>
                    <div class="mission">
                        <h3 class="miss-head">Our Vision</h3>
                        <p>
                            Consectetur adipiscing elit, sued do eiusmod tempor ididunt udfgt labore et dolore magna aliqua. Quis ipsum suspendisces gravida. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. <br>
                            Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- our member  -->
    <div id="member" class="custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="msn-detail">
                        <h3 class="mission-head">Our Professional members</h3>
                        <h1>Our Team Mambers</h1>
                    </div>
                </div>
            </div>
            <div class="team-intro">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="memb-detail">
                            <img src="img/team2.png" alt="">
                            <div class="team">
                                <h3>Alax Carry</h3>
                                <p>UX Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6  col-md-4 col-lg-4">
                        <div class="memb-detail">
                            <img src="img/team3.png" alt="">
                            <div class="team">
                                <h3>Alax Carry</h3>
                                <p>UX Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="memb-detail abc">
                            <img src="img/team2.png" alt="">
                            <div class="team">
                                <h3>Alax Carry</h3>
                                <p>UX Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection