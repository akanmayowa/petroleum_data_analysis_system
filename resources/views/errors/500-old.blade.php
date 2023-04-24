@extends('layouts.appnomenu')

@section('content')



	<div class="card">
        <div class="card-block">

            <div class="my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center my-5">
                            <h1 class="font-weight-bold text-error">5 <span class="error-text">0<img src="{{ asset('assets/images/error-img.png') }}" style="max-width: 10%; max-height: 10%" alt="" class="error-img"></span> 0</h1>
                            <h3 class="text-uppercase">Internal Server Error</h3>
                            <div class="mt-5 text-center">
                                <a class="btn btn-primary waves-effect waves-light" href="{{route('dashboard')}}">Back to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

	{{-- <div class="row card m-b-30">
	    <div class="card-body">
	    	<center>
		        <div class="col-md-6">
		        	<span style="color: #DE5D83; font-size: 36px"> Unauthorized Access </span> <br>
		        	<a href="{{route('dashboard')}}" name="add_tsp_btn" id="add_tsp_btn" class="btn btn-primary"> <i class="fa fa-chevron-left"></i> Dashboard </a>
		        </div>
		    </center>
	    </div>
	</div> --}}



@endsection