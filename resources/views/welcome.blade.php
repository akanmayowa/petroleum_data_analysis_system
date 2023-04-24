@extends('layouts.app-vue')


<style type="">
    *
    {
        font-size: 13px;
    }
</style>


@section('content')

@php $y = date('Y'); $week_no = date('W'); $week_no-- @endphp

	<div class="row vue-dash">   <!-- CARDS -->
		<div class="col-md-6 col-xl-3">
			<router-link class="block" to="/war-upstream" style="">
		        <div class="mini-stat clearfix" style="background-color: #fff">
		            <span class="mini-stat-icon bg-default"><i class="mdi mdi-chemical-weapon text-info"></i></span>
		            <div class="mini-stat-info text-right text-muted">
		                <span class="counter text-muted"> Upstream </span>
		                <div class=""> Weekly Activity Report : {{$y}} </div>

		            </div>
		            <p class="mb-0 m-t-20 text-muted">
		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Uploaded Data : <i class="fa fa-caret-up m-r-5" style="color: #03C03C"></i>  </span> <br>

		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Pending Data : <i class="fa fa-caret-down m-r-5" style="color: #E52B50"></i>     </span>
		            </p>
		        </div>
			</router-link>
		</div>

	    <div class="col-md-6 col-xl-3">
	        <div class="mini-stat clearfix" style="background-color: #fff">
				<router-link class="block" to="/war-downstream" style="">
		            <span class="mini-stat-icon bg-default"><i class="mdi mdi-engine text-info"></i></span> <!-- cup-water -->
		            <div class="mini-stat-info text-right text-muted">
		                <span class="counter text-muted">Downstream</span>	            
		                <div class=""> Weekly Activity Report : {{$y}} </div>

		            </div>
		            <p class="mb-0 m-t-20 text-muted"> 
		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Uploaded Data : <i class="fa fa-caret-up m-r-5" style="color: #03C03C"></i>  </span> <br>

		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Pending Data : <i class="fa fa-caret-down m-r-5" style="color: #E52B50"></i>     </span>
		            </p>
		        </router-link>
	        </div>
	    </div>

	    <div class="col-md-6 col-xl-3">
	        <div class="mini-stat clearfix" style="background-color: #fff">
				<router-link class="block" to="/war-gas" style="">
		            <span class="mini-stat-icon bg-default"><i class="fa fa-tint text-info"></i></span>
		            <div class="mini-stat-info text-right text-muted">
		                <span class="counter text-muted">Gas</span>
		                <div class=""> Weekly Activity Report : {{$y}} </div>

		            </div>
		            <p class="mb-0 m-t-20 text-muted"> 
		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Uploaded Data : <i class="fa fa-caret-up m-r-5" style="color: #03C03C"></i>  </span> <br>

		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Pending Data : <i class="fa fa-caret-down m-r-5" style="color: #E52B50"></i>     </span>
		            </p>
		        </router-link>
	        </div>
	    </div>

	    <div class="col-md-6 col-xl-3">
	        <div class="mini-stat clearfix" style="background-color: #fff">
				<router-link class="block" to="/war-engineering-standand" style="">
		            <span class="mini-stat-icon bg-default"><i class="mdi mdi-hospital text-info"></i></span> <!-- engine-outline -->
		            <div class="mini-stat-info text-right text-muted">
		                <span class="counter text-muted">HSE</span>
		                <div class=""> Weekly Activity Report : {{$y}} </div>
	                
		            </div>
		            <p class="mb-0 m-t-20 text-muted"> 
		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Uploaded Data : <i class="fa fa-caret-up m-r-5" style="color: #03C03C"></i>  </span> <br>

		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Pending Data : <i class="fa fa-caret-down m-r-5" style="color: #E52B50"></i>     </span>
		            </p>
		        </router-link>
	        </div>
	    </div>
	</div>








	<div class="row vue-dash">   <!-- CARDS -->
	    <div class="col-md-6 col-xl-3">
	        <div class="mini-stat clearfix" style="background-color: #fff">
				<router-link class="block" to="/war-shec" style="">
		            <span class="mini-stat-icon bg-default"><i class="fa fa-linode text-info"></i></span>
		            <div class="mini-stat-info text-right text-muted">
		                <span class="counter text-muted"> E&S </span>
		                <div class=""> Weekly Activity Report : {{$y}} </div>

		            </div>
		            <p class="mb-0 m-t-20 text-muted"> 
		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Uploaded Data : <i class="fa fa-caret-up m-r-5" style="color: #03C03C"></i>  </span> <br>

		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Pending Data : <i class="fa fa-caret-down m-r-5" style="color: #E52B50"></i>     </span>
		            </p>
		        </router-link>
	        </div>
	    </div>

	    <div class="col-md-6 col-xl-3">
	        <div class="mini-stat clearfix" style="background-color: #fff">
				<router-link class="block" to="/war-corporate-services" style="">
		            <span class="mini-stat-icon bg-default"><i class="fa fa-address-book-o text-info"></i></span> <!-- cup-water -->
		            <div class="mini-stat-info text-right text-muted">
		                <span class="counter text-muted">Corp Services</span>
		                <div class=""> Weekly Activity Report : {{$y}} </div>

		            </div>
		            <p class="mb-0 m-t-20 text-muted"> 
		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Uploaded Data : <i class="fa fa-caret-up m-r-5" style="color: #03C03C"></i>  </span> <br>

		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Pending Data : <i class="fa fa-caret-down m-r-5" style="color: #E52B50"></i>     </span>
		            </p>
		        </router-link>
	        </div>
	    </div>

	    <div class="col-md-6 col-xl-3">
	        <div class="mini-stat clearfix" style="background-color: #fff">
				<router-link class="block" to="/war-fad-tax-matters" style="">
		            <span class="mini-stat-icon bg-default"><i class="fa fa-wpexplorer text-info"></i></span>
		            <div class="mini-stat-info text-right text-muted">
		                <span class="counter text-muted">FAD</span>
		                <div class=""> Weekly Activity Report : {{$y}} </div>

		            </div>
		            <p class="mb-0 m-t-20 text-muted"> 
		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Uploaded Data : <i class="fa fa-caret-up m-r-5" style="color: #03C03C"></i>  </span> <br>

		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Pending Data : <i class="fa fa-caret-down m-r-5" style="color: #E52B50"></i>     </span>
		            </p>
		        </router-link>
	        </div>
	    </div>

	    <div class="col-md-6 col-xl-3">
	        <div class="mini-stat clearfix" style="background-color: #fff">
				<router-link class="block" to="/war-public-affairs" style="">
		            <span class="mini-stat-icon bg-default"><i class="fa fa-balance-scale text-info"></i></span> <!-- engine-outline -->
		            <div class="mini-stat-info text-right text-muted">
		                <span class="counter text-muted">Public Affairs</span>
		                <div class=""> Weekly Activity Report : {{$y}} </div>

		            </div>
		            <p class="mb-0 m-t-20 text-muted"> 
		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Uploaded Data : <i class="fa fa-caret-up m-r-5" style="color: #03C03C"></i>  </span> <br>

		                <span class=""> Week {{$week_no}}  </span> 
		                <span class="pull-right"> Pending Data : <i class="fa fa-caret-down m-r-5" style="color: #E52B50"></i>     </span>
		            </p>
		        </router-link>
	        </div>
	    </div>
	</div>


    

    <router-view>   </router-view> 

    


@endsection



@section('script')




@endsection