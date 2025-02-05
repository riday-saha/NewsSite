@extends('admin.mastertemplate')

@section('admin_title')
    Video | Dashboard
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
    @if (Auth::user()->user_type === 'admin')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @else
    <li class="nav-item active">
        <a class="nav-link" href="{{route('reporter.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @endif
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    @if (Auth::user()->user_type === 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.category')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Category</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.category')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pending Posts</span>
        </a>
    </li>
    @endif

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.posts')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Posts</span>
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

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">



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
                    <h3>All Youtube Video Link</h3>
                </div>
                <div>
                    <a href="{{route('youtube.video')}}" class="btn btn-success  mb-3 fw-bold">Create New Video Link</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                          <tr>
                            <th scope="col">Video Name</th>
                            <th scope="col">Video Link</th>
                            <th scope="col">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($get_allvdo as $get_allvdoes)
                            <tr>
                                <td>{{$get_allvdoes->utube_title}}</td>
                                <td>{{$get_allvdoes->youtube}}</td>
                                <td>
                                    <a href="{{route('update.video',$get_allvdoes->id)}}" class="btn btn-primary btn-sm edits_btn"
                                    >Edit</a>
                                    <a href="{{route('delete.video',$get_allvdoes->id)}}" 
                                        class="btn btn-danger btn-sm view_btn"
                                    >Delete
                                    </a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection