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
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('all.posts')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pending Posts</span>
        </a>
    </li> --}}
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
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="pge-title text-center mb-5">
                    <h3>All Posts</h3>
                </div>
                <div>
                    <a href="" class="btn btn-success  mb-3 fw-bold" data-bs-toggle="modal" data-bs-target="#postaddModal">Create New Post</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_posts as $all_post)
                            <tr>
                                <td>{{$all_post->post_title}}</td>
                                <td>
                                    @if ($all_post->status == 'pending')
                                    <a href="{{route('active.post',$all_post->id)}}" class="btn btn-success btn-sm">Active</a>
                                    @else
                                    <a href="{{route('pending.post',$all_post->id)}}" class="btn btn-warning btn-sm">Pending</a> 
                                    @endif
                                </td>
                                <td>{{$all_post->user->name}}</td>
                                <td>{{$all_post->categury->category_name}}</td>
                                <td>
                                    @if ($all_post->trending == 0)
                                    <a href="{{route('tranding.active',$all_post->id)}}" class="btn btn-success btn-sm">YES</a>
                                    @else
                                    <a href="{{route('tranding.inactive',$all_post->id)}}" class="btn btn-warning btn-sm">NO</a> 
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm edits_btn"
                                        data-post_id="{{$all_post->id}}"
                                        data-posting_title="{{$all_post->post_title}}"
                                        data-posting_descrip="{{$all_post->post_description}}"
                                        data-posting_image="{{asset($all_post->image)}}"
                                        data-posting_catego="{{$all_post->categury->id}}"
                                        data-bs-toggle="modal" data-bs-target="#postupModal"
                                        >Edit
                                    </a>

                                    <a href="" class="btn btn-danger btn-sm delets_btn"
                                        data-dlt_pid="{{$all_post->id}}"
                                        >Delete
                                    </a>
                                    <a href="{{route('single.posts',$all_post->id)}}" 
                                        class="btn btn-secondary btn-sm view_btn"
                                        >View
                                    </a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                {{-- add modal --}}
                <div class="modal fade" id="postaddModal" tabindex="-1" aria-labelledby="postaddModalLabel" aria-hidden="true">
                    <form action="" method="post" enctype="multipart/form-data" class="post-form">
                        @csrf
                        <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="postaddModalLabel">Add Post</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="error-show">
                                    
                                </div>
                                <input type="text" placeholder="Post Title" name="post_name" id="post_name" value="{{old('post_name')}}" class="post_name form-control mb-3">
                                <textarea name="post_descripiton" placeholder="Post Description" id="post_description" class="form-control mb-3" cols="30" rows="10">{{old('post_descripiton')}}</textarea>
                                <select class="form-select mb-3" aria-label="Default select example" name="post_catego">
                                    <option selected>Select Category</option>
                                    @foreach ($get_category as $get_categories)
                                    <option value="{{$get_categories->id}}">{{$get_categories->category_name}}</option>
                                    @endforeach
                                </select>
                                <input type="file" class="form-control" name="post_image" id="post_image">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary add_post">Add Post</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('post.update_post')
@include('post.post_script')
