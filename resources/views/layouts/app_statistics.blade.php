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
        <link href="{{ asset('assets/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" /> --}}

        <link href="{{ asset('assets/dflip/css/dflip.min.css') }}" rel="stylesheet" type="text/css" />

        {{-- <link href="{{ asset('assets/css/publication-css') }}" rel="stylesheet" type="text/css" /> --}}

        @yield('css')

        <style type="text/css">
            body, div, table, thead, tbody, tfoot, tr, th, td, p 
            {
                font-family: "Calibri";
                font-size: small;
            }
            /**
            {
                font-size: 12px;
            }*/

            .header_bg
            {
                 background-color: #202020; color: #ffffff; 
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
                 background-color: #202020; color: #ffffff;    /*background-color: #6495ED; color: #ffffff;*/ 
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

            #topnav .topbar-main .logo
            {
                line-height: 20px!important;
            }

            @media print {
                .no-print, .no-print * {
                    display: none !important;
                }
            }

            .wc-header 
            {
                background-color: #0FC0C5!important;
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
            
            
            @page 
            {
                size: auto;   /* auto is the initial value */
                margin: auto 20px;  /* this affects the margin in the printer settings */
            }

            .table-responsive 
            { 
                overflow-x: visible !important; 
            }

            /*thead { display: table-row-group; }
            tbody { display: table-row-group; }
            tr { page-break-inside: avoid; }*/

            /*thead { display: table-header-group; }
            tfoot { display: table-row-group; }
            tr { page-break-inside: avoid; }*/


            .font-20
            {
                font-size: 20px !important;
            }

            .font-12
            {
                font-size: 12px !important;
            }

            .remark-div
            {
                font-size: 20px !important;
            }

       </style>

    </head>
    

    <body>


        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav" class="font-12">
            <div class="topbar-main font-12" style="background-color:#0FC0C5;">
                <div class="container-fluid font-12" style="width: 100%">

                    <!-- Logo container-->
                    <div class="logo font-12">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                        <!--Upcube-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="{{route('dashboard')}}" class="logo" style="margin-top: 10px">
                            <!-- <img src="{{URL::asset('assets/images/snapnet.png')}}" alt="" height="22" class="logo-small"> -->
                            <img src="{{URL::asset('assets/images/PRIS Logo - White.png')}}" alt="" height="30" class="logo-large">
                            <span style="font-weight:lighter; font-size: 12px"> Petroleum Resources Intelligent System  </span>
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
                                                {{-- <li class="highlight-submenu">
                                                    <a href="{{route('nogiar.list')}}" style="font-size:13px; color:#202020"> Approve NOGIAR Publications</a>
                                                </li>
                                                
                                                <li class="highlight-submenu">
                                                    <a href="{{ route('view-toc') }}" style="font-size:13px; color:#202020"> NOGIAR Table of Content</a>
                                                </li> --}}
                                            @endif
                                                
                                                <li class="highlight-submenu">
                                                    <a href="{{route('nogiar.view')}}" style="font-size:13px; color:#202020"> View NOGIAR Publications</a>
                                                </li>
                                                
                                                <li class="highlight-submenu">
                                                    <a href="{{route('new-table-of-content')}}" style="font-size:13px; color:#202020"> Table of Content</a>
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

                            

                            {{-- <li class="submenu">
                                <a href="#" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-poll" ></i>History</a>
                            </li> 
                            --}}
                            <li class="submenu">
                                <a href="http://support.snapnet.com.ng" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-comment-account-outline" ></i>Support</a>
                            </li>



                            <li class="pull-right">
                                <a href="#" style="font-size: 11px; color:#e1e1e1; padding-top: 14px!important; padding-bottom: 14px!important"><i class="mdi mdi-account-key"></i>{{\Auth::user()->name}}</a>
                            </li> 

                            {{-- <li class="pull-right">
                                <a href="#" data-toggle="modal" data-target="#sign-up" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="fa fa-user" ></i>Sign up</a>
                            </li>  --}} 

                            {{-- <li class="pull-right">
                                <a href="#" data-toggle="modal" data-target="#view-cart" style="font-size: 13px; padding-top: 14px!important; padding-bottom: 14px!important"><i class="fa fa-shopping-basket text-warning" ></i> 
                                    @if(\Auth::check())
                                        @php 
                                            $cart = \App\Cart::where('user_id', \Auth::user()->id)->count(); echo $cart.' Item(s)'; 
                                        @endphp
                                    @endif
                                </a>
                            </li> --}}      

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
                <div class="row" style="margin-top: -25px">
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


                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title text-dark" id="pub-title" > Publication Status </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                @php
                                    $pub_tables = \App\NOGIARPublicationSection::orderBy('year', 'asc')->get(); 
                                @endphp

                                <div class="table-responsive"> 
                                    <table class="table table-striped table-sm mb-0" id="ref_prod_table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Year</th>
                                            <th>Section</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th style=""></th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                            @forelse($pub_tables as $pub_table)
                                                <tr> 
                                                     <th style="">{{$pub_table->id}}</th>
                                                     <th style="">{{$pub_table->year}}</th>
                                                     <th style="">
                                                        @if($pub_table->section_type == 1) Directors' Remark
                                                        @elseif($pub_table->section_type == 2) Regulatory Structure
                                                        @elseif($pub_table->section_type == 3) Modular Refinery
                                                        @elseif($pub_table->section_type == 5) Glossary
                                                        @endif
                                                     </th>
                                                     <th style="font-size: 11px">{{$pub_table->title}}</th>
                                                     <th style="">
                                                        @if(substr($pub_table->copy, 0,4) == 'save') Disabled
                                                        @elseif(substr($pub_table->copy, 0,4) == 'draf') Enabled
                                                        @endif
                                                     </th>
                                                    <th>
                                                        @if(substr($pub_table->copy, 0,4) == 'save')
                                                            <a data-toggle="modal" data-target="#archiveModal" style="cursor: pointer; color:#fff; background: #396; font-size:10px" tooltip="true" 
                                                            onclick="putId({{$pub_table->id}}, '{{$pub_table->copy}}')" class="btn btn-warning btn-sm pull-right" title="Re-enable this publication"> <i class="fa fa-check"></i>   </a>
                                                        @else
                                                            <a data-toggle="modal" data-target="#archiveModal" style="cursor: pointer; color:#fff; background-color:#E52B50; font-size:10px" tooltip="true" onclick="putId({{$pub_table->id}}, '{{$pub_table->copy}}')" class="btn btn-info btn-sm pull-right" title="Archive this publication"> <i class="fa fa-ban"></i>    </a>
                                                        @endif
                                                    </th>  
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                                                   
                                </div>


                              </div>

                          <!-- Modal footer -->
                          <div class="modal-footer">
                            {{-- <button class="btn btn-dark btn-sm" id="register-ext" type="submit">Save</button> --}}
                          </div>

                        </div>
                      </div>
                    </div>


                    <!-- The Modal -->
                    <form id="" action="{{url('/publication/nogiar/enableArchivePublication')}}" method="POST">
                    @csrf
                        <div class="modal" id="archiveModal">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title text-dark" id="pub-title" > Are you sure you want to update this record? </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                                  <!-- Modal body -->
                                  <div class="modal-body">

                                    <div class="table-responsive"> 
                                        <input type="hidden" class="form-control" id="idd" name="idd"> 
                                        <input type="hidden" class="form-control" id="copy" name="copy">   
                                    </div>

                                  </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button class="btn btn-success btn-sm" id="register-ext" type="submit">Yes</button>
                                <button class="btn btn-danger btn-sm" id="register-ext" type="submit" data-dismiss="modal">No</button>
                              </div>

                            </div>
                          </div>
                        </div>
                    </form>




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
                    <h4 class="modal-title" id="pub-title">Your Cart <span class="badge badge-pill badge-warning" style="margin-top: -5px">  </span> </h4>
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
                                            @php $total = 0; $carts = \App\Cart::where('user_id', \Auth::user()->id)->get(); @endphp
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

                                                        {{-- <button type="button" class="btn-sm pull-right remove_item" style="color: red;" tooltip="true" title="Remove Item" id="{{$cart->id}}" onclick="deleteItem(this.id)"> <i class="fa fa-close"></i>    </button> --}}
                                                    </td>
                                                </tr>
                                            @empty
                                                No Item In Cart !
                                            @endforelse
                                                <tr>
                                                    <td style="padding: 3px 10px; text-align: right" colspan="7">
                                                        Total : &#8358;{{number_format($total, 2)}}
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning btn-sm pull-right"> <i class="fa fa-money"></i> Pay</button>
                  </div>

                </div>
              </div>
            </div>



            <!-- Publication Table Modal -->
            <form id="pub_table_status" action="" method="POST">
            @csrf

            <div class="modal" id="pub-table-modal">
              <div class="modal-dialog modal-lg">
                
              </div>
            </div>
           </form>





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

        <!-- TOAST SCRIPT  -->
        <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
        {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
        <!-- PACE  js -->
        <script src="{{ asset('assets/js/pace.min.js') }}"></script>

        <!--EDITORS js-->
        <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
        {{-- <script src="https://cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script> --}}

        <script src="{{ asset('assets/dflip/js/dflip.min.js') }}"></script>

        <script src="{{ asset('assets/convert-to-doc/FileSaver.js') }}"></script>
        <script src="{{ asset('assets/convert-to-doc/html-docx.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/chartjs-plugin-label.js') }}"></script> --}}

        {{-- HTML2PDF --}}
        <script src="{{ asset('assets/plugins/html2pdf/html2pdf.js') }}"></script>

 {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>  --}}
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script>

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
                        url:'{{url('/remove-item-from-cart')}}/'+id,
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


            function putId(id, copy)
            {
                $('#idd').val(id);
                $('#copy').val(copy);
            }

        </script>

        {{-- <script>
            $(function()
            {
                $('.summernote').summernote(
                {
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true,                 // set focus to editable area after initializing summernote
                  toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                  ]
                });
            });
        </script> --}}

        @yield('script')

        <script>
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
            
            @if(\Auth::user()->role_obj->role_name == 'DWP Report Manager' || \Auth::user()->role_obj->role_name == 'Admin')
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




            // $(function()
            // {   
            //     $('#chatter').hide();            

            //     $("#chatShow" ).click(function()
            //     {
            //         $('#chatter').slideDown();   $('#chatShow').hide();         $('#chatHide').show(); 
            //         // $('.wc-header').append('<button class="btn">Test</button>');
            //     });

            //     $("#chatHide" ).click(function()
            //     {
            //         $('#chatter').slideUp();   $('#chatHide').hide();    $('#chatShow').show(); 
            //     });

            //     $('iframe').load(function() 
            //     {
            //         $('iframe').contents().find("head")
            //         .append($("<style type= 'text/css'> .wc-header{background-color:#0FC0C5 !important; }</style>"
            //             ));
            //     });

            // });


            // var BotfuelWebChat = 
            // {
            //     init: function(options)
            //     {
                    
            //         if ( typeof BotChat != 'undefined')
            //         {
            //             const params = BotChat.queryParams(location.search);
            //             var div = document.createElement('div');
            //             div.id='bot';
            //             div.style.width =options.size.width+"px";
            //             div.style.height =options.size.height+"px";
            //             div.style.position ="relative";
            //             document.body.appendChild(div);

            //             BotChat.App({
            //                   bot: {id: 'botid'},
            //                   locale: params['locale'],
            //                   resize: 'detect',
            //                   user: {id:'userid'},
            //                   directLine: {
            //                     secret: options.appSecret,
            //                     token: options.appToken
            //                   }
            //                 }, div);


            //         }
            //     }
            // };




            //
            // (function(){


            //     var div = document.createElement("div");
            //     document.getElementsByTagName('body')[0].appendChild(div);
            //     div.outerHTML = "<div id='botDiv' class='no-print' style='height: 38px; position: fixed; bottom: 0; right: 0; z-index: 1000; background-color: #fff; float-right; border-radius:8px'><div id='botTitleBar' style='height: 38px; width: 600px; position:fixed; cursor: pointer; background-color: #0FC0C5; color: #fff; padding: 8px 15px; font-size: 15px'></div><iframe width='300px' height='400px' src='https://webchat.botframework.com/embed/PRISBOT?s=EPc08mwuaK8.6ltDxnxsRxILErdBtW-IrV7tO66NIp5IbDUmtX1qic8'></iframe></div>"; 

            //     document.querySelector('body').addEventListener('click', function (e) 
            //     {
            //         e.target.matches = e.target.matches || e.target.msMatchesSelector;
            //         if (e.target.matches('#botTitleBar')) 
            //         { 
            //             var botDiv = document.querySelector('#botDiv'); 
            //             botDiv.style.height = botDiv.style.height == '400px' ? '38px' : '400px';
            //         };
            //     });

            //     $('#botTitleBar').html('PRISBot')


            // })();

        </script>
        <script>
            // BotfuelWebChat.init(
            // {
            //    appToken:'directline secret',
            //    size: { width: 500, height: 600 }
            // })
        </script>

            

    </body>
</html>
