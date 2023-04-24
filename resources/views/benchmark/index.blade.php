@extends('layouts.app')

@section('css')
<!-- Load c3.css -->
<link rel="stylesheet" href="{{asset('assets/table-export/css/tableexport.min.css')}}">
	<!-- Plugins --> 
<link rel="stylesheet" href="{{asset('c3/c3.css')}}">
<link rel="stylesheet" href="{{asset('c3/c3.css')}}">

 


<!-- Load d3.js and c3.js -->
@endsection

@section('content')
<div class="row">

						<div class="col-md-3">
							<div class="card m-b-30 card-body">
							 <h3 class="card-title font-20 mt-0">Filter</h3>
							 <form id="criteriaForm">


								@include('benchmark.modals.'.$modalName)

								<div>
									<div class="input-daterange input-group" id="date-range">
										<input type="text" class="form-control" name="start" placeholder="Start Date">
										<input type="text" class="form-control" name="end" placeholder="End Date">
									</div>
								</div>
								<div class="form-group row" style="margin-top:10px">

									<div class="col-sm-12">
									 <input type="submit" class="btn btn-success"  id="criteriaBtn" value="Compare">
								 </div>
							 </div>
						 </form>
					 </div>
					</div>

					<div class="col-md-9">
						<div class="card m-b-30 card-body">
						 <h3 class="card-title font-20 mt-0">{{ucfirst($modalName)}}
						 <button onclick="toggleClass()"  id="tableToggle" type="button" data-plugin="tooltip" data-original-title="Toggle Table/Chart" class="btn btn-sm btn-icon btn-primary btn-round waves-effect" >
					<i  class="fa fa-random" aria-hidden="true"></i>
				</button>
							<div class="pull-right">
						
								<select id="changechart" class="form-control">
									<option value="0">-Select Visual Type-</option>
									<option value="area-spline">Area Spline Chart</option>
									<option value="donut">Donut Chart</option>
									<option value="step">Step Chart</option>
									<option value="scatter">Scatter</option>
									<option value="bar">Bar Chart</option>
								</select>
							
							</div>
						</h3>
							
						 
						<div id="chart"></div>
			 
						<div class="hide" id="tablediv"  >
											<table  class="table" id="exporttbl">
												<thead>
													<tr id='date_append'>
														
													</tr>
												</thead>
													<tbody id="databody">
														 
													</tbody>
											</table>
										</div>
					</div>
				</div>    
			</div>

@endsection

@section('script')
<script src="{{asset('assets/table-export/js/FileSaver.min.js')}}"></script>
 <script src="{{asset('assets/table-export/js/tableexport.min.js')}}"></script>

<script src="{{asset('d3/d3.min.js')}}"></script>
	<script src="{{asset('c3/c3.min.js')}}"></script>
	<script>
	
	chart = c3.generate({
					bindto: '#chart',
					data: {
						x:'x',
						columns: [  
									 
						]
					},
					type: 'line',
					 
						color: {
							pattern: ['#3e8ef7','#11c26d','#dfff66','#ff666b']
						},
						size:{
								height:500
						},
						subchart: {
							show: true
						},
						axis : {
							x : {
									type : 'timeseries',
									tick: {
										 format: '{{$modalName=='revenueFilter' ? '%Y' : '%Y-%m'}}'
										
									}
							}
					},
						 grid: {
							x: {
								show: true
							},
							y: {
								show: true
							}
						}

			});

 function toggleClass(){
	$('#chart').toggleClass('hide');
					 $('#tablediv').toggleClass('hide');
 }

 $(function(){

 
		// $('#product_retail').change(function(){

		//       if($(this).val()=='down_ave_consumer_price_range'){
		//         $('.states').addClass('hide');
		//         // $('#markets').attr('multiple',false)
		//       }
		//       else{
		//            // $('#markets').attr('multiple',true)
		//         $('.states').removeClass('hide');
		//       }
		//     })

				$('#crude_export').trigger('change');

				$('#changechart').change(function(){
					chart.transform($(this).val());
				});

				$('#criteriaForm').submit(function(e){
							e.preventDefault();
							submitForm('criteriaForm','{{url('benchmark')}}');
				})


				$('#crude_export').change(function(){
					 select($(this).val());
				})

				select2F('select2',"Select a criteria to compare");
				select2F('select2RevenueType',"Select Actual/Projected"); 
				select('down_crude_export_by_destination');

			 

			function select(value){
					$('#select2Criterials').html('');
				
					$.get('{{url('benchmark')}}/resolveFiltercriteria?type='+value,function(data){

						$("#select2Criterials").select2({
							data: data
						})

					});
			}


			})
	</script>

@endsection

 