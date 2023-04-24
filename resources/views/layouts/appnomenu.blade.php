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
        {{--        <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">--}}

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

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />




        @yield('css')

        <style>
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
                border: #5D8AA8 thin solid;
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

            .head_bg_dark
            {
                 background-color: #202020; color: #ffffff; 
            }
            .header_bg
            {
                 background-color: #202020; color: #ffffff;    /*background-color: #0097a7; color: #ffffff;*/ 
            }
            .head_bg
            {
                 background-color: #202020; color: #ffffff;    /*background-color: #0097a7; color: #ffffff;*/ 
            }

            .app_bg
            {
                 background-color: #202020; color: #ffffff;    /*background-color: #202020; color: #ffffff;*/ 
            }

            .app_modal_bg
            {
                 background-color: #007BA7; color: #ffffff;        /*background-color: #666; color: #ffffff;*/
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
                background-color: #008B8B;
                color: #fff;
            }
            .approve-button
            {
                cursor: pointer; 
                color: #202020 !important; 
                border:#ccc thin solid; 
                font-size:10px; 
                border-radius:4px; 
                margin-right: 10px;
                background-color: #fff;/*006B3C*/
                margin-top: -0px;
                right: 0px !important;
            }
            .approve-button:hover
            {
                cursor: pointer; 
                color: #fff!important; 
                border:#ccc thin solid; 
                font-size:10px; 
                border-radius:4px; 
                margin-right: 10px;
                background-color: #202020;/*006B3C*/
                margin-top: -0px;
                right: 0px !important;
            }
            .approve-btn
            {
                margin: -6px 5px 0px 0px!important;
                /*cursor: pointer; 
                color: #fff; 
                border:#ccc thin solid; 
                font-size:13px!important; 
                border-radius:4px; 
                margin-right: 10px;
                background-color: #008B8B;
                padding: 3px 10px!important;*/
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
                background-color: #202020; color:#fff; font-size: 13px !important; padding: 6px;
            }

            .btn-dark:hover
            {
                background-color: #fff; color:#202020!important; font-size: 13px !important; padding: 6px;
            }

            .btn-info
            {
                color:#fff !important; font-size: 13px !important;
            }

            .btn-info:hover
            {
                font-size: 13px !important; background: #eee; color: #202020 !important;
            }

            .btn-primary
            {
                color:#fff !important; font-size: 13px !important; padding: 6px;
            }

            .btn-primary:hover
            {
                font-size: 13px !important; padding: 6px; background: #eee; color: #202020 !important;
            }

            .btn-secondary
            {
                color:#fff !important; font-size: 13px !important; padding: 6px;
            }

            .btn-secondary:hover
            {
                font-size: 13px !important; padding: 6px; background: #eee; color: #202020 !important;
            }

            .btn-default
            {
                color:#fff !important; font-size: 13px !important; padding: 6px;
            }

            .btn-default:hover
            {
                font-size: 13px !important; padding: 6px;
            }

            .btn-light
            {
                background: transparent; color:#202020 !important; font-size: 13px !important; padding: 6px;
            }

            .btn-light:hover
            {
                background: #eee; color: #000; font-size: 13px !important; padding: 6px;
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
            .page-item.active .page-link
            {
                background-color: #202020!important;
            }

            .hide
            {
                display: none;
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


            .modal-90
            {
              max-width: 90%!important;
            }

            .modal-85
            {
              max-width: 85%!important;
            }

            .modal-80
            {
              max-width: 80%!important;
            }

            .modal-75
            {
              max-width: 75%!important;
            }

            .modal-70
            {
              max-width: 70%!important;
            }

            .modal-65
            {
              max-width: 65%!important;
            }

            .modal-60
            {
              max-width: 60%!important;
            }

        </style>

    </head>
    

    <body>


        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main" style="background-color:#008B8B;">
                <div class="container-fluid" style="width: 100%!important">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                        <!--Upcube-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="{{route('dashboard')}}" class="logo" style="margin-top: 0px">
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
                        <ul class="list-inline float-right mb-0" style="margin-top: 1px">
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





        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

               


                    @yield('content')

                
                <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © {{ date('Y') }} PRIS -  <i class="mdi mdi-power text-danger"></i> by Snapnet.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


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
        <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>

        <script src="{{ asset('assets/pages/dashborad.js') }}"></script>

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

        @yield('script')

        <script type="text/javascript">
            $(document).ready(function()
            {
                //Hide alert message box
                $('#succ_alert_msg').hide();     
                $('#err_alert_msg').hide();
            });
        </script>



            

    </body>
</html>
