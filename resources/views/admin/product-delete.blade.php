@extends('layouts.adminapp')
@section('admincontent')

    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" style="color: white; text-decoration: none;" href="{{route('admin')}}">
                    Bowy
                </a>
                <a style="color: white; text-decoration: none;" class="sidebar-brand brand-logo-mini"
                   href="{{route('admin')}}">
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
{{--                <li class="nav-item menu-items active">--}}
{{--                    <a class="nav-link" href="{{route('admin')}}">--}}
{{--              <span class="menu-icon">--}}
{{--                <i class="mdi mdi-speedometer"></i>--}}
{{--              </span>--}}
{{--                        <span class="menu-title">Update Users</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

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
                    <!--  <ul class="navbar-nav w-100">
                       <li class="nav-item w-100">
                         <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                           <input type="text" class="form-control" placeholder="Search products">
                         </form>
                       </li>
                     </ul> -->
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
                                    <h4 class="card-title">Products</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>user id</th>
                                                <th>заголовок объявления</th>
                                                <th>стоимость</th>
                                                <th>город</th>
                                                <th>регион</th>
                                                <th>марка автомобиля</th>
                                                <th>описание объявления</th>
                                                <th>тип кузова</th>
                                                <th>руль</th>
                                                <th>год выпуска</th>
                                                <th>коробка передачи</th>
                                                <th>адрес</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product as $products)
                                                <tr>
{{--                                                    <td>--}}
{{--                                                        <span class="pl-2"> {{$products->user_id}}</span>--}}
{{--                                                    </td>--}}
                                                    <td> {{$products->user_id}}   </td>
                                                    <td> {{$products->headline}}   </td>
                                                    <td> {{$products->price}}  </td>
                                                    <td> {{$products->city}}  </td>
                                                    <td> {{$products->region}} </td>
                                                    <td> {{$products->car_model}} </td>
                                                    <td> {{$products->description}} </td>
                                                    <td> {{$products->body_type}} </td>
                                                    <td> {{$products->rudder}} </td>
                                                    <td> {{$products->year_of_issue}} </td>
                                                    <td> {{$products->transmission}} </td>
                                                    <td> {{$products->address}} </td>
                                                    <td>
                                                        <div style="display: flex">
                                                            <a href="{{route('admin.update',$products->id)}}" class="update badge badge-outline-danger" style="width: 100%; height: 100%; background: unset;color: #0ba9e5;border: 1px solid #0ba9e5;margin-right: 10px;">
                                                                Update</a>
                                                            <button data-id="{{$products->id}}"
                                                                    class="delete-products-btn badge badge-outline-danger"
                                                                    style="width: 100%; height: 100%; background: unset; color: red; border: 1px solid red">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
