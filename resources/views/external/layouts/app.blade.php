<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    
    <!--Designerd by: -->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>PRIS - Petroleum Resources Intelligent System</title>
        <meta content="PRIS" name="Petroleum Resources Inteligent System" />
        <meta content="Snapnet" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

         <!-- App Icons -->
        <link rel="shortcut icon" href="{{ asset('assets/images/PRIS Icon.png') }}">

        <!--Morris Chart CSS -->
        {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}"> --}}

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- Magnific popup -->
        <link href="{{ asset('assets/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">

        <!-- Sweet Alert -->
        <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Alertify css -->
        <link href="{{ asset('assets/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css">

        <!-- Plugins css -->
        <link href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

        <!-- Dropzone css -->
        <link href="{{ asset('assets/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css">

        <!-- DataTables -->
        <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Summernote css -->
        <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />

        <!-- PACE css -->
        <link href="{{ asset('assets/css/pace.css') }}" rel="stylesheet" type="text/css" />

        <!-- toast plugins  -->
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" />

        @yield('css')

        <style type="text/css">
            *
            {
                font-size: 11px;
            }

            .header_bg
            {
                 background-color: #0097a7; color: #ffffff; 
            }
            .checkall
            {
                width: 1.6em; height: 1.5em; margin-top: 0px;
            }



            /* IFRAME CSS */
            .resp-container 
            {
                position: relative;
                overflow: hidden;
                padding-top: 56.25%;
            }

            .resp-iframe 
            {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: 0;
            }
            .form-control
            {
                font-size: 13px;
            }

            .timeline-height
            {
                height: 500px;
            }

            .cd-date
            {
                color: :#000;
            }
            .head_bg
            {
                background-color: #6495ED; color: #fff;
            }

            .remark-pad
            {
                border: #e1e1e1 thin dotted; padding: 5px 0px; margin: 10px 1px;
            }

            /*#topnav .has-submenu ul li a:hover*/
            
            .dropdown-item:hover
            {
                background-color: #36454F; color:#fff;
            }

            /*#topnav .has-submenu ul li a:hover*/
            .highlight-submenu:hover
            {
                cursor: pointer; background-color: #e1e1e1; color: white;
            }

            .submenu:hover
            {
                cursor: pointer; background-color: rgba(255, 255, 255, 0.1); color: black;
            }

            .has-submenu:hover
            {
                cursor: pointer; background-color: rgba(255, 255, 255, 0.1); color: black;
            }

            .btn-round
            {
                background-color: #202020; color:#fff; font-size: 13px !important; border-radius: 50%;
            }

        </style>

    </head>
    

    <body>


        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main" style="background-color:#008B8B; ">
                <div class="container-fluid" style="width: 100%">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                        <!--Upcube-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="{{route('dashboard')}}" class="logo">
                            <!-- <img src="{{URL::asset('assets/images/snapnet.png')}}" alt="" height="22" class="logo-small"> -->
                            <img src="{{URL::asset('assets/images/PRIS Logo - White.png')}}" alt="" height="45" class="logo-large">
                            <span style="font-weight:lighter;"> Petroleum Resources Intelligent System  </span>
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">
                        @yield('search')




                       <!--  Search input
                         <div class="search-wrap" id="search-wrap">
                            <div class="search-bar">
                                <input class="search-input" type="search" placeholder="Search" />
                                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                    <i class="mdi mdi-close-circle" style="font-size:20px"></i>
                                </a>
                            </div>
                        </div> -->
      
                        <ul class="list-inline float-right mb-0">
                            <!-- Search -->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                                    <i class="mdi mdi-magnify noti-icon" style="font-weight:lighter; font-size:20px"></i>
                                </a>
                            </li>


                            <!-- Messages-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-email-outline noti-icon" style="font-weight:lighter; font-size:20px"></i>
                                    <!-- <span class="badge badge-danger noti-icon-badge">1</span> -->  <!-- FOR NOTIFICATION -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5><span class="badge badge-danger float-right">0</span>Messages</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="{{URL::asset('assets/images/user.png')}}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                        <p class="notify-details"><b>     </b><small class="text-muted">                  </small></p>
                                    </a>

                                    
                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item"> View All </a>

                                </div>
                            </li>


                            <!-- notification-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-bell-outline noti-icon" style="font-weight:lighter; font-size:20px"></i>
                                    <!-- <span class="badge badge-danger noti-icon-badge">1</span>  --> <!-- FOR NOTIFICATION -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>Notification 0</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                        <p class="notify-details"><b> Message received</b><small class="text-muted"> Null   </small></p>
                                    </a>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">   View All </a>

                                </div>
                            </li>


                             <!-- User-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="{{URL::asset('assets/images/settings.png')}}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-account text-muted"></i> Profile</a> -->
                                    
                                    @if(Auth::guard('external')->user()->role_obj->permission->contains('constant', 'add_users') ||
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_users') ||
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'add_roles') ||
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'configure_notification') )<!-- <span class="badge badge-success pull-right m-t-5">5</span> -->
                                        <a class="dropdown-item" href="{{route('admin.settings')}}">  <i class="mdi mdi-settings text-muted"></i> Settings</a>
                                    @endif
                                    
                                    @if(Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_concession') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'approve_concession') ||  
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_companies') ||
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'approve_companies') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_fields') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'approve_fields') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_contract') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'approve_contract') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_contract') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'approve_contract') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_stream') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'approve_stream') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_facilities') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'approve_facilities') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_location') || 
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'approve_location') )
                                        <a class="dropdown-item" href="{{route('admin.setup')}}"> <i class="mdi mdi-book text-muted"></i> Master Data</a>
                                    @endif
                                    <div class="dropdown-divider"></div> 
                                    @if(Auth::guard('external')->user()->role_obj->permission->contains('constant', 'access_audit') ||
                                        Auth::guard('external')->user()->role_obj->permission->contains('constant', 'manage_audit') ) 
                                        <a class="dropdown-item" href="{{route('admin.audit')}}"><i class="mdi mdi-login text-muted"></i> Audit Log</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('admin.change-password')}}"><i class="mdi mdi-lock text-muted"></i> Change Password</a>
                                    <form action="{{url('logout')}}" method="post"> {{ csrf_field() }} 
                                        <button class="dropdown-item" href="#"><i class="mdi mdi-power text-muted"></i> Logout</button>
                                    </form>
                                </div>
                            </li>

                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>

                        
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->




            <!-- MENU Start -->
            <div class="navbar-custom" style="background-color:#36454F; color:#fff">
                <div class="container-fluid" style="width: 100%">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{route('dashboard')}}" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-apps"></i>Dashboard</a>
                            </li>                        
                            
                            <li class="has-submenu">
                                <a href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-animation"></i> Publications</a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="{{route('library')}}" style="font-size:13px; color:#202020"> NOGIAR Publications Library</a>
                                    </li>

                                    <li class="">
                                        <a href="#" style="font-size: 13px; color:#202020">DWP</a>
                                    </li>

                                    <li class="">
                                        <a href="#" style="font-size: 13px; color:#202020">OPEC</a>
                                    </li>
                                    
                                </ul>
                            </li>   

                            

                            {{-- <li class="submenu">
                                <a href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-poll" ></i>History</a>
                            </li>  --}}

                            <li class="submenu">
                                <a href="http://support.snapnet.com.ng" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-comment-account-outline" ></i>Support</a>
                            </li>



                            {{-- <li class="pull-right">
                                <a href="#" style="font-size: 11px; color:#e1e1e1; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-account-key"></i>{{\Auth::guard('external')->user()->name}}</a>
                            </li>  --}}

                            {{-- <li class="pull-right">
                                <a href="#" data-toggle="modal" data-target="#sign-up" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="fa fa-user" ></i>Sign up</a>
                            </li>   --}}


                            <!-- Authentication Links -->
                            @guest('external')
                                <li class="pull-right">
                                    <a href="{{ route('external.auth.login') }}" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="fa fa-lock" ></i>Login</a>
                                </li>
                                <li class="pull-right">
                                    <a href="{{ route('external.register') }}" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="fa fa-user-plus" ></i>Sign Up</a>
                                </li>
                            @else
                                <li class="dropdown pull-right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important">{{ Auth::guard('external')->user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('external.auth.logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();" style="color: #202020; padding: 2px 10px; font-size: 14px">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('external.auth.logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest

                            <li class="pull-right">
                                <a href="#" data-toggle="modal" data-target="#view-cart" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important" id="icart" onclick="load_items_in_cart()"><i class="fa fa-shopping-basket text-warning" ></i> 
                                    @if(\Auth::guard('external')->check())
                                        @php 
                                            $cart = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->count(); echo $cart.' Item(s)'; 
                                        @endphp
                                    @endif
                                </a>
                            </li>      

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid" style="width: 100%">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-7">
                        <div class="page-title-box">
                            <div class="btn-group">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">PRIS</a></li>
                                    <li class="breadcrumb-item active">
                                        <?php
                                            $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
                                            foreach($crumbs as $crumb)
                                            {
                                                echo ucfirst(str_replace([".php","_"],[""," "],$crumb) . ' ');
                                            }
                                        ?>
                                    </li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>

                        <!-- Notification Alerts -->
                        <div class="col-sm-5"> <br>
                            {{-- <div id="succ_alert_msg" class="alert alert-info alert-dismissible fade show pull-right" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span id="succ" style="text-transform: initial;">  </span> 
                            </div>

                            <div id="err_alert_msg" class="alert alert-danger alert-dismissible fade show pull-right" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span id="err" style="text-transform: initial;">  </span>  
                            </div> --}}


                            {{-- @if(session('info'))
                                <div class="alert alert-success alert-dismissible fade show pull-right" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <span id="" style="text-transform: initial;"> {{session('info')}} </span>
                                </div>

                            @elseif(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show pull-right" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <span id="" style="text-transform: initial;"> {{session('error')}} </span>
                                </div>
                            @endif --}}
                        </div>
                </div>
                <!-- end page title end breadcrumb -->


                    @yield('content')


                           <div id="confirmModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header header_bg">
                                    <h4 class="modal-title"> Reason For Action </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                  </div>
                                  <div class="modal-body">
                                  
                                    <textarea id="reason" class="form-control" rows="8"></textarea>

                                  </div>
                                  <div class="modal-footer">
                                      <button class="btn btn-success" id="lock_dwp" onclick="decideDwpEdit(1,$('#dwp_year').val())">Block Edit</button>
                                      <button class="btn btn-danger" id="unlock_dwp" onclick="decideDwpEdit(0,$('#dwp_year').val())">Allow Edit</button>
                                  </div>
                                </div>
                            </div>  
                        </div>
                
                <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid" style="width: 100%">
                <div class="row">
                    <div class="col-12">
                        © {{ date('Y') }} PRIS -  <i class="mdi mdi-power text-danger"></i> by Snapnet.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->







            <!-- The Modal -->
            <form id="external-user-form" action="{{url('/admin/add_external_users/')}}" method="POST">
            @csrf

            <div class="modal" id="sign-up">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title text-dark" id="pub-title" >Register  </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    

                    <div class="p-3 text-dark">

                            <div class="form-group row">
                                <label for="year_rc" class="col-sm-2 col-form-label"> Email </label>
                                <div class="col-10">
                                    <input class="form-control" type="email" required="" placeholder="Email" name="email" id="email" focused>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year_rc" class="col-sm-2 col-form-label"> Fullname </label>
                                <div class="col-10">
                                    <input class="form-control" type="text" required="" placeholder="Fullname" name="name" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year_rc" class="col-sm-2 col-form-label"> Password </label>
                                <div class="col-10">
                                    <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password">
                                </div>
                            </div> 

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label font-weight-normal" for="customCheck1 checked">I accept 
                                            <a href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>

                           
                    </div>


                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button class="btn btn-dark btn-sm" id="register-ext" type="submit">Register</button>
                  </div>

                </div>
              </div>
            </div>
           </form>


           <!-- The Modal -->
            <div class="modal" id="view-cart">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header text-dark">
                    <h4 class="modal-title" id="pub-title">Your Cart <span class="badge badge-pill badge-warning" style="margin-top: -5px"> 
                     {{-- {{$cart}}  --}}
                 </span> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        

                            <div class="" id="your-cart"> 
                                <div class="table-responsive" style="border: thin dotted #e1e1e1"> 
                                    <table class="table table-sm table-striped text-dark">
                                        <thead class="thead-dark">
                                            <tr>
                                                <td style="padding: 3px 10px">#</td>
                                                <td style="padding: 3px 10px">Image</td>
                                                <td style="padding: 3px 10px">Item</td>
                                                <td style="padding: 3px 10px">Qty</td>
                                                <td style="padding: 3px 10px">Price</td>
                                                <td style="padding: 3px 10px">Subtotal</td>
                                                <td style="padding: 3px 10px"></td>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @php $total = 0; $carts = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->get(); @endphp
                                            @forelse($carts as $cart)
                                                <tr id="row_{{$cart->id}}"> 
                                                    <td style="padding: 3px 10px">{{$cart->id}}</td>
                                                    <td style="padding: 3px 10px"><img src="{{URL::asset('assets/images/nogiar-3D.jpg')}}" alt="" height="20" class=""></td>
                                                    <td style="padding: 3px 10px">{{$cart->product->nogiar_id}}</td>
                                                    <td style="padding: 3px 10px">{{$cart->quantity}}</td>
                                                    <td style="padding: 3px 10px">&#8358;{{number_format($cart->price, 2)}}</td>
                                                    <td style="padding: 3px 10px">&#8358;{{number_format($cart->subtotal, 2)}}</td>
                                                    <td style="padding: 3px 10px">  @php $total += ($cart->price * $cart->quantity); @endphp
                                                       <form method="post" action="{{ route('remove-item', $cart->id)}}">
                                                           @method('delete')
                                                           @csrf
                                                           <button type="submit" class="" style="background-color: #C04000; color: #fff" onclick="return confirm('Are you sure you want to remove item from cart?')"> <i class="fa fa-close"></i> </button>
                                                       </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                No Item In Cart !
                                            @endforelse
                                                {{-- <tr>
                                                    <td style="padding: 3px 10px; text-align: right" colspan="7">
                                                        Total : &#8358;{{number_format($total, 2)}}
                                                    </td>
                                                </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    <a href="{{ route('make-payment') }}" class="btn btn-warning pull-right"> <i class="fa fa-money"></i> Pay</a>
                  </div>

                </div>
              </div>
            </div>





        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

        <!--Morris Chart-->
        {{-- <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script> --}}
        <!-- Chart JS -->
        <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->

        <script src="{{ asset('assets/pages/dashborad.js') }}"></script>
        {{-- @yield('morris') --}}

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>    
         
        <!-- Magnific popup -->
        <script src="{{ asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/pages/lightbox.js') }}"></script>       

        <!-- Sweet-Alert  -->
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/pages/sweet-alert.init.js') }}"></script>

        <!-- Alertify js -->
        <script src="{{ asset('assets/plugins/alertify/js/alertify.js') }}"></script>
        <script src="{{ asset('assets/pages/alertify-init.js') }}"></script>

        <!-- Plugins js -->
        <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>

        <!-- Plugins Init js -->
        <script src="{{ asset('assets/pages/form-advanced.js') }}"></script>

        <!-- Dropzone js -->
        <script src="{{ asset('assets/plugins/dropzone/dist/dropzone.js') }}"></script>


        <!-- Required datatable js -->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>

        <!-- TOAST SCRIPT  -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"></script>
        <!-- PACE  js -->
        <script src="{{ asset('assets/js/pace.min.js') }}"></script>

        <!--Summernote js-->
        <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>


        {{-- cart script --}}
            <script>  
               
                //FOR CART Functionality
                $(function()
                {   
                    $("#cartItemForm").on('submit', function(e)
                    {    
                        var id = $(this).attr('id');
                        $('#row_'+id).remove();        
                        $.ajax({
                            url:'{{url('/remove-item-from-cart')}}/'+id
                            data:{
                                id:id,
                                _method:'delete',
                                _token:'{{csrf_token()}}'

                            },
                            type:'POST',
                            success:function(data)
                            {  
                                return toastr.success('Item Remove From Cart Successfully.');
                            },
                            error:function()
                            {
                                toastr.error('Error');           
                            } 
                        });

                        return e.preventDefault();
                        
                    });
                });

            </script>

        <script>
            jQuery(document).ready(function()
            {
                $('.summernote').summernote(
                {
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                 // set focus to editable area after initializing summernote
                });
            });
        </script>

        @yield('script')

        <script type="text/javascript">
            $(function()
            {
                //Hide alert message box
                $('#succ_alert_msg').hide();     
                $('#err_alert_msg').hide();
            });

            function lockDwp()
            {
                year =$('#dwp_year').val();

                $('#confirmModal').modal('show');
            }
            
            @if(\Auth::guard('external')->user()->role_obj->role_name == 'DWP Report Manager' || \Auth::guard('external')->user()->role_obj->role_name == 'Admin')
            function decideDwpEdit(type,year)
            {
                sure=confirm('Are you Sure ?');

                if(sure){
                    $.post('{{url('dwp')}}',{
                        year:year,
                        type:'decideEdit',
                        status:type,
                        reason:$('#reason').val(),
                        _token:'{{csrf_token()}}'
                    },function(data){
                        if(data.status=='success'){
                             $('#confirmModal').modal('hide');
                             window.location.reload();
                            return toastr.success(data.message);

               
                        }
                        return toastr.error(data.message);
                    })
                    return;
                }
                return toastr.info('Operation Cancelled');
            }
        @endif


        </script>

        <script>  
            //FOR EXTERNAL USERS
            $(function()
            {   
                $("#external-user-form").on('submit', function(e)
                {   
                // alert(2);   
                // let url = ;
                // alert(url);           
                    $.ajax({
                        url:'{{route('admin.add_external_users')}}',
                        data:{
                            email:$('#email').val(),
                            name:$('#name').val(),
                            password:$('#password').val(),
                            _token:'{{csrf_token()}}'
                        },
                        type:'POST',
                        success:function(data)
                        {
                             $('#sign-up').modal('hide');
                            return toastr.success(data.info);           
                        },
                        error:function(){
                            toastr.error('Error');           
                        } 
                    });

                    return e.preventDefault();

                });


            });
        </script>

            

    </body>
</html>
