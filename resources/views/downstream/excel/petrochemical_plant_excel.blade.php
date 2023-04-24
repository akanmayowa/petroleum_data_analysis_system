
<table>
	<thead>
		<tr>
			<th>Plant</th>
			<th>State</th>
			<th>Location</th>
			<th>Ownership</th>
			<th>Plant Type</th>
			<th>Capacity</th>
			<th>Feedstock</th>
			<th>Product</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->locations?$detail->locations->plant_location_name:''}}</td>
					<td>{{$detail->state?$detail->state->state_name:''}}</td>
					<td>{{$detail->location}}</td>
					<td>{{$detail->ownership?$detail->ownership->ownership_name:''}}</td>
					<td>{{$detail->plant_type?$detail->plant_type->plant_type_name:''}}</td>
					<td>{{$detail->plant_capacity}}</td>
					<td>{{$detail->feedstocks?$detail->feedstocks->feedstock_name:''}}</td>
					<td>{{$detail->product?$detail->product->product_name:''}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>