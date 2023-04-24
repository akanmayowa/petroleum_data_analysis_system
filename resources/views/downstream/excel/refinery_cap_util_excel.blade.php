
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Refinery</th>
			<th>Product</th>
			{{-- <th>State</th>
			<th>Location</th> --}}
			<th>Jan</th>
			<th>Feb</th>
			<th>Mar</th>
			<th>Apr</th>
			<th>May</th>
			<th>Jun</th>
			<th>Jul</th>
			<th>Aug</th>
			<th>Sep</th>
			<th>Oct</th>
			<th>Nov</th>
			<th>Dec</th>
			<th>Qrt 1</th>
			<th>Qrt 2</th>
			<th>Qrt 3</th>
			<th>Qrt 4</th>
			<th>Total</th>
			<th>Total Utilization</th>
			<th>Capacity Total</th>	
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->refinery?$detail->refinery->plant_location_name:''}}</td>
					<td>{{$detail->product?$detail->product->product_name:''}}</td>
					{{-- <td>{{$detail->state?$detail->state->state_name:''}}</td>
					<td>{{$detail->location}}</td> --}}
					<td>{{$detail->january}}</td>
					<td>{{$detail->febuary}}</td>
					<td>{{$detail->march}}</td>
					<td>{{$detail->april}}</td>
					<td>{{$detail->may}}</td>
					<td>{{$detail->june}}</td>
					<td>{{$detail->july}}</td>
					<td>{{$detail->august}}</td>
					<td>{{$detail->september}}</td>
					<td>{{$detail->october}}</td>
					<td>{{$detail->november}}</td>
					<td>{{$detail->december}}</td>
					<td>{{$detail->total}}</td>
					<td>{{$detail->q1}}</td>
					<td>{{$detail->q2}}</td>
					<td>{{$detail->q3}}</td>
					<td>{{$detail->q4}}</td>
					<td>{{$detail->total_utilization}}</td>
					<td>{{$detail->capacity_utilization}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>