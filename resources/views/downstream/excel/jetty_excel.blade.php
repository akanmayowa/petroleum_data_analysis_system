<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Jetty Name</th>
			<th>State</th>
			<th>Location</th>
			<th>Ownership</th>
			<th>Capacity</th>
			<th>Product</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->jetty_name}}</td>
					<td>{{$detail->state?$detail->state->state_name:''}}</td>
					<td>{{$detail->location}}</td>
					<td>{{$detail->ownership?$detail->ownership->ownership_name:''}}</td>
					<td>{{$detail->design_capacity}}</td>
					<td>{{$detail->product?$detail->product->product_name:''}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>