
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Zones</th>
			<th>Facility Type</th>
			<th>Terrain</th>
			<th>No of Companies</th>
			<th>Actual No of Companies</th>
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->zone?$detail->zone->zone_name:''}}</td>
					<td>{{$detail->type?$detail->type->type_name:''}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->no_of_company}}</td>
					<td>{{$detail->actual_no_of_company}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>