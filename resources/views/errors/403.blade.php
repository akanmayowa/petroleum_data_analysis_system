@extends('layouts.appnomenu')

@section('content')



	<div class="card">
        <div class="card-block">

            <div class="ex-page-content text-center">
                <h1 class="">403!</h1>
                <h3 class="">Unauthorized Access </h3><br>

                <a href="{{route('dashboard')}}" class="btn btn-info mb-5 waves-effect waves-light">
                 <i class="fa fa-chevron-left"></i> <i class="fa fa-chevron-left"></i> Back to Dashboard</a>
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