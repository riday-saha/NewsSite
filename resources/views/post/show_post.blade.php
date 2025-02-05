@extends('admin.mastertemplate')

@section('admin_title')
    Posts | admin
@endsection

@section('sidebar')
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">
            @if (Auth::user()->user_type === 'admin')
                Admin
            @else
                Reporter
            @endif
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.category')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Category</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.posts')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Posts</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection

@section('extra_css')
    <style>
        .pge-title h3{
            color: rgb(255 129 0);
            font-weight: 700;
        }

        .table{
            color: black
        }

        .view-data h3{
            color: black;
            font-weight:700;
            font-size: 22px
        }

        .view-data h4{
            color: rgb(190 22 22);
            font-weight:700;
            font-size: 20px
        }

        .view-data p{
            color: rgb(190 22 22);
            font-size: 15px;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="pge-title text-center mb-5">
                    <h3>Single Post</h3>
                </div>
                <div class="view-data">
                    <h3>Title</h3>
                    <h4 class="mb-4">{{$seen_id->post_title}}</h4>
                    <h3>Description</h3>
                    <p class="mb-4">{{$seen_id->post_description}}</p>
                    <h3>Status</h3>
                    <h4 class="mb-4">{{$seen_id->status}}</h4>
                    <h3>Author</h3>
                    <h4 class="mb-4">{{$seen_id->user->name}}</h4>
                    <h3>Category</h3>
                    <h4 class="mb-4">{{$seen_id->categury->category_name}}</h4>
                    <h3>Image</h3>
                    <img src="{{asset($seen_id->image)}}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

