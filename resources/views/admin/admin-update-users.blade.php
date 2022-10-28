@extends('layouts.adminapp')
@section('admincontent')
    {{--        @dd($users->id)--}}
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" style="color: white; text-decoration: none;" href="{{route('admin')}}">
                    Bowy
                </a>
                <a style="color: white; text-decoration: none;" class="sidebar-brand brand-logo-mini"
                   href="/public/admin">
                    BB
                </a>
            </div>
            <ul class="nav">
            <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items active">
                    <a class="nav-link" href="{{route('admin')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                        <span class="menu-title">Users</span>
                    </a>
                </li>
                <li class="nav-item menu-items active">
                    <a class="nav-link" href="{{route('products')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                        <span class="menu-title">Products</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a style="color: white; text-decoration: none;" class="navbar-brand brand-logo-mini"
                       href="/public/admin">
                        B
                    </a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch"
                     style="justify-content: flex-end;">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                            data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <!-- <img class="img-xs rounded-circle" src="http://194-67-111-30.cloudvps.regruhosting.ru/public/assets/images/faces/face15.jpg" alt=""> -->
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Admin1</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                 aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{route('admin.logout')}}" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">
                                            Log out
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>
                        </li>
                    </ul>

                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Users</h4>
                                    <div class="table-responsive">
                                        <form class="admin-update-users" method="post">
                                            @csrf

                                            <tbody>
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                <label for="Name">имя</label>
                                                <input onfocus="this.value=''" type="text"
                                                       name="name" value="{{$user->name}}">
                                                <label for="email">электронная почта</label>
                                                <input onfocus="this.value=''"  type="text"
                                                       name="Email" value="{{$user->email}}">
                                                <label for="surname">фамилия</label>
                                                <input onfocus="this.value=''"  type="text"
                                                       name="Surname" value="{{$user->surname}}">
                                                <label for="number">Телефон</label>
                                                <input onfocus="this.value=''" type="text"
                                                       name="Number" value="{{$user->number}}">
                                                <label for="City">город</label>
                                                <input onfocus="this.value=''" type="text"
                                                       name="City" value="{{$user->city}}">

                                            <button type="submit" class="update badge-outline-danger" style="border: 1px solid #27d5c5;
                                                                                                                 border-radius: 5px;
                                                                                                                 margin-top: 20px;
                                                                                                                 color: #27d5c5;height: 100%; background: unset; ">
                                                Update
                                            </button>
                                        </form>

                                        </tbody>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Bowy.com 2022</span>
                        <!--   <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Development by <a href="http://justcodedigital.com/" target="_blank">JustCode Development company</a></span> -->
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
