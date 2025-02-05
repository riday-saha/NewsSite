@extends('admin.mastertemplate')

@section('admin_title')
    Admin | Category
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
                    <h3>Category</h3>
                </div>
                <div>
                    <a href="" class="btn btn-success  mb-3 fw-bold" data-bs-toggle="modal" data-bs-target="#cataddModal">Add Category</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                          <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($all_category as $categories)
                          <tr>
                            <td>{{$categories->category_name}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm update_catego"
                                    data-cat_name="{{$categories->category_name}}"
                                    data-cat_id="{{$categories->id}}"
                                    data-bs-target="#catupModal"
                                    data-bs-toggle="modal"
                                >Edit</a>
                                <a href="" class="btn btn-danger btn-sm dlt_category"
                                    data-dltcat_id="{{$categories->id}}"
                                >Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                {{-- add modal --}}
                <div class="modal fade" id="cataddModal" tabindex="-1" aria-labelledby="cataddModalLabel" aria-hidden="true">
                    <form action="" method="post" class="cat-form">
                        @csrf
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cataddModalLabel">Add Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="error-show">
                                    
                                </div>
                                <input type="text" placeholder="Add Category" name="cat_name" class="cat_name form-control">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary add_cat">Add</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.update_category')
@include('admin.category_script')
