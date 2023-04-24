
<table>
	<thead>
		<tr>
			<th>Year</th>
	        <th>Month</th>
	        <th>Company</th>
	        <th>Vessel Name</th>
	        <th>Import Permit No</th>
	        <th>State <i class="units"></i></th>
	        <th>Zone <i class="units"></i></th>
	        <th>Product <i class="units"></i></th>
	        <th>Volume <i class="units"> MT</i></th>
	        <th>Date of Discharged <i class="units"></i></th> 
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<th>{{$detail->year}}</th>
                     <th>{{$detail->month}}</th>
                     <th>{{$detail->company?$detail->company->company_name:''}}</th>
                     <th>{{$detail->vessel_name}}</th>
                     <th>{{$detail->import_permit_no}}</th>
                     <th>{{$detail->state?$detail->state->state_name:''}}</th>
                     <th>{{$detail->zone}}</th>
                     <th>{{$detail->product?$detail->product->product_name:''}}</th> 
                     <th data-toggle="tooltip" title="Volume In Metric Tonnes">{{$detail->volume}}</th>
                     <th>{{$detail->date_discharged}}</th> 
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>