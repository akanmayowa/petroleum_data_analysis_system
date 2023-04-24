<!DOCTYPE html>
<html>
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




        <div class="" id="section-one">    

            <input type="text" class="form-control pull-right" name="pub_year" id="pub_year" style="width: 25%">

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

        
    <script>
        //script to set the selected year
    $(function()
    {   

        $('#pub_year').datepicker(
        {
            autoclose: true,
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        }); 

        $('#pub_year').on('change', function(e)
        {
            var years = $(this).val(); 

            $('#section-one').load("{{url('publication')}}/year/section-one?year="+years, function(res, status, xhr)
            {
                if (status == "error") {  $('#section-one').html(txt); }

                //loading section two
                $('#section_two').load("{{url('publication')}}/year/section-two?year="+years, function(res, status, xhr)
                { 

                    setInterval(function(){   $('#load_two').hide();  }, 1000); 

                    //loading section three
                    $('#section_three').load("{{url('publication')}}/year/section-three?year="+years, function(res, status, xhr)
                    { 
                        setInterval(function(){   $('#load_three').hide();  }, 1000); 

                        //loading section four
                        $('#section_four').load("{{url('publication')}}/year/section-four?year="+years, function(res, status, xhr)
                        {
                            setInterval(function(){   $('#load_four').hide();  }, 1000);

                            //loading section four
                            $('#section_five').load("{{url('publication')}}/year/section-five?year="+years, function(res, status, xhr)
                            {
                                setInterval(function(){   $('#load_five').hide();  }, 1000); 
                            });
                        });
                    }); 
                });
            });
            
        }); 
            
    });
    </script>

            

    </body>
</html>
