
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Month</th>
			<th>Field</th>
			<th>Terrain</th>
			<th>Geophysical</th>
			<th>Geotechnical</th>
			<th>Seismic Type</th>
			<th>Approved Coverage</th>
			<th>Actual Coverage</th>
			<th>Status</th>
			<th>Remark</th>
			
			
		</tr>
	</thead>

	<tbody>
		@if($data)
			@foreach($data as $detail)
				<tr>
					<td>{{$detail->year}}</td>
					<td>{{$detail->month}}</td>
					<td>{{$detail->field_id}}</td>
					<td>{{$detail->terrain?$detail->terrain->terrain_name:''}}</td>
					<td>{{$detail->geophysical?$detail->geophysical->geophysical_name:''}}</td>
					<td>{{$detail->geotechnical?$detail->geotechnical->geotechnical_name:''}}</td>
					<td>{{$detail->seismic_types?$detail->seismic_types->seismic_type_name:''}}</td>
					<td>{{$detail->approved_coverage}}</td>
					<td>{{$detail->actual_coverage}}</td>
					<td>{{$detail->status_category?$detail->status_category->status:''}}</td>
					<td>{{$detail->remark}}</td>
				</tr>
			@endforeach
		@endif		
	</tbody>
</table>