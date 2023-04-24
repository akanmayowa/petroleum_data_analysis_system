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
        
          <!-- CSRF Token -->
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <script>
            window.laravel = { csrfToken: '{{ csrf_token() }}'  }
          </script>

        <!-- App Icons -->
        <link rel="shortcut icon" href="{{ asset('assets/images/PRIS Icon.png') }}">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

        <!-- App css -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

        <!-- PACE css -->
        <link href="{{ asset('assets/css/pace.css') }}" rel="stylesheet" type="text/css" />
       <!-- toast plugins  -->
        <link href="{{ asset('assets/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" /> --}}

        <link href="{{ asset('assets/css/botchat.css') }}" rel="stylesheet" />

        <link href="{{asset('RWD-Table-Patterns/dist/css/rwd-table.min.css')}}" rel="stylesheet" type="text/css" media="screen">


        @yield('css')

        <style type="text/css">
            body, div, table, thead, tbody, tfoot, tr, th, td, p 
            {
                font-family: "Calibri";
                font-size: small;
            }
            *
            {
                font-size: 12px;
            }
            a
            {
                color: #202020;
            }
            .nav-pills .nav-link.active, .nav-pills .show>.nav-link
            {
                background-color: #008B8B; color: #fff;
            }
            .nav-pad a
            {
                padding:4px 10px;
                border: #e1e1e1 thin solid;
            }
            .nav-pad a:hover
            {
                padding:4px 10px;
                border: #e1e1e1 thin solid;
                background-color: #008B8B;          /*36454F*/
                color: #fff;
            }
            .nav-active 
            {
                background-color: #0f9cf3;
            }
            
            .head_bg
            {
                 background-color: #202020; color: #ffffff;    /*background-color: #6495ED; color: #ffffff;*/ 
            }

            .head_bg_dark
            {
                 background-color: #202020; color: #ffffff; 
            }
            .header_bg
            {
                 background-color: #202020; color: #ffffff; 
            }

            .app_bg
            {
                 /*background-color: #202020; color: #ffffff; */
            }

            .app_modal_bg
            {
                 /*background-color: #666; color: #ffffff; */
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
                font-size: 12px;
            }
            .pad
            {
                font-size: 10px;
                height: 1px;
                padding-top: 0px;
                padding-bottom: 0px;
            }
            .excel-button
            {
                cursor: pointer; 
                border:#ccc thin solid; 
                font-size:10px; 
                border-radius:4px; 
                margin-right: 10px;
                background-color: #B22222;
                color: #fff;
            }
            .approve-button
            {
                cursor: pointer; 
                color: #fff; 
                border:#ccc thin solid; 
                font-size:10px; 
                border-radius:4px; 
                margin-right: 10px;
                background-color: #202020;/*006B3C*/
                margin-top: -2px;
            }
            .approve-btn
            {
                cursor: pointer; 
                color: #fff; 
                border:#ccc thin solid; 
                font-size:10px; 
                border-radius:4px; 
                margin-right: 10px;
                background-color: #006B3C;
            }

            /*
            .approve-button:hover
            {
                cursor: pointer; 
                color: #202020; 
                border:#ccc thin solid; 
                font-size:10px;       
                border-radius:4px; 
                margin-right: 10px;
                background-color: #fff;
                color: #fff;
            }*/

            /*iframe
            {
                border:none;
            }*/

            .bold-label
            {
                background: #B2BEB5; font-weight: bolder;
            }

            #chatBtn
            {
                border-radius: 20px;
            }


            .tb-row-height
            {
                font-size: 11px;
            }

            .th_hd
            {
                font-size: 11px; padding: 0px;
            }

            .th_head
            {
                background-color: #9BDDFF;
            }

            .th_title
            {
                margin-left: 5px; color: #292929;
            }

            .cate-class
            {
                padding: 4px 12px; cursor: pointer; border: thin solid #e1e1e1; width: 100%;
            }
            .cate-class:hover
            {
                padding: 4px 12px; cursor: pointer; width: 60%; background-color: #008B8B; color:#fff; width: 100%;
            }
            .cate-class_active
            {
               padding: 4px 12px; cursor: pointer; width: 60%; background-color: #008B8B; color:#fff; width: 100%;
            }

            .units
            {
                font-size: 9px;
            }
            .unit-header
            {
                margin-left:50px; font-style: italic;
            }

            th 
            {
                cursor: pointer;
            }
            iframe
            {
                border: none;
            }
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

            .link-color
            {
                color: #fff;
            }
            .center 
            {
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 50%;
            }

            .btn-dark
            {
                background-color: #202020; color:#fff; font-size: 13px !important;
            }

            .btn-dark:hover
            {
                background-color: #303030; color:#eee; font-size: 13px !important;
            }

            .war-modal-header
            {
                background-color: #008B8B; color:#fff;
            }

            @media (min-width: 992px) #topnav .navigation-menu > li > a
            {
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }

            .wc-header 
            {
                background-color: #008B8B!important;
                box-shadow: 0 1px rgba(0, 0, 0, 0.2);
                box-sizing: content-box;
                color: #ffffff;
                font-weight: 500;
                height: 30px;
                left: 0;
                letter-spacing: 0.5px;
                padding: 8px 8px 0 8px;
                position: absolute;
                right: 0;
                top: 0;
                z-index: 1;
            }

            .chat-div
            {
                font-size: 16px; 
                transform: translateZ(0px); 
                display: inline; 
                z-index: 100003; 
                position: fixed; 
                height: 27.00em; 
                width: 20.00em; 
                top: 72%; 
                margin-top: -16.375em; 
                left: 91.5%; 
                margin-left: -12.625em;
                background-color: #fff;
                border-radius: 8px;
                border: thin dotted #ddd;
                opacity: 0.9;
            }

            #chatShow
            {
                /*margin-top: 23%; */
                bottom: 0px; 
                right: 0px;
                z-index: 2000;
            }

            #chatHide
            {
                /*margin-top: -10%; */
                bottom: 0px; 
                right: 0px;
                position: fixed;
                z-index: 2000;
            }

            


            .modal-header
            {
                padding :10px 30px;
            }
            .modal-body
            {
                padding :15px 30px;
            }
            .modal-footer
            {
                padding :10px 0px;
            }


            .nav-pad-sub
            {
                background: #AEC6CF;      /*AEC6CF*/
            }
            .nav-pad-sub-sub
            {
                background: #E5E4E2;        /*CFCFC4*/
            }

      </style>

    </head>
    

    <body>
    <div id="app">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main" style="background-color:#0FC0C5;">
                <div class="container-fluid" style="width: 100%">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                        <!--Upcube-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="{{route('dashboard')}}" class="logo" style="margin-top: 10px">
                            <!-- <img src="{{URL::asset('assets/images/snapnet.png')}}" alt="" height="22" class="logo-small"> -->
                            <img src="{{URL::asset('assets/images/PRIS Logo - White.png')}}" alt="" height="30" class="logo-large">
                            <span style="font-weight:lighter;"> Petroleum Resources Intelligent System  </span>
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">
                        @yield('search')
                        <!-- Search input 
                        <div class="search-wrap" id="search-wrap">
                            <div class="search-bar">
                                <input class="search-input" type="search" placeholder="Search" />
                                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                    <i class="mdi mdi-close-circle" style="font-size:20px"></i>
                                </a>
                            </div>
                        </div>
 -->
                        <ul class="list-inline float-right mb-0" style="margin-top: 15px">
                            <!-- Search -->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link waves-effect toggle-search" href="#" id="global_serach" data-target="#search-wrap">
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
                                    
                                    @if(Auth::user()->role_obj->permission->contains('constant', 'add_users') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_users') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'add_roles') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'configure_notification') )<!-- <span class="badge badge-success pull-right m-t-5">5</span> -->
                                        <a class="dropdown-item" href="{{route('admin.settings')}}">  <i class="mdi mdi-settings text-muted"></i> Settings</a>
                                    @endif
                                    
                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_concession') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_concession') ||  
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_companies') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_companies') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_fields') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_fields') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_contract') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_contract') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_contract') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_contract') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_stream') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_stream') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_facilities') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_location') || 
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_location') )
                                        <a class="dropdown-item" href="{{route('admin.setup')}}"> <i class="mdi mdi-book text-muted"></i> Master Data</a>
                                    @endif
                                    <div class="dropdown-divider"></div> 
                                    @if(Auth::user()->role_obj->permission->contains('constant', 'access_audit') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_audit') ) 
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
                                <a class="link-color" href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-upload"></i>Uploads</a>
                                <ul class="submenu">
                                    <li class="highlight-submenu">
                                        <a href="{{route('upstream.index')}}" style="font-size: 13px; color:#202020">Upstream</a>
                                    </li>
                                    
                                    <li class="highlight-submenu">
                                        <a href="{{route('downstream.index')}}" style="font-size: 13px; color:#202020">Downstream</a>
                                    </li>

                                    <li class="highlight-submenu">
                                        <a href="{{route('gas.index')}}" style="font-size: 13px; color:#202020">Gas</a>
                                    </li>

                                    <li class="highlight-submenu">
                                        <a href="{{route('she-accident-report.index')}}" style="font-size: 13px; color:#202020">Health Safety Environment (HSE)</a>
                                    </li>  

                                    <li class="highlight-submenu">
                                        <a href="{{route('transport.index')}}" style="font-size:13px; color:#202020">Projects and Transportation</a>
                                    </li>

                                    <li class="highlight-submenu">
                                        <a href="{{route('economics.index')}}" style="font-size:13px; color:#202020">Revenue </a>
                                    </li>                                     
                                                               
                                    <li class="highlight-submenu">
                                        <a href="{{route('ministerial-performance.index')}}" style="font-size:13px; color:#202020">Ministerial KPI</a>
                                    </li>
                               
                                    <li class="highlight-submenu">
                                        <a href="{{route('project.index')}}" style="font-size:13px; color:#202020">DWP Data </a>
                                    </li>

                                    <li class="highlight-submenu">
                                        <a href="{{route('project.index')}}" style="font-size:13px; color:#202020">DWP Update</a>
                                    </li> 
                                </ul>
                                                                   
                                    
                               
                            </li>

                            <li class="has-submenu">
                                <a href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important;"><i class="mdi mdi-chart-areaspline"></i>Reports</a>
                                <ul class="submenu">
                                    <li class="highlight-submenu">
                                        <a href="{{route('report.nogiar.index')}}?page=reserves" style="font-size: 13px; color:#202020">Upstream</a>
                                    </li>
                                    <li class="highlight-submenu">
                                        <a href="{{route('report.nogiar.index')}}?page=crude_export" style="font-size: 13px; color:#202020">Downstream</a>
                                    </li>
                                    <li class="highlight-submenu">
                                        <a href="{{route('report.nogiar.index')}}?page=gas_supply" style="font-size: 13px; color:#202020">Gas</a>
                                    </li>
                                    <li class="highlight-submenu">
                                        <a href="{{route('report.nogiar.index')}}?page=safety_incidence" style="font-size: 13px; color:#202020">Health Safety Environment (HSE)</a>
                                    </li>
                                    <li class="highlight-submenu">
                                        <a href="#" style="font-size: 13px; color:#202020">Projects and Transportation</a>
                                    </li>
                                    <li class="highlight-submenu">
                                        <a href="{{route('report.nogiar.index')}}?page=revenue_sum" style="font-size: 13px; color:#202020">Revenue</a>
                                    </li>
                                    <li class="highlight-submenu">
                                        <a href="{{route('report.nogiar.index')}}?page=war" style="font-size: 13px; color:#202020">Ministerial KPI</a>
                                    </li>
                                    <li class="highlight-submenu">
                                        <a href="{{route('report.nogiar.index')}}?page=dwp" style="font-size: 13px; color:#202020">DPR Work Plan (DWP)</a>
                                    </li>
                                </ul>
                            </li>

                            

                            <li class="has-submenu">
                                <a href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important;"><i class="fa fa-leanpub"></i> NOGIAR</a>
                                {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'access_publication') || 
                                    Auth::user()->role_obj->permission->contains('constant', 'manage_publication') || 
                                    Auth::user()->role_obj->permission->contains('constant', 'approve_publication') ) --}}
                                            
                                        @php
                                            $contributors = \App\publicationReviewApprove::get();
                                        @endphp
                                        <ul class="submenu">
                                            @if(Auth::user()->role_obj->permission->contains('constant', 'manage_publication') || 
                                                $contributors->contains('user_id', Auth::user()->id) )
                                                <li class="highlight-submenu">
                                                    <a href="{{route('nogiar.add')}}" style="font-size:13px; color:#202020"> Add NOGIAR Publications</a>
                                                </li>
                                                {{-- <li class="highlight-submenu">
                                                    <a href="{{route('nogiar.comment')}}" style="font-size:13px; color:#202020"> View Comment & Note</a>
                                                </li> --}}
                                            @endif
                                            @if(Auth::user()->role_obj->permission->contains('constant', 'manage_publication') 
                                                || Auth::user()->role == 28 || Auth::user()->role == 29 || 
                                                $contributors->contains('user_id', Auth::user()->id) )
                                                <li class="highlight-submenu">
                                                    <a href="{{route('nogiar.admin')}}" style="font-size:13px; color:#202020"> Manage NOGIAR Remarks</a>
                                                </li>
                                            @endif
                                            @if(Auth::user()->role_obj->permission->contains('constant', 'approve_publication') || (\Auth::user()->delegate_role == 'Publication' && \Auth::user()->end_date >= date('Y-m-d') ) || Auth::user()->role == 28 || Auth::user()->role == 29 )
                                                {{--<li class="highlight-submenu">
                                                    <a href="{{route('nogiar.list')}}" style="font-size:13px; color:#202020"> Approve NOGIAR Publications</a>
                                                </li>
                                                 
                                                <li class="highlight-submenu">
                                                    <a href="{{ route('view-toc') }}" style="font-size:13px; color:#202020"> NOGIAR Table of Content</a>
                                                </li> --}}
                                            @endif
                                                
                                                <li class="highlight-submenu">
                                                    <a href="{{route('nogiar.view')}}" style="font-size:13px; color:#202020"> View NOGIAR Publications</a>
                                                </li>

                                            <!-- <li class="highlight-submenu">
                                                <a id="nogiar" href="{{route('index')}}" style="font-size:13px; color:#202020"> View NOGIAR Publications</a>
                                            </li>  -->
                                        </ul>

                                        {{-- <li class="has-submenu">
                                            <a href="#" style="font-size: 13px; color:#202020">DWP</a>
                                            <ul class="submenu">
                                                <li class="highlight-submenu">
                                                    <a id="dwp" href="{{route('dwp')}}" style="font-size:13px; color:#202020"> View DWP Publications</a>
                                                </li>
                                                @if(Auth::user()->role_obj->permission->contains('constant', 'manage_publication') )
                                                    <li class="highlight-submenu">
                                                        <a href="{{route('dwp.add')}}" style="font-size:13px; color:#202020"> Add DWP Publication</a>
                                                    </li>

                                                
                                                    @if(Request::is('publication/dwp') || Request::is('publication/dwp/add'))
                                                        <li class="highlight-submenu">
                                                            <a href="#" onclick="lockDwp()" style="font-size:13px; color:#202020"> Lock DWP From Editing</a>
                                                        </li>
                                                    @endif
                                                @endif                                               
                                            </ul>
                                        </li>
                                    
                                        <li class="highlight-submenu">
                                            <a href="https://pris.dpr.gov.ng/e-publications" style="font-size:13px; color:#202020"> External Users </a>
                                        </li>
                                        
                                        
                                        @if(Auth::user()->role_obj->permission->contains('constant', 'manage_publication') )
                                            <li class="has-submenu">
                                                <a href="#" style="font-size: 13px; color:#202020">PUBLICATION SETUP</a>
                                                <ul class="submenu">
                                                    <li class="highlight-submenu">
                                                        <a href="https://app.editionguard.com/ebook/content/" style="font-size:13px; color:#202020"></i>Goto EditionGuard</a>
                                                    </li>
                                                    <li class="highlight-submenu">
                                                        <a href="https://pris.dpr.gov.ng/e-publications/wp-admin/post-new.php?post_type=dflip" style="font-size:13px; color:#202020"></i>Setup Book Preview</a>
                                                    </li>
                                                    <li class="highlight-submenu">
                                                        <a href="https://pris.dpr.gov.ng/e-publications/wp-admin/post-new.php?post_type=product" style="font-size:13px; color:#202020"></i>Add Book</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        
                                    </ul> --}}
                                {{-- @endif --}}
                            </li>

                            <li class="has-submenu">
                                <a href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important;"><i class="fa fa-leanpub"></i> OPEC</a>
                                {{-- @if(Auth::user()->role_obj->permission->contains('constant', 'access_publication') || 
                                    Auth::user()->role_obj->permission->contains('constant', 'manage_publication') || 
                                    Auth::user()->role_obj->permission->contains('constant', 'approve_publication') ) --}}                                                                                
                                    <ul class="submenu">
                                        @if(Auth::user()->role_obj->permission->contains('constant', 'manage_publication') )
                                            <li class="highlight-submenu">
                                                <a href="{{url('opec/manageCrude')}}" style="font-size:13px; color:#202020"> Crude Oil</a>
                                            </li>
                                            <li class="highlight-submenu">
                                                <a href="{{url('opecNgl/manageNgl')}}" style="font-size:13px; color:#202020"> NGL</a>
                                            </li>
                                            <li class="highlight-submenu">
                                                <a href="{{url('opecPetroleum/managePetroleum')}}" style="font-size:13px; color:#202020"> Petroleum Products</a>
                                            </li>
                                            <li class="highlight-submenu">
                                                <a href="{{url('opecUpstream/manageUpstream')}}" style="font-size:13px; color:#202020"> Upstream</a>
                                            </li>
                                            <li class="highlight-submenu">
                                                <a href="{{url('opecFutureProduct/manageFutureProduct')}}" style="font-size:13px; color:#202020"> Future Project(s)</a>

                                            </li>
                                            <li class="highlight-submenu">
                                                <a href="{{url('opecGasBalance/manageGasBalance')}}" style="font-size:13px; color:#202020"> Gas Balance</a>
                                            </li>

                                            <li class="highlight-submenu">
                                                <a href="{{url('opecGasUpstream/manageGasUpstream')}}" style="font-size:13px; color:#202020"> Gas Upstream</a>
                                            </li>
                                            <li class="highlight-submenu">
                                                <a href="{{url('opecOtherPrimaries/manageOtherPrimaries')}}" style="font-size:13px; color:#202020"> Other Primaries</a>
                                            </li>
                                            <li class="highlight-submenu">
                                                <a href="{{url('opecRefineryPetrochemical/manageRefineryPetrochemical')}}" style="font-size:13px; color:#202020"> Refinery Petrochemical</a>
                                            </li>
                                            <li class="highlight-submenu">
                                                <a href="{{url('opecExportByDestination/manageExportByDestination')}}" style="font-size:13px; color:#202020"> Export By Destination</a>
                                            </li>


                                        @endif
                                        @if(Auth::user()->role_obj->permission->contains('constant', 'approve_publication') || (\Auth::user()->delegate_role == 'Publication' && \Auth::user()->end_date >= date('Y-m-d') ))
                                            {{-- <li class="highlight-submenu">
                                                <a href="{{route('nogiar.list')}}" style="font-size:13px; color:#202020"> Approve NOGIAR Publications</a>
                                            </li> --}}
                                        @endif
                                    </ul>
                            </li>

                            <li class="has-submenu">
                                <a class="link-color" href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important;"><i class="mdi mdi-calendar"></i>Weekly Activities</a>
                                <ul class="submenu"> 
                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_concession') ||                    
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_concession') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_seismic_data')||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_seismic_data')||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_well_activities')||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities')||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_prov_crude_prod')||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_prov_crude_prod')||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_oil_facilities')||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_oil_facilities')
                                        )           
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/war-upstream" style="font-size: 13px; color: #202020"> Upstream </router-link>
                                        </li>
                                    @endif 

                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_recon_crude_production') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_recon_crude_production') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_crude_export') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_crude_export') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_pet_product_reporting') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_pet_product_reporting') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_product_retail') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_product_retail') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_product_listing') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_product_listing')
                                        )
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/war-downstream" style="font-size: 13px; color: #202020"> Downstream </router-link>
                                        </li>
                                    @endif 

                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_dom_gas_obligation') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_dom_gas_obligation') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_supply') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_supply') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_balance_prod') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_prod') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_Util') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_Util') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_product_reporting') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_product_reporting') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_lpg/cng') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_lpg/cng') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_reserve') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve')
                                        )

                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/war-gas" style="font-size: 13px; color: #202020"> Gas </router-link>
                                        </li>
                                    @endif

                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_upstream_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_upstream_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_license_refinery_proj') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_license_refinery_proj') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_downstream_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_downstream_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_pipeline') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_pipeline') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_metering') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_metering') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_technologies') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_technologies')
                                        )

                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/war-engineering-standand" style="font-size: 13px; color: #202020"> Engineering & Standand </router-link>
                                        </li>
                                    @endif 

                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_upstream_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_upstream_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_downstream_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_downstream_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_spill_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_produced_water') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_produced_water') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_drilled_waste') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_drilled_waste') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_waste_mgt_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_waste_mgt_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_accredited_waste_mgr') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_accredited_waste_mgr') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_safety_permit') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_safety_permit') 
                                        )

                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/war-shec" style="font-size: 13px; color: #202020"> SHEC Operations </router-link>
                                        </li>
                                    @endif 

                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/war-corporate-services" style="font-size: 13px; color: #202020"> Corporate Services </router-link>
                                        </li>

                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/war-fad-tax-matters" style="font-size: 13px; color: #202020"> FAD & Tax Matters</router-link>
                                        </li>

                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/war-public-affairs" style="font-size: 13px; color: #202020"> Public Affairs</router-link>
                                        </li>
                                </ul>  
                            </li>

                            <li class="has-submenu">
                                <a class="link-color" href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important;"><i class="fa fa-calendar"></i>Monthly Reporting</a>
                                <ul class="submenu"> 
                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_concession') ||                    
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_concession') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_up_reserve') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_up_reserve') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_seismic_data')||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_seismic_data')||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_well_activities')||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_well_activities')||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_prov_crude_prod')||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_prov_crude_prod')||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_oil_facilities')||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_oil_facilities')
                                        )                              
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/monthly-reporting-UPSTREAM" style="font-size: 13px; color: #202020"> Upstream </router-link>
                                        </li> 
                                    @endif 

                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_recon_crude_production') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_recon_crude_production') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_crude_export') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_crude_export') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_pet_product_reporting') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_pet_product_reporting') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_product_retail') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_product_retail') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_product_listing') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_product_listing')
                                        )                           
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/monthly-reporting-DOWNSTREAM" style="font-size: 13px; color: #202020"> Downstream </router-link>
                                        </li>   
                                    @endif

                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_dom_gas_obligation') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_dom_gas_obligation') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_supply') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_supply') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_balance_prod') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_prod') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_Util') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_balance_Util') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_product_reporting') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_product_reporting') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_lpg/cng') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_lpg/cng') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_reserve') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_reserve')
                                        )                       
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/monthly-reporting-GAS" style="font-size: 13px; color: #202020"> Gas </router-link>
                                        </li> 
                                    @endif

                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_upstream_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_upstream_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_license_refinery_proj') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_license_refinery_proj') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_downstream_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_downstream_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_gas_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_gas_project') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_pipeline') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_pipeline') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_metering') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_metering') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_technologies') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_technologies')
                                        )                       
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/monthly-reporting-Engineering-and-Standand" style="font-size: 13px; color: #202020"> Engineering & Standand </router-link>
                                        </li> 
                                    @endif 

                                    @if(Auth::user()->role_obj->permission->contains('constant', 'manage_upstream_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_upstream_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_downstream_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_downstream_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_spill_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_spill_incidence') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_produced_water') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_produced_water') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_drilled_waste') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_drilled_waste') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_waste_mgt_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_waste_mgt_facilities') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_accredited_waste_mgr') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_accredited_waste_mgr') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'manage_safety_permit') ||
                                        Auth::user()->role_obj->permission->contains('constant', 'approve_safety_permit')
                                        )  
                                    @endif                  
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/monthly-reporting-health-safety-environment" style="font-size: 13px; color: #202020"> SHEC Operations </router-link>
                                        </li>                     
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/monthly-reporting-corporate-services" style="font-size: 13px; color: #202020"> Corporate Services </router-link>
                                        </li>                   
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/monthly-reporting-FAD-Tax-matters" style="font-size: 13px; color: #202020"> FAD & Tax Matters </router-link>
                                        </li>                  
                                        <li class="highlight-submenu">
                                            <router-link class="block" to="/monthly-reporting-public-affairs" style="font-size: 13px; color: #202020"> Public Affairs </router-link>
                                        </li>
                                </ul>  
                            </li>

                            <li class="has-submenu">
                                <a href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important;"><i class="mdi mdi-chart-gantt"></i> Analysis & Projection</a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                        <a href="#" style="font-size: 13px; color:#202020"> Comparison</a>
                                            <ul class="submenu">
                                                <li class="highlight-submenu">
                                                    <a href="{{url('benchmark/revenue')}}" style="font-size:13px; color:#202020">Revenue</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="#" style="font-size:1px; background: #eff">------------------------------</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{url('benchmark/crudeExport')}}" style="font-size:13px; color:#202020">Crude Export</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{url('benchmark/productionProduct')}}" style="font-size:13px; color:#202020">Petroleum Product Reporting</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{url('benchmark/petroleumProductReporting')}}" style="font-size:13px; color:#202020">Product Retail</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{route('benchmark&comparism.index')}}" style="font-size:13px; color:#202020">Refinery Facilities</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="#" style="font-size:1px; background: #eff">------------------------------</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{route('benchmark&comparism.index')}}" style="font-size:13px; color:#202020">Reserves</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{route('benchmark&comparism.index')}}" style="font-size:13px; color:#202020">Well Activities</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="#" style="font-size:1px; background: #eff">------------------------------</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{route('benchmark&comparism.index')}}" style="font-size:13px; color:#202020">Domestic Gas Obligation</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{route('benchmark&comparism.index')}}" style="font-size:13px; color:#202020">Gas Balance</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="#" style="font-size:1px; background: #eff">------------------------------</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{route('benchmark&comparism.index')}}" style="font-size:13px; color:#202020">Industry Wide Incidence</a>
                                                </li>
                                                <li class="highlight-submenu">
                                                    <a href="{{route('benchmark&comparism.index')}}" style="font-size:13px; color:#202020">Spill Incidende</a>
                                                </li>
                                            </ul>
                                    </li>

                                    <li class="highlight-submenu">
                                        <a href="#" style="font-size: 13px; color:#202020"> Predictive Analysis</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="https://support.snapnet.com.ng/PRISlogin?email={{Auth::user()->email}}&name={{Auth::user()->name}}" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important;"><i class="mdi mdi-comment-account-outline" ></i>Support</a>
                            </li>

                            <li class="pull-right">
                                <a href="#" style="font-size: 11px; padding-top: 14px!important; padding-bottom: 14px!important;"><i class="mdi mdi-account-key"></i>{{\Auth::user()->name}}
                                  {{-- <check-auth></check-auth> --}}
                                </a>
                            </li>

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> 
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid" style="width: 100%">

                <!-- Page-Title -->
                <div class="row" style="padding: 0px; margin-top: -25px">
                    <div class="col-sm-7">
                        <div class="page-title-box">
                            <div class="btn-group">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">PRIS</a></li>
                                    <li class="breadcrumb-item active">
                                        @php
                                            $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
                                            foreach($crumbs as $crumb)
                                            {
                                                echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
                                            }
                                        @endphp
                                    </li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>

                        <!-- Notification Alerts -->
                        <div class="col-sm-5"> <br>
                            <div id="succ_alert_msg" class="alert alert-info alert-dismissible fade show pull-right" role="alert">
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
                            </div>

                            {{-- @if(count($error) > 0)
                                @foreach($error->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show pull-right" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <span id="" style="text-transform: initial;"> {{ $error }} </span>
                                </div>
                                @endforeach
                            @endif --}}

                            @if(session('info'))
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
                            @endif
                        </div>
                </div>
                <!-- end page title end breadcrumb -->


                    @yield('content')

                
                <!-- end row -->


                        {{-- <button type="button" id="chatHide" class="btn btn-danger pull-right" style="display: none;" /> <i class="fa fa-comment"></i>  </button>

                        <iframe class="chat-div" id="chatter" src='https://webchat.botframework.com/embed/pris-service-bot?s=85LuObh1ODY.70kEivLvPJ-5WugMTSPY-jK7m-Ah5AuCNhVeNCcA8pg'  
                        style=''></iframe>

                        <button type="button" id="chatShow" class="btn btn-dark pull-right" 
                        style="" /> <i class="fa fa-comment"></i> </button> --}}


                {{-- <div class="row">
                    <div class="col-md-9 col-sm-12"> </div>

                    <div class="col-md-3 col-sm-12" style=""> 
                        <button type="button" id="chatShow" class="btn btn-primary pull-right" /> <i class="fa fa-comment"></i> </button>
                        <button type="button" id="chatHide" class="btn btn-danger pull-right" style="display: none;" /> <i class="fa fa-comment"></i>  </button>
                        <iframe id="chat" 
                        src='https://webchat.botframework.com/embed/pris-service-bot?s=85LuObh1ODY.70kEivLvPJ-5WugMTSPY-jK7m-Ah5AuCNhVeNCcA8pg'>                            
                        </iframe>
                    </div>
                </div> --}}

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

        <script src="{{ asset('js/app.js') }}"></script>

        <!--Morris Chart-->
        {{-- <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script> --}}
        <!-- Chart JS -->
        <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->

        {{-- <script src="{{ asset('assets/pages/dashborad.js') }}"></script> --}}

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
        <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

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
        <!-- PACE  js -->
        <script src="{{ asset('assets/js/pace.min.js') }}"></script>

        <!-- TOAST SCRIPT  -->
        <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
        {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
        <script src="{{asset('powerbi/dist/powerbi.js')}}"></script>


  
        <script src="{{asset('RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>



       

        @yield('morris')


        <!-- TOOLTIP -->
        <script>


            //FOR NAV PAD ACTIVE
            // $(function()
            // {
            //     $(.nav-pad).click(function()
            //     {
            //         $(.nav-pad).addClass("nav-active");
            //     });                
            // });
        </script>

        @yield('script')

        <script>

            $(function()
            {  
                window.sessionStorage.setItem('user_id','{{Auth::user()->id}}');
               $('.block').click(function()
               {
                    $('.vue-dash').hide();
               }); 
            });


            $(function()
            {
                //Hide alert message box
                $('#succ_alert_msg').hide();     
                $('#err_alert_msg').hide();

            
                $('[data-toggle="tooltip"]').tooltip(); 

                $('#global_serach').on('click', function () 
                {
                     $('#dynamicsearch').focus();
                });




                
            });


            function sortAscDesc()
            {
                //SORT SCRIPT
                const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

                const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
                    v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
                    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

                // do the work...
                document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => 
                {
                    const table = th.closest('table');
                    Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
                        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
                        .forEach(tr => table.appendChild(tr) );
                })));
            
            }


            


            $(function()
            {   
                $('#chatter').hide();            

                $( "#chatShow" ).click(function()
                {
                    $('#chatter').slideDown();   $('#chatShow').hide();         $('#chatHide').show(); 
                    // $('.wc-header').append('<button class="btn">Test</button>');
                });

                $( "#chatHide" ).click(function()
                {
                    $('#chatter').slideUp();   $('#chatHide').hide();    $('#chatShow').show(); 
                });

                $('iframe').load(function() 
                {
                    $('iframe').contents().find("head")
                    .append($("<style type= 'text/css'> .wc-header{background-color:#0FC0C5 !important; }</style>"
                        ));
                });

            });


            var BotfuelWebChat = 
            {
                init:(options)=>{
                    const params = BotChat.queryParams(location.search);
                    var div = document.createElement('div');
                    div.id='bot';
                    div.style.width =options.size.width+"px";
                    div.style.height =options.size.height+"px";
                    div.style.position ="relative";
                    document.body.appendChild(div);

                    BotChat.App({
                          bot: {id: 'botid'},
                          locale: params['locale'],
                          resize: 'detect',
                          user: {id:'userid'},
                          directLine: {
                            secret: options.appSecret,
                            token: options.appToken
                          }
                        }, div);
                    }
            }



            //
            (function () 
            {
                var div = document.createElement("div");
                document.getElementsByTagName('body')[0].appendChild(div);
                div.outerHTML = "<div id='botDiv' style='height: 38px; position: fixed; bottom: 0; right: 0; z-index: 1000; background-color: #fff; float-right; border-radius:8px'><div id='botTitleBar' style='height: 38px; width: 600px; position:fixed; cursor: pointer; background-color: #0FC0C5; color: #fff; padding: 8px 15px; font-size: 15px'></div><iframe width='300px' height='400px' src='https://webchat.botframework.com/embed/PRISBOT?s=EPc08mwuaK8.6ltDxnxsRxILErdBtW-IrV7tO66NIp5IbDUmtX1qic8'></iframe></div>"; 

                document.querySelector('body').addEventListener('click', function (e) 
                {
                    e.target.matches = e.target.matches || e.target.msMatchesSelector;
                    if (e.target.matches('#botTitleBar')) 
                    { 
                        var botDiv = document.querySelector('#botDiv'); 
                        botDiv.style.height = botDiv.style.height == '400px' ? '38px' : '400px';
                    };
                });

                $('#botTitleBar').html('PRISBot')

            }());

        </script>


    </body>
</html>
