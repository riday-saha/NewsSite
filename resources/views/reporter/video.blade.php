@extends('admin.mastertemplate')

@section('admin_title')
    Video | Dashboard
@endsection


@section('sidebar')
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('reporter.dashboard')}}">
        <div class="sidebar-brand-text mx-3">Reporter</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('reporter.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('reporter.post')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Add Post</span></a>
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pge-title text-center mb-5">
                    <h3>Youtube video for the Site</h3>
                </div>
                <form action="{{route('createyoutube.video')}}" method="post" style="width: 70%; margin:auto">
                    @csrf
                    <label for="video name">Video Name</label>
                    <input type="text" class="form-control" name="video_name" placeholder="Set a name for this video">
                    <label for="video link">Link</label>
                    <input type="text" name="new_video" id="new_video" class="new_video form-control" placeholder="Paste a Video link">
                    <br>
                    <button type="submit" class="btn btn-success">Add New Video</button>
                </form>
            </div>
        </div>
    </div>
@endsection