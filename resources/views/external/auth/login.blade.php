

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>PRIS - Petroleum Resources Intelligent System</title>
        <meta content="DDX" name="DPR Data Xchange" />
        <meta content="Snapnet" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="{{ asset('assets/images/PRIS Icon.png') }}">

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->

    <!--===============================================================================================-->
        <link href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <!--===============================================================================================-->
        <link href="{{ asset('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}" type="text/css" rel="stylesheet">
    <!--===============================================================================================-->
        <link href="{{ asset('assets/vendor/animate/animate.css') }}" type="text/css" rel="stylesheet">
    <!--===============================================================================================-->  
        <link href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}" type="text/css" rel="stylesheet">
    <!--===============================================================================================-->
        <link href="{{ asset('assets/vendor/animsition/css/animsition.min.css') }}" type="text/css" rel="stylesheet">
    <!--===============================================================================================-->

    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <!--===============================================================================================-->

        <style type="text/css">
            *
            {
                font-size: 13px;
                color: #ffffff;
            }

            .text-danger
            {
                color: red !important;
            }
            .form-control
            {
                font-size: 12px;
            }

            /* Style the video: 100% width and height to cover the entire window */
            #myVideo {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%; 
                min-height: 100%;
            }

            /* Add some content at the bottom of the video/page */
            .content {
                position: fixed;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                color: #f1f1f1;
                width: 100%;
                padding: 20px;
            }

            /* Style the button used to pause/play the video */
            #myBtn {
                width: 200px;
                font-size: 18px;
                padding: 10px;
                border: none;
                background: #000;
                color: #fff;
                cursor: pointer;
            }

            #myBtn:hover {
                background: #ddd;
                color: black;
            }

        </style>
        

        <style type="text/css">
            .frame 
            {
                margin-top: 5%;
                margin-bottom: 30px;
                -moz-box-shadow: 0px 8px 1px #eee;
                -webkit-box-shadow: 0px 8px 1px #eee;
                box-shadow: 0px 8px 1px #eee;
                -moz-transform:rotate(0deg);
                -webkit-transform:rotate(0deg);
                -o-transform:rotate(0deg);
                -ms-transform:rotate(0deg);
                filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=.1);
            }

            .pad-form
            {
                padding: 10px 20px;
            }


            .pad-input
            {
                padding: 15px 10px;
                border-radius: 8px;
            }

            .btn-blue
            {
                background-color: #318CE7;
                margin-left: 5px;
                border-radius: 15px;
            }

            .reg-form-btn
            {
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0 15px;
                min-width: 160px;
                height: 40px;
                background-color: #007FFF;
                border-radius: 15px!important;
                font-family: Poppins-Regular;
                font-size: 14px;
                color: #fff;
                line-height: 1.2;
                -webkit-transition: all 0.4s;
                -o-transition: all 0.4s;
                -moz-transition: all 0.4s;
                transition: all 0.4s;
                border: none;
            }
        </style>
    </head>


    <body>



        <!-- Begin page -->
        <div class="accountbg" style="background-image: url({{URL::asset('assets/images/PRIS-BG.gif')}});  background-repeat:no-repeat;">       </div>                        <!--  -->

        

        <div class="limiter" style="border: thin dotted red">
        <div class="container-login100">


            <div class="wrap-login100" style="">
                <div class="login100-form-title" style="background-image: url({{URL::asset('assets/images/bg-01.jpg')}});">
                    <span class="login100-form-title-1" style="font-weight: lighter!important;"> PRIS - Guest </span> 
                </div>

                <form class="" method="POST" action="{{ route('external.auth.loginExternal') }}">
                @csrf


                    <div class="form-group row pad-form">
                        <label for="email" class="col-sm-12 col-form-label" style="color: #999 !important"> Email </label>
                        <div class="col-sm-12">
                            <input class="form-control pad-input" type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="text-danger" style="color: red!important">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>

                    <div class="form-group row pad-form">
                        <label for="password" class="col-sm-12 col-form-label" style="color: #999 !important"> Password </label>
                        <div class="col-sm-12">
                            <input class="form-control pad-input {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    

                    <div class="form-group row pad-form">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1" style="color: #202020">Remember me</label>

                                <a href="#" class="" style="color: #202020; margin-left: 25px"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </div>

                    

                    <div class="form-group row pad-form">
                        <div class="col-12 container-login100-form-btn pull-left" style="min-width: 100%">
                            <button class="login100-form-btn" type="submit"> Login </button>
                            <a href="{{ route('external.register') }}" class="reg-form-btn" type="submit" style="background: #007FFF; margin-left: 10%"> Register </a>
                        </div>
                    </div>
                </form>
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


    <!--===============================================================================================-->
        <script src="{{ asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('assets/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
</html>