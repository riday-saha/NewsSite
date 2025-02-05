@extends('admin.mastertemplate')

@section('admin_title')
    Admin | Dashboard
@endsection

@section('sidebar')
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.category')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Category</span>
        </a>
    </li>

    <!-- Nav Item - Posts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.posts')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Posts</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Posts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.posts')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pending Posts</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{route('all.video')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Video</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center frstcaroModels">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    First Carousel Content
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="" class="btn btn-success btn-sm slt_fstcaro" data-bs-target="#fstcaroModal"
                                    data-bs-toggle="modal">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    First Sidebar Content
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="" class="btn btn-primary btn-sm" data-bs-target="#sidebarOneModal"
                                    data-bs-toggle="modal">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Second Sidebar Content
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="" class="btn btn-warning btn-sm"  data-bs-target="#sidebarTwoModal"
                                    data-bs-toggle="modal">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- add modal for first carousel--}}
    <div class="modal fade" id="fstcaroModal" tabindex="-1" aria-labelledby="fstcaroModalLabel" aria-hidden="true">
        <form action="" method="post" class="cat-form">
            @csrf
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="fstcaroModalLabel">Select Category for First Carousel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="error-show">
                        
                    </div>
                    <select class="form-select" aria-label="Default select example" name="first_carousel" id="first_carousel">
                        
                        @foreach ($get_all_categos as $get_all_category)
                        <option value="{{$get_all_category->id}}">{{$get_all_category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary slt_fstcaro">Select</button>
                </div>
            </div>
            </div>
        </form>
    </div>

    {{-- select content for 1st sidebar--}}
    <div class="modal fade" id="sidebarOneModal" tabindex="-1" aria-labelledby="sidebarOneModalLabel" aria-hidden="true">
        <form action="" method="post" class="cat-form">
            @csrf
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="sidebarOneModalLabel">Select Category for First Sidebar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="error-show">
                        
                    </div>
                    <select class="form-select" aria-label="Default select example" name="first_sidebar" id="first_sidebar">
                        
                        @foreach ($get_all_categos as $get_all_category)
                        <option value="{{$get_all_category->id}}">{{$get_all_category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary slt_firstsidebar">Select</button>
                </div>
            </div>
            </div>
        </form>
    </div>


    {{-- select content for 2nd sidebar--}}
    <div class="modal fade" id="sidebarTwoModal" tabindex="-1" aria-labelledby="sidebarTwoModalLabel" aria-hidden="true">
        <form action="" method="post" class="cat-form">
            @csrf
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="sidebarTwoModalLabel">Select Category for Second Sidebar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="error-show">
                        
                    </div>
                    <select class="form-select" aria-label="Default select example" name="second_sidebar" id="second_sidebar">
                        
                        @foreach ($get_all_categos as $get_all_category)
                        <option value="{{$get_all_category->id}}">{{$get_all_category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary slt_secondsidebar">Select</button>
                </div>
            </div>
            </div>
        </form>
    </div>
@endsection
@include('admin.adminindex_script')