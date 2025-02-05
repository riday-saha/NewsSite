
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','News')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/bootstrapnews.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/stylenews.css')}}">
    @yield('extra-css')
</head>
<body>
    <!-- pre-head  -->
    <div id="prehead" class="bg-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-0 col-lg-4">
                    <div class="pre-logo">
                        <img src="img/logo.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="pre-banner">
                        <img src="img/header_card.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- menu -->
    <div id="main-menu" class="sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-7 col-xl-6">
                    <nav class="navbar navbar-expand-lg sticky-top">
                        <div class="container-fluid ps-0">
                            <a class="navbar-brand d-xl-none" href="#">
                                <img src="{{asset('img/logo.png')}}" alt="Blog" width="" height="">
                            </a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon float-end"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <li class="nav-item">
                                <a class="nav-link menup" aria-current="page" href="{{route('site.index')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link menup" href="{{route('visit.about')}}">About</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link menup" href="#">Category</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link menup" href="#">Latest News</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link menup" href="{{route('contact.page')}}">Contact</a>
                              </li>
                              @if (Auth::check())
                              <li class="nav-item">
                                {{-- <a class="nav-link menup" href="#">Log Out</a> --}}
                                {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#logoutModal" class="nav-link menup">Log Out</button> --}}
                                <a type="button" data-bs-toggle="modal" data-bs-target="#logoutModal" class="nav-link menup">Log Out</a>
                              </li>
                              @else
                              <li class="nav-item">
                                <a class="nav-link menup" href="{{route('login')}}">Log in</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link menup" href="{{route('register')}}">Register</a>
                              </li>
                              @endif
                            </ul>
                          </div>
                        </div>
                      </nav>
                </div>
                <div class="col-lg-3 col-xl-3">
                    <div class="menu-social">
                        <ul class="nav">
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-facebook-f menus"></i></a></li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-twitter menus"></i></a></li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-instagram menus"></i></a></li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-youtube menus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-3">
                    <div class="menu-search">
                        <form class="" role="search">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- content --}}
    @yield('content')

    <!-- last advertise  -->
    <div id="last-advertise" class="bg-custom custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="lastr-ad">
                        <img src="img/body_card3.png" alt="" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer  -->
    <div id="footer" class="custom-pad">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="fts-one">
                        <img src="img/logo2_footer.png" alt=""> <br>
                        <p class="ftsone-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero illo eveniet sint aut consectetur voluptatem.</p> <br>
                        <p>198 West 21th Street, Suite 721 New</p>
                        <p>York,NY 10010</p> <br>
                        <p>Phone: +95 (0) 123 456 789 , Cell: +95 (0) 123 456 789</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="fts-tw">
                        <h4>Popular Post</h4>
                        @foreach ($popularFooter as $popularPostsInfooter)
                        <div class="popular d-flex">
                            <img src="{{asset($popularPostsInfooter->image)}}" alt="" style="height:70px;width:80px;border-radious:15px;">
                            <div class="popular-detail">
                                <h6><a href="{{route('news.details',$popularPostsInfooter->id)}}">{{$popularPostsInfooter->post_title}}</a></h6>
                                <p>{{$popularPostsInfooter->user->name}} | {{$popularPostsInfooter->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="popular d-flex">
                            <img src="img/footer_post1.png" alt="">
                            <div class="popular-detail">
                                <h6><a href="">Scarlett’s disappointment at latest accolade</a></h6>
                                <p>Jhon | 2 hours ago</p>
                            </div>
                        </div>
                        <div class="popular d-flex">
                            <img src="img/footer_post1.png" alt="">
                            <div class="popular-detail">
                                <h6><a href="">Scarlett’s disappointment at latest accolade</a></h6>
                                <p>Jhon | 2 hours ago</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="fts-three">
                        <img src="{{asset('img/body_card4.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- copy-right -->
    <div id="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy">
                        <p>Copyright @2025 All rights reserved | Developed By <a href="">Hridoy</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- back to top button -->
    <a href="#"><i class="fa-solid fa-circle-arrow-up"></i></a>

    {{-- Log Out Modal  --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">
              <h4>Do you really want to log out?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Log Out</button>
                </form> 
            </div>
          </div>
        </div>
    </div>


    <!-- bootstrap js & pipper cdn link  -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> --}}
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

   
    <!-- fontawesome cdn js  -->
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
    
     <!-- jquery cdn link  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            // Back to Top scroll
            $(window).scroll(function() {
                var showAfter = 200;
                if ($(this).scrollTop() >= showAfter) { 
                    $('.fa-circle-arrow-up').css('visibility', 'visible');
                    $('.fa-circle-arrow-up').css('opacity', '1');
                } else {
                    $('.fa-circle-arrow-up').css('visibility', 'hidden');
                    $('.fa-circle-arrow-up').css('opacity', '0');
                }
            });

            // Click event to scroll to top
            $('.fa-circle-arrow-up').click(function() {
                $('html, body').animate({ scrollTop: 0 }, 800);
                return false;
            });
        });
    </script>
    @yield('extra-js')
    
</body>
</html>