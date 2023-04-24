
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Market Segment</th>
			<th>Company</th>
			<th>Location</th>
			<th>Capacity</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->market_category?$detail->market_category->market_segment_name:''}}</td>
					<td>{{$detail->company?$detail->company->company_name:''}}</td>
					<td>{{$detail->location_id}}</td>
					<td>{{$detail->storage_capacity}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>